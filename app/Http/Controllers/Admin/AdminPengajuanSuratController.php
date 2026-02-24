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
        // Get all users (since there's no role column, we'll get all users)
        // In a real scenario, you might want to add a role column or use a different method to identify admins
        $users = \App\Models\User::whereNotNull('nama_lengkap')
                    ->where('nama_lengkap', '!=', '')
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
            // Surat types that don't require warga selection
            $noWargaTypes = ['perjanjian_perdamaian', 'surat_undangan', 'sppd'];
            
            // Basic validation - user_id is conditional
            $rules = [
                'jenis_surat' => 'required|string',
                'no_surat' => 'required|string|max:255',
                'jenis_ttd' => 'required|in:manual,gambar,qrcode',
                'kirim_wa' => 'nullable|boolean'
            ];
            
            // User ID only required for surat types that need warga selection
            if (!in_array($request->jenis_surat, $noWargaTypes)) {
                $rules['user_id'] = 'required|exists:users,id';
            }
            
            $request->validate($rules);

            // Get user data if user_id is provided, otherwise use admin as placeholder
            $user = null;
            if ($request->user_id) {
                $user = \App\Models\User::findOrFail($request->user_id);
            } else {
                // For surat without warga selection, use admin as placeholder
                $user = Auth::user();
            }

            // Validate specific fields based on jenis_surat
            $dataSurat = $this->validateAndGetSuratData($request);

            // AUTO-FILL DATA FOR SURAT HIBAH
            if ($request->jenis_surat === 'surat_hibah') {
                $dataSurat['nama_penghibah'] = $user->nama_lengkap;
                $dataSurat['umur_penghibah'] = $user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->age : '-';
                $dataSurat['pekerjaan_penghibah'] = $user->mata_pencaharian ?? $user->pekerjaan ?? '-';
                $dataSurat['agama_penghibah'] = $user->agama ?? '-';
                $dataSurat['alamat_penghibah'] = $user->alamat ?? '-';
            }

            // AUTO-FILL DATA FOR SURAT PINDAH
            if ($request->jenis_surat === 'surat_pindah') {
                $dataSurat['nama'] = $user->nama_lengkap;
                $dataSurat['nik'] = $user->nik;
                $dataSurat['tempat_lahir'] = $user->tempat_lahir ?? '-';
                $dataSurat['tanggal_lahir'] = $user->tanggal_lahir ?? null;
                $dataSurat['jenis_kelamin'] = $user->jenis_kelamin ?? '-';
                $dataSurat['agama'] = $user->agama ?? '-';
                $dataSurat['status_perkawinan'] = $user->status_perkawinan ?? '-';
                $dataSurat['pekerjaan'] = $user->mata_pencaharian ?? $user->pekerjaan ?? '-';
                $dataSurat['pendidikan'] = $user->pendidikan ?? '-';
                $dataSurat['kewarganegaraan'] = $user->kewarganegaraan ?? 'WNI';
                $dataSurat['alamat_asal'] = $user->alamat ?? '-';
            }

            // Handle file upload if exists
            $lampiranPath = null;
            if ($request->hasFile('lampiran')) {
                $file = $request->file('lampiran');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $lampiranPath = $file->storeAs('surat', $fileName, 'public');
            }

            // Create pengajuan surat
            $pengajuanData = [
                'jenis_surat' => $request->jenis_surat,
                'jenis_ttd' => $request->jenis_ttd,
                'keperluan' => $request->keperluan ?? 'Dibuat langsung oleh admin',
                'lampiran' => $lampiranPath,
                'data_surat' => $dataSurat,
                'status' => 'Valid', // Admin created surat is auto-approved
                'approved_by' => Auth::id(),
                'approved_at' => now(),
                'is_public' => false,
                'no_surat' => $request->no_surat ?? null
            ];
            
            // Add user data based on surat type
            if (in_array($request->jenis_surat, $noWargaTypes)) {
                // For surat without warga selection, use Pihak 1 name or generic label
                if ($request->jenis_surat === 'perjanjian_perdamaian') {
                    $pengajuanData['user_id'] = Auth::id(); // Use admin as reference
                    $pengajuanData['nama_lengkap'] = $dataSurat['pihak1_nama'] ?? 'Perjanjian Perdamaian';
                    $pengajuanData['nik'] = '-';
                    $pengajuanData['no_hp'] = '';
                    $pengajuanData['alamat'] = $dataSurat['pihak1_alamat'] ?? '-';
                } elseif ($request->jenis_surat === 'surat_undangan') {
                    $pengajuanData['user_id'] = Auth::id();
                    $pengajuanData['nama_lengkap'] = $dataSurat['kepada'] ?? 'Undangan';
                    $pengajuanData['nik'] = '-';
                    $pengajuanData['no_hp'] = '';
                    $pengajuanData['alamat'] = '-';
                } else {
                    // SPPD - already handled separately
                    $pengajuanData['user_id'] = $user->id;
                    $pengajuanData['nama_lengkap'] = $user->nama_lengkap;
                    $pengajuanData['nik'] = $user->nik;
                    $pengajuanData['no_hp'] = $user->no_hp ?? '';
                    $pengajuanData['alamat'] = $user->alamat ?? '';
                }
            } else {
                $pengajuanData['user_id'] = $user->id;
                $pengajuanData['nama_lengkap'] = $user->nama_lengkap;
                $pengajuanData['nik'] = $user->nik;
                $pengajuanData['no_hp'] = $user->no_hp ?? '';
                $pengajuanData['alamat'] = $user->alamat ?? '';
            }
            
            $pengajuan = PengajuanSurat::create($pengajuanData);

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
                } elseif (in_array($request->jenis_ttd, ['gambar', 'qrcode']) && $request->send_pdf) {
                    // For gambar or qrcode TTD, send PDF if requested
                    $this->sendWhatsAppPDF($pengajuan, $user);
                } elseif (in_array($request->jenis_ttd, ['gambar', 'qrcode']) && !$request->send_pdf) {
                    // For gambar or qrcode TTD but no PDF requested, send notification to pick up
                    $this->sendWhatsAppNotificationOnly($pengajuan, $user);
                }
            }

            // Determine WhatsApp message based on TTD type and user action
            $waMessage = '';
            if ($user->no_hp) {
                if ($request->jenis_ttd === 'manual') {
                    $waMessage = ' Notifikasi pengambilan di kantor telah dikirim ke WhatsApp user.';
                } elseif (in_array($request->jenis_ttd, ['gambar', 'qrcode']) && $request->send_pdf) {
                    $waMessage = ' PDF telah dikirim ke WhatsApp user.';
                } elseif (in_array($request->jenis_ttd, ['gambar', 'qrcode']) && !$request->send_pdf) {
                    $waMessage = ' Notifikasi pengambilan di kantor telah dikirim ke WhatsApp user.';
                }
            } elseif (!$user->no_hp) {
                $waMessage = ' User belum memiliki nomor HP untuk notifikasi WhatsApp.';
            }

            // Return JSON for AJAX requests
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Surat berhasil dibuat!' . $waMessage,
                    'redirect' => route('admin.pengajuan-surat.show', $pengajuan->id)
                ]);
            }

            return redirect()->route('admin.pengajuan-surat.show', $pengajuan->id)
                           ->with('success', 'Surat berhasil dibuat!' . $waMessage);

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $e->errors()
                ], 422);
            }
            throw $e;
            
        } catch (\Exception $e) {
            Log::error('Failed to create surat: ' . $e->getMessage());
            
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal membuat surat: ' . $e->getMessage()
                ], 500);
            }
            
            return back()->withInput()->with('error', 'Gagal membuat surat: ' . $e->getMessage());
        }
    }

    /**
     * Get validation rules for specific surat type
     */
    private function validateAndGetSuratDataRules($jenisSurat)
    {
        $rules = [];

        switch ($jenisSurat) {
            case 'surat_kehilangan':
                $rules = [
                    'jenis_dokumen' => 'required|string',
                    'nomor_dokumen' => 'nullable|string',
                    'nama_barang_lainnya' => 'nullable|string',
                    'tempat_kehilangan' => 'required|string',
                    'waktu_kehilangan' => 'required|string',
                    'keterangan_waktu' => 'nullable|string',
                ];
                break;

            case 'surat_bersih_diri':
                $rules = [
                    'nama_ayah' => 'required|string',
                    'umur_ayah' => 'required|integer',
                    'pekerjaan_ayah' => 'required|string',
                    'nama_ibu' => 'required|string',
                    'umur_ibu' => 'required|integer',
                    'pekerjaan_ibu' => 'required|string',
                    'keterangan_tambahan' => 'nullable|string',
                ];
                break;

            case 'izin_keramaian':
                $rules = [
                    'nama_kegiatan' => 'nullable|string',
                    'jenis_kegiatan' => 'nullable|string',
                    'tanggal_kegiatan' => 'nullable|date',
                    'waktu_kegiatan' => 'nullable|string',
                    'tempat_kegiatan' => 'nullable|string',
                    'keperluan_acara' => 'nullable|string',
                ];
                break;

            case 'ket_belum_menikah':
                $rules = [
                    'keperluan' => 'nullable|string',
                ];
                break;

            case 'surat_menikah':
                $rules = [
                    'tanggal_menikah' => 'required|date',
                ];
                break;

            case 'surat_kematian':
                $rules = [
                    'nama_almarhum' => 'required|string',
                    'hari_kematian' => 'required|string',
                    'tanggal_kematian' => 'required|date',
                    'tempat_kematian' => 'required|string',
                    'sebab_kematian' => 'required|string',
                ];
                break;

            case 'surat_miskin':
                $rules = [
                    'keperluan' => 'required|string',
                ];
                break;

            case 'surat_penghasilan_ortu':
                $rules = [
                    'nama_ayah' => 'required|string',
                    'tempat_lahir_ayah' => 'nullable|string',
                    'tanggal_lahir_ayah' => 'nullable|date',
                    'pekerjaan_ayah' => 'required|string',
                    'penghasilan_ayah' => 'required|numeric',
                    'nama_ibu' => 'required|string',
                    'tempat_lahir_ibu' => 'nullable|string',
                    'tanggal_lahir_ibu' => 'nullable|date',
                    'pekerjaan_ibu' => 'required|string',
                    'penghasilan_ibu' => 'required|numeric',
                ];
                break;

            case 'pengantar_nikah':
                $rules = [
                    // Status Perkawinan
                    'status_pria' => 'required|in:Jejaka,Duda,Beristri',
                    'beristri_ke' => 'nullable|integer|min:1',
                    'status_wanita' => 'required|in:Perawan,Janda',
                    'nama_pasangan_terdahulu' => 'nullable|string',
                    
                    // Data Ayah (Orang Tua Pemohon)
                    'ayah_nama' => 'required|string',
                    'ayah_bin' => 'nullable|string',
                    'ayah_nik' => 'required|string|max:16',
                    'ayah_tempat_tanggal_lahir' => 'required|string',
                    'ayah_agama' => 'required|string',
                    'ayah_pekerjaan' => 'required|string',
                    'ayah_alamat' => 'required|string',

                    // Data Ibu (Orang Tua Pemohon)
                    'ibu_nama' => 'required|string',
                    'ibu_bin' => 'nullable|string',
                    'ibu_nik' => 'required|string|max:16',
                    'ibu_tempat_tanggal_lahir' => 'required|string',
                    'ibu_warga_negara' => 'required|string',
                    'ibu_agama' => 'required|string',
                    'ibu_pekerjaan' => 'required|string',
                    'ibu_alamat' => 'required|string',

                    // Data Calon Istri (untuk halaman 2 - Surat Persetujuan Mempelai)
                    'calon_istri_nama' => 'required|string',
                    'calon_istri_bin' => 'required|string',
                    'calon_istri_nik' => 'required|string|max:16',
                    'calon_istri_tempat_tanggal_lahir' => 'required|string',
                    'calon_istri_warga_negara' => 'required|string',
                    'calon_istri_agama' => 'required|string',
                    'calon_istri_pekerjaan' => 'required|string',
                    'calon_istri_alamat' => 'required|string',
                ];
                break;

            case 'surat_hibah':
                $rules = [
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

            case 'sppd':
                $rules = [
                    'personel' => 'required|array|min:1',
                    'personel.*.warga_id' => 'required|exists:users,id',
                    'personel.*.jabatan' => 'required|string',
                    'tujuan_perjalanan' => 'required|string',
                    'keperluan' => 'required|string',
                    'tanggal_berangkat' => 'required|date',
                    'tanggal_kembali' => 'required|date',
                    'transportasi' => 'required|string',
                    'biaya' => 'nullable|array',
                    'biaya.*.uraian' => 'nullable|string',
                    'biaya.*.jumlah' => 'nullable|numeric',
                    'biaya.*.ket' => 'nullable|string'
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

            default:
                $rules = [];
                break;
        }

        return $rules;
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
                    'waktu_kehilangan' => 'required|string',
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
                    'keperluan' => 'required|string'
                ];
                break;

            case 'ket_usaha':
                $rules = [
                    'nama_usaha' => 'required|string',
                    'jenis_usaha' => 'required|string'
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
                    'jenis_usaha' => 'required|string'
                ];
                break;

            case 'ket_menikah':
                $rules = [
                    'tanggal_menikah' => 'required|date'
                ];
                break;

            case 'pengantar_nikah':
                $rules = [
                    // Status Perkawinan
                    'status_pria' => 'required|in:Jejaka,Duda,Beristri',
                    'beristri_ke' => 'nullable|integer|min:1',
                    'status_wanita' => 'required|in:Perawan,Janda',
                    'nama_pasangan_terdahulu' => 'nullable|string',
                    
                    // Data Ayah (Orang Tua Pemohon)
                    'ayah_nama' => 'required|string',
                    'ayah_bin' => 'nullable|string',
                    'ayah_nik' => 'required|string|max:16',
                    'ayah_tempat_tanggal_lahir' => 'required|string',
                    'ayah_agama' => 'required|string',
                    'ayah_pekerjaan' => 'required|string',
                    'ayah_alamat' => 'required|string',

                    // Data Ibu (Orang Tua Pemohon)
                    'ibu_nama' => 'required|string',
                    'ibu_bin' => 'nullable|string',
                    'ibu_nik' => 'required|string|max:16',
                    'ibu_tempat_tanggal_lahir' => 'required|string',
                    'ibu_warga_negara' => 'required|string',
                    'ibu_agama' => 'required|string',
                    'ibu_pekerjaan' => 'required|string',
                    'ibu_alamat' => 'required|string',

                    // Data Calon Istri (untuk halaman 2 - Surat Persetujuan Mempelai)
                    'calon_istri_nama' => 'required|string',
                    'calon_istri_bin' => 'required|string',
                    'calon_istri_nik' => 'required|string|max:16',
                    'calon_istri_tempat_tanggal_lahir' => 'required|string',
                    'calon_istri_warga_negara' => 'required|string',
                    'calon_istri_agama' => 'required|string',
                    'calon_istri_pekerjaan' => 'required|string',
                    'calon_istri_alamat' => 'required|string',
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

            case 'izin_keramaian':
                $rules = [
                    'nama_kegiatan' => 'nullable|string',
                    'jenis_kegiatan' => 'nullable|string',
                    'tanggal_kegiatan' => 'nullable|date',
                    'waktu_kegiatan' => 'nullable|string',
                    'tempat_kegiatan' => 'nullable|string',
                    'keperluan_acara' => 'nullable|string'
                ];
                break;

            case 'pengantar_nikah':
                $rules = [
                    // Status Perkawinan
                    'status_pria' => 'required|in:Jejaka,Duda,Beristri',
                    'beristri_ke' => 'nullable|integer|min:1',
                    'status_wanita' => 'required|in:Perawan,Janda',
                    'nama_pasangan_terdahulu' => 'nullable|string',
                    
                    // Data Ayah (Orang Tua Pemohon)
                    'ayah_nama' => 'required|string',
                    'ayah_bin' => 'nullable|string',
                    'ayah_nik' => 'required|string|max:16',
                    'ayah_tempat_tanggal_lahir' => 'required|string',
                    'ayah_agama' => 'required|string',
                    'ayah_pekerjaan' => 'required|string',
                    'ayah_alamat' => 'required|string',

                    // Data Ibu (Orang Tua Pemohon)
                    'ibu_nama' => 'required|string',
                    'ibu_bin' => 'nullable|string',
                    'ibu_nik' => 'required|string|max:16',
                    'ibu_tempat_tanggal_lahir' => 'required|string',
                    'ibu_warga_negara' => 'required|string',
                    'ibu_agama' => 'required|string',
                    'ibu_pekerjaan' => 'required|string',
                    'ibu_alamat' => 'required|string',

                    // Data Calon Istri (untuk halaman 2 - Surat Persetujuan Mempelai)
                    'calon_istri_nama' => 'required|string',
                    'calon_istri_bin' => 'required|string',
                    'calon_istri_nik' => 'required|string|max:16',
                    'calon_istri_tempat_tanggal_lahir' => 'required|string',
                    'calon_istri_warga_negara' => 'required|string',
                    'calon_istri_agama' => 'required|string',
                    'calon_istri_pekerjaan' => 'required|string',
                    'calon_istri_alamat' => 'required|string',
                ];
                break;

            case 'surat_pindah':
                $rules = [
                    // Data ini akan diisi otomatis dari user yang dipilih
                    // Form hanya memerlukan data kepindahan
                    'alamat_tujuan' => 'required|string',
                    'tanggal_pindah' => 'required|date',
                    'alasan_pindah' => 'required|string',
                    'jenis_pindah' => 'nullable|string',
                    'keperluan' => 'nullable|string',
                    'pengikut_count' => 'nullable|integer|min:0|max:10',
                    'pengikut' => 'nullable|array',
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

            case 'pengantar_akta_kelahiran':
                $rules = [
                    'kabupaten' => 'required|string',
                    'kecamatan' => 'required|string',
                    'desa' => 'required|string',
                    'nama_kepala_keluarga' => 'required|string',
                    'no_kk' => 'required|string',
                    'surat_ket_kelahiran' => 'nullable|string',

                    // Data Bayi
                    'nama_bayi' => 'required|string',
                    'jenis_kelamin_bayi' => 'required|string',
                    'tempat_lahir_bayi' => 'required|string',
                    'hari_tanggal_lahir' => 'required|string',
                    'pukul_lahir' => 'nullable|string',
                    'jenis_kelahiran' => 'required|string',
                    'kelahiran_ke' => 'required|string',
                    'penolong_kelahiran' => 'required|string',
                    'berat_bayi' => 'nullable|string',
                    'panjang_bayi' => 'nullable|string',

                    // Data Ibu
                    'nik_ibu' => 'required|string',
                    'nama_ibu' => 'required|string',
                    'tanggal_lahir_ibu' => 'required|string',
                    'pekerjaan_ibu' => 'required|string',
                    'alamat_ibu' => 'required|string',
                    'kewarganegaraan_ibu' => 'required|string',
                    'kebangsaan_ibu' => 'required|string',
                    'tanggal_perkawinan' => 'required|string',

                    // Data Ayah
                    'nik_ayah' => 'required|string',
                    'nama_ayah' => 'required|string',
                    'tanggal_lahir_ayah' => 'required|string',
                    'pekerjaan_ayah' => 'required|string',
                    'alamat_ayah' => 'required|string',
                    'kewarganegaraan_ayah' => 'required|string',

                    // Data Pelapor
                    'nik_pelapor' => 'required|string',
                    'nama_pelapor' => 'required|string',
                    'umur_pelapor' => 'required|string',
                    'jenis_kelamin_pelapor' => 'required|string',

                    // Data Saksi 1
                    'nik_saksi1' => 'required|string',
                    'nama_saksi1' => 'required|string',
                    'umur_saksi1' => 'required|string',
                    'jenis_kelamin_saksi1' => 'required|string',
                    'pekerjaan_saksi1' => 'required|string',
                    'alamat_saksi1' => 'required|string',

                    // Data Saksi 2
                    'nik_saksi2' => 'required|string',
                    'nama_saksi2' => 'required|string',
                    'umur_saksi2' => 'required|string',
                    'jenis_kelamin_saksi2' => 'required|string',
                    'pekerjaan_saksi2' => 'required|string',
                    'alamat_saksi2' => 'required|string',

                    'kepala_desa' => 'nullable|string'
                ];
                break;

            case 'surat_hibah':
                $rules = [
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

            case 'sppd':
                $rules = [
                    'personel' => 'required|array|min:1',
                    'personel.*.warga_id' => 'required|exists:users,id',
                    'personel.*.jabatan' => 'required|string',
                    'tujuan_perjalanan' => 'required|string',
                    'keperluan' => 'required|string',
                    'tanggal_berangkat' => 'required|date',
                    'tanggal_kembali' => 'required|date',
                    'transportasi' => 'required|string',
                    'biaya' => 'nullable|array',
                    'biaya.*.uraian' => 'nullable|string',
                    'biaya.*.jumlah' => 'nullable|numeric',
                    'biaya.*.ket' => 'nullable|string'
                ];
                break;

            default:
                throw new \Exception('Jenis surat tidak didukung');
        }

        $request->validate($rules);

        // Return only the surat-specific data
        $dataSurat = [];

        // Get all fields from request that match the validated rules
        foreach (array_keys($rules) as $field) {
            if ($request->has($field)) {
                // Skip array fields that need special handling
                if (in_array($field, ['personel', 'biaya', 'saksi', 'pengikut'])) {
                    continue;
                }
                $dataSurat[$field] = $request->$field;
            }
        }

        // Special handling for SPPD personel
        if ($jenisSurat === 'sppd' && $request->has('personel')) {
            $personelList = [];
            foreach ($request->personel as $personel) {
                $warga = \App\Models\User::find($personel['warga_id']);
                if ($warga) {
                    $personelList[] = [
                        'warga_id' => $warga->id, // Store warga_id for easier retrieval
                        'nama' => $warga->nama_lengkap,
                        'jabatan' => $personel['jabatan']
                    ];
                }
            }
            $dataSurat['personel'] = $personelList;
        }

        // Special handling for SPPD biaya
        if ($jenisSurat === 'sppd' && $request->has('biaya')) {
            $dataSurat['biaya'] = $request->biaya;
        }

        // Special handling for surat kehilangan saksi
        if ($jenisSurat === 'surat_kehilangan' && $request->has('saksi')) {
            $dataSurat['saksi'] = $request->saksi;
        }

        // Special handling for surat pindah pengikut
        if ($jenisSurat === 'surat_pindah' && $request->has('pengikut')) {
            $dataSurat['pengikut'] = $request->pengikut;
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
                case 'ket_usaha':
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
        try {
            $request->validate([
                'jenis_ttd' => 'required|in:manual,gambar,qrcode'
            ]);

            $pengajuan = PengajuanSurat::findOrFail($id);

            // Check if pengajuan can be updated (only if status is "Diajukan")
            if ($pengajuan->status !== 'Diajukan') {
                return response()->json([
                    'success' => false,
                    'message' => 'Jenis TTD hanya bisa diubah untuk pengajuan dengan status "Diajukan"'
                ], 422);
            }

            $pengajuan->update([
                'jenis_ttd' => $request->jenis_ttd
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Jenis tanda tangan berhasil diupdate!'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak valid',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            Log::error('Failed to update jenis TTD: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    /**
     * Update jenis TTD Camat (for surat miskin)
     */
    public function updateJenisTtdCamat(Request $request, $id)
    {
        try {
            $request->validate([
                'jenis_ttd_camat' => 'required|in:manual,gambar,qrcode'
            ]);

            $pengajuan = PengajuanSurat::findOrFail($id);

            // Check if pengajuan can be updated (only if status is "Diajukan")
            if ($pengajuan->status !== 'Diajukan') {
                return response()->json([
                    'success' => false,
                    'message' => 'Jenis TTD Camat hanya bisa diubah untuk pengajuan dengan status "Diajukan"'
                ], 422);
            }

            $pengajuan->update([
                'jenis_ttd_camat' => $request->jenis_ttd_camat
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Jenis tanda tangan Camat berhasil diupdate! (Sementara menggunakan file yang sama dengan TTD Kepala Desa)'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak valid',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            Log::error('Failed to update jenis TTD Camat: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    /**
     * Approve pengajuan surat with transaction and WhatsApp handling
     */
    public function approve(Request $request, $id)
    {
        try {
            return DB::transaction(function() use ($request, $id) {
                $pengajuan = PengajuanSurat::findOrFail($id);

                // Handle case where pengajuan might not have user_id (for public submissions)
                $user = null;
                if ($pengajuan->user_id) {
                    $user = \App\Models\User::find($pengajuan->user_id);
                }

                // Validate required fields
                $request->validate([
                    'no_surat' => 'required|string|max:255',
                    'jenis_ttd' => 'required|in:manual,gambar,qrcode'
                ]);

                // Step 1: Update approval status, TTD type, and save tembusan
                $updateData = [
                    'status' => 'Valid',
                    'approved_at' => now(),
                    'approved_by' => Auth::id(),
                    'no_surat' => $request->no_surat,
                    'jenis_ttd' => $request->jenis_ttd
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

                // Add step for TTD type update
                $ttdTypeMessages = [
                    'manual' => 'Jenis TTD diatur ke Manual - User perlu datang ke kantor',
                    'gambar' => 'Jenis TTD diatur ke Gambar/Stempel - Surat siap dengan tanda tangan digital',
                    'qrcode' => 'Jenis TTD diatur ke QR Code - Surat akan dilengkapi QR code verifikasi'
                ];
                $steps[] = ['step' => 'ttd_type', 'status' => 'completed', 'message' => $ttdTypeMessages[$request->jenis_ttd]];

                // Step 2: Generate QR Code if needed
                if ($request->jenis_ttd === 'qrcode') {
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
                if ($user && $user->no_hp) {
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
                    if (!$user) {
                        $steps[] = ['step' => 'whatsapp', 'status' => 'skipped', 'message' => 'Pengajuan publik - tidak ada user terdaftar'];
                    } else {
                        $steps[] = ['step' => 'whatsapp', 'status' => 'skipped', 'message' => 'User belum melengkapi nomor HP'];
                    }
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
            case 'ket_usaha':
                return app('App\Http\Controllers\SuratController')->generatePDFUsaha($id);
            case 'surat_kematian':
                return app('App\Http\Controllers\SuratController')->generatePDFKematian($id);
            case 'surat_tidak_mampu':
                return app('App\Http\Controllers\SuratController')->generatePDFTidakMampu($id);
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
            case 'pengantar_akta_kelahiran':
                return app('App\Http\Controllers\SuratController')->generatePDFPengantarAktaKelahiran($id);
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
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);
        $users = \App\Models\User::orderBy('nama_lengkap')->get();

        return view('admin.pengajuan-surat.edit', compact('pengajuan', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $pengajuan = PengajuanSurat::findOrFail($id);

            // Basic validation - different for SPPD vs other surat types
            $rules = [
                'no_surat' => 'required|string|max:255',
                'jenis_ttd' => 'required|in:manual,gambar,qrcode',
            ];
            
            // Surat types that don't require warga selection
            $noWargaTypes = ['perjanjian_perdamaian', 'surat_undangan'];

            // For SPPD: validate personel (no main user_id needed)
            // For other surat types: validate user_id and keperluan
            if ($pengajuan->jenis_surat === 'sppd') {
                $rules['jenis_ttd_camat'] = 'required|in:manual,gambar,qrcode';
                $rules['personel'] = 'required|array|min:1';
                $rules['personel.*.warga_id'] = 'required|exists:users,id';
                $rules['personel.*.jabatan'] = 'required|string';
                $rules['tujuan_perjalanan'] = 'required|string';
                $rules['keperluan_sppd'] = 'required|string';
                $rules['tanggal_berangkat'] = 'required|date';
                $rules['tanggal_kembali'] = 'required|date';
                $rules['transportasi'] = 'required|string';
            } elseif (in_array($pengajuan->jenis_surat, $noWargaTypes)) {
                // For surat types without warga selection, user_id is not required
                // Add validation rules for specific surat type fields
                $specificRules = $this->validateAndGetSuratDataRules($pengajuan->jenis_surat);
                $rules = array_merge($rules, $specificRules);
            } else {
                $rules['user_id'] = 'required|exists:users,id';
                // Keperluan is required for most surat types, except izin_keramaian, surat_usaha, ket_usaha
                if (!in_array($pengajuan->jenis_surat, ['izin_keramaian', 'ket_usaha', 'ket_usaha'])) {
                    $rules['keperluan'] = 'required|string';
                }

                // Add validation rules for specific surat type fields
                $specificRules = $this->validateAndGetSuratDataRules($pengajuan->jenis_surat);
                $rules = array_merge($rules, $specificRules);
            }

            $request->validate($rules);

        // Prepare data_surat update
        $dataSuratUpdate = $pengajuan->data_surat ?? [];

        // Get validation rules for specific surat type to know which fields to update
        $specificRules = $this->validateAndGetSuratDataRules($pengajuan->jenis_surat);

        // Update data_surat with specific fields from request (excluding arrays that need special handling)
        foreach (array_keys($specificRules) as $field) {
            if ($request->has($field) && !in_array($field, ['personel', 'biaya', 'saksi', 'pengikut'])) {
                $dataSuratUpdate[$field] = $request->$field;
            }
        }

        // Special handling for surat pindah
        if ($pengajuan->jenis_surat === 'surat_pindah') {
            // Handle all surat pindah specific fields
            $suratPindahFields = ['alasan_pindah', 'tanggal_pindah', 'alamat_tujuan', 'jenis_pindah', 'keperluan', 'nama_camat', 'nip_camat'];
            foreach ($suratPindahFields as $field) {
                if ($request->has($field)) {
                    $dataSuratUpdate[$field] = $request->$field;
                }
            }
            
            // Handle pengikut array
            if ($request->has('pengikut')) {
                $dataSuratUpdate['pengikut'] = $request->pengikut;
            } else {
                // If pengikut is not in request, it means all pengikut were removed
                $dataSuratUpdate['pengikut'] = [];
            }
        }

        // Handle SPPD separately
        if ($pengajuan->jenis_surat === 'sppd') {
            // Process personel data
            $personelList = [];
            $firstPersonelUser = null;

            foreach ($request->personel as $index => $personel) {
                $warga = \App\Models\User::find($personel['warga_id']);
                if ($warga) {
                    $personelList[] = [
                        'warga_id' => $warga->id, // Store warga_id for easier retrieval
                        'nama' => $warga->nama_lengkap,
                        'jabatan' => $personel['jabatan']
                    ];
                    // Use first personel as the main user
                    if ($index === 0 || $firstPersonelUser === null) {
                        $firstPersonelUser = $warga;
                    }
                }
            }

            $dataSuratUpdate['personel'] = $personelList;
            $dataSuratUpdate['tujuan_perjalanan'] = $request->tujuan_perjalanan;
            $dataSuratUpdate['keperluan'] = $request->keperluan_sppd;
            $dataSuratUpdate['tanggal_berangkat'] = $request->tanggal_berangkat;
            $dataSuratUpdate['tanggal_kembali'] = $request->tanggal_kembali;
            $dataSuratUpdate['transportasi'] = $request->transportasi;

            // Handle biaya if exists
            if ($request->has('biaya')) {
                $dataSuratUpdate['biaya'] = $request->biaya;
            }

            // Update pengajuan - only save user_id reference
            // User details (nama, nik, no_hp, alamat) can be accessed via user relation
            $pengajuan->update([
                'user_id' => $firstPersonelUser->id,
                'keperluan' => $request->keperluan_sppd,
                'jenis_ttd' => $request->jenis_ttd,
                'jenis_ttd_camat' => $request->jenis_ttd_camat,
                'data_surat' => $dataSuratUpdate,
                'no_surat' => $request->no_surat
            ]);
        } else {
            // For non-SPPD surat types
            // Surat types that don't require warga selection
            $noWargaTypes = ['perjanjian_perdamaian', 'surat_undangan'];
            
            \Log::info('Updating non-SPPD surat', [
                'pengajuan_id' => $pengajuan->id,
                'no_surat_request' => $request->no_surat,
                'user_id' => $request->user_id,
                'keperluan' => $request->keperluan,
                'jenis_surat' => $pengajuan->jenis_surat
            ]);

            $updateData = [
                'jenis_ttd' => $request->jenis_ttd,
                'data_surat' => $dataSuratUpdate,
                'no_surat' => $request->no_surat
            ];
            
            // Only update user_id if provided (not needed for perjanjian_perdamaian, surat_undangan)
            if (!in_array($pengajuan->jenis_surat, $noWargaTypes)) {
                $updateData['user_id'] = $request->user_id;
            } else {
                // For perjanjian_perdamaian, update nama_lengkap with pihak1_nama
                if ($pengajuan->jenis_surat === 'perjanjian_perdamaian') {
                    $updateData['nama_lengkap'] = $dataSuratUpdate['pihak1_nama'] ?? $pengajuan->nama_lengkap;
                    $updateData['alamat'] = $dataSuratUpdate['pihak1_alamat'] ?? $pengajuan->alamat;
                } elseif ($pengajuan->jenis_surat === 'surat_undangan') {
                    $updateData['nama_lengkap'] = $dataSuratUpdate['kepada'] ?? $pengajuan->nama_lengkap;
                }
            }

            // Only update keperluan if it's provided (some surat types like surat_usaha don't have it)
            if ($request->has('keperluan') && $request->keperluan !== null) {
                $updateData['keperluan'] = $request->keperluan;
            }

            $pengajuan->update($updateData);

            \Log::info('After update', ['no_surat_db' => $pengajuan->fresh()->no_surat]);
        }

        return redirect()->route('admin.pengajuan-surat.show', $pengajuan->id)
            ->with('success', 'Pengajuan surat berhasil diperbarui!');
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Validation error - redirect back with specific errors
        $errors = $e->validator->errors();
        $errorMessages = [];
        foreach ($errors->all() as $error) {
            $errorMessages[] = $error;
        }
        $errorMessage = 'Validasi gagal:\n' . implode('\n', $errorMessages);
        
        return back()
            ->withInput()
            ->withErrors($errors)
            ->with('error', $errorMessage);
    } catch (\Exception $e) {
        // Other errors
        \Log::error('Error updating pengajuan surat: ' . $e->getMessage(), [
            'pengajuan_id' => $id,
            'trace' => $e->getTraceAsString()
        ]);
        return back()
            ->withInput()
            ->with('error', 'Gagal memperbarui surat: ' . $e->getMessage());
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
