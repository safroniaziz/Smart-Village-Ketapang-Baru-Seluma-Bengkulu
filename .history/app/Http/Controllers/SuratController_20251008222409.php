<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\PengajuanSurat;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratController extends Controller
{
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

        // Prepare TTD data based on jenis_ttd
        $ttdData = [];
        if ($pengajuan->jenis_ttd === 'qrcode') {
            // Use QR Code TTD
            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $pengajuan->data_surat['qr_ttd_base64'] ?? null,
                'verification_url' => $pengajuan->data_surat['verification_url'] ?? null
            ];
        } else {
            // Use regular TTD
            $ttdData = [
                'jenis_ttd' => 'gambar',
                'ttd_image_path' => public_path('assets/images/ttd.png')
            ];
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->format('d F Y'),
            'nama_pemohon' => $user->nama_lengkap,
            'nik' => $user->nik,
            'tempat_lahir' => $user->tempat_lahir,
            'tanggal_lahir' => $user->tanggal_lahir ? date('d F Y', strtotime($user->tanggal_lahir)) : '-',
            'alamat' => $user->alamat,
            'rt_rw' => $user->rt . '/' . $user->rw,
            'no_hp' => $user->no_hp,
            'pekerjaan' => $user->mata_pencaharian,
            'jenis_dokumen' => $data['jenis_dokumen'],
            'nama_barang_lainnya' => $data['nama_barang_lainnya'],
            'nomor_dokumen' => $data['nomor_dokumen'],
            'tempat_kehilangan' => $data['tempat_kehilangan'],
            'waktu_kehilangan' => $data['waktu_kehilangan'],
            'keterangan_waktu' => $data['keterangan_waktu'],
            'keperluan' => $data['keperluan'],
            'tracking_number' => $pengajuan->tracking_number
        ] + $ttdData;

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

        return $pdf->download('Surat-Keterangan-Kehilangan-' . $user->nama_lengkap . '.pdf');
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
            'nama_pemohon' => $user->nama_lengkap,
            'nik' => $user->nik,
            'tempat_lahir' => $user->tempat_lahir,
            'tanggal_lahir' => $user->tanggal_lahir ? date('d F Y', strtotime($user->tanggal_lahir)) : '-',
            'alamat' => $user->alamat,
            'rt_rw' => $user->rt . '/' . $user->rw,
            'no_hp' => $user->no_hp,
            'pekerjaan' => $user->mata_pencaharian,
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

        return $pdf->stream('Surat-Keterangan-Kehilangan-' . $user->nama_lengkap . '.pdf');
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
            'nama_pemohon' => $user->nama_lengkap,
            'nik' => $user->nik,
            'tempat_lahir' => $user->tempat_lahir,
            'tanggal_lahir' => $user->tanggal_lahir ? date('d F Y', strtotime($user->tanggal_lahir)) : '-',
            'alamat' => $user->alamat,
            'rt_rw' => $user->rt . '/' . $user->rw,
            'no_hp' => $user->no_hp,
            'pekerjaan' => $user->mata_pencaharian,
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
                . "Halo {$user->nama_lengkap},\n"
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
                . "Halo {$user->nama_lengkap},\n"
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

    // Generate Surat Keterangan Bersih Diri
    public function generateSuratBersihDiri(Request $request)
    {
        // Data default atau dari request
        $data = [
            'nomor_surat' => $request->nomor_surat ?? '90/170505/05/05/SKBD/KTB/V/2025',
            'nama_ayah' => $request->nama_ayah ?? 'SUKARDI SUKI',
            'umur_ayah' => $request->umur_ayah ?? '68',
            'agama_ayah' => $request->agama_ayah ?? 'Islam',
            'pekerjaan_ayah' => $request->pekerjaan_ayah ?? 'Petani/Pekebun',
            'alamat_ayah' => $request->alamat_ayah ?? 'Desa Ketapang Baru, Kec. SAM, Kabupaten Seluma',

            'nama_ibu' => $request->nama_ibu ?? 'MARTIANA',
            'umur_ibu' => $request->umur_ibu ?? '63',
            'agama_ibu' => $request->agama_ibu ?? 'Islam',
            'pekerjaan_ibu' => $request->pekerjaan_ibu ?? 'Mengurus Rumah Tangga',
            'alamat_ibu' => $request->alamat_ibu ?? 'Desa Ketapang Baru, Kec. SAM, Kabupaten Seluma',

            'nama_anak' => $request->nama_anak ?? 'NEPI RESMAINI',
            'tempat_lahir_anak' => $request->tempat_lahir_anak ?? 'Ketapang Baru',
            'tanggal_lahir_anak' => $request->tanggal_lahir_anak ?? '29 Mei 1985',
            'kebangsaan_anak' => $request->kebangsaan_anak ?? 'Indonesia',
            'agama_anak' => $request->agama_anak ?? 'Islam',
            'pekerjaan_anak' => $request->pekerjaan_anak ?? 'Petani/Pekebun',
            'alamat_anak' => $request->alamat_anak ?? 'Rimbo Besar, Kecamatan SAM, Kabupaten Seluma',

            'tempat_surat' => $request->tempat_surat ?? 'Ketapang Baru',
            'tanggal_surat' => $request->tanggal_surat ?? '07 Mei 2025',
            'nama_kepala' => $request->nama_kepala ?? 'ZULTAN ALHARA',
            'nip' => $request->nip ?? 'NIP. -',

            'nama_camat' => $request->nama_camat ?? 'Nama Camat',
            'nip_camat' => $request->nip_camat ?? '........................',
            'nama_danramil' => $request->nama_danramil ?? 'Nama Danramil',
            'nrp_danramil' => $request->nrp_danramil ?? '........................',
            'nama_kapolsek' => $request->nama_kapolsek ?? 'Nama Kapolsek',
            'nrp_kapolsek' => $request->nrp_kapolsek ?? '........................',

            'qr_base64' => $request->qr_base64 ?? null, // Opsional
        ];

        // Generate PDF
        $pdf = Pdf::loadView('pdf.surat-bersih-diri', $data)
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'margin-top' => 15,
                'margin-bottom' => 15,
                'margin-left' => 20,
                'margin-right' => 20,
                'enable-local-file-access' => true
            ]);

        return $pdf->stream('Surat-Keterangan-Bersih-Diri.pdf');
    }

    public function generatePDFBersihDiri($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;

        // Generate nomor surat
        $nomorSurat = '90/' . date('m') . '/' . date('Y') . '/' . $pengajuanId;

        // Prepare TTD data based on jenis_ttd
        $ttdData = [];
        if ($pengajuan->jenis_ttd === 'qrcode') {
            // Use QR Code TTD
            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $pengajuan->data_surat['qr_ttd_base64'] ?? null,
                'verification_url' => $pengajuan->data_surat['verification_url'] ?? null
            ];
        } else {
            // Use regular TTD
            $ttdData = [
                'jenis_ttd' => 'gambar',
                'ttd_image_path' => public_path('assets/images/ttd.png')
            ];
        }

        // Prepare data for PDF using actual form data
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->format('d F Y'),
            'nama_ayah' => $data['nama_ayah'] ?? 'N/A',
            'umur_ayah' => $data['umur_ayah'] ?? 'N/A',
            'agama_ayah' => $data['agama_ayah'] ?? 'N/A',
            'pekerjaan_ayah' => $data['pekerjaan_ayah'] ?? 'N/A',
            'alamat_ayah' => $data['alamat_ayah'] ?? 'N/A',
            'nama_ibu' => $data['nama_ibu'] ?? 'N/A',
            'umur_ibu' => $data['umur_ibu'] ?? 'N/A',
            'agama_ibu' => $data['agama_ibu'] ?? 'N/A',
            'pekerjaan_ibu' => $data['pekerjaan_ibu'] ?? 'N/A',
            'alamat_ibu' => $data['alamat_ibu'] ?? 'N/A',
            'nama_anak' => $pengajuan->nama_lengkap,
            'tempat_lahir_anak' => $data['tempat_lahir'] ?? 'N/A',
            'tanggal_lahir_anak' => $data['tanggal_lahir'] ?? 'N/A',
            'kebangsaan_anak' => $data['kebangsaan'] ?? 'Indonesia',
            'agama_anak' => $data['agama'] ?? 'N/A',
            'pekerjaan_anak' => $data['pekerjaan'] ?? 'N/A',
            'alamat_anak' => $pengajuan->alamat ?? 'N/A',
            'tempat_surat' => 'Ketapang Baru',
            'nama_kepala' => 'ZULTAN ALHARA',
            'nip' => 'NIP. -',
            'nama_camat' => 'Nama Camat',
            'nip_camat' => '........................',
            'nama_danramil' => 'Nama Danramil',
            'nrp_danramil' => '........................',
            'nama_kapolsek' => 'Nama Kapolsek',
            'nrp_kapolsek' => '........................',
            'tracking_number' => $pengajuan->tracking_number
        ] + $ttdData;

        // Generate PDF dengan pengaturan A4 dan margin
        $pdf = Pdf::loadView('pdf.surat-bersih-diri', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'margin-top' => 15,
                'margin-bottom' => 15,
                'margin-left' => 20,
                'margin-right' => 20,
                'enable-local-file-access' => true
            ]);

        return $pdf->download('Surat-Keterangan-Bersih-Diri-' . $pengajuan->nama_lengkap . '.pdf');
    }

    public function handlePublicSuratOnline(Request $request)
    {
        try {
            // Validate the basic form data
            $request->validate([
                'jenis_surat' => 'required|string',
                'sub_jenis_surat' => 'required|string',
            ]);

            $jenisSurat = $request->input('sub_jenis_surat');

            // Route to specific handler based on jenis surat
            switch ($jenisSurat) {
                case 'surat_kehilangan':
                    return $this->handleSuratKehilangan($request);
                case 'surat_bersih_diri':
                    return $this->handleSuratBersihDiri($request);
                default:
                    return response()->json([
                        'success' => false,
                        'message' => 'Jenis surat belum tersedia atau dalam pengembangan.'
                    ], 400);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak valid: ' . implode(', ', $e->validator->errors()->all())
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error in handlePublicSuratOnline: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    private function handleSuratKehilangan(Request $request)
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

        $user = Auth::user();

        // Handle file upload
        $lampiranPath = null;
        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampiran-surat', 'public');
        }

        // Create pengajuan surat with user data
        $pengajuan = PengajuanSurat::create([
            'nama_lengkap' => $user->nama_lengkap,
            'nik' => $user->nik,
            'no_hp' => $user->no_hp,
            'alamat' => $user->alamat . ($user->rt_rw ? ', RT/RW ' . $user->rt_rw : '') . ($user->dusun ? ', Dusun ' . $user->dusun : ''),
            'jenis_surat' => 'surat_kehilangan',
            'data_surat' => [
                'jenis_dokumen' => $request->jenis_dokumen,
                'nama_barang_lainnya' => $request->nama_barang_lainnya,
                'nomor_dokumen' => $request->nomor_dokumen,
                'tempat_kehilangan' => $request->tempat_kehilangan,
                'waktu_kehilangan' => $request->waktu_kehilangan,
                'keterangan_waktu' => $request->keterangan_waktu
            ],
            'keperluan' => $request->keperluan,
            'lampiran' => $lampiranPath,
            'status' => 'Diajukan',
            'submitted_at' => now(),
            'is_public' => true
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan surat kehilangan berhasil dikirim!',
            'pengajuan_id' => $pengajuan->id,
            'tracking_number' => $pengajuan->tracking_number
        ]);
    }

    private function handleSuratBersihDiri(Request $request)
    {
        $request->validate([
            'keperluan' => 'required|string',
            'keterangan_tambahan' => 'nullable|string',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120'
        ]);

        $user = Auth::user();

        // Handle file upload
        $lampiranPath = null;
        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampiran-surat', 'public');
        }

        // Create pengajuan surat with user data
        $pengajuan = PengajuanSurat::create([
            'nama_lengkap' => $user->nama_lengkap,
            'nik' => $user->nik,
            'no_hp' => $user->no_hp,
            'alamat' => $user->alamat . ($user->rt_rw ? ', RT/RW ' . $user->rt_rw : '') . ($user->dusun ? ', Dusun ' . $user->dusun : ''),
            'jenis_surat' => 'surat_bersih_diri',
            'data_surat' => [
                'keperluan' => $request->keperluan,
                'keterangan_tambahan' => $request->keterangan_tambahan
            ],
            'keperluan' => $request->keperluan,
            'lampiran' => $lampiranPath,
            'status' => 'Diajukan',
            'submitted_at' => now(),
            'is_public' => true
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan surat keterangan bersih diri berhasil dikirim!',
            'pengajuan_id' => $pengajuan->id,
            'tracking_number' => $pengajuan->tracking_number
        ]);
    }

    /**
     * Verify surat using QR code tracking number
     */
    public function verifySurat($trackingNumber)
    {
        $pengajuan = PengajuanSurat::where('id', function($query) use ($trackingNumber) {
            // Extract ID from tracking number format (SRT-YYYY-MM-XXXXX)
            if (preg_match('/SRT-\d{4}-\d{2}-(\d+)/', $trackingNumber, $matches)) {
                return $query->whereRaw('LPAD(id, 5, "0") = ?', [$matches[1]]);
            }
            return $query->where('id', 0); // No match
        })->first();

        if (!$pengajuan) {
            return view('verification.result', [
                'success' => false,
                'message' => 'Surat tidak ditemukan atau nomor tracking tidak valid.',
                'trackingNumber' => $trackingNumber
            ]);
        }

        return view('verification.result', [
            'success' => true,
            'message' => 'Surat terverifikasi dengan valid.',
            'trackingNumber' => $trackingNumber,
            'pengajuan' => $pengajuan,
            'data' => [
                'nama' => $pengajuan->nama_lengkap,
                'jenis_surat' => $pengajuan->jenis_surat,
                'status' => $pengajuan->status,
                'tanggal' => $pengajuan->created_at->format('d F Y'),
                'waktu' => $pengajuan->created_at->format('H:i:s')
            ]
        ]);
    }
}
