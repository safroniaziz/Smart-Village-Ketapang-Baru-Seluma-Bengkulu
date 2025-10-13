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
