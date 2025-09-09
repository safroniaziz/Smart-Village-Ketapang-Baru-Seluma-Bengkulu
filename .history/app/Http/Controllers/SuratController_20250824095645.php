<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PengajuanSurat;
use App\Models\Warga;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratController extends Controller
{
    /**
     * Validasi NIK dan ambil data warga
     * Method global untuk semua jenis surat
     */
    public function validateNIK(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|size:16'
        ]);

        $warga = Warga::where('nik', $request->nik)->first();

        if (!$warga) {
            return response()->json([
                'success' => false,
                'message' => 'NIK tidak ditemukan dalam database warga desa.',
                'data' => null
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'NIK valid, data warga ditemukan.',
            'data' => [
                'nama' => $warga->nama,
                'nik' => $warga->nik,
                'tempat_lahir' => $warga->tempat_lahir,
                'tanggal_lahir' => $warga->tanggal_lahir,
                'jenis_kelamin' => $warga->jenis_kelamin,
                'agama' => $warga->agama,
                'pekerjaan' => $warga->pekerjaan,
                'alamat' => $warga->alamat,
                'rt' => $warga->rt,
                'rw' => $warga->rw,
                'no_hp' => $warga->no_hp
            ]
        ]);
    }

    /**
     * Pengajuan surat tanpa login (public)
     * Method global untuk semua jenis surat
     */
    public function storePengajuanPublic(Request $request)
    {
        $request->validate([
            'jenis_surat' => 'required|string',
            'nik' => 'required|string|size:16',
            'data_surat' => 'required|array',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120'
        ]);

        // Validasi NIK
        $warga = Warga::where('nik', $request->nik)->first();
        if (!$warga) {
            return response()->json([
                'success' => false,
                'message' => 'NIK tidak valid atau tidak terdaftar sebagai warga desa.'
            ], 422);
        }

        // Handle file upload
        $lampiranPath = null;
        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampiran-surat', 'public');
        }

        // Create pengajuan surat tanpa user_id (public)
        $pengajuan = PengajuanSurat::create([
            'user_id' => null, // Public submission
            'jenis_surat' => $request->jenis_surat,
            'data_surat' => array_merge($request->data_surat, [
                'warga_data' => [
                    'nama' => $warga->nama,
                    'nik' => $warga->nik,
                    'tempat_lahir' => $warga->tempat_lahir,
                    'tanggal_lahir' => $warga->tanggal_lahir,
                    'jenis_kelamin' => $warga->jenis_kelamin,
                    'agama' => $warga->agama,
                    'pekerjaan' => $warga->pekerjaan,
                    'alamat' => $warga->alamat,
                    'rt' => $warga->rt,
                    'rw' => $warga->rw,
                    'no_hp' => $warga->no_hp
                ],
                'lampiran' => $lampiranPath
            ]),
            'status' => 'Diajukan',
            'submitted_at' => now(),
            'is_public' => true
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan surat berhasil dikirim! Admin akan memeriksa dalam 1-2 hari kerja.',
            'pengajuan_id' => $pengajuan->id,
            'nomor_tracking' => $pengajuan->id // Simple tracking number
        ]);
    }

    /**
     * Generate nomor surat otomatis
     * Method global untuk semua jenis surat
     */
    public function generateNomorSurat($jenisSurat, $pengajuanId)
    {
        $bulan = date('m');
        $tahun = date('Y');
        
        // Mapping kode surat
        $kodeSurat = [
            'surat_kehilangan' => 'SKK',
            'surat_keterangan' => 'SKT',
            'surat_pengantar' => 'SP',
            'surat_izin' => 'SI'
        ];

        $kode = $kodeSurat[$jenisSurat] ?? 'SUR';
        
        return "{$kode}/{$bulan}/{$tahun}/{$pengajuanId}";
    }

    /**
     * Get data warga berdasarkan NIK
     * Method global untuk semua jenis surat
     */
    public function getWargaByNIK($nik)
    {
        $warga = Warga::where('nik', $nik)->first();
        
        if (!$warga) {
            return response()->json([
                'success' => false,
                'message' => 'Data warga tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $warga
        ]);
    }

    public function storePengajuanKehilangan(Request $request)
    {
        $request->validate([
            'jenis_dokumen' => 'required|string',
            'nama_barang_lainnya' => 'nullable|string',
            'nomor_dokumen' => 'nullable|string',
            'tempat_kehilangan' => 'required|string',
            'waktu_kehilangan' => 'required|string',
            'keterangan_waktu' => 'nullable|string',
            'keperluan' => 'required|string',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120'
        ]);

        // Handle file upload
        $lampiranPath = null;
        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampiran-surat', 'public');
        }

        // Create pengajuan surat
        $pengajuan = PengajuanSurat::create([
            'user_id' => Auth::id(),
            'jenis_surat' => 'surat_kehilangan',
            'data_surat' => [
                'jenis_dokumen' => $request->jenis_dokumen,
                'nama_barang_lainnya' => $request->nama_barang_lainnya,
                'nomor_dokumen' => $request->nomor_dokumen,
                'tempat_kehilangan' => $request->tempat_kehilangan,
                'waktu_kehilangan' => $request->waktu_kehilangan,
                'keterangan_waktu' => $request->keterangan_waktu,
                'keperluan' => $request->keperluan,
                'lampiran' => $lampiranPath
            ],
            'status' => 'Diajukan'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan surat berhasil dikirim! Admin akan memeriksa dalam 1-2 hari kerja.',
            'pengajuan_id' => $pengajuan->id
        ]);
    }

    public function generatePDFKehilangan($pengajuanId)
    {
        $pengajuan = PengajuanSurat::with('user')->findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;
        $user = $pengajuan->user;

        // Generate nomor surat
        $nomorSurat = '470/' . date('m') . '/' . date('Y') . '/' . $pengajuanId;

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->format('d F Y'),
            'nama_pemohon' => $user->name,
            'nik' => $user->nik,
            'tempat_lahir' => $user->tempat_lahir,
            'tanggal_lahir' => $user->tanggal_lahir ? date('d F Y', strtotime($user->tanggal_lahir)) : '-',
            'alamat' => $user->alamat,
            'rt_rw' => $user->rt . '/' . $user->rw,
            'no_hp' => $user->no_hp,
            'pekerjaan' => $user->pekerjaan,
            'jenis_dokumen' => $data['jenis_dokumen'],
            'nama_barang_lainnya' => $data['nama_barang_lainnya'],
            'nomor_dokumen' => $data['nomor_dokumen'],
            'tempat_kehilangan' => $data['tempat_kehilangan'],
            'waktu_kehilangan' => $data['waktu_kehilangan'],
            'keterangan_waktu' => $data['keterangan_waktu'],
            'keperluan' => $data['keperluan']
        ];

        // Generate PDF dengan pengaturan A4 dan margin
        $pdf = Pdf::loadView('pdf.surat-kehilangan', $pdfData)
            ->setPaper('A4', 'portrait')  // Pastikan A4 portrait
            ->setOptions([
                'margin-top' => 15,     // margin dalam mm
                'margin-bottom' => 15,
                'margin-left' => 20,
                'margin-right' => 20,
                'enable-local-file-access' => true
            ]);

        return $pdf->download('Surat-Keterangan-Kehilangan-' . $user->name . '.pdf');
    }

    public function previewPDFKehilangan($pengajuanId)
    {
        $pengajuan = PengajuanSurat::with('user')->findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;
        $user = $pengajuan->user;

        // Generate nomor surat
        $nomorSurat = '470/' . date('m') . '/' . date('Y') . '/' . $pengajuanId;

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->format('d F Y'),
            'nama_pemohon' => $user->name,
            'nik' => $user->nik,
            'tempat_lahir' => $user->tempat_lahir,
            'tanggal_lahir' => $user->tanggal_lahir ? date('d F Y', strtotime($user->tanggal_lahir)) : '-',
            'alamat' => $user->alamat,
            'rt_rw' => $user->rt . '/' . $user->rw,
            'no_hp' => $user->no_hp,
            'pekerjaan' => $user->pekerjaan,
            'jenis_dokumen' => $data['jenis_dokumen'],
            'nama_barang_lainnya' => $data['nama_barang_lainnya'],
            'nomor_dokumen' => $data['nomor_dokumen'],
            'tempat_kehilangan' => $data['tempat_kehilangan'],
            'waktu_kehilangan' => $data['waktu_kehilangan'],
            'keterangan_waktu' => $data['keterangan_waktu'],
            'keperluan' => $data['keperluan']
        ];

        // Generate PDF for preview
        $pdf = Pdf::loadView('pdf.surat-kehilangan', $pdfData);

        return $pdf->stream('Surat-Keterangan-Kehilangan-' . $user->name . '.pdf');
    }

    // Admin: Approve surat kehilangan
    public function approveSuratKehilangan($pengajuanId)
    {
        $pengajuan = PengajuanSurat::with('user')->findOrFail($pengajuanId);

        // Update status jadi approved
        $pengajuan->update([
            'status' => 'approved',
            'approved_at' => now(),
            'approved_by' => Auth::id()
        ]);

        // Generate PDF dan kirim ke WA user
        $data = $pengajuan->data_surat;
        $user = $pengajuan->user;

        // Generate nomor surat
        $nomorSurat = '470/' . date('m') . '/' . date('Y') . '/' . $pengajuanId;

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->format('d F Y'),
            'nama_pemohon' => $user->name,
            'nik' => $user->nik,
            'tempat_lahir' => $user->tempat_lahir,
            'tanggal_lahir' => $user->tanggal_lahir ? date('d F Y', strtotime($user->tanggal_lahir)) : '-',
            'alamat' => $user->alamat,
            'rt_rw' => $user->rt . '/' . $user->rw,
            'no_hp' => $user->no_hp,
            'pekerjaan' => $user->pekerjaan,
            'jenis_dokumen' => $data['jenis_dokumen'],
            'nama_barang_lainnya' => $data['nama_barang_lainnya'],
            'nomor_dokumen' => $data['nomor_dokumen'],
            'tempat_kehilangan' => $data['tempat_kehilangan'],
            'waktu_kehilangan' => $data['waktu_kehilangan'],
            'keterangan_waktu' => $data['keterangan_waktu'],
            'keperluan' => $data['keperluan']
        ];

        // Generate PDF
        $pdf = Pdf::loadView('pdf.surat-kehilangan', $pdfData);
        $pdfPath = storage_path('app/public/surat-approved/surat-kehilangan-' . $pengajuanId . '.pdf');
        $pdf->save($pdfPath);

        // Kirim ke WA user menggunakan FonnteService
        $fonnteService = app(\App\Services\FonnteService::class);

        $message = "🎉 *SURAT KETERANGAN KEHILANGAN DISETUJUI!*\n\n"
                . "Halo {$user->name},\n"
                . "Pengajuan surat keterangan kehilangan Anda telah *DISETUJUI* oleh admin.\n\n"
                . "📋 *Detail Surat:*\n"
                . "• Nomor: {$nomorSurat}\n"
                . "• Jenis: {$data['jenis_dokumen']}\n"
                . "• Status: ✅ DISETUJUI\n"
                . "• Tanggal Approval: " . now()->format('d/m/Y H:i') . "\n\n"
                . "📱 Surat akan dikirim dalam beberapa saat...";

        try {
            $fonnteService->send($user->no_hp, $message);

            // Kirim PDF sebagai attachment (jika FonnteService support)
            // $fonnteService->sendFile($user->no_hp, $pdfPath, 'Surat-Keterangan-Kehilangan.pdf');

            return response()->json([
                'success' => true,
                'message' => 'Surat berhasil disetujui dan notifikasi dikirim ke user!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => true,
                'message' => 'Surat berhasil disetujui, tapi gagal kirim notifikasi WA: ' . $e->getMessage()
            ]);
        }
    }

    // Admin: Reject surat kehilangan
    public function rejectSuratKehilangan(Request $request, $pengajuanId)
    {
        $request->validate([
            'alasan_reject' => 'required|string|max:500'
        ]);

        $pengajuan = PengajuanSurat::with('user')->findOrFail($pengajuanId);

        // Update status jadi rejected
        $pengajuan->update([
            'status' => 'rejected',
            'rejected_at' => now(),
            'rejected_by' => Auth::id(),
            'alasan_reject' => $request->alasan_reject
        ]);

        // Kirim notifikasi ke user
        $user = $pengajuan->user;
        $fonnteService = app(\App\Services\FonnteService::class);

        $message = "❌ *PENGAJUAN SURAT DITOLAK*\n\n"
                . "Halo {$user->name},\n"
                . "Mohon maaf, pengajuan surat keterangan kehilangan Anda *DITOLAK*.\n\n"
                . "📋 *Alasan Penolakan:*\n"
                . "{$request->alasan_reject}\n\n"
                . "💡 *Saran:*\n"
                . "Silakan periksa kembali data yang diinput dan ajukan ulang.\n"
                . "Jika ada pertanyaan, hubungi admin desa.";

        try {
            $fonnteService->send($user->no_hp, $message);

            return response()->json([
                'success' => true,
                'message' => 'Surat berhasil ditolak dan notifikasi dikirim ke user!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => true,
                'message' => 'Surat berhasil ditolak, tapi gagal kirim notifikasi WA: ' . $e->getMessage()
            ]);
        }
    }

    // Test method untuk preview PDF manual
    public function testPDFKehilangan()
    {
        // Data dummy untuk testing
        $pdfData = [
            'nomor_surat' => '470/08/2025/001',
            'tanggal_surat' => now()->format('d F Y'),
            'nama_pemohon' => 'John Doe',
            'nik' => '1234567890123456',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '15 January 1990',
            'alamat' => 'Jl. Contoh No. 123, RT 001/RW 002',
            'rt_rw' => '001/002',
            'no_hp' => '081234567890',
            'pekerjaan' => 'Karyawan Swasta',
            'jenis_dokumen' => 'KTP',
            'nama_barang_lainnya' => null,
            'nomor_dokumen' => '1234567890123456',
            'tempat_kehilangan' => 'Di pasar saat belanja',
            'waktu_kehilangan' => '2 Bulan yang lalu',
            'keterangan_waktu' => null,
            'keperluan' => 'Untuk pengurusan KTP baru'
        ];

        // Generate PDF untuk preview
        $pdf = Pdf::loadView('pdf.surat-kehilangan', $pdfData);

        return $pdf->stream('Test-Surat-Kehilangan.pdf');
    }
}
