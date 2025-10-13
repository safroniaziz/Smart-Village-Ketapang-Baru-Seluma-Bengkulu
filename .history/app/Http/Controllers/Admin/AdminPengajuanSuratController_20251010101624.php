<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSurat;
use App\Services\QrCodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class AdminPengajuanSuratController extends Controller
{
    /**
     * Display a listing of pengajuan surat
     */
    public function index(Request $request)
    {
        $query = PengajuanSurat::orderBy('created_at', 'desc');

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan jenis surat
        if ($request->filled('jenis_surat')) {
            $query->where('jenis_surat', $request->jenis_surat);
        }

        // Search berdasarkan nama atau NIK
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nama_lengkap', 'like', '%' . $request->search . '%')
                  ->orWhere('nik', 'like', '%' . $request->search . '%');
            });
        }

        $pengajuanSurat = $query->paginate(15);

        return view('admin.pengajuan-surat.index', compact('pengajuanSurat'));
    }

    /**
     * Show create form for new surat
     */
    public function create()
    {
        $users = \App\Models\User::where('role', '!=', 'admin')
                    ->orderBy('nama_lengkap')
                    ->get(['id', 'nama_lengkap', 'nik', 'alamat', 'no_hp', 'tempat_lahir', 'tanggal_lahir', 'mata_pencaharian']);

        return view('admin.pengajuan-surat.create', compact('users'));
    }

    /**
     * Store new surat created by admin
     */
    public function store(Request $request)
    {
        try {
            // Basic validation
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'jenis_surat' => 'required|string',
                'jenis_ttd' => 'required|in:manual,gambar,qrcode',
                'kirim_wa' => 'nullable|boolean'
            ]);

            $user = \App\Models\User::findOrFail($request->user_id);

            // Validate specific fields based on jenis_surat
            $dataSurat = $this->validateAndGetSuratData($request);

            // Handle file upload if exists
            $lampiranPath = null;
            if ($request->hasFile('lampiran')) {
                $file = $request->file('lampiran');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $lampiranPath = $file->storeAs('surat', $fileName, 'public');
            }

            // Create pengajuan surat
            $pengajuan = PengajuanSurat::create([
                'nama_lengkap' => $user->nama_lengkap,
                'nik' => $user->nik,
                'no_hp' => $user->no_hp,
                'alamat' => $user->alamat,
                'jenis_surat' => $request->jenis_surat,
                'jenis_ttd' => $request->jenis_ttd,
                'keperluan' => $request->keperluan ?? 'Dibuat langsung oleh admin',
                'lampiran' => $lampiranPath,
                'data_surat' => $dataSurat,
                'status' => 'Disetujui', // Admin created surat is auto-approved
                'approved_by' => Auth::id(),
                'approved_at' => now(),
                'is_public' => false
            ]);

            // Generate QR Code if needed
            if ($request->jenis_ttd === 'qrcode') {
                $this->generateQrCodeTtd($pengajuan);
                $pengajuan->refresh(); // Refresh to get updated data_surat
            }

            // Handle WhatsApp based on TTD type
            if ($user->no_hp) {
                if ($request->jenis_ttd === 'manual') {
                    // For manual TTD, always send notification to pick up at office
                    $this->sendWhatsAppNotificationOnly($pengajuan, $user);
                } elseif (in_array($request->jenis_ttd, ['gambar', 'qrcode']) && $request->kirim_wa) {
                    // For gambar or qrcode TTD, send PDF if requested
                    $this->sendWhatsAppPDF($pengajuan, $user);
                } elseif (in_array($request->jenis_ttd, ['gambar', 'qrcode']) && !$request->kirim_wa) {
                    // For gambar or qrcode TTD but no PDF requested, send notification to pick up
                    $this->sendWhatsAppNotificationOnly($pengajuan, $user);
                }
            }

            // Determine WhatsApp message based on TTD type and user action
            $waMessage = '';
            if ($user->no_hp) {
                if ($request->jenis_ttd === 'manual') {
                    $waMessage = ' Notifikasi pengambilan di kantor telah dikirim ke WhatsApp user.';
                } elseif (in_array($request->jenis_ttd, ['gambar', 'qrcode']) && $request->kirim_wa) {
                    $waMessage = ' PDF telah dikirim ke WhatsApp user.';
                } elseif (in_array($request->jenis_ttd, ['gambar', 'qrcode']) && !$request->kirim_wa) {
                    $waMessage = ' Notifikasi pengambilan di kantor telah dikirim ke WhatsApp user.';
                }
            } elseif (!$user->no_hp) {
                $waMessage = ' User belum memiliki nomor HP untuk notifikasi WhatsApp.';
            }

            return redirect()->route('admin.pengajuan-surat.show', $pengajuan->id)
                           ->with('success', 'Surat berhasil dibuat!' . $waMessage);

        } catch (\Exception $e) {
            Log::error('Failed to create surat: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal membuat surat: ' . $e->getMessage());
        }
    }

    /**
     * Validate and get surat data based on jenis_surat
     */
    private function validateAndGetSuratData(Request $request)
    {
        $jenisSurat = $request->jenis_surat;
        $rules = [];

        switch ($jenisSurat) {
            case 'surat_kehilangan':
                $rules = [
                    'jenis_dokumen' => 'required|string',
                    'nama_barang_lainnya' => 'nullable|string',
                    'nomor_dokumen' => 'nullable|string',
                    'tempat_kehilangan' => 'required|string',
                    'waktu_kehilangan' => 'required|date',
                    'keterangan_waktu' => 'nullable|string',
                    'keperluan' => 'required|string'
                ];
                break;

            case 'surat_bersih_diri':
                $rules = [
                    'nama_ayah' => 'required|string',
                    'umur_ayah' => 'required|integer|min:1',
                    'agama_ayah' => 'required|string',
                    'pekerjaan_ayah' => 'required|string',
                    'alamat_ayah' => 'required|string',
                    'nama_ibu' => 'required|string',
                    'umur_ibu' => 'required|integer|min:1',
                    'agama_ibu' => 'required|string',
                    'pekerjaan_ibu' => 'required|string',
                    'alamat_ibu' => 'required|string',
                    'tempat_lahir' => 'required|string',
                    'tanggal_lahir' => 'required|date',
                    'kebangsaan' => 'required|string',
                    'agama' => 'required|string',
                    'pekerjaan' => 'required|string'
                ];
                break;

            case 'surat_domisili':
                $rules = [
                    'keperluan' => 'required|string',
                    'alamat_domisili' => 'required|string',
                    'lama_tinggal' => 'required|string'
                ];
                break;

            case 'surat_usaha':
                $rules = [
                    'nama_usaha' => 'required|string',
                    'jenis_usaha' => 'required|string',
                    'alamat_usaha' => 'required|string',
                    'modal_usaha' => 'required|string',
                    'mulai_usaha' => 'required|date',
                    'jumlah_karyawan' => 'nullable|integer|min:0',
                    'keperluan' => 'required|string'
                ];
                break;

            case 'surat_tidak_mampu':
                $rules = [
                    'pekerjaan_pemohon' => 'required|string',
                    'penghasilan_per_bulan' => 'required|string',
                    'jumlah_tanggungan' => 'required|integer|min:0',
                    'kondisi_rumah' => 'required|string',
                    'luas_tanah' => 'nullable|string',
                    'aset_lainnya' => 'nullable|string',
                    'keperluan' => 'required|string',
                    'keterangan_tambahan' => 'nullable|string'
                ];
                break;

            case 'surat_kematian':
                $rules = [
                    'nama_almarhum' => 'required|string',
                    'hari_kematian' => 'required|string',
                    'tanggal_kematian' => 'required|date',
                    'tempat_kematian' => 'required|string',
                    'sebab_kematian' => 'required|string'
                ];
                break;

            case 'ket_usaha':
                $rules = [
                    'nama_usaha' => 'required|string',
                    'jenis_usaha' => 'required|string',
                    'alamat_usaha' => 'required|string',
                    'modal_usaha' => 'required|string',
                    'mulai_usaha' => 'required|date',
                    'jumlah_karyawan' => 'nullable|integer|min:0',
                    'keperluan' => 'required|string'
                ];
                break;

            case 'ket_menikah':
                $rules = [
                    'tanggal_menikah' => 'required|date'
                ];
                break;

            case 'ket_miskin_dtks':
                $rules = [
                    'keperluan' => 'required|string'
                ];
                break;

            case 'ket_penghasilan_ortu':
                $rules = [
                    'nama_ayah' => 'required|string',
                    'umur_ayah' => 'required|integer|min:1',
                    'pekerjaan_ayah' => 'required|string',
                    'penghasilan_ayah' => 'required|numeric|min:0',
                    'alamat_ayah' => 'required|string',
                    'nama_ibu' => 'required|string',
                    'umur_ibu' => 'required|integer|min:1',
                    'pekerjaan_ibu' => 'required|string',
                    'penghasilan_ibu' => 'required|numeric|min:0',
                    'alamat_ibu' => 'required|string',
                    'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120'
                ];
                break;

            case 'ket_belum_menikah':
                $rules = [
                    'keperluan' => 'required|string'
                ];
                break;

            case 'surat_berkelakuan_baik':
                $rules = [
                    'keperluan' => 'required|string'
                ];
                break;

            case 'pengantar_nikah':
                $rules = [
                    'nama' => 'required|string',
                    'nik' => 'required|string',
                    'tempat_lahir' => 'required|string',
                    'tanggal_lahir' => 'required|date',
                    'warga_negara' => 'required|string',
                    'agama' => 'required|string',
                    'pekerjaan' => 'required|string',
                    'alamat' => 'required|string',
                    'ayah_nama' => 'required|string',
                    'ibu_nama' => 'required|string',
                    'wanita_nama' => 'required|string',
                    'wanita_nik' => 'required|string',
                    'wanita_tempat_lahir' => 'required|string',
                    'wanita_tanggal_lahir' => 'required|date',
                    'wanita_warga_negara' => 'required|string',
                    'wanita_agama' => 'required|string',
                    'wanita_pekerjaan' => 'required|string',
                    'wanita_alamat' => 'required|string',
                    'wanita_ayah_nama' => 'required|string',
                    'wanita_ibu_nama' => 'required|string',
                    'keperluan' => 'required|string'
                ];
                break;

            case 'surat_pindah':
                $rules = [
                    'nama' => 'required|string',
                    'tempat_lahir' => 'required|string',
                    'tanggal_lahir' => 'required|date',
                    'jenis_kelamin' => 'required|string',
                    'agama' => 'required|string',
                    'status_perkawinan' => 'required|string',
                    'pekerjaan' => 'required|string',
                    'pendidikan' => 'required|string',
                    'kewarganegaraan' => 'required|string',
                    'alamat_asal' => 'required|string',
                    'alamat_tujuan' => 'required|string',
                    'tanggal_pindah' => 'required|date',
                    'alasan_pindah' => 'required|string',
                    'pengikut_count' => 'nullable|integer|min:0|max:10',
                    'pengikut' => 'nullable|json',
                    'nama_camat' => 'nullable|string',
                    'nip_camat' => 'nullable|string'
                ];
                break;

            case 'surat_rekomendasi':
                $rules = [
                    'nama' => 'required|string',
                    'nik' => 'required|string',
                    'jenis_kelamin' => 'required|string',
                    'agama' => 'required|string',
                    'pekerjaan' => 'required|string',
                    'alamat' => 'required|string',
                    'jenis_rekomendasi' => 'required|string',
                    'tujuan_rekomendasi' => 'required|string',
                    'isi_rekomendasi' => 'required|string',
                    'nama_usaha' => 'nullable|string',
                    'alamat_usaha' => 'nullable|string',
                    'nomor_telepon' => 'nullable|string',
                    'luas_lahan' => 'nullable|numeric',
                    'luas_bangunan' => 'nullable|numeric',
                    'kapasitas' => 'nullable|numeric',
                    'modal_usaha' => 'nullable|numeric',
                    'penghasilan_bulanan' => 'nullable|numeric',
                    'penutup' => 'nullable|string'
                ];
                break;

            case 'surat_undangan':
                $rules = [
                    'lampiran' => 'nullable|string',
                    'perihal' => 'required|string',
                    'tanggal_surat' => 'required|date',
                    'kepada' => 'required|string',
                    'pembukaan' => 'required|string',
                    'hari_tanggal' => 'required|string',
                    'jam' => 'required|string',
                    'acara' => 'required|string',
                    'tempat' => 'required|string',
                    'penutup' => 'nullable|string',
                    'tanggal_ttd' => 'required|date',
                    'kepala_desa' => 'nullable|string'
                ];
                break;

            case 'pengantar_kk':
                $rules = [
                    'nomor_kk' => 'required|string',
                    'nama_kepala_keluarga' => 'required|string',
                    'alamat' => 'required|string',
                    'rt_rw' => 'required|string',
                    'desa' => 'required|string',
                    'kecamatan' => 'required|string',
                    'kabupaten' => 'required|string',
                    'kode_pos' => 'required|string',
                    'propinsi' => 'required|string',
                    'anggota_keluarga' => 'nullable|array',
                    'anggota_keluarga.*.nama_lengkap' => 'required|string',
                    'anggota_keluarga.*.nik' => 'nullable|string',
                    'anggota_keluarga.*.jenis_kelamin' => 'required|string',
                    'anggota_keluarga.*.tempat_lahir' => 'required|string',
                    'anggota_keluarga.*.tanggal_lahir' => 'required|string',
                    'anggota_keluarga.*.agama' => 'required|string',
                    'anggota_keluarga.*.pendidikan' => 'required|string',
                    'anggota_keluarga.*.pekerjaan' => 'required|string',
                    'anggota_keluarga.*.status_perkawinan' => 'required|string',
                    'anggota_keluarga.*.status_hubungan' => 'required|string',
                    'anggota_keluarga.*.nama_ayah' => 'required|string',
                    'anggota_keluarga.*.nama_ibu' => 'required|string',
                    'tanggal_ttd' => 'required|date',
                    'kepala_desa' => 'nullable|string'
                ];
                break;

            case 'surat_hibah':
                $rules = [
                    'nama_penghibah' => 'required|string',
                    'umur_penghibah' => 'required|integer',
                    'pekerjaan_penghibah' => 'required|string',
                    'agama_penghibah' => 'required|string',
                    'alamat_penghibah' => 'required|string',
                    'hari_tanggal' => 'required|string',
                    'luas_tanah' => 'required|numeric',
                    'batas_utara' => 'required|string',
                    'pemilik_utara' => 'required|string',
                    'batas_barat' => 'required|string',
                    'pemilik_barat' => 'required|string',
                    'batas_selatan' => 'required|string',
                    'pemilik_selatan' => 'required|string',
                    'batas_timur' => 'required|string',
                    'pemilik_timur' => 'required|string',
                    'saksi_1' => 'required|string',
                    'saksi_2' => 'required|string',
                    'saksi_3' => 'required|string'
                ];
                break;

            case 'perjanjian_perdamaian':
                $rules = [
                    'pihak1_nama' => 'required|string',
                    'pihak1_umur' => 'required|integer',
                    'pihak1_pekerjaan' => 'required|string',
                    'pihak1_agama' => 'required|string',
                    'pihak1_alamat' => 'required|string',
                    'pihak2_nama' => 'required|string',
                    'pihak2_umur' => 'required|integer',
                    'pihak2_pekerjaan' => 'required|string',
                    'pihak2_agama' => 'required|string',
                    'pihak2_alamat' => 'required|string',
                    'hari_tanggal_perjanjian' => 'required|string',
                    'hari_tanggal_kejadian' => 'required|string',
                    'waktu_kejadian' => 'required|string',
                    'jenis_denda' => 'required|string',
                    'nominal_denda' => 'required|numeric',
                    'terbilang_denda' => 'required|string',
                    'saksi_1' => 'required|string',
                    'saksi_2' => 'required|string',
                    'saksi_3' => 'required|string',
                    'saksi_4' => 'required|string'
                ];
                break;

            default:
                throw new \Exception('Jenis surat tidak didukung');
        }

        $request->validate($rules);

        // Return only the surat-specific data
        $dataSurat = [];
        foreach (array_keys($rules) as $field) {
            if ($request->has($field)) {
                $dataSurat[$field] = $request->$field;
            }
        }

        return $dataSurat;
    }

    /**
     * Send WhatsApp PDF to user
     */
    private function sendWhatsAppPDF($pengajuan, $user)
    {
        try {
            $fonnteService = app(\App\Services\FonnteService::class);

            // Generate PDF first and save to storage
            $pdfController = app(\App\Http\Controllers\SuratController::class);

            switch ($pengajuan->jenis_surat) {
                case 'surat_kehilangan':
                    $pdfResponse = $pdfController->generatePDFKehilangan($pengajuan->id);
                    break;
                case 'surat_bersih_diri':
                    $pdfResponse = $pdfController->generatePDFBersihDiri($pengajuan->id);
                    break;
                case 'sppd':
                    $pdfResponse = $pdfController->generatePDFSPPD($pengajuan->id);
                    break;
                case 'izin_keramaian':
                    $pdfResponse = $pdfController->generatePDFIzinKeramaian($pengajuan->id);
                    break;
                case 'ket_belum_menikah':
                    $pdfResponse = $pdfController->generatePDFKeteranganBelumMenikah($pengajuan->id);
                    break;
                case 'surat_berkelakuan_baik':
                    $pdfResponse = $pdfController->generatePDFBerkelakuanBaik($pengajuan->id);
                    break;
                case 'surat_domisili':
                    $pdfResponse = $pdfController->generatePDFDomisili($pengajuan->id);
                    break;
                case 'surat_usaha':
                    $pdfResponse = $pdfController->generatePDFUsaha($pengajuan->id);
                    break;
                case 'surat_tidak_mampu':
                    $pdfResponse = $pdfController->generatePDFTidakMampu($pengajuan->id);
                    break;
                case 'surat_kematian':
                    $pdfResponse = $pdfController->generatePDFKematian($pengajuan->id);
                    break;
                case 'surat_menikah':
                    $pdfResponse = $pdfController->generatePDFMenikah($pengajuan->id);
                    break;
                case 'surat_miskin':
                    $pdfResponse = $pdfController->generatePDFMiskin($pengajuan->id);
                    break;
                case 'ket_usaha':
                    $pdfResponse = $pdfController->generatePDFUsaha($pengajuan->id);
                    break;
                case 'ket_menikah':
                    $pdfResponse = $pdfController->generatePDFMenikah($pengajuan->id);
                    break;
                case 'ket_miskin_dtks':
                    $pdfResponse = $pdfController->generatePDFMiskin($pengajuan->id);
                    break;
                case 'ket_penghasilan_ortu':
                    $pdfResponse = $pdfController->generatePDFPenghasilanOrtu($pengajuan->id);
                    break;
                default:
                    throw new \Exception('Jenis surat tidak didukung untuk WhatsApp');
            }

            // Save PDF to public storage temporarily
            $pdfContent = $pdfResponse->getContent();
            $fileName = 'surat_' . $pengajuan->id . '_' . time() . '.pdf';
            $pdfPath = 'surat-wa/' . $fileName;

            Storage::disk('public')->put($pdfPath, $pdfContent);

            // Send message with PDF
            $message = "🔔 *Surat Anda Telah Selesai Diproses!*\n\n"
                     . "📋 *Jenis:* " . ucwords(str_replace('_', ' ', $pengajuan->jenis_surat)) . "\n"
                     . "🔢 *Tracking:* " . $pengajuan->tracking_number . "\n"
                     . "✅ *Status:* " . $pengajuan->status . "\n"
                     . "📅 *Tanggal:* " . $pengajuan->created_at->format('d F Y H:i') . "\n\n"
                     . "📎 *Surat terlampir dalam file PDF.*\n\n"
                     . "_Simpan file PDF ini sebagai bukti surat resmi._";

            $result = $fonnteService->sendPdfToPhone($user->no_hp, $pdfPath, $message);

            // Clean up PDF file after 1 hour (optional - could be done with scheduled job)
            // For now, we'll leave it for manual cleanup or use a queue job

            Log::info('WhatsApp PDF sent successfully to ' . $user->no_hp . ' for pengajuan ' . $pengajuan->id);
            return $result;

        } catch (\Exception $e) {
            Log::error('Failed to send WhatsApp PDF for pengajuan ' . $pengajuan->id . ': ' . $e->getMessage());
            // Don't throw exception, just log it so the main process continues
            return false;
        }
    }

    /**
     * Send WhatsApp notification without PDF (for surat types without PDF template yet)
     */
    private function sendWhatsAppNotificationOnly($pengajuan, $user)
    {
        try {
            $fonnteService = app(\App\Services\FonnteService::class);

            // Send notification message only
            $message = "🔔 *Surat Anda Telah Selesai Diproses!*\n\n"
                     . "📋 *Jenis:* " . ucwords(str_replace('_', ' ', $pengajuan->jenis_surat)) . "\n"
                     . "🔢 *Tracking:* " . $pengajuan->tracking_number . "\n"
                     . "✅ *Status:* " . $pengajuan->status . "\n"
                     . "📅 *Tanggal:* " . $pengajuan->created_at->format('d F Y H:i') . "\n\n"
                     . "📋 *Surat sudah dapat diambil di kantor desa.*\n\n"
                     . "_Bawa identitas diri saat pengambilan surat._";

            $result = $fonnteService->send($user->no_hp, $message);

            Log::info('WhatsApp notification sent successfully to ' . $user->no_hp . ' for pengajuan ' . $pengajuan->id);
            return $result;

        } catch (\Exception $e) {
            Log::error('Failed to send WhatsApp notification for pengajuan ' . $pengajuan->id . ': ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Show detail pengajuan surat
     */
    public function show($id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);
        return view('admin.pengajuan-surat.show', compact('pengajuan'));
    }

    /**
     * Update jenis TTD
     */
    public function updateJenisTtd(Request $request, $id)
    {
        $request->validate([
            'jenis_ttd' => 'required|in:manual,gambar,qrcode'
        ]);

        $pengajuan = PengajuanSurat::findOrFail($id);
        $pengajuan->update([
            'jenis_ttd' => $request->jenis_ttd
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Jenis tanda tangan berhasil diupdate!'
        ]);
    }

    /**
     * Approve pengajuan surat with transaction and WhatsApp handling
     */
    public function approve(Request $request, $id)
    {
        try {
            return DB::transaction(function() use ($request, $id) {
                $pengajuan = PengajuanSurat::findOrFail($id);
                $user = \App\Models\User::findOrFail($pengajuan->user_id);

                // Validate nomor surat is provided
                $request->validate([
                    'no_surat' => 'required|string|max:255'
                ]);

                // Step 1: Update approval status and save tembusan
                $updateData = [
                    'status' => 'Disetujui',
                    'approved_at' => now(),
                    'approved_by' => Auth::id(),
                    'no_surat' => $request->no_surat
                ];

                // Add tembusan to data_surat if provided
                if ($request->has('tembusan') && !empty($request->tembusan)) {
                    $dataSurat = $pengajuan->data_surat;
                    $dataSurat['tembusan'] = $request->tembusan;
                    $updateData['data_surat'] = $dataSurat;
                }

                $pengajuan->update($updateData);

                $steps = [];
                $steps[] = ['step' => 'approval', 'status' => 'completed', 'message' => 'Surat berhasil disetujui'];

                if ($request->has('tembusan') && !empty($request->tembusan)) {
                    $steps[] = ['step' => 'tembusan', 'status' => 'completed', 'message' => 'Tembusan berhasil ditambahkan'];
                }

                // Step 2: Generate QR Code if needed
                if ($pengajuan->jenis_ttd === 'qrcode') {
                    try {
                        $this->generateQrCodeTtd($pengajuan);
                        $pengajuan->refresh();
                        $steps[] = ['step' => 'qr_generation', 'status' => 'completed', 'message' => 'QR Code berhasil dibuat'];
                    } catch (\Exception $e) {
                        $steps[] = ['step' => 'qr_generation', 'status' => 'failed', 'message' => 'Gagal membuat QR Code: ' . $e->getMessage()];
                        throw $e;
                    }
                } else {
                    $steps[] = ['step' => 'qr_generation', 'status' => 'skipped', 'message' => 'QR Code tidak diperlukan'];
                }

                // Step 3: Send WhatsApp based on TTD type
                $waResult = false;
                if ($user->no_hp) {
                    try {
                        if ($pengajuan->jenis_ttd === 'manual') {
                            $waResult = $this->sendWhatsAppNotificationOnly($pengajuan, $user);
                            $steps[] = ['step' => 'whatsapp', 'status' => 'completed', 'message' => 'Notifikasi pengambilan berhasil dikirim'];
                        } elseif (in_array($pengajuan->jenis_ttd, ['gambar', 'qrcode'])) {
                            // For create form, check if send PDF was requested
                            // For approval, default to send notification only (safer)
                            if ($request->has('send_pdf') && $request->send_pdf) {
                                $waResult = $this->sendWhatsAppPDF($pengajuan, $user);
                                $steps[] = ['step' => 'whatsapp', 'status' => 'completed', 'message' => 'PDF berhasil dikirim ke WhatsApp'];
                            } else {
                                $waResult = $this->sendWhatsAppNotificationOnly($pengajuan, $user);
                                $steps[] = ['step' => 'whatsapp', 'status' => 'completed', 'message' => 'Notifikasi pengambilan berhasil dikirim'];
                            }
                        }
                    } catch (\Exception $e) {
                        // WhatsApp failure shouldn't rollback the transaction
                        $steps[] = ['step' => 'whatsapp', 'status' => 'failed', 'message' => 'Gagal kirim WhatsApp: ' . $e->getMessage()];
                        Log::error('WhatsApp failed but approval continues: ' . $e->getMessage());
                    }
                } else {
                    $steps[] = ['step' => 'whatsapp', 'status' => 'skipped', 'message' => 'User belum melengkapi nomor HP'];
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Pengajuan surat berhasil disetujui!',
                    'steps' => $steps,
                    'whatsapp_sent' => $waResult !== false,
                    'pengajuan' => $pengajuan->fresh()
                ]);
            });

        } catch (\Exception $e) {
            Log::error('Approval failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyetujui surat: ' . $e->getMessage(),
                'steps' => [
                    ['step' => 'approval', 'status' => 'failed', 'message' => $e->getMessage()]
                ]
            ], 500);
        }
    }

    /**
     * Reject pengajuan surat
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'alasan_reject' => 'required|string|max:500'
        ]);

        $pengajuan = PengajuanSurat::findOrFail($id);
        $pengajuan->update([
            'status' => 'Ditolak',
            'rejected_at' => now(),
            'rejected_by' => Auth::id(),
            'alasan_reject' => $request->alasan_reject
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan surat berhasil ditolak!'
        ]);
    }

    /**
     * Generate PDF with selected TTD type
     */
    public function generatePdf($id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);

        // Generate QR Code jika jenis_ttd = 'qrcode'
        if ($pengajuan->jenis_ttd === 'qrcode') {
            $this->generateQrCodeTtd($pengajuan);
        }

        // Route ke controller PDF yang sesuai berdasarkan jenis surat
        switch ($pengajuan->jenis_surat) {
            case 'surat_kehilangan':
                return app('App\Http\Controllers\SuratController')->generatePDFKehilangan($id);
            case 'surat_bersih_diri':
                return app('App\Http\Controllers\SuratController')->generatePDFBersihDiri($id);
            case 'sppd':
                return app('App\Http\Controllers\SuratController')->generatePDFSPPD($id);
            case 'izin_keramaian':
                return app('App\Http\Controllers\SuratController')->generatePDFIzinKeramaian($id);
            case 'ket_belum_menikah':
                return app('App\Http\Controllers\SuratController')->generatePDFKeteranganBelumMenikah($id);
            case 'surat_berkelakuan_baik':
                return app('App\Http\Controllers\SuratController')->generatePDFBerkelakuanBaik($id);
            case 'surat_domisili':
                return app('App\Http\Controllers\SuratController')->generatePDFDomisili($id);
            case 'surat_usaha':
                return app('App\Http\Controllers\SuratController')->generatePDFUsaha($id);
            case 'surat_tidak_mampu':
                return app('App\Http\Controllers\SuratController')->generatePDFTidakMampu($id);
            case 'ket_usaha':
                return app('App\Http\Controllers\SuratController')->generatePDFUsaha($id);
            case 'ket_menikah':
                return app('App\Http\Controllers\SuratController')->generatePDFMenikah($id);
            case 'ket_miskin_dtks':
                return app('App\Http\Controllers\SuratController')->generatePDFMiskin($id);
            case 'ket_penghasilan_ortu':
                return app('App\Http\Controllers\SuratController')->generatePDFPenghasilanOrtu($id);
            case 'pengantar_nikah':
                return app('App\Http\Controllers\SuratController')->generatePDFPengantarNikah($id);
            case 'surat_hibah':
                return app('App\Http\Controllers\SuratController')->generatePDFHibah($id);
            case 'perjanjian_perdamaian':
                return app('App\Http\Controllers\SuratController')->generatePDFPerjanjianPerdamaian($id);
            case 'surat_pindah':
                return app('App\Http\Controllers\SuratController')->generatePDFSuratPindah($id);
            case 'surat_rekomendasi':
                return app('App\Http\Controllers\SuratController')->generatePDFRekomendasi($id);
            case 'surat_undangan':
                return app('App\Http\Controllers\SuratController')->generatePDFUndangan($id);
            case 'pengantar_kk':
                return app('App\Http\Controllers\SuratController')->generatePDFPengantarKK($id);
            default:
                return response()->json(['error' => 'Jenis surat tidak dikenali'], 400);
        }
    }

        /**
     * Generate QR code dari gambar tanda tangan menggunakan QrCodeService
     */
    private function generateQrCodeTtd($pengajuan)
    {
        try {
            $qrCodeService = new QrCodeService();

            // Generate QR code with TTD signature
            $qrCodeBase64 = $qrCodeService->generateSuratQrCode($pengajuan);

            // Save QR Code to storage
            $filename = 'qr-ttd-' . $pengajuan->id . '-' . time();
            $qrPath = $qrCodeService->saveQrCodeToStorage($qrCodeBase64, $filename);

            // Update pengajuan dengan path QR code dan base64 data
            $pengajuan->update([
                'data_surat' => array_merge($pengajuan->data_surat ?? [], [
                    'qr_ttd_path' => $qrPath,
                    'qr_ttd_base64' => $qrCodeBase64,
                    'verification_url' => $qrCodeService->generateVerificationUrl($pengajuan->tracking_number)
                ])
            ]);

            return true;

        } catch (\Exception $e) {
            Log::error('Failed to generate QR TTD for pengajuan ' . $pengajuan->id . ': ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Delete pengajuan surat
     */
    public function destroy($id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);

        // Hapus file lampiran jika ada
        if ($pengajuan->lampiran && Storage::disk('public')->exists($pengajuan->lampiran)) {
            Storage::disk('public')->delete($pengajuan->lampiran);
        }

        // Hapus QR code jika ada
        if (isset($pengajuan->data_surat['qr_ttd_path']) &&
            Storage::disk('public')->exists($pengajuan->data_surat['qr_ttd_path'])) {
            Storage::disk('public')->delete($pengajuan->data_surat['qr_ttd_path']);
        }

        $pengajuan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan surat berhasil dihapus!'
        ]);
    }
}
