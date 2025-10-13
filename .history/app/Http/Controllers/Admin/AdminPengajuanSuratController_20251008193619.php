<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSurat;
use App\Services\QrCodeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                'jenis_ttd' => 'required|in:biasa,qrcode',
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

            // Send WhatsApp if requested and user has phone number
            if ($request->kirim_wa && $user->no_hp) {
                $this->sendWhatsAppPDF($pengajuan, $user);
            }

            return redirect()->route('admin.pengajuan-surat.show', $pengajuan->id)
                           ->with('success', 'Surat berhasil dibuat! ' . 
                           ($request->kirim_wa && $user->no_hp ? 'PDF telah dikirim ke WhatsApp user.' : ''));

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
            'jenis_ttd' => 'required|in:biasa,qrcode'
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
     * Approve pengajuan surat
     */
    public function approve($id)
    {
        $pengajuan = PengajuanSurat::findOrFail($id);
        $pengajuan->update([
            'status' => 'Disetujui',
            'approved_at' => now(),
            'approved_by' => Auth::id()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan surat berhasil disetujui!'
        ]);
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
