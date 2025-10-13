<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\PengajuanSurat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use Carbon\Carbon;

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

        // Use nomor surat from database if available, otherwise generate default
        $nomorSurat = $pengajuan->no_surat ?: ('470/' . date('m') . '/' . date('Y') . '/' . $pengajuanId);

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
            'tembusan' => $data['tembusan'] ?? '', // Tambahkan tembusan
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

        // Use nomor surat from database if available, otherwise generate default
        $nomorSurat = $pengajuan->no_surat ?: ('90/' . date('m') . '/' . date('Y') . '/' . $pengajuanId);

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
            'tracking_number' => $pengajuan->tracking_number,
            'tembusan' => $pengajuan->tembusan ?? []
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

    public function generatePDFSPPD($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;

        // Use nomor surat from database if available, otherwise generate default
        $nomorSurat = $pengajuan->no_surat ?: sprintf('%03d', $pengajuanId);

        // Get QR Code service untuk TTD dan tracking
        $qrCodeService = app(\App\Services\QrCodeService::class);

        // Generate tracking QR code
        $trackingQrCode = null;
        if ($pengajuan->tracking_number) {
            $verifyUrl = url('/verify/' . $pengajuan->tracking_number);
            $trackingQrCode = $qrCodeService->generateSimpleQrCode($verifyUrl);
        }

        // Prepare TTD data
        $ttdData = [];
        $ttdPath = null;
        $qrCode = null;

        if ($pengajuan->jenis_ttd === 'qrcode') {
            // Generate QR Code untuk TTD
            $qrData = [
                'type' => 'ttd',
                'pengajuan_id' => $pengajuan->id,
                'nama' => $pengajuan->nama_lengkap,
                'jenis_surat' => 'SPPD',
                'tanggal' => now()->format('Y-m-d H:i:s')
            ];
            $qrCode = $qrCodeService->generateSimpleQrCode(json_encode($qrData));
        } elseif ($pengajuan->jenis_ttd === 'gambar') {
            // Path ke file TTD gambar
            $ttdPath = 'ttd/kepala-desa.png'; // Sesuaikan dengan path TTD yang ada
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'personel' => $data['personel'] ?? [],
            'tujuan' => $data['tujuan'] ?? '',
            'keperluan' => $data['keperluan'] ?? '',
            'tanggal_berangkat' => $data['tanggal_berangkat'] ?? '',
            'tanggal_kembali' => $data['tanggal_kembali'] ?? '',
            'transportasi' => $data['transportasi'] ?? '',
            'keterangan_tambahan' => $data['keterangan_tambahan'] ?? '',
            'tembusan' => $data['tembusan'] ?? '', // Tambahkan tembusan
            'kepala_desa_nama' => 'ZULTAN ALHARA',
            'jenis_ttd' => $pengajuan->jenis_ttd ?? 'manual',
            'ttd_path' => $ttdPath,
            'qr_code' => $qrCode,
            'tracking_qr_code' => $trackingQrCode,
            'tracking_number' => $pengajuan->tracking_number
        ];

        // Generate PDF dengan template SPPD
        $pdf = Pdf::loadView('surat-templates.sppd', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'margin-top' => 15,
                'margin-bottom' => 15,
                'margin-left' => 20,
                'margin-right' => 20,
                'enable-local-file-access' => true
            ]);

        return $pdf->download('SPPD-' . date('Y-m-d') . '-' . $pengajuan->id . '.pdf');
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
                case 'sppd':
                    return $this->handleSPPD($request);
                case 'izin_keramaian':
                    return $this->handleSuratIzinKeramaian($request);
                case 'ket_belum_menikah':
                    return $this->handleSuratKeteranganBelumMenikah($request);
                case 'surat_berkelakuan_baik':
                    return $this->handleSuratBerkelakuanBaik($request);
                case 'surat_domisili':
                    return $this->handleSuratDomisili($request);
                case 'surat_kematian':
                    return $this->handleSuratKematian($request);
                case 'surat_menikah':
                    return $this->handleSuratMenikah($request);
                case 'surat_miskin':
                    return $this->handleSuratMiskin($request);
                case 'surat_penghasilan_ortu':
                    return $this->handleSuratPenghasilanOrtu($request);
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

    private function handleSPPD(Request $request)
    {
        $request->validate([
            'personel' => 'required|array|min:1',
            'personel.*.nama' => 'required|string|max:255',
            'personel.*.jabatan' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'keperluan' => 'required|string',
            'tanggal_berangkat' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_berangkat',
            'transportasi' => 'required|string',
            'keterangan_tambahan' => 'nullable|string'
        ]);

        $user = Auth::user();

        // Create pengajuan surat with user data
        $pengajuan = PengajuanSurat::create([
            'nama_lengkap' => $user->nama_lengkap,
            'nik' => $user->nik,
            'no_hp' => $user->no_hp,
            'alamat' => $user->alamat . ($user->rt_rw ? ', RT/RW ' . $user->rt_rw : '') . ($user->dusun ? ', Dusun ' . $user->dusun : ''),
            'jenis_surat' => 'sppd',
            'data_surat' => [
                'personel' => $request->personel,
                'tujuan' => $request->tujuan,
                'keperluan' => $request->keperluan,
                'tanggal_berangkat' => $request->tanggal_berangkat,
                'tanggal_kembali' => $request->tanggal_kembali,
                'transportasi' => $request->transportasi,
                'keterangan_tambahan' => $request->keterangan_tambahan
            ],
            'keperluan' => $request->keperluan,
            'lampiran' => null, // SPPD tidak memerlukan lampiran
            'status' => 'Diajukan',
            'submitted_at' => now(),
            'is_public' => true
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan SPPD berhasil dikirim!',
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

    public function handleSuratIzinKeramaian(Request $request)
    {
        // Validasi data request
        $request->validate([
            'keperluan_acara' => 'required|string|max:1000',
            'lampiran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        try {
            // Handle file upload
            $lampiranPath = null;
            if ($request->hasFile('lampiran')) {
                $file = $request->file('lampiran');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $lampiranPath = $file->storeAs('lampiran', $fileName, 'public');
            }

            // Generate tracking number
            $trackingNumber = 'TRK' . strtoupper(uniqid());

            // Get authenticated user
            $user = $request->user();

            // Create pengajuan surat
            $pengajuan = PengajuanSurat::create([
                'nama_lengkap' => $user->name,
                'email' => $user->email,
                'no_telepon' => $user->phone ?? $user->no_telepon ?? '',
                'alamat' => $user->address ?? $user->alamat ?? '',
                'jenis_surat' => 'izin_keramaian',
                'keperluan' => $request->keperluan_acara,
                'lampiran_path' => $lampiranPath,
                'data_surat' => [
                    'keperluan_acara' => $request->keperluan_acara,
                ],
                'status' => 'pending',
                'tracking_number' => $trackingNumber,
                'user_id' => $user->id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pengajuan Surat Izin Keramaian berhasil disubmit!',
                'tracking_number' => $trackingNumber,
                'pengajuan_id' => $pengajuan->id
            ]);

        } catch (\Exception $e) {
            Log::error('Error in handleSuratIzinKeramaian: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    public function generatePDFIzinKeramaian($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;
        $user = $pengajuan->user;

        // Use nomor surat from database if available, otherwise generate default
        $nomorSurat = $pengajuan->no_surat ?: ('166/170505/05/05/SIK/' . date('m') . '/' . date('Y'));

        // Calculate age dari tanggal lahir user
        $umur = 'N/A';
        if ($user && $user->tanggal_lahir) {
            $umur = \Carbon\Carbon::parse($user->tanggal_lahir)->age;
        }

        // Get QR Code service untuk tracking
        $qrCodeService = app(\App\Services\QrCodeService::class);
        $trackingQrCode = null;
        if ($pengajuan->tracking_number) {
            $verifyUrl = url('/verify/' . $pengajuan->tracking_number);
            $trackingQrCode = $qrCodeService->generateSimpleQrCode($verifyUrl);
        }

        // Prepare TTD data based on jenis_ttd
        $ttdData = [];
        if ($pengajuan->jenis_ttd === 'qrcode') {
            // Use QR Code TTD
            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $pengajuan->data_surat['qr_ttd_base64'] ?? null,
            ];
        } else {
            // Use regular TTD
            $ttdData = [
                'jenis_ttd' => 'gambar',
            ];
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->format('d F Y'),
            'kepala_desa_nama' => 'ZULTAN ALHARA',
            'nama_pemohon' => $pengajuan->nama_lengkap,
            'nik_pemohon' => $user->nik ?? 'N/A',
            'umur_pemohon' => $umur,
            'alamat_pemohon' => $pengajuan->alamat ?? 'Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma',
            'keperluan_acara' => $data['keperluan_acara'] ?? '',
            'tracking_number' => $pengajuan->tracking_number,
            'tracking_qr_code' => $trackingQrCode,
            'tembusan' => $pengajuan->tembusan ?? []
        ] + $ttdData;

        // Generate PDF dengan pengaturan A4 dan margin
        $pdf = Pdf::loadView('pdf.surat-izin-keramaian', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'margin-top' => 15,
                'margin-bottom' => 15,
                'margin-left' => 20,
                'margin-right' => 20,
                'enable-local-file-access' => true
            ]);

        return $pdf->download('Surat-Izin-Keramaian-' . $pengajuan->nama_lengkap . '.pdf');
    }

    public function handleSuratKeteranganBelumMenikah(Request $request)
    {
        // Validasi data request
        $request->validate([
            'keperluan' => 'required|string|max:1000',
            'lampiran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        try {
            // Handle file upload
            $lampiranPath = null;
            if ($request->hasFile('lampiran')) {
                $file = $request->file('lampiran');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $lampiranPath = $file->storeAs('lampiran', $fileName, 'public');
            }

            // Generate tracking number
            $trackingNumber = 'TRK' . strtoupper(uniqid());

            // Get authenticated user
            $user = $request->user();

            // Create pengajuan surat
            $pengajuan = PengajuanSurat::create([
                'nama_lengkap' => $user->nama_lengkap ?? $user->name,
                'email' => $user->email,
                'no_telepon' => $user->no_hp ?? $user->phone ?? '',
                'alamat' => $user->alamat ?? $user->address ?? '',
                'jenis_surat' => 'ket_belum_menikah',
                'keperluan' => $request->keperluan,
                'lampiran_path' => $lampiranPath,
                'data_surat' => [
                    'keperluan' => $request->keperluan,
                ],
                'status' => 'pending',
                'tracking_number' => $trackingNumber,
                'user_id' => $user->id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pengajuan Surat Keterangan Belum Menikah berhasil disubmit!',
                'tracking_number' => $trackingNumber,
                'pengajuan_id' => $pengajuan->id
            ]);

        } catch (\Exception $e) {
            Log::error('Error in handleSuratKeteranganBelumMenikah: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    public function generatePDFKeteranganBelumMenikah($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;
        $user = $pengajuan->user;

        // Use nomor surat from database if available, otherwise generate default
        $nomorSurat = $pengajuan->no_surat ?: ('132/170505/05/05/SKBM/' . date('m') . '/' . date('Y'));

        // Get QR Code service untuk tracking
        $qrCodeService = app(\App\Services\QrCodeService::class);
        $trackingQrCode = null;
        if ($pengajuan->tracking_number) {
            $verifyUrl = url('/verify/' . $pengajuan->tracking_number);
            $trackingQrCode = $qrCodeService->generateSimpleQrCode($verifyUrl);
        }

        // Prepare TTD data based on jenis_ttd
        $ttdData = [];
        if ($pengajuan->jenis_ttd === 'qrcode') {
            // Use QR Code TTD
            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $pengajuan->data_surat['qr_ttd_base64'] ?? null,
            ];
        } else {
            // Use regular TTD
            $ttdData = [
                'jenis_ttd' => 'gambar',
            ];
        }

        // Format jenis kelamin
        $jenisKelamin = 'N/A';
        if ($user && $user->jenis_kelamin) {
            $jenisKelamin = ($user->jenis_kelamin === 'L' || $user->jenis_kelamin === 'Laki-laki') ? 'Laki - Laki' : 'Perempuan';
        }

        // Format tanggal lahir
        $tanggalLahir = 'N/A';
        if ($user && $user->tanggal_lahir) {
            $tanggalLahir = \Carbon\Carbon::parse($user->tanggal_lahir)->format('d F Y');
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->format('d F Y'),
            'kepala_desa_nama' => 'ZULTAN ALHARA',
            'nama_pemohon' => $user->nama_lengkap ?? $pengajuan->nama_lengkap,
            'nik_pemohon' => $user->nik ?? 'N/A',
            'tempat_lahir' => $user->tempat_lahir ?? 'N/A',
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'agama' => $user->agama ?? 'N/A',
            'pekerjaan' => $user->pekerjaan ?? 'N/A',
            'alamat' => $user->alamat ?? $pengajuan->alamat ?? 'Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma.',
            'keperluan' => $data['keperluan'] ?? '',
            'tracking_number' => $pengajuan->tracking_number,
            'tracking_qr_code' => $trackingQrCode,
            'tembusan' => $pengajuan->tembusan ?? []
        ] + $ttdData;

        // Generate PDF dengan pengaturan A4 dan margin
        $pdf = Pdf::loadView('pdf.surat-keterangan-belum-menikah', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'margin-top' => 15,
                'margin-bottom' => 15,
                'margin-left' => 20,
                'margin-right' => 20,
                'enable-local-file-access' => true
            ]);

        return $pdf->download('Surat-Keterangan-Belum-Menikah-' . $pengajuan->nama_lengkap . '.pdf');
    }

    public function handleSuratBerkelakuanBaik(Request $request)
    {
        // Validasi data request
        $request->validate([
            'keperluan' => 'required|string|max:1000',
            'lampiran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        try {
            // Handle file upload
            $lampiranPath = null;
            if ($request->hasFile('lampiran')) {
                $file = $request->file('lampiran');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $lampiranPath = $file->storeAs('lampiran', $fileName, 'public');
            }

            // Generate tracking number
            $trackingNumber = 'TRK' . strtoupper(uniqid());

            // Get authenticated user
            $user = $request->user();

            // Create pengajuan surat
            $pengajuan = PengajuanSurat::create([
                'nama_lengkap' => $user->nama_lengkap ?? $user->name,
                'email' => $user->email,
                'no_telepon' => $user->no_hp ?? $user->phone ?? '',
                'alamat' => $user->alamat ?? $user->address ?? '',
                'jenis_surat' => 'surat_berkelakuan_baik',
                'keperluan' => $request->keperluan,
                'lampiran' => $lampiranPath,
                'status' => 'pending',
                'tracking_number' => $trackingNumber,
                'user_id' => $user->id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pengajuan Surat Keterangan Berkelakuan Baik berhasil disubmit!',
                'tracking_number' => $trackingNumber,
                'pengajuan_id' => $pengajuan->id
            ]);

        } catch (\Exception $e) {
            Log::error('Error in handleSuratBerkelakuanBaik: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    public function handleSuratDomisili(Request $request)
    {
        // Validasi data request
        $request->validate([
            'keperluan' => 'required|string|max:1000',
            'lampiran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        try {
            // Handle file upload
            $lampiranPath = null;
            if ($request->hasFile('lampiran')) {
                $file = $request->file('lampiran');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $lampiranPath = $file->storeAs('lampiran', $fileName, 'public');
            }

            // Generate tracking number
            $trackingNumber = 'TRK' . strtoupper(uniqid());

            // Get authenticated user
            $user = $request->user();

            // Create pengajuan surat
            $pengajuan = PengajuanSurat::create([
                'nama_lengkap' => $user->nama_lengkap ?? $user->name,
                'email' => $user->email,
                'no_telepon' => $user->no_hp ?? $user->phone ?? '',
                'alamat' => $user->alamat ?? $user->address ?? '',
                'jenis_surat' => 'surat_domisili',
                'keperluan' => $request->keperluan,
                'lampiran' => $lampiranPath,
                'status' => 'pending',
                'tracking_number' => $trackingNumber,
                'user_id' => $user->id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pengajuan Surat Keterangan Domisili berhasil disubmit!',
                'tracking_number' => $trackingNumber,
                'pengajuan_id' => $pengajuan->id
            ]);

        } catch (\Exception $e) {
            Log::error('Error in handleSuratDomisili: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    public function generatePDFBerkelakuanBaik($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;
        $user = $pengajuan->user;

        // Use nomor surat from database if available, otherwise generate default
        $nomorSurat = $pengajuan->no_surat ?: ('132/170505/05/05/SKBB/' . date('m') . '/' . date('Y'));

        // Get QR Code service untuk tracking
        $qrCodeService = app(\App\Services\QrCodeService::class);
        $trackingQrCode = null;
        if ($pengajuan->tracking_number) {
            $verifyUrl = url('/verify/' . $pengajuan->tracking_number);
            $trackingQrCode = $qrCodeService->generateSimpleQrCode($verifyUrl);
        }

        // Prepare TTD data based on jenis_ttd
        $ttdData = [];
        if ($pengajuan->jenis_ttd === 'qrcode') {
            // Use QR Code TTD
            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $pengajuan->data_surat['qr_ttd_base64'] ?? null,
            ];
        } else {
            // Use regular TTD
            $ttdData = [
                'jenis_ttd' => 'gambar',
            ];
        }

        // Format jenis kelamin
        $jenisKelamin = 'N/A';
        if ($user && $user->jenis_kelamin) {
            $jenisKelamin = ($user->jenis_kelamin === 'L' || $user->jenis_kelamin === 'Laki-laki') ? 'Laki-laki' : 'Perempuan';
        }

        // Format tanggal lahir
        $tanggalLahir = 'N/A';
        if ($user && $user->tanggal_lahir) {
            $tanggalLahir = \Carbon\Carbon::parse($user->tanggal_lahir)->format('d F Y');
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->format('d F Y'),
            'kepala_desa_nama' => 'ZULTAN ALHARA',
            'nama_pemohon' => $user->nama_lengkap ?? $pengajuan->nama_lengkap,
            'nik_pemohon' => $user->nik ?? 'N/A',
            'tempat_lahir' => $user->tempat_lahir ?? 'N/A',
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'agama' => $user->agama ?? 'N/A',
            'pekerjaan' => $user->pekerjaan ?? 'N/A',
            'alamat' => $user->alamat ?? $pengajuan->alamat ?? 'Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma.',
            'keperluan' => $data['keperluan'] ?? '',
            'tracking_number' => $pengajuan->tracking_number,
            'tracking_qr_code' => $trackingQrCode,
            'tembusan' => $pengajuan->tembusan ?? []
        ] + $ttdData;

        // Generate PDF dengan pengaturan A4 dan margin
        $pdf = Pdf::loadView('pdf.surat-keterangan-berkelakuan-baik', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'margin-top' => 15,
                'margin-bottom' => 15,
                'margin-left' => 20,
                'margin-right' => 20,
                'enable-local-file-access' => true
            ]);

        return $pdf->download('Surat-Keterangan-Berkelakuan-Baik-' . $pengajuan->nama_lengkap . '.pdf');
    }

    public function generatePDFDomisili($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;
        $user = $pengajuan->user;

        // Use nomor surat from database if available, otherwise generate default
        $nomorSurat = $pengajuan->no_surat ?: ('156/170505/05/05/SKD/KTB/' . date('m') . '/' . date('Y'));

        // Get QR Code service untuk tracking
        $qrCodeService = app(\App\Services\QrCodeService::class);
        $trackingQrCode = null;
        if ($pengajuan->tracking_number) {
            $verifyUrl = url('/verify/' . $pengajuan->tracking_number);
            $trackingQrCode = $qrCodeService->generateSimpleQrCode($verifyUrl);
        }

        // Prepare TTD data based on jenis_ttd
        $ttdData = [];
        if ($pengajuan->jenis_ttd === 'qrcode') {
            // Use QR Code TTD
            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $pengajuan->data_surat['qr_ttd_base64'] ?? null,
            ];
        } else {
            // Use regular TTD
            $ttdData = [
                'jenis_ttd' => 'gambar',
            ];
        }

        // Format jenis kelamin
        $jenisKelamin = 'N/A';
        if ($user && $user->jenis_kelamin) {
            $jenisKelamin = ($user->jenis_kelamin === 'L' || $user->jenis_kelamin === 'Laki-laki') ? 'Laki-laki' : 'Perempuan';
        }

        // Format tanggal lahir
        $tanggalLahir = 'N/A';
        if ($user && $user->tanggal_lahir) {
            $tanggalLahir = \Carbon\Carbon::parse($user->tanggal_lahir)->format('d F Y');
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->format('d F Y'),
            'kepala_desa_nama' => 'ZULTAN ALHARA',
            'nama_pemohon' => $user->nama_lengkap ?? $pengajuan->nama_lengkap,
            'nik_pemohon' => $user->nik ?? 'N/A',
            'tempat_lahir' => $user->tempat_lahir ?? 'N/A',
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'agama' => $user->agama ?? 'N/A',
            'status_perkawinan' => $user->status_perkawinan ?? 'Belum Kawin',
            'pekerjaan' => $user->pekerjaan ?? 'N/A',
            'alamat' => $user->alamat ?? $pengajuan->alamat ?? 'Karang Dapo, Kecamatan Semidang Alas Maras, Kabupaten Seluma.',
            'keperluan' => $data['keperluan'] ?? '',
            'tracking_number' => $pengajuan->tracking_number,
            'tracking_qr_code' => $trackingQrCode,
            'tembusan' => $pengajuan->tembusan ?? []
        ] + $ttdData;

        // Generate PDF dengan pengaturan A4 dan margin
        $pdf = Pdf::loadView('pdf.surat-keterangan-domisili', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'margin-top' => 15,
                'margin-bottom' => 15,
                'margin-left' => 20,
                'margin-right' => 20,
                'enable-local-file-access' => true
            ]);

        return $pdf->download('Surat-Keterangan-Domisili-' . $pengajuan->nama_lengkap . '.pdf');
    }

    public function generatePDFUsaha($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;
        $user = $pengajuan->user;

        // Use nomor surat from database if available, otherwise generate default
        $nomorSurat = $pengajuan->no_surat ?: ('132/170505/05/05/SKU/' . date('m') . '/' . date('Y'));

        // Get QR Code service untuk tracking
        $qrCodeService = app(\App\Services\QrCodeService::class);
        $trackingQrCode = null;
        if ($pengajuan->tracking_number) {
            $verifyUrl = url('/verify/' . $pengajuan->tracking_number);
            $trackingQrCode = $qrCodeService->generateSimpleQrCode($verifyUrl);
        }

        // Prepare TTD data based on jenis_ttd
        $ttdData = [];
        if ($pengajuan->jenis_ttd === 'qrcode') {
            // Use QR Code TTD
            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $pengajuan->data_surat['qr_ttd_base64'] ?? null,
            ];
        } else {
            // Use regular TTD
            $ttdData = [
                'jenis_ttd' => 'gambar',
            ];
        }

        // Format jenis kelamin
        $jenisKelamin = 'N/A';
        if ($user && $user->jenis_kelamin) {
            $jenisKelamin = ($user->jenis_kelamin === 'L' || $user->jenis_kelamin === 'Laki-laki') ? 'Laki-laki' : 'Perempuan';
        }

        // Format tanggal lahir
        $tanggalLahir = 'N/A';
        if ($user && $user->tanggal_lahir) {
            $tanggalLahir = \Carbon\Carbon::parse($user->tanggal_lahir)->format('d F Y');
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->format('d F Y'),
            'kepala_desa_nama' => 'ZULTAN ALHARA',
            'nama_pemohon' => $user->nama_lengkap ?? $pengajuan->nama_lengkap,
            'nik_pemohon' => $user->nik ?? 'N/A',
            'tempat_lahir' => $user->tempat_lahir ?? 'N/A',
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'agama' => $user->agama ?? 'N/A',
            'pekerjaan' => $user->pekerjaan ?? 'N/A',
            'alamat' => 'Desa Ketapang Baru, Kec. Semidang Alas Maras Kab. Seluma.',
            'nama_usaha' => $data['nama_usaha'] ?? 'N/A',
            'jenis_usaha' => $data['jenis_usaha'] ?? 'N/A',
            'alamat_usaha' => $data['alamat_usaha'] ?? 'N/A',
            'modal_usaha' => $data['modal_usaha'] ?? 'N/A',
            'mulai_usaha' => $data['mulai_usaha'] ?? 'N/A',
            'jumlah_karyawan' => $data['jumlah_karyawan'] ?? null,
            'keperluan' => $data['keperluan'] ?? '',
            'tracking_number' => $pengajuan->tracking_number,
            'tracking_qr_code' => $trackingQrCode,
            'tembusan' => $pengajuan->tembusan ?? []
        ] + $ttdData;

        // Generate PDF dengan pengaturan A4 dan margin
        $pdf = Pdf::loadView('pdf.surat-keterangan-usaha', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'margin-top' => 15,
                'margin-bottom' => 15,
                'margin-left' => 20,
                'margin-right' => 20,
                'enable-local-file-access' => true
            ]);

        return $pdf->download('Surat-Keterangan-Usaha-' . $pengajuan->nama_lengkap . '.pdf');
    }

    public function generatePDFTidakMampu($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;
        $user = $pengajuan->user;

        // Use nomor surat from database if available, otherwise generate default
        $nomorSurat = $pengajuan->no_surat ?: ('132/170505/05/05/SKTM/' . date('m') . '/' . date('Y'));

        // Get QR Code service untuk tracking
        $qrCodeService = app(\App\Services\QrCodeService::class);
        $trackingQrCode = null;
        if ($pengajuan->tracking_number) {
            $verifyUrl = url('/verify/' . $pengajuan->tracking_number);
            $trackingQrCode = $qrCodeService->generateSimpleQrCode($verifyUrl);
        }

        // Prepare TTD data based on jenis_ttd
        $ttdData = [];
        if ($pengajuan->jenis_ttd === 'qrcode') {
            // Use QR Code TTD
            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $pengajuan->data_surat['qr_ttd_base64'] ?? null,
            ];
        } else {
            // Use regular TTD
            $ttdData = [
                'jenis_ttd' => 'gambar',
            ];
        }

        // Format jenis kelamin
        $jenisKelamin = 'N/A';
        if ($user && $user->jenis_kelamin) {
            $jenisKelamin = ($user->jenis_kelamin === 'L' || $user->jenis_kelamin === 'Laki-laki') ? 'Laki-laki' : 'Perempuan';
        }

        // Format tanggal lahir
        $tanggalLahir = 'N/A';
        if ($user && $user->tanggal_lahir) {
            $tanggalLahir = \Carbon\Carbon::parse($user->tanggal_lahir)->format('d F Y');
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->format('d F Y'),
            'kepala_desa_nama' => 'ZULTAN ALHARA',
            'nama_pemohon' => $user->nama_lengkap ?? $pengajuan->nama_lengkap,
            'nik_pemohon' => $user->nik ?? 'N/A',
            'tempat_lahir' => $user->tempat_lahir ?? 'N/A',
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'agama' => $user->agama ?? 'N/A',
            'status_perkawinan' => $user->status_perkawinan ?? 'Belum Kawin',
            'pekerjaan' => $user->pekerjaan ?? 'N/A',
            'alamat' => $user->alamat ?? $pengajuan->alamat ?? 'Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma.',
            'penghasilan_perbulan' => $data['penghasilan_perbulan'] ?? null,
            'jumlah_tanggungan' => $data['jumlah_tanggungan'] ?? null,
            'keperluan' => $data['keperluan'] ?? '',
            'tracking_number' => $pengajuan->tracking_number,
            'tracking_qr_code' => $trackingQrCode,
            'tembusan' => $pengajuan->tembusan ?? []
        ] + $ttdData;

        // Generate PDF dengan pengaturan A4 dan margin
        $pdf = Pdf::loadView('pdf.surat-keterangan-tidak-mampu', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'margin-top' => 15,
                'margin-bottom' => 15,
                'margin-left' => 20,
                'margin-right' => 20,
                'enable-local-file-access' => true
            ]);

        return $pdf->download('Surat-Keterangan-Tidak-Mampu-' . $pengajuan->nama_lengkap . '.pdf');
    }

    public function handleSuratKematian(Request $request)
    {
        // Validasi data request
        $request->validate([
            'nama_almarhum' => 'required|string|max:255',
            'hari_kematian' => 'required|string',
            'tanggal_kematian' => 'required|date',
            'tempat_kematian' => 'required|string|max:255',
            'sebab_kematian' => 'required|string|max:255',
            'lampiran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        try {
            // Handle file upload
            $lampiranPath = null;
            if ($request->hasFile('lampiran')) {
                $file = $request->file('lampiran');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $lampiranPath = $file->storeAs('lampiran', $fileName, 'public');
            }

            // Generate tracking number
            $trackingNumber = 'TRK' . strtoupper(uniqid());

            // Get authenticated user
            $user = $request->user();

            // Create pengajuan surat
            $pengajuan = PengajuanSurat::create([
                'nama_lengkap' => $user->nama_lengkap ?? $user->name,
                'email' => $user->email,
                'no_telepon' => $user->no_hp ?? $user->phone ?? '',
                'alamat' => $user->alamat ?? $user->address ?? '',
                'jenis_surat' => 'surat_kematian',
                'keperluan' => 'Surat Keterangan Kematian untuk ' . $request->nama_almarhum,
                'lampiran_path' => $lampiranPath,
                'data_surat' => [
                    'nama_almarhum' => $request->nama_almarhum,
                    'hari_kematian' => $request->hari_kematian,
                    'tanggal_kematian' => $request->tanggal_kematian,
                    'tempat_kematian' => $request->tempat_kematian,
                    'sebab_kematian' => $request->sebab_kematian,
                ],
                'status' => 'pending',
                'tracking_number' => $trackingNumber,
                'user_id' => $user->id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pengajuan Surat Keterangan Kematian berhasil disubmit!',
                'tracking_number' => $trackingNumber,
                'pengajuan_id' => $pengajuan->id
            ]);

        } catch (\Exception $e) {
            Log::error('Error in handleSuratKematian: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    public function generatePDFKematian($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;
        $user = $pengajuan->user;

        // Use nomor surat from database if available, otherwise generate default
        $nomorSurat = $pengajuan->no_surat ?: ('132/170505/05/05/SKK/' . date('m') . '/' . date('Y'));

        // Get QR Code service untuk tracking
        $qrCodeService = app(\App\Services\QrCodeService::class);
        $trackingQrCode = null;
        if ($pengajuan->tracking_number) {
            $verifyUrl = url('/verify/' . $pengajuan->tracking_number);
            $trackingQrCode = $qrCodeService->generateSimpleQrCode($verifyUrl);
        }

        // Prepare TTD data based on jenis_ttd
        $ttdData = [];
        if ($pengajuan->jenis_ttd === 'qrcode') {
            // Use QR Code TTD
            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $pengajuan->data_surat['qr_ttd_base64'] ?? null,
            ];
        } else {
            // Use regular TTD
            $ttdData = [
                'jenis_ttd' => 'gambar',
            ];
        }

        // Format jenis kelamin
        $jenisKelamin = 'N/A';
        if ($user && $user->jenis_kelamin) {
            $jenisKelamin = ($user->jenis_kelamin === 'L' || $user->jenis_kelamin === 'Laki-laki') ? 'Laki-Laki' : 'Perempuan';
        }

        // Format tanggal lahir
        $tanggalLahir = 'N/A';
        if ($user && $user->tanggal_lahir) {
            $tanggalLahir = \Carbon\Carbon::parse($user->tanggal_lahir)->format('d F Y');
        }

        // Calculate age
        $umur = 'N/A';
        if ($user && $user->tanggal_lahir) {
            $umur = \Carbon\Carbon::parse($user->tanggal_lahir)->age;
        }

        // Format tanggal kematian
        $tanggalKematian = 'N/A';
        if (isset($data['tanggal_kematian'])) {
            $tanggalKematian = \Carbon\Carbon::parse($data['tanggal_kematian'])->format('d F Y');
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->format('d F Y'),
            'kepala_desa_nama' => 'ZULTAN ALHARA',
            // Data Pemohon
            'nama_pemohon' => $user->nama_lengkap ?? $pengajuan->nama_lengkap,
            'nik_pemohon' => $user->nik ?? 'N/A',
            'nkk_pemohon' => $user->nkk ?? 'N/A',
            'jenis_kelamin_pemohon' => $jenisKelamin,
            'tempat_lahir_pemohon' => $user->tempat_lahir ?? 'N/A',
            'tanggal_lahir_pemohon' => $tanggalLahir,
            'umur_pemohon' => $umur,
            'alamat_pemohon' => $user->alamat ?? $pengajuan->alamat ?? 'Desa Ketapang Baru, Kec. SAM, Kab. Seluma',
            // Data Almarhum/Almarhumah
            'nama_almarhum' => $data['nama_almarhum'] ?? 'N/A',
            'hari_kematian' => $data['hari_kematian'] ?? 'N/A',
            'tanggal_kematian' => $tanggalKematian,
            'tempat_kematian' => $data['tempat_kematian'] ?? 'N/A',
            'sebab_kematian' => $data['sebab_kematian'] ?? 'N/A',
            // Tracking
            'tracking_number' => $pengajuan->tracking_number,
            'tracking_qr_code' => $trackingQrCode,
            'tembusan' => $pengajuan->tembusan ?? []
        ] + $ttdData;

        // Generate PDF dengan pengaturan A4 dan margin
        $pdf = Pdf::loadView('pdf.surat-keterangan-kematian', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'margin-top' => 15,
                'margin-bottom' => 15,
                'margin-left' => 20,
                'margin-right' => 20,
                'enable-local-file-access' => true
            ]);

        return $pdf->download('Surat-Keterangan-Kematian-' . $pengajuan->nama_lengkap . '.pdf');
    }

    public function handleSuratMenikah(Request $request)
    {
        // Validasi data request
        $request->validate([
            'tanggal_menikah' => 'required|date',
            'lampiran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        try {
            // Handle file upload
            $lampiranPath = null;
            if ($request->hasFile('lampiran')) {
                $file = $request->file('lampiran');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $lampiranPath = $file->storeAs('lampiran', $fileName, 'public');
            }

            // Generate tracking number
            $trackingNumber = 'TRK' . strtoupper(uniqid());

            // Get authenticated user
            $user = $request->user();

            // Create pengajuan surat
            $pengajuan = PengajuanSurat::create([
                'nama_lengkap' => $user->nama_lengkap ?? $user->name,
                'email' => $user->email,
                'no_telepon' => $user->no_hp ?? $user->phone ?? '',
                'alamat' => $user->alamat ?? $user->address ?? '',
                'jenis_surat' => 'surat_menikah',
                'keperluan' => 'Surat Keterangan Menikah',
                'lampiran_path' => $lampiranPath,
                'data_surat' => [
                    'tanggal_menikah' => $request->tanggal_menikah,
                ],
                'status' => 'pending',
                'tracking_number' => $trackingNumber,
                'user_id' => $user->id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pengajuan Surat Keterangan Menikah berhasil disubmit!',
                'tracking_number' => $trackingNumber,
                'pengajuan_id' => $pengajuan->id
            ]);

        } catch (\Exception $e) {
            Log::error('Error in handleSuratMenikah: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    public function generatePDFMenikah($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;
        $user = $pengajuan->user;

        // Use nomor surat from database if available, otherwise generate default
        $nomorSurat = $pengajuan->no_surat ?: ('132/170505/05/05/SKM/' . date('m') . '/' . date('Y'));

        // Get QR Code service untuk tracking
        $qrCodeService = app(\App\Services\QrCodeService::class);
        $trackingQrCode = null;
        if ($pengajuan->tracking_number) {
            $verifyUrl = url('/verify/' . $pengajuan->tracking_number);
            $trackingQrCode = $qrCodeService->generateSimpleQrCode($verifyUrl);
        }

        // Prepare TTD data based on jenis_ttd
        $ttdData = [];
        if ($pengajuan->jenis_ttd === 'qrcode') {
            // Use QR Code TTD
            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $pengajuan->data_surat['qr_ttd_base64'] ?? null,
            ];
        } else {
            // Use regular TTD
            $ttdData = [
                'jenis_ttd' => 'gambar',
            ];
        }

        // Format jenis kelamin
        $jenisKelamin = 'N/A';
        if ($user && $user->jenis_kelamin) {
            $jenisKelamin = ($user->jenis_kelamin === 'L' || $user->jenis_kelamin === 'Laki-laki') ? 'Laki-Laki' : 'Perempuan';
        }

        // Format tanggal lahir
        $tanggalLahir = 'N/A';
        if ($user && $user->tanggal_lahir) {
            $tanggalLahir = \Carbon\Carbon::parse($user->tanggal_lahir)->format('d F Y');
        }

        // Format tanggal menikah
        $tanggalMenikah = 'N/A';
        if (isset($data['tanggal_menikah'])) {
            $tanggalMenikah = \Carbon\Carbon::parse($data['tanggal_menikah'])->format('d F Y');
        }

        // Format dusun from users table
        $dusun = 'N/A';
        if ($user && $user->dusun) {
            $dusun = $user->dusun;
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->format('d F Y'),
            'kepala_desa_nama' => 'ZULTAN ALHARA',
            // Data User dari users table
            'nama' => $user->nama_lengkap ?? $pengajuan->nama_lengkap,
            'nik' => $user->nik ?? 'N/A',
            'tempat_lahir' => $user->tempat_lahir ?? 'N/A',
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'agama' => $user->agama ?? 'N/A',
            'pekerjaan' => $user->pekerjaan ?? 'N/A',
            'alamat' => $user->alamat ?? $pengajuan->alamat ?? 'Desa Ketapang Baru, Kec. SAM, Kab. Seluma',
            'dusun' => $dusun,
            // Data Surat
            'tanggal_menikah' => $tanggalMenikah,
            // Tracking
            'tracking_number' => $pengajuan->tracking_number,
            'tracking_qr_code' => $trackingQrCode,
            'tembusan' => $pengajuan->tembusan ?? []
        ] + $ttdData;

        // Generate PDF dengan pengaturan A4 dan margin
        $pdf = Pdf::loadView('pdf.surat-keterangan-menikah', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'margin-top' => 15,
                'margin-bottom' => 15,
                'margin-left' => 20,
                'margin-right' => 20,
                'enable-local-file-access' => true
            ]);

        return $pdf->download('Surat-Keterangan-Menikah-' . $pengajuan->nama_lengkap . '.pdf');
    }

    public function handleSuratMiskin(Request $request)
    {
        // Validasi data request
        $request->validate([
            'keperluan' => 'required|string|max:255',
            'lampiran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        try {
            // Handle file upload
            $lampiranPath = null;
            if ($request->hasFile('lampiran')) {
                $file = $request->file('lampiran');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $lampiranPath = $file->storeAs('lampiran', $fileName, 'public');
            }

            // Generate tracking number
            $trackingNumber = 'TRK' . strtoupper(uniqid());

            // Get authenticated user
            $user = $request->user();

            // Create pengajuan surat
            $pengajuan = PengajuanSurat::create([
                'nama_lengkap' => $user->nama_lengkap ?? $user->name,
                'email' => $user->email,
                'no_telepon' => $user->no_hp ?? $user->phone ?? '',
                'alamat' => $user->alamat ?? $user->address ?? '',
                'jenis_surat' => 'surat_miskin',
                'keperluan' => 'Surat Keterangan Miskin DTKS untuk ' . $request->keperluan,
                'lampiran_path' => $lampiranPath,
                'data_surat' => [
                    'keperluan' => $request->keperluan,
                ],
                'status' => 'pending',
                'tracking_number' => $trackingNumber,
                'user_id' => $user->id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pengajuan Surat Keterangan Miskin berhasil disubmit!',
                'tracking_number' => $trackingNumber,
                'pengajuan_id' => $pengajuan->id
            ]);

        } catch (\Exception $e) {
            Log::error('Error in handleSuratMiskin: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    public function generatePDFMiskin($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;
        $user = $pengajuan->user;

        // Use nomor surat from database if available, otherwise generate default
        $nomorSurat = $pengajuan->no_surat ?: ('89/170505/05/05/SKM/' . strtoupper(date('m')) . '/' . date('Y'));

        // Get QR Code service untuk tracking
        $qrCodeService = app(\App\Services\QrCodeService::class);
        $trackingQrCode = null;
        if ($pengajuan->tracking_number) {
            $verifyUrl = url('/verify/' . $pengajuan->tracking_number);
            $trackingQrCode = $qrCodeService->generateSimpleQrCode($verifyUrl);
        }

        // Prepare TTD data based on jenis_ttd (Kepala Desa)
        $ttdData = [];
        if ($pengajuan->jenis_ttd === 'qrcode') {
            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $pengajuan->data_surat['qr_ttd_base64'] ?? null,
            ];
        } else {
            $ttdData = [
                'jenis_ttd' => 'gambar',
            ];
        }

        // Prepare TTD Camat data
        $ttdCamatData = [];
        if (isset($pengajuan->jenis_ttd_camat)) {
            if ($pengajuan->jenis_ttd_camat === 'qrcode') {
                $ttdCamatData = [
                    'jenis_ttd_camat' => 'qrcode',
                    'qr_ttd_camat_base64' => $pengajuan->data_surat['qr_ttd_camat_base64'] ?? null,
                ];
            } else {
                $ttdCamatData = [
                    'jenis_ttd_camat' => 'gambar',
                ];
            }
        }

        // Format jenis kelamin
        $jenisKelamin = 'N/A';
        if ($user && $user->jenis_kelamin) {
            $jenisKelamin = ($user->jenis_kelamin === 'L' || $user->jenis_kelamin === 'Laki-laki') ? 'Laki-Laki' : 'Perempuan';
        }

        // Format tanggal lahir
        $tanggalLahir = 'N/A';
        if ($user && $user->tanggal_lahir) {
            $tanggalLahir = \Carbon\Carbon::parse($user->tanggal_lahir)->format('d F Y');
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->format('d F Y'),
            'kepala_desa_nama' => 'ZULTAN ALHARA',
            // Data dari admin input
            'nip' => $pengajuan->nip ?? null,
            'pangkat_golongan' => $pengajuan->pangkat_golongan ?? null,
            'nama_camat' => $pengajuan->nama_camat ?? null,
            'nip_camat' => $pengajuan->nip_camat ?? null,
            // Data User dari users table
            'nama' => $user->nama_lengkap ?? $pengajuan->nama_lengkap,
            'tempat_lahir' => $user->tempat_lahir ?? 'N/A',
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'agama' => $user->agama ?? 'Islam',
            'alamat' => $user->alamat ?? $pengajuan->alamat ?? 'Ketapang Baru, Kec. Semidang Alas Maras, Kab. Seluma',
            // Data Surat
            'keperluan' => $data['keperluan'] ?? 'PIP',
            // Tracking
            'tracking_number' => $pengajuan->tracking_number,
            'tracking_qr_code' => $trackingQrCode,
            'tembusan' => $pengajuan->tembusan ?? []
        ] + $ttdData + $ttdCamatData;

        // Generate PDF dengan pengaturan A4 dan margin
        $pdf = Pdf::loadView('pdf.surat-keterangan-miskin', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'margin-top' => 15,
                'margin-bottom' => 15,
                'margin-left' => 20,
                'margin-right' => 20,
                'enable-local-file-access' => true
            ]);

        return $pdf->download('Surat-Keterangan-Miskin-' . $pengajuan->nama_lengkap . '.pdf');
    }

    public function handleSuratPenghasilanOrtu(Request $request)
    {
        // Validasi data request
        $request->validate([
            // Data Ayah
            'nama_ayah' => 'required|string|max:255',
            'tempat_lahir_ayah' => 'required|string|max:255',
            'tanggal_lahir_ayah' => 'required|date',
            'agama_ayah' => 'required|string',
            'pekerjaan_ayah' => 'required|string|max:255',
            'penghasilan_ayah' => 'required|numeric|min:0',
            'alamat_ayah' => 'required|string|max:255',
            // Data Ibu
            'nama_ibu' => 'required|string|max:255',
            'tempat_lahir_ibu' => 'required|string|max:255',
            'tanggal_lahir_ibu' => 'required|date',
            'agama_ibu' => 'required|string',
            'pekerjaan_ibu' => 'required|string|max:255',
            'penghasilan_ibu' => 'required|numeric|min:0',
            'alamat_ibu' => 'required|string|max:255',
            // Lampiran
            'lampiran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        try {
            // Handle file upload
            $lampiranPath = null;
            if ($request->hasFile('lampiran')) {
                $file = $request->file('lampiran');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $lampiranPath = $file->storeAs('lampiran', $fileName, 'public');
            }

            // Generate tracking number
            $trackingNumber = 'TRK' . strtoupper(uniqid());

            // Get authenticated user
            $user = $request->user();

            // Create pengajuan surat
            $pengajuan = PengajuanSurat::create([
                'nama_lengkap' => $user->nama_lengkap ?? $user->name,
                'email' => $user->email,
                'no_telepon' => $user->no_hp ?? $user->phone ?? '',
                'alamat' => $user->alamat ?? $user->address ?? '',
                'jenis_surat' => 'surat_penghasilan_ortu',
                'keperluan' => 'Surat Keterangan Penghasilan Orang Tua untuk Keperluan Administrasi',
                'lampiran_path' => $lampiranPath,
                'data_surat' => [
                    // Data Ayah
                    'nama_ayah' => $request->nama_ayah,
                    'tempat_lahir_ayah' => $request->tempat_lahir_ayah,
                    'tanggal_lahir_ayah' => $request->tanggal_lahir_ayah,
                    'agama_ayah' => $request->agama_ayah,
                    'pekerjaan_ayah' => $request->pekerjaan_ayah,
                    'penghasilan_ayah' => $request->penghasilan_ayah,
                    'alamat_ayah' => $request->alamat_ayah,
                    // Data Ibu
                    'nama_ibu' => $request->nama_ibu,
                    'tempat_lahir_ibu' => $request->tempat_lahir_ibu,
                    'tanggal_lahir_ibu' => $request->tanggal_lahir_ibu,
                    'agama_ibu' => $request->agama_ibu,
                    'pekerjaan_ibu' => $request->pekerjaan_ibu,
                    'penghasilan_ibu' => $request->penghasilan_ibu,
                    'alamat_ibu' => $request->alamat_ibu,
                ],
                'status' => 'pending',
                'tracking_number' => $trackingNumber,
                'user_id' => $user->id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pengajuan Surat Keterangan Penghasilan Orang Tua berhasil disubmit!',
                'tracking_number' => $trackingNumber,
                'pengajuan_id' => $pengajuan->id
            ]);

        } catch (\Exception $e) {
            Log::error('Error in handleSuratPenghasilanOrtu: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    public function generatePDFPenghasilanOrtu($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;
        $user = $pengajuan->user;

        // Use nomor surat from database if available, otherwise generate default
        $nomorSurat = $pengajuan->no_surat ?: ('129/170505/05/05/SKM/' . strtoupper(date('m')) . '/' . date('Y'));

        // Get QR Code service untuk tracking
        $qrCodeService = app(\App\Services\QrCodeService::class);
        $trackingQrCode = null;
        if ($pengajuan->tracking_number) {
            $verifyUrl = url('/verify/' . $pengajuan->tracking_number);
            $trackingQrCode = $qrCodeService->generateSimpleQrCode($verifyUrl);
        }

        // Prepare TTD data based on jenis_ttd
        $ttdData = [];
        if ($pengajuan->jenis_ttd === 'qrcode') {
            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $pengajuan->data_surat['qr_ttd_base64'] ?? null,
            ];
        } else {
            $ttdData = [
                'jenis_ttd' => 'gambar',
            ];
        }

        // Format jenis kelamin
        $jenisKelamin = 'N/A';
        if ($user && $user->jenis_kelamin) {
            $jenisKelamin = ($user->jenis_kelamin === 'L' || $user->jenis_kelamin === 'Laki-laki') ? 'Laki-Laki' : 'Perempuan';
        }

        // Format tanggal lahir user
        $tanggalLahir = 'N/A';
        if ($user && $user->tanggal_lahir) {
            $tanggalLahir = \Carbon\Carbon::parse($user->tanggal_lahir)->format('d F Y');
        }

        // Format tanggal lahir ayah
        $tanggalLahirAyah = 'N/A';
        if (isset($data['tanggal_lahir_ayah'])) {
            $tanggalLahirAyah = \Carbon\Carbon::parse($data['tanggal_lahir_ayah'])->format('d F Y');
        }

        // Format tanggal lahir ibu
        $tanggalLahirIbu = 'N/A';
        if (isset($data['tanggal_lahir_ibu'])) {
            $tanggalLahirIbu = \Carbon\Carbon::parse($data['tanggal_lahir_ibu'])->format('d F Y');
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->format('d F Y'),
            'kepala_desa_nama' => 'ZULTAN ALHARA',
            // Data User (Anak)
            'nama' => $user->nama_lengkap ?? $pengajuan->nama_lengkap,
            'tempat_lahir' => $user->tempat_lahir ?? 'N/A',
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'pekerjaan' => $user->pekerjaan ?? 'Pelajar/Mahasiswi',
            'alamat' => $user->alamat ?? $pengajuan->alamat ?? 'Desa Ketapang Baru, Kec. Semidang Alas Maras, Kab. Seluma',
            // Data Ayah
            'nama_ayah' => $data['nama_ayah'] ?? 'N/A',
            'tempat_lahir_ayah' => $data['tempat_lahir_ayah'] ?? 'N/A',
            'tanggal_lahir_ayah' => $tanggalLahirAyah,
            'agama_ayah' => $data['agama_ayah'] ?? 'Islam',
            'pekerjaan_ayah' => $data['pekerjaan_ayah'] ?? 'N/A',
            'penghasilan_ayah' => $data['penghasilan_ayah'] ?? 0,
            'alamat_ayah' => $data['alamat_ayah'] ?? 'Desa Ketapang Baru, Kec. Semidang Alas Maras, Kab. Seluma',
            // Data Ibu
            'nama_ibu' => $data['nama_ibu'] ?? 'N/A',
            'tempat_lahir_ibu' => $data['tempat_lahir_ibu'] ?? 'N/A',
            'tanggal_lahir_ibu' => $tanggalLahirIbu,
            'agama_ibu' => $data['agama_ibu'] ?? 'Islam',
            'pekerjaan_ibu' => $data['pekerjaan_ibu'] ?? 'N/A',
            'penghasilan_ibu' => $data['penghasilan_ibu'] ?? 0,
            'alamat_ibu' => $data['alamat_ibu'] ?? 'Desa Ketapang Baru, Kec. Semidang Alas Maras, Kab. Seluma',
            // Tracking
            'tracking_number' => $pengajuan->tracking_number,
            'tracking_qr_code' => $trackingQrCode,
            'tembusan' => $pengajuan->tembusan ?? []
        ] + $ttdData;

        // Generate PDF dengan pengaturan A4 dan margin
        $pdf = Pdf::loadView('pdf.surat-keterangan-penghasilan-ortu', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'margin-top' => 15,
                'margin-bottom' => 15,
                'margin-left' => 20,
                'margin-right' => 20,
                'enable-local-file-access' => true
            ]);

        return $pdf->download('Surat-Keterangan-Penghasilan-Orang-Tua-' . $pengajuan->nama_lengkap . '.pdf');
    }

    public function searchOrangTua(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|min:2',
            'jenis' => 'required|in:ayah,ibu'
        ]);

        $nama = $request->nama;
        $jenis = $request->jenis;

        // Search dari pengajuan sebelumnya yang sudah disetujui
        $field = $jenis === 'ayah' ? 'nama_ayah' : 'nama_ibu';

        $pengajuanList = PengajuanSurat::where('jenis_surat', 'surat_penghasilan_ortu')
            ->where('status', 'Disetujui')
            ->whereJsonContains("data_surat->{$field}", $nama)
            ->orWhere(function($query) use ($field, $nama) {
                $query->whereRaw("JSON_EXTRACT(data_surat, '$.{$field}') LIKE ?", ["%{$nama}%"]);
            })
            ->limit(10)
            ->get();

        $suggestions = [];

        foreach ($pengajuanList as $pengajuan) {
            $data = $pengajuan->data_surat;

            if ($jenis === 'ayah' && isset($data['nama_ayah'])) {
                $suggestions[] = [
                    'nama' => $data['nama_ayah'],
                    'tempat_lahir' => $data['tempat_lahir_ayah'] ?? '',
                    'tanggal_lahir' => $data['tanggal_lahir_ayah'] ?? '',
                    'agama' => $data['agama_ayah'] ?? '',
                    'pekerjaan' => $data['pekerjaan_ayah'] ?? '',
                    'penghasilan' => $data['penghasilan_ayah'] ?? '',
                    'alamat' => $data['alamat_ayah'] ?? ''
                ];
            } else if ($jenis === 'ibu' && isset($data['nama_ibu'])) {
                $suggestions[] = [
                    'nama' => $data['nama_ibu'],
                    'tempat_lahir' => $data['tempat_lahir_ibu'] ?? '',
                    'tanggal_lahir' => $data['tanggal_lahir_ibu'] ?? '',
                    'agama' => $data['agama_ibu'] ?? '',
                    'pekerjaan' => $data['pekerjaan_ibu'] ?? '',
                    'penghasilan' => $data['penghasilan_ibu'] ?? '',
                    'alamat' => $data['alamat_ibu'] ?? ''
                ];
            }
        }

        // Remove duplicates berdasarkan nama
        $suggestions = array_values(array_unique($suggestions, SORT_REGULAR));

        return response()->json([
            'success' => true,
            'suggestions' => array_slice($suggestions, 0, 5) // Batasi 5 suggestions
        ]);
    }

    public function generatePDFPengantarNikah($pengajuanId)
    {
        $pengajuan = PengajuanSurat::with('user')->findOrFail($pengajuanId);
        $data = $pengajuan->data_surat ?? [];
        $user = $pengajuan->user;

        // Nomor surat default jika belum diisi
        $nomorSurat = $pengajuan->no_surat ?: ('11/SPP/170505/05/05/' . date('m') . '/' . date('Y'));

        // Prepare pemohon (pria) data
        $pemohonNama = $data['nama'] ?? ($user->nama_lengkap ?? '-');
        $pemohonNik = $data['nik'] ?? ($user->nik ?? '-');
        $pemohonJenisKelamin = $data['jenis_kelamin'] ?? ($user->jenis_kelamin === 'L' ? 'Laki-Laki' : 'Perempuan');
        $pemohonTempatTanggal = $data['tempat_tanggal_lahir'] ?? ($user->tempat_lahir . ', ' . ($user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->format('d F Y') : '-'));
        $pemohonWarga = $data['warga_negara'] ?? 'Indonesia';
        $pemohonAgama = $data['agama'] ?? ($user->agama ?? '-');
        $pemohonPekerjaan = $data['pekerjaan'] ?? ($user->mata_pencaharian ?? $user->pekerjaan ?? '-');
        $pemohonAlamat = $data['alamat'] ?? ($user->alamat ?? '-');
        $pemohonStatusPria = $data['status_pria'] ?? ($data['status_pria_raw'] ?? 'Jejaka');
        $pemohonStatusWanita = $data['status_wanita'] ?? ($data['status_wanita_raw'] ?? 'Perawan');
        $pemohonNamaPasanganTerdahulu = $data['nama_pasangan_terdahulu'] ?? '';

        // Ayah
        $ayahNama = $data['ayah_nama'] ?? ($data['nama_ayah'] ?? '-');
        $ayahNik = $data['ayah_nik'] ?? ($data['nik_ayah'] ?? '-');
        $ayahTempatTanggal = $data['ayah_tempat_tanggal_lahir'] ?? '-';
        $ayahWarga = $data['ayah_warga_negara'] ?? '-';
        $ayahAgama = $data['ayah_agama'] ?? '-';
        $ayahPekerjaan = $data['ayah_pekerjaan'] ?? '-';
        $ayahAlamat = $data['ayah_alamat'] ?? '-';

        // Wanita (pasangan)
        $wanitaNama = $data['wanita_nama'] ?? '-';
        $wanitaNik = $data['wanita_nik'] ?? '-';
        $wanitaTempatTanggal = $data['wanita_tempat_tanggal_lahir'] ?? '-';
        $wanitaWarga = $data['wanita_warga_negara'] ?? 'WNI';
        $wanitaAgama = $data['wanita_agama'] ?? '-';
        $wanitaPekerjaan = $data['wanita_pekerjaan'] ?? '-';
        $wanitaAlamat = $data['wanita_alamat'] ?? '-';

        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->format('d F Y'),
            'nama' => $pemohonNama,
            'nik' => $pemohonNik,
            'jenis_kelamin' => $pemohonJenisKelamin,
            'tempat_tanggal_lahir' => $pemohonTempatTanggal,
            'warga_negara' => $pemohonWarga,
            'agama' => $pemohonAgama,
            'pekerjaan' => $pemohonPekerjaan,
            'alamat' => $pemohonAlamat,
            'status_pria' => $pemohonStatusPria,
            'status_wanita' => $pemohonStatusWanita,
            'nama_pasangan_terdahulu' => $pemohonNamaPasanganTerdahulu,

            'ayah_nama' => $ayahNama,
            'ayah_nik' => $ayahNik,
            'ayah_tempat_tanggal_lahir' => $ayahTempatTanggal,
            'ayah_warga_negara' => $ayahWarga,
            'ayah_agama' => $ayahAgama,
            'ayah_pekerjaan' => $ayahPekerjaan,
            'ayah_alamat' => $ayahAlamat,

            'wanita_nama' => $wanitaNama,
            'wanita_nik' => $wanitaNik,
            'wanita_tempat_tanggal_lahir' => $wanitaTempatTanggal,
            'wanita_warga_negara' => $wanitaWarga,
            'wanita_agama' => $wanitaAgama,
            'wanita_pekerjaan' => $wanitaPekerjaan,
            'wanita_alamat' => $wanitaAlamat,

            'kepala_desa_nama' => 'ZULTAN ALHARA',
            'tembusan' => $pengajuan->tembusan ?? []
        ];

        $pdf = Pdf::loadView('pdf.surat-pengantar-nikah', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions(['enable-local-file-access' => true]);

        return $pdf->download('Surat-Pengantar-Nikah-' . Str::slug($pemohonNama) . '.pdf');
    }

    public function generatePDFHibah($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = json_decode($pengajuan->data_surat, true);

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $pengajuan->nomor_surat,
            'tanggal_surat' => $pengajuan->created_at->format('d F Y'),

            // Data Penghibah
            'nama_penghibah' => $data['nama_penghibah'] ?? '',
            'umur_penghibah' => $data['umur_penghibah'] ?? '',
            'pekerjaan_penghibah' => $data['pekerjaan_penghibah'] ?? '',
            'agama_penghibah' => $data['agama_penghibah'] ?? '',
            'alamat_penghibah' => $data['alamat_penghibah'] ?? '',

            // Detail Tanah
            'hari_tanggal' => $data['hari_tanggal'] ?? '',
            'luas_tanah' => $data['luas_tanah'] ?? '',

            // Batas-batas Tanah
            'batas_utara' => $data['batas_utara'] ?? '',
            'pemilik_utara' => $data['pemilik_utara'] ?? '',
            'batas_barat' => $data['batas_barat'] ?? '',
            'pemilik_barat' => $data['pemilik_barat'] ?? '',
            'batas_selatan' => $data['batas_selatan'] ?? '',
            'pemilik_selatan' => $data['pemilik_selatan'] ?? '',
            'batas_timur' => $data['batas_timur'] ?? '',
            'pemilik_timur' => $data['pemilik_timur'] ?? '',

            // Saksi
            'saksi_1' => $data['saksi_1'] ?? '',
            'saksi_2' => $data['saksi_2'] ?? '',
            'saksi_3' => $data['saksi_3'] ?? '',

            'kepala_desa_nama' => 'ZULTAN ALHARA'
        ];

        $pdf = Pdf::loadView('pdf.surat-hibah', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions(['enable-local-file-access' => true]);

        return $pdf->download('Surat-Hibah-' . Str::slug($data['nama_penghibah'] ?? 'Penghibah') . '.pdf');
    }

    public function generatePDFPerjanjianPerdamaian($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = json_decode($pengajuan->data_surat, true);

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $pengajuan->nomor_surat,
            'tanggal_surat' => $pengajuan->created_at->format('d F Y'),

            // Data Pihak 1
            'pihak1_nama' => $data['pihak1_nama'] ?? '',
            'pihak1_umur' => $data['pihak1_umur'] ?? '',
            'pihak1_pekerjaan' => $data['pihak1_pekerjaan'] ?? '',
            'pihak1_agama' => $data['pihak1_agama'] ?? '',
            'pihak1_alamat' => $data['pihak1_alamat'] ?? '',

            // Data Pihak 2
            'pihak2_nama' => $data['pihak2_nama'] ?? '',
            'pihak2_umur' => $data['pihak2_umur'] ?? '',
            'pihak2_pekerjaan' => $data['pihak2_pekerjaan'] ?? '',
            'pihak2_agama' => $data['pihak2_agama'] ?? '',
            'pihak2_alamat' => $data['pihak2_alamat'] ?? '',

            // Kronologi
            'hari_tanggal_perjanjian' => $data['hari_tanggal_perjanjian'] ?? '',
            'hari_tanggal_kejadian' => $data['hari_tanggal_kejadian'] ?? '',
            'waktu_kejadian' => $data['waktu_kejadian'] ?? '',

            // Denda Adat
            'jenis_denda' => $data['jenis_denda'] ?? '',
            'nominal_denda' => $data['nominal_denda'] ?? 0,
            'terbilang_denda' => $data['terbilang_denda'] ?? '',

            // Saksi
            'saksi_1' => $data['saksi_1'] ?? '',
            'saksi_2' => $data['saksi_2'] ?? '',
            'saksi_3' => $data['saksi_3'] ?? '',
            'saksi_4' => $data['saksi_4'] ?? '',

            'kepala_desa_nama' => 'ZULTAN ALHARA'
        ];

        $pdf = Pdf::loadView('pdf.surat-perjanjian-perdamaian', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions(['enable-local-file-access' => true]);

        return $pdf->download('Surat-Perjanjian-Perdamaian-' . Str::slug($data['pihak1_nama'] ?? 'Perjanjian') . '.pdf');
    }

    public function generatePDFSuratPindah($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = json_decode($pengajuan->data_surat, true);

        // Parse pengikut data if it exists
        $pengikut = [];
        if (isset($data['pengikut']) && is_string($data['pengikut'])) {
            $pengikut = json_decode($data['pengikut'], true) ?? [];
        } elseif (isset($data['pengikut']) && is_array($data['pengikut'])) {
            $pengikut = $data['pengikut'];
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $pengajuan->nomor_surat,
            'tanggal_surat' => $pengajuan->created_at->format('d F Y'),

            // Data Pemohon
            'nama' => $data['nama'] ?? ($pengajuan->user->nama_lengkap ?? ''),
            'tempat_tanggal_lahir' => ($data['tempat_lahir'] ?? '') . '/' . ($data['tanggal_lahir'] ? \Carbon\Carbon::parse($data['tanggal_lahir'])->format('d F Y') : ''),
            'jenis_kelamin' => $data['jenis_kelamin'] ?? '',
            'agama' => $data['agama'] ?? '',
            'status_perkawinan' => $data['status_perkawinan'] ?? '',
            'pekerjaan' => $data['pekerjaan'] ?? '',
            'pendidikan' => $data['pendidikan'] ?? '',
            'kewarganegaraan' => $data['kewarganegaraan'] ?? 'WNI',
            'alamat_asal' => $data['alamat_asal'] ?? ($pengajuan->user->alamat ?? ''),

            // Data Pindah
            'alamat_tujuan' => $data['alamat_tujuan'] ?? '',
            'tanggal_pindah' => $data['tanggal_pindah'] ? \Carbon\Carbon::parse($data['tanggal_pindah'])->format('d F Y') : '',
            'alasan_pindah' => $data['alasan_pindah'] ?? '',

            // Data Pengikut (array)
            'pengikut' => $pengikut,

            // TTD
            'nama_camat' => $data['nama_camat'] ?? '',
            'nip_camat' => $data['nip_camat'] ?? '',
            'kepala_desa_nama' => 'ZULTAN ALHARA'
        ];

        $pdf = Pdf::loadView('pdf.surat-pindah', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions(['enable-local-file-access' => true]);

        return $pdf->download('Surat-Pindah-' . Str::slug($data['nama'] ?? 'Penduduk') . '.pdf');
    }

    public function generatePDFRekomendasi($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = json_decode($pengajuan->data_surat, true);

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $pengajuan->nomor_surat,
            'tanggal_surat' => $pengajuan->created_at->format('d F Y'),

            // Data Pemohon
            'nama' => $data['nama'] ?? ($pengajuan->user->nama_lengkap ?? ''),
            'nik' => $data['nik'] ?? ($pengajuan->user->nik ?? ''),
            'jenis_kelamin' => $data['jenis_kelamin'] ?? '',
            'agama' => $data['agama'] ?? '',
            'pekerjaan' => $data['pekerjaan'] ?? '',
            'alamat' => $data['alamat'] ?? ($pengajuan->user->alamat ?? ''),

            // Isi Rekomendasi
            'jenis_rekomendasi' => $data['jenis_rekomendasi'] ?? '',
            'isi_rekomendasi' => $data['isi_rekomendasi'] ?? '',
            'tujuan_rekomendasi' => $data['tujuan_rekomendasi'] ?? '',
            'penutup' => $data['penutup'] ?? 'Demikianlah Surat keterangan ini dibuat dengan sebenarnya dan dapat dipergunakan sebagai mana mestinya.',

            // Detail Usaha (opsional)
            'nama_usaha' => $data['nama_usaha'] ?? null,
            'alamat_usaha' => $data['alamat_usaha'] ?? null,
            'nomor_telepon' => $data['nomor_telepon'] ?? null,
            'luas_lahan' => $data['luas_lahan'] ?? null,
            'luas_bangunan' => $data['luas_bangunan'] ?? null,
            'kapasitas' => $data['kapasitas'] ?? null,
            'modal_usaha' => $data['modal_usaha'] ?? null,
            'penghasilan_bulanan' => $data['penghasilan_bulanan'] ?? null,

            'kepala_desa_nama' => 'ZULTAN ALHARA'
        ];

        $pdf = Pdf::loadView('pdf.surat-rekomendasi', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions(['enable-local-file-access' => true]);

        return $pdf->download('Surat-Rekomendasi-' . Str::slug($data['nama'] ?? 'Rekomendasi') . '.pdf');
    }

    public function generatePDFUndangan($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = json_decode($pengajuan->data_surat, true);

        // Convert tanggal ke format Indonesia
        $tanggalSurat = isset($data['tanggal_surat']) ? 
            Carbon::parse($data['tanggal_surat'])->locale('id')->isoFormat('D MMMM Y') : 
            Carbon::now()->locale('id')->isoFormat('D MMMM Y');

        $tanggalTtd = isset($data['tanggal_ttd']) ? 
            Carbon::parse($data['tanggal_ttd'])->locale('id')->isoFormat('D MMMM Y') : 
            Carbon::now()->locale('id')->isoFormat('D MMMM Y');

        $pdfData = [
            'nomor_surat' => $pengajuan->nomor_surat ?? '09/SP/KTB/V/2025',
            'lampiran' => $data['lampiran'] ?? '1 (satu) Berkas',
            'perihal' => $data['perihal'] ?? 'Panggilan Penting',
            'tanggal_surat' => $tanggalSurat,
            'kepada' => $data['kepada'] ?? 'Bapak/Ibu ........................',
            'pembukaan' => $data['pembukaan'] ?? 'Sehubungan dengan telah disepakati pembentukan time pendataan smart village pada tanggal 4 Juni 2025, mengingat acara ini sangat penting maka kami mengundang bapak/ibu untuk hadir:',
            'hari_tanggal' => $data['hari_tanggal'] ?? "Jum'at, 13 Juni 2025",
            'jam' => $data['jam'] ?? '09.30 WIB – selesai',
            'acara' => $data['acara'] ?? 'Penegasan Tanggung jawab kerja pendataan smart village',
            'tempat' => $data['tempat'] ?? 'Gedung Perpustakaan/Kantor Desa Ketapang Baru',
            'penutup' => $data['penutup'] ?? 'Demikian panggilan ini kami sampaikan dan semoga Bapak/Ibu dapat menghadiri dengan tepat waktu, atas perhatiannya Kami ucapkan terimakasih.',
            'tanggal_ttd' => $tanggalTtd,
            'kepala_desa' => $data['kepala_desa'] ?? 'ZULTAN ALHARA',
        ];

        $pdf = Pdf::loadView('pdf.surat-undangan', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions(['enable-local-file-access' => true]);

        return $pdf->download('Surat-Undangan-' . Str::slug($data['kepada'] ?? 'Undangan') . '.pdf');
    }
}
