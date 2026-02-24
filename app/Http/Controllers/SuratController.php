<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\PengajuanSurat;
use App\Models\StrukturOrganisasi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SuratController extends Controller
{
    /**
     * Helper function to get Kepala Desa data from database
     */
    private function getKepalaDesa()
    {
        $kepalaDesa = StrukturOrganisasi::where('level', 'kepala')
            ->where('kategori', 'pemerintahan')
            ->where('aktif', true)
            ->first();

        return [
            'kepala_desa_nama' => $kepalaDesa->nama ?? 'Zultan Alhara',
            'nip' => $kepalaDesa->nip ?? '-',
        ];
    }

    /**
     * Helper function to safely get data from array with fallback
     */
    private function safeGet($array, $key, $default = '-')
    {
        if (!is_array($array)) {
            return $default;
        }
        return isset($array[$key]) && $array[$key] !== null && $array[$key] !== '' ? $array[$key] : $default;
    }

    /**
     * Helper function to safely prepare PDF data from surat data
     */
    private function preparePdfData($data, $fields)
    {
        $result = [];
        foreach ($fields as $field => $default) {
            if (is_numeric($field)) {
                // If only field name provided, use default '-'
                $result[$default] = $this->safeGet($data, $default);
            } else {
                // If field => default provided
                $result[$field] = $this->safeGet($data, $field, $default);
            }
        }
        return $result;
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

        // Use nomor surat from database if available, otherwise generate default
        $nomorSurat = $pengajuan->no_surat ?: ('470/' . date('m') . '/' . date('Y') . '/' . $pengajuanId);

        // Prepare TTD data based on jenis_ttd
        $ttdData = [];
        if ($pengajuan->jenis_ttd === 'qrcode') {
            // Use QR Code TTD - QR code yang berisi gambar TTD
            $qrTtdBase64 = $pengajuan->data_surat['qr_ttd_base64'] ?? null;

            // Jika QR code TTD belum ada, generate sekarang
            if (!$qrTtdBase64) {
                try {
                    $qrCodeService = new \App\Services\QrCodeService();
                    $qrTtdBase64 = $qrCodeService->generateSuratQrCode($pengajuan);
                } catch (\Exception $e) {
                    \Log::error('Failed to generate QR TTD: ' . $e->getMessage());
                    $qrTtdBase64 = null;
                }
            }

            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $qrTtdBase64,
                'verification_url' => $pengajuan->data_surat['verification_url'] ?? null
            ];
        } elseif ($pengajuan->jenis_ttd === 'gambar') {
            // Use regular TTD - gambar TTD langsung
            $ttdData = [
                'jenis_ttd' => 'gambar',
                'ttd_base64' => file_exists(public_path('assets/images/ttd.png')) ? base64_encode(file_get_contents(public_path('assets/images/ttd.png'))) : null
            ];
        } else {
            // Manual TTD - tidak ada gambar atau QR code
            $ttdData = [
                'jenis_ttd' => 'manual'
            ];
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->translatedFormat('d F Y'),
        ] + $this->getKepalaDesa() + [
            'nama_pemohon' => $user->nama_lengkap ?? $pengajuan->nama_lengkap ?? '-',
            'nik' => $user->nik ?? $pengajuan->nik ?? '-',
            'tempat_lahir' => $user->tempat_lahir ?? '-',
            'tanggal_lahir' => $user && $user->tanggal_lahir ? date('d F Y', strtotime($user->tanggal_lahir)) : '-',
            'alamat' => $user->alamat ?? $pengajuan->alamat ?? '-',
            'rt_rw' => ($user->rt ?? '-') . '/' . ($user->rw ?? '-'),
            'no_hp' => $user->no_hp ?? $pengajuan->no_hp ?? '-',
            'pekerjaan' => $user->mata_pencaharian ?? '-',
            'jenis_dokumen' => $data['jenis_dokumen'] ?? '-',
            'nama_barang_lainnya' => $data['nama_barang_lainnya'] ?? '-',
            'nomor_dokumen' => $data['nomor_dokumen'] ?? '-',
            'tempat_kehilangan' => $data['tempat_kehilangan'] ?? '-',
            'waktu_kehilangan' => $data['waktu_kehilangan'] ?? '-',
            'keterangan_waktu' => $data['keterangan_waktu'] ?? '-',
            'keperluan' => $pengajuan->keperluan ?? $data['keperluan'] ?? '-',
            'tembusan' => $data['tembusan'] ?? '',
            'tracking_number' => $pengajuan->tracking_number ?? '-'
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

        return $pdf->stream('Surat-Keterangan-Kehilangan-' . ($user->nama_lengkap ?? $pengajuan->nama_lengkap ?? 'Unknown') . '.pdf');
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
            'tanggal_surat' => now()->translatedFormat('d F Y'),
            'nama_pemohon'
        ] + $this->getKepalaDesa() + [
            'nama_pemohon' => $user->nama_lengkap ?? $pengajuan->nama_lengkap ?? '-',
            'nik' => $user->nik ?? $pengajuan->nik ?? '-',
            'tempat_lahir' => $user->tempat_lahir ?? '-',
            'tanggal_lahir' => $user && $user->tanggal_lahir ? date('d F Y', strtotime($user->tanggal_lahir)) : '-',
            'alamat' => $user->alamat ?? $pengajuan->alamat ?? '-',
            'rt_rw' => ($user->rt ?? '-') . '/' . ($user->rw ?? '-'),
            'no_hp' => $user->no_hp ?? $pengajuan->no_hp ?? '-',
            'pekerjaan' => $user->mata_pencaharian ?? '-',
            'jenis_dokumen' => $this->safeGet($data, 'jenis_dokumen'),
            'nama_barang_lainnya' => $this->safeGet($data, 'nama_barang_lainnya'),
            'nomor_dokumen' => $this->safeGet($data, 'nomor_dokumen'),
            'tempat_kehilangan' => $this->safeGet($data, 'tempat_kehilangan'),
            'waktu_kehilangan' => $this->safeGet($data, 'waktu_kehilangan'),
            'keterangan_waktu' => $this->safeGet($data, 'keterangan_waktu'),
            'keperluan' => $this->safeGet($data, 'keperluan')
        ];

        // Add missing data fields with null coalescing
        $pdfData['jenis_dokumen'] = $data['jenis_dokumen'] ?? '-';
        $pdfData['nama_barang_lainnya'] = $data['nama_barang_lainnya'] ?? '-';
        $pdfData['nomor_dokumen'] = $data['nomor_dokumen'] ?? '-';
        $pdfData['tempat_kehilangan'] = $data['tempat_kehilangan'] ?? '-';
        $pdfData['waktu_kehilangan'] = $data['waktu_kehilangan'] ?? '-';
        $pdfData['keterangan_waktu'] = $data['keterangan_waktu'] ?? '-';
        $pdfData['keperluan'] = $pengajuan->keperluan ?? $data['keperluan'] ?? '-';

        // Generate PDF for preview
        $pdf = Pdf::loadView('pdf.surat-kehilangan', $pdfData);

        return $pdf->stream('Surat-Keterangan-Kehilangan-' . ($user->nama_lengkap ?? $pengajuan->nama_lengkap ?? 'Unknown') . '.pdf');
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
            'tanggal_surat' => now()->translatedFormat('d F Y'),
            'nama_pemohon'
        ] + $this->getKepalaDesa() + [
            'nama_pemohon' => $user->nama_lengkap ?? $pengajuan->nama_lengkap ?? '-',
            'nik' => $user->nik ?? $pengajuan->nik ?? '-',
            'tempat_lahir' => $user->tempat_lahir ?? '-',
            'tanggal_lahir' => $user && $user->tanggal_lahir ? date('d F Y', strtotime($user->tanggal_lahir)) : '-',
            'alamat' => $user->alamat ?? $pengajuan->alamat ?? '-',
            'rt_rw' => ($user->rt ?? '-') . '/' . ($user->rw ?? '-'),
            'no_hp' => $user->no_hp ?? $pengajuan->no_hp ?? '-',
            'pekerjaan' => $user->mata_pencaharian ?? '-',
            'jenis_dokumen' => $data['jenis_dokumen'] ?? '-',
            'nama_barang_lainnya' => $data['nama_barang_lainnya'] ?? '-',
            'nomor_dokumen' => $data['nomor_dokumen'] ?? '-',
            'tempat_kehilangan' => $data['tempat_kehilangan'] ?? '-',
            'waktu_kehilangan' => $data['waktu_kehilangan'] ?? '-',
            'keterangan_waktu' => $data['keterangan_waktu'] ?? '-',
            'keperluan' => $pengajuan->keperluan ?? $data['keperluan'] ?? '-'
        ];

        // Generate PDF
        $pdf = Pdf::loadView('pdf.surat-kehilangan', $pdfData);
        $pdfPath = storage_path('app/public/surat-approved/surat-kehilangan-' . $pengajuanId . '.pdf');
        $pdf->save($pdfPath);

        // Kirim ke WA user menggunakan FonnteService
        $fonnteService = app(\App\Services\FonnteService::class);

        $message = "🎉 *SURAT KETERANGAN KEHILANGAN DISETUJUI!*\n\n"
                . "Halo " . ($user->nama_lengkap ?? 'User') . ",\n"
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
                . "Halo " . ($user->nama_lengkap ?? 'User') . ",\n"
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
            'tanggal_surat' => now()->translatedFormat('d F Y'),
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
        // Get kepala desa data
        $kepalaDesa = $this->getKepalaDesa();
        
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
            'nama_kepala' => $request->nama_kepala ?? $kepalaDesa['kepala_desa_nama'],
            'nip' => $request->nip ?? $kepalaDesa['nip'],

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

        // Prepare TTD data based on jenis_ttd - SIMPLE LOGIC
        $ttdData = [];
        $qrCodeBase64 = null; // QR code verifikasi surat - hanya untuk tracking, bukan TTD

        if ($pengajuan->jenis_ttd === 'gambar') {
            // Gambar TTD - convert ke base64 langsung
            $ttdImagePath = public_path('assets/images/ttd.png');
            $ttdBase64 = file_exists($ttdImagePath) ? base64_encode(file_get_contents($ttdImagePath)) : null;

            $ttdData = [
                'jenis_ttd' => 'gambar',
                'ttd_base64' => $ttdBase64
            ];
        } elseif ($pengajuan->jenis_ttd === 'qrcode') {
            // QR Code TTD - convert gambar TTD ke QR code
            $ttdImagePath = public_path('assets/images/ttd.png');
            if (file_exists($ttdImagePath)) {
                try {
                    $qrCodeService = new \App\Services\QrCodeService();
                    $ttdBase64 = $qrCodeService->generateSuratQrCode($pengajuan);
                } catch (\Exception $e) {
                    \Log::error('Failed to generate QR TTD: ' . $e->getMessage());
                    $ttdBase64 = null;
                }
            } else {
                \Log::error('TTD image not found at: ' . $ttdImagePath);
                $ttdBase64 = null;
            }

            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $ttdBase64
            ];
        } else {
            // Manual TTD - kosong
            $ttdData = [
                'jenis_ttd' => 'manual',
                'ttd_base64' => null
            ];
        }// QR Code verifikasi surat dihapus - tidak diperlukan untuk surat bersih diri
        $qrCodeBase64 = null;

        // Prepare data for PDF using actual form data
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->translatedFormat('d F Y'),
            // 'qr_base64' => $qrCodeBase64, // Dihapus - tidak diperlukan
            'nama_ayah' => $data['nama_ayah'] ?? '-',
            'umur_ayah' => $data['umur_ayah'] ?? '-',
            'agama_ayah' => $data['agama_ayah'] ?? '-',
            'pekerjaan_ayah' => $data['pekerjaan_ayah'] ?? '-',
            'alamat_ayah' => $data['alamat_ayah'] ?? '-',
            'nama_ibu' => $data['nama_ibu'] ?? '-',
            'umur_ibu' => $data['umur_ibu'] ?? '-',
            'agama_ibu' => $data['agama_ibu'] ?? '-',
            'pekerjaan_ibu' => $data['pekerjaan_ibu'] ?? '-',
            'alamat_ibu' => $data['alamat_ibu'] ?? '-',
            'nama_anak' => $pengajuan->nama_lengkap ?? '-',
            'tempat_lahir_anak' => $data['tempat_lahir'] ?? '-',
            'tanggal_lahir_anak' => $data['tanggal_lahir'] ?? '-',
            'kebangsaan_anak' => $data['kebangsaan'] ?? 'Indonesia',
            'agama_anak' => $data['agama'] ?? '-',
            'pekerjaan_anak' => $data['pekerjaan'] ?? '-',
            'alamat_anak' => $pengajuan->alamat ?? '-',
            'keperluan' => $data['keperluan'] ?? $pengajuan->keperluan ?? 'Administrasi',
            'tempat_surat' => 'Ketapang Baru',
        ] + $this->getKepalaDesa() + [
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

        return $pdf->stream('Surat-Keterangan-Bersih-Diri-' . ($pengajuan->nama_lengkap ?? 'Unknown') . '.pdf');
    }

    public function generatePDFSPPD($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;

        // Use nomor surat from database if available, otherwise generate default
        $nomorSurat = $pengajuan->no_surat ?: sprintf('%03d', $pengajuanId);

        // Prepare TTD data based on jenis_ttd
        $ttdData = [];
        $qrTtdBase64 = null;
        $ttdBase64 = null;

        if ($pengajuan->jenis_ttd === 'gambar') {
            // Gambar TTD - convert ke base64
            $ttdImagePath = public_path('assets/images/ttd.png');
            if (file_exists($ttdImagePath)) {
                $ttdBase64 = base64_encode(file_get_contents($ttdImagePath));
            }
            $ttdData = [
                'jenis_ttd' => 'gambar',
                'ttd_base64' => $ttdBase64
            ];
        } elseif ($pengajuan->jenis_ttd === 'qrcode') {
            // QR Code TTD
            try {
                $qrCodeService = new \App\Services\QrCodeService();
                $qrTtdBase64 = $qrCodeService->generateSuratQrCode($pengajuan);
            } catch (\Exception $e) {
                \Log::error('Failed to generate QR TTD: ' . $e->getMessage());
                $qrTtdBase64 = null;
            }
            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $qrTtdBase64
            ];
        } else {
            $ttdData = [
                'jenis_ttd' => 'manual'
            ];
        }

        // Hitung total biaya perjalanan (jika ada)
        $biayaItems = $data['biaya'] ?? [];
        $totalBiaya = 0;
        if (is_array($biayaItems)) {
            foreach ($biayaItems as $row) {
                $totalBiaya += isset($row['jumlah']) ? (float) $row['jumlah'] : 0;
            }
        }

        // Prepare data for PDF - use correct field names from form
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'nama_lengkap' => $pengajuan->nama_lengkap ?? '-',
            'nik' => $pengajuan->nik ?? '-',
            'alamat' => $pengajuan->alamat ?? '-',
            'personel' => $data['personel'] ?? [],
            'tujuan' => $data['tujuan_perjalanan'] ?? $data['tujuan'] ?? '',
            'keperluan' => $data['maksud_perjalanan'] ?? $pengajuan->keperluan ?? $data['keperluan'] ?? '',
            'tanggal_berangkat' => $data['tanggal_berangkat'] ?? '',
            'tanggal_kembali' => $data['tanggal_kembali'] ?? '',
            'transportasi' => $data['kendaraan'] ?? $data['transportasi'] ?? '',
            'keterangan_tambahan' => $data['keterangan_tambahan'] ?? '',
            'tembusan' => $pengajuan->tembusan ?? '',
            'biaya_items' => $biayaItems,
            'biaya_total' => $totalBiaya,
        ] + $this->getKepalaDesa() + [
            'tracking_qr_code' => null,
            'tracking_number' => $pengajuan->tracking_number
        ] + $ttdData;

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

        return $pdf->stream('SPPD-' . date('Y-m-d') . '-' . $pengajuan->id . '.pdf');
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
                case 'ket_menikah':
                    return $this->handleSuratMenikah($request);
                case 'ket_miskin_dtks':
                    return $this->handleSuratMiskin($request);
                case 'ket_penghasilan_ortu':
                    return $this->handleSuratPenghasilanOrtu($request);
                case 'ket_usaha':
                    return $this->handleSuratUsaha($request);
                case 'surat_penduduk_desa':
                    return $this->handleSuratPendudukDesa($request);
                case 'izin_keramaian':
                case 'pengantar_akta_kelahiran':
                case 'pengantar_kk':
                case 'pengantar_nikah':
                    return $this->handlePengantarNikah($request);
                case 'surat_hibah':
                case 'perjanjian_perdamaian':
                case 'sppd':
                case 'surat_tidak_mampu':
                case 'surat_undangan':
                    return $this->handleGenericSurat($request, $request->jenis_surat);
                case 'surat_pindah':
                    return $this->handleSuratPindah($request);
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
            'nama_lengkap' => $user->nama_lengkap ?? $user->name ?? 'User',
            'nik' => $user->nik ?? '-',
            'no_hp' => $user->no_hp ?? '-',
            'alamat' => ($user->alamat ?? '-') . ($user->rt_rw ? ', RT/RW ' . $user->rt_rw : '') . ($user->dusun ? ', Dusun ' . $user->dusun : ''),
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
            // Data Ayah
            'nama_ayah' => 'required|string',
            'umur_ayah' => 'required|integer',
            'agama_ayah' => 'required|string',
            'pekerjaan_ayah' => 'required|string',
            'alamat_ayah' => 'required|string',
            // Data Ibu
            'nama_ibu' => 'required|string',
            'umur_ibu' => 'required|integer',
            'agama_ibu' => 'required|string',
            'pekerjaan_ibu' => 'required|string',
            'alamat_ibu' => 'required|string',
            // Data Anak (optional, bisa dari user login)
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'kebangsaan' => 'nullable|string',
            'agama' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
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
            'nama_lengkap' => $user->nama_lengkap ?? $user->name ?? 'User',
            'nik' => $user->nik ?? '-',
            'no_hp' => $user->no_hp ?? '-',
            'alamat' => ($user->alamat ?? '-') . ($user->rt_rw ? ', RT/RW ' . $user->rt_rw : '') . ($user->dusun ? ', Dusun ' . $user->dusun : ''),
            'jenis_surat' => 'surat_bersih_diri',
            'data_surat' => [
                // Data Ayah
                'nama_ayah' => $request->nama_ayah,
                'umur_ayah' => $request->umur_ayah,
                'agama_ayah' => $request->agama_ayah,
                'pekerjaan_ayah' => $request->pekerjaan_ayah,
                'alamat_ayah' => $request->alamat_ayah,
                // Data Ibu
                'nama_ibu' => $request->nama_ibu,
                'umur_ibu' => $request->umur_ibu,
                'agama_ibu' => $request->agama_ibu,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'alamat_ibu' => $request->alamat_ibu,
                // Data Anak - ambil dari user login jika tidak diisi
                'tempat_lahir' => $request->tempat_lahir ?? $user->tempat_lahir ?? '-',
                'tanggal_lahir' => $request->tanggal_lahir ?? ($user->tanggal_lahir ? $user->tanggal_lahir->format('Y-m-d') : '-'),
                'kebangsaan' => $request->kebangsaan ?? 'Indonesia',
                'agama' => $request->agama ?? $user->agama ?? '-',
                'pekerjaan' => $request->pekerjaan ?? $user->mata_pencaharian ?? '-',
                'keperluan' => $request->keperluan
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
            'keterangan_tambahan' => 'nullable|string',
            // Rincian biaya perjalanan dinas (opsional, bisa lebih dari 4 baris)
            'biaya' => 'nullable|array',
            'biaya.*.uraian' => 'required_with:biaya|string|max:255',
            'biaya.*.jumlah' => 'required_with:biaya|numeric|min:0',
            'biaya.*.ket' => 'nullable|string|max:255',
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
                'keterangan_tambahan' => $request->keterangan_tambahan,
                'biaya' => $request->biaya ?? [],
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
    public function verifySurat(Request $request, $trackingNumber)
    {
        // Validate signature - hanya bisa akses lewat QR code
        $signature = $request->query('sig');
        if (!$signature) {
            return view('verification.result', [
                'success' => false,
                'message' => 'Akses tidak valid. Silakan scan QR code pada surat untuk verifikasi.',
                'trackingNumber' => $trackingNumber
            ]);
        }
        
        $qrService = new \App\Services\QrCodeService();
        if (!$qrService->verifySignature($trackingNumber, $signature)) {
            return view('verification.result', [
                'success' => false,
                'message' => 'Signature tidak valid. Pastikan Anda mengakses melalui QR code yang tertera pada surat.',
                'trackingNumber' => $trackingNumber
            ]);
        }
        
        // Try to find by tracking_number column first
        $pengajuan = PengajuanSurat::where('tracking_number', $trackingNumber)->first();
        
        // If not found, try to extract ID from old format (SRT-YYYY-MM-XXXXX)
        if (!$pengajuan) {
            if (preg_match('/SRT-\d{4}-\d{2}-(\d+)/', $trackingNumber, $matches)) {
                $pengajuan = PengajuanSurat::find((int)$matches[1]);
            }
            // Try new format TRK000001YYYYMMDD
            elseif (preg_match('/TRK(\d{6})\d{8}/', $trackingNumber, $matches)) {
                $pengajuan = PengajuanSurat::find((int)$matches[1]);
            }
        }

        if (!$pengajuan) {
            return view('verification.result', [
                'success' => false,
                'message' => 'Surat tidak ditemukan atau nomor tracking tidak valid.',
                'trackingNumber' => $trackingNumber
            ]);
        }

        // Get TTD image path
        $ttdImagePath = public_path('assets/images/ttd.png');
        $ttdBase64 = null;
        if (file_exists($ttdImagePath)) {
            $ttdBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($ttdImagePath));
        }

        return view('verification.result', [
            'success' => true,
            'message' => 'Surat terverifikasi dengan valid.',
            'trackingNumber' => $trackingNumber,
            'pengajuan' => $pengajuan,
            'data' => [
                'nama' => $pengajuan->nama_lengkap,
                'nik' => $pengajuan->nik ?? '-',
                'jenis_surat' => $pengajuan->jenis_surat,
                'status' => $pengajuan->status,
                'tanggal_pengajuan' => $pengajuan->created_at->translatedFormat('d F Y'),
                'tanggal_disetujui' => $pengajuan->approved_at ? \Carbon\Carbon::parse($pengajuan->approved_at)->format('d F Y H:i') : '-',
                'waktu' => $pengajuan->created_at->format('H:i:s'),
                'kepala_desa' => 'Zultan Alhara',
                'ttd_base64' => $ttdBase64
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
                'nama_lengkap' => $user->nama_lengkap ?? $user->name,
                'nik' => $user->nik ?? '',
                'email' => $user->email,
                'no_telepon' => $user->no_hp ?? $user->phone ?? $user->no_telepon ?? '',
                'alamat' => $user->alamat ?? $user->address ?? '',
                'jenis_surat' => 'izin_keramaian',
                'keperluan' => $request->keperluan_acara,
                'lampiran' => $lampiranPath,
                'data_surat' => [
                    'keperluan_acara' => $request->keperluan_acara,
                ],
                'status' => 'Diajukan',
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
        $umur = '-';
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
            // Use QR Code TTD - QR code yang berisi gambar TTD
            $qrTtdBase64 = $pengajuan->data_surat['qr_ttd_base64'] ?? null;

            // Jika QR code TTD belum ada, generate sekarang
            if (!$qrTtdBase64) {
                try {
                    $qrCodeService = new \App\Services\QrCodeService();
                    $qrTtdBase64 = $qrCodeService->generateSuratQrCode($pengajuan);
                } catch (\Exception $e) {
                    \Log::error('Failed to generate QR TTD: ' . $e->getMessage());
                    $qrTtdBase64 = null;
                }
            }

            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $qrTtdBase64,
                'verification_url' => $pengajuan->data_surat['verification_url'] ?? null
            ];
        } elseif ($pengajuan->jenis_ttd === 'gambar') {
            // Use regular TTD - gambar TTD langsung
            $ttdData = [
                'jenis_ttd' => 'gambar',
                'ttd_base64' => file_exists(public_path('assets/images/ttd.png')) ? base64_encode(file_get_contents(public_path('assets/images/ttd.png'))) : null
            ];
        } else {
            // Manual TTD - tidak ada gambar atau QR code
            $ttdData = [
                'jenis_ttd' => 'manual'
            ];
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->translatedFormat('d F Y'),
        ] + $this->getKepalaDesa() + [
            'nama_pemohon' => $pengajuan->nama_lengkap ?? '-',
            'nik_pemohon' => $user->nik ?? '-',
            'umur_pemohon' => $umur,
            'alamat_pemohon' => $pengajuan->alamat ?? 'Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma',
            'keperluan_acara' => $data['keperluan_acara'] ?? $pengajuan->keperluan ?? '',
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

        return $pdf->stream('Surat-Izin-Keramaian-' . $pengajuan->nama_lengkap . '.pdf');
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
                'lampiran' => $lampiranPath,
                'data_surat' => [
                    'keperluan' => $request->keperluan,
                ],
                'status' => 'Diajukan',
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
            // Use QR Code TTD - QR code yang berisi gambar TTD
            $qrTtdBase64 = $pengajuan->data_surat['qr_ttd_base64'] ?? null;

            // Jika QR code TTD belum ada, generate sekarang
            if (!$qrTtdBase64) {
                try {
                    $qrCodeService = new \App\Services\QrCodeService();
                    $qrTtdBase64 = $qrCodeService->generateSuratQrCode($pengajuan);
                } catch (\Exception $e) {
                    \Log::error('Failed to generate QR TTD: ' . $e->getMessage());
                    $qrTtdBase64 = null;
                }
            }

            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $qrTtdBase64,
                'verification_url' => $pengajuan->data_surat['verification_url'] ?? null
            ];
        } elseif ($pengajuan->jenis_ttd === 'gambar') {
            // Use regular TTD - gambar TTD langsung
            $ttdData = [
                'jenis_ttd' => 'gambar',
                'ttd_base64' => file_exists(public_path('assets/images/ttd.png')) ? base64_encode(file_get_contents(public_path('assets/images/ttd.png'))) : null
            ];
        } else {
            // Manual TTD - tidak ada gambar atau QR code
            $ttdData = [
                'jenis_ttd' => 'manual'
            ];
        }

        // Format jenis kelamin
        $jenisKelamin = '-';
        if ($user && $user->jenis_kelamin) {
            $jenisKelamin = ($user->jenis_kelamin === 'L' || $user->jenis_kelamin === 'Laki-laki') ? 'Laki - Laki' : 'Perempuan';
        }

        // Format tanggal lahir
        $tanggalLahir = '-';
        if ($user && $user->tanggal_lahir) {
            $tanggalLahir = \Carbon\Carbon::parse($user->tanggal_lahir)->translatedFormat('d F Y');
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->translatedFormat('d F Y'),
        ] + $this->getKepalaDesa() + [
            'nama_pemohon' => $user->nama_lengkap ?? $pengajuan->nama_lengkap,
            'nik_pemohon' => $user->nik ?? '-',
            'tempat_lahir' => $user->tempat_lahir ?? '-',
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'agama' => $user->agama ?? '-',
            'pekerjaan' => $user->pekerjaan ?? $user->mata_pencaharian ?? '-',
            'status_perkawinan' => $user->status_perkawinan ?? 'Belum Menikah',
            'alamat' => $user->alamat ?? $pengajuan->alamat ?? 'Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma.',
            'keperluan' => $pengajuan->keperluan ?? $data['keperluan'] ?? '',
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

        return $pdf->stream('Surat-Keterangan-Belum-Menikah-' . $pengajuan->nama_lengkap . '.pdf');
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
                'status' => 'Diajukan',
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
                'status' => 'Diajukan',
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

    public function handleSuratPindah(Request $request)
    {
        // Validasi data request
        $request->validate([
            'alasan_pindah' => 'required|string',
            'tanggal_pindah' => 'required|date',
            'alamat_tujuan' => 'required|string',
            'jenis_pindah' => 'required|string',
            'keperluan' => 'nullable|string',
            'nama_camat' => 'nullable|string',
            'nip_camat' => 'nullable|string',
            'pengikut' => 'nullable|array',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
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

            // Build data_surat
            $dataSurat = [
                'alasan_pindah' => $request->alasan_pindah,
                'tanggal_pindah' => $request->tanggal_pindah,
                'alamat_tujuan' => $request->alamat_tujuan,
                'jenis_pindah' => $request->jenis_pindah,
                'keperluan' => $request->keperluan,
                'nama_camat' => $request->nama_camat,
                'nip_camat' => $request->nip_camat,
                'pengikut' => $request->pengikut ?? [],
            ];

            // Create pengajuan surat
            $pengajuan = PengajuanSurat::create([
                'nama_lengkap' => $user->nama_lengkap ?? $user->name,
                'email' => $user->email,
                'no_telepon' => $user->no_hp ?? $user->phone ?? '',
                'alamat' => $user->alamat ?? $user->address ?? '',
                'jenis_surat' => 'surat_pindah',
                'keperluan' => $request->keperluan ?? 'Untuk keperluan administrasi kependudukan',
                'lampiran' => $lampiranPath,
                'status' => 'Diajukan',
                'tracking_number' => $trackingNumber,
                'user_id' => $user->id,
                'data_surat' => $dataSurat,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pengajuan Surat Keterangan Pindah berhasil disubmit!',
                'tracking_number' => $trackingNumber,
                'pengajuan_id' => $pengajuan->id
            ]);

        } catch (\Exception $e) {
            Log::error('Error in handleSuratPindah: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    public function handleSuratUsaha(Request $request)
    {
        // Validasi data request
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'jenis_usaha' => 'required|string|max:255',
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
                'jenis_surat' => 'ket_usaha',
                'keperluan' => 'Pengajuan Surat Keterangan Usaha - ' . $request->nama_usaha,
                'lampiran' => $lampiranPath,
                'status' => 'Diajukan',
                'tracking_number' => $trackingNumber,
                'user_id' => $user->id,
                'data_surat' => [
                    'nama_usaha' => $request->nama_usaha,
                    'jenis_usaha' => $request->jenis_usaha,
                ],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pengajuan Surat Keterangan Usaha berhasil disubmit!',
                'tracking_number' => $trackingNumber,
                'pengajuan_id' => $pengajuan->id
            ]);

        } catch (\Exception $e) {
            Log::error('Error in handleSuratUsaha: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    public function handleSuratPendudukDesa(Request $request)
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
                'jenis_surat' => 'surat_penduduk_desa',
                'keperluan' => $request->keperluan,
                'lampiran' => $lampiranPath,
                'status' => 'Diajukan',
                'tracking_number' => $trackingNumber,
                'user_id' => $user->id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pengajuan Surat Keterangan Penduduk Desa berhasil disubmit!',
                'tracking_number' => $trackingNumber,
                'pengajuan_id' => $pengajuan->id
            ]);

        } catch (\Exception $e) {
            Log::error('Error in handleSuratPendudukDesa: ' . $e->getMessage());
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
            // Use QR Code TTD - QR code yang berisi gambar TTD
            $qrTtdBase64 = $pengajuan->data_surat['qr_ttd_base64'] ?? null;

            // Jika QR code TTD belum ada, generate sekarang
            if (!$qrTtdBase64) {
                try {
                    $qrCodeService = new \App\Services\QrCodeService();
                    $qrTtdBase64 = $qrCodeService->generateSuratQrCode($pengajuan);
                } catch (\Exception $e) {
                    \Log::error('Failed to generate QR TTD: ' . $e->getMessage());
                    $qrTtdBase64 = null;
                }
            }

            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $qrTtdBase64,
                'verification_url' => $pengajuan->data_surat['verification_url'] ?? null
            ];
        } elseif ($pengajuan->jenis_ttd === 'gambar') {
            // Use regular TTD - gambar TTD langsung
            $ttdData = [
                'jenis_ttd' => 'gambar',
                'ttd_base64' => file_exists(public_path('assets/images/ttd.png')) ? base64_encode(file_get_contents(public_path('assets/images/ttd.png'))) : null
            ];
        } else {
            // Manual TTD - tidak ada gambar atau QR code
            $ttdData = [
                'jenis_ttd' => 'manual'
            ];
        }

        // Format jenis kelamin
        $jenisKelamin = '-';
        if ($user && $user->jenis_kelamin) {
            $jenisKelamin = ($user->jenis_kelamin === 'L' || $user->jenis_kelamin === 'Laki-laki') ? 'Laki-laki' : 'Perempuan';
        }

        // Format tanggal lahir
        $tanggalLahir = '-';
        if ($user && $user->tanggal_lahir) {
            $tanggalLahir = \Carbon\Carbon::parse($user->tanggal_lahir)->translatedFormat('d F Y');
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->translatedFormat('d F Y'),
        ] + $this->getKepalaDesa() + [
            'nama_pemohon' => $user->nama_lengkap ?? $pengajuan->nama_lengkap,
            'nik_pemohon' => $user->nik ?? '-',
            'tempat_lahir' => $user->tempat_lahir ?? '-',
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'agama' => $user->agama ?? '-',
            'pekerjaan' => $user->pekerjaan ?? '-',
            'alamat' => $user->alamat ?? $pengajuan->alamat ?? 'Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma.',
            'keperluan' => $pengajuan->keperluan ?? $data['keperluan'] ?? '',
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

        return $pdf->stream('Surat-Keterangan-Berkelakuan-Baik-' . $pengajuan->nama_lengkap . '.pdf');
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
            // Use QR Code TTD - QR code yang berisi gambar TTD
            $qrTtdBase64 = $pengajuan->data_surat['qr_ttd_base64'] ?? null;

            // Jika QR code TTD belum ada, generate sekarang
            if (!$qrTtdBase64) {
                try {
                    $qrCodeService = new \App\Services\QrCodeService();
                    $qrTtdBase64 = $qrCodeService->generateSuratQrCode($pengajuan);
                } catch (\Exception $e) {
                    \Log::error('Failed to generate QR TTD: ' . $e->getMessage());
                    $qrTtdBase64 = null;
                }
            }

            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $qrTtdBase64,
                'verification_url' => $pengajuan->data_surat['verification_url'] ?? null
            ];
        } elseif ($pengajuan->jenis_ttd === 'gambar') {
            // Use regular TTD - gambar TTD langsung
            $ttdData = [
                'jenis_ttd' => 'gambar',
                'ttd_base64' => file_exists(public_path('assets/images/ttd.png')) ? base64_encode(file_get_contents(public_path('assets/images/ttd.png'))) : null
            ];
        } else {
            // Manual TTD - tidak ada gambar atau QR code
            $ttdData = [
                'jenis_ttd' => 'manual'
            ];
        }

        // Format jenis kelamin
        $jenisKelamin = '-';
        if ($user && $user->jenis_kelamin) {
            $jenisKelamin = ($user->jenis_kelamin === 'L' || $user->jenis_kelamin === 'Laki-laki') ? 'Laki-laki' : 'Perempuan';
        }

        // Format tanggal lahir
        $tanggalLahir = '-';
        if ($user && $user->tanggal_lahir) {
            $tanggalLahir = \Carbon\Carbon::parse($user->tanggal_lahir)->translatedFormat('d F Y');
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->translatedFormat('d F Y'),
        ] + $this->getKepalaDesa() + [
            'nama_pemohon' => $user->nama_lengkap ?? $pengajuan->nama_lengkap,
            'nik_pemohon' => $user->nik ?? '-',
            'tempat_lahir' => $user->tempat_lahir ?? '-',
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'agama' => $user->agama ?? '-',
            'status_perkawinan' => $user->status_perkawinan ?? 'Belum Kawin',
            'pekerjaan' => $user->pekerjaan ?? '-',
            'alamat' => $user->alamat ?? $pengajuan->alamat ?? 'Karang Dapo, Kecamatan Semidang Alas Maras, Kabupaten Seluma.',
            'keperluan' => $pengajuan->keperluan ?? $data['keperluan'] ?? '',
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

        return $pdf->stream('Surat-Keterangan-Domisili-' . $pengajuan->nama_lengkap . '.pdf');
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
            // Use QR Code TTD - QR code yang berisi gambar TTD
            $qrTtdBase64 = $pengajuan->data_surat['qr_ttd_base64'] ?? null;

            // Jika QR code TTD belum ada, generate sekarang
            if (!$qrTtdBase64) {
                try {
                    $qrCodeService = new \App\Services\QrCodeService();
                    $qrTtdBase64 = $qrCodeService->generateSuratQrCode($pengajuan);
                } catch (\Exception $e) {
                    \Log::error('Failed to generate QR TTD: ' . $e->getMessage());
                    $qrTtdBase64 = null;
                }
            }

            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $qrTtdBase64,
                'verification_url' => $pengajuan->data_surat['verification_url'] ?? null
            ];
        } elseif ($pengajuan->jenis_ttd === 'gambar') {
            // Use regular TTD - gambar TTD langsung
            $ttdData = [
                'jenis_ttd' => 'gambar',
                'ttd_base64' => file_exists(public_path('assets/images/ttd.png')) ? base64_encode(file_get_contents(public_path('assets/images/ttd.png'))) : null
            ];
        } else {
            // Manual TTD - tidak ada gambar atau QR code
            $ttdData = [
                'jenis_ttd' => 'manual'
            ];
        }

        // Format jenis kelamin
        $jenisKelamin = '-';
        if ($user && $user->jenis_kelamin) {
            $jenisKelamin = ($user->jenis_kelamin === 'L' || $user->jenis_kelamin === 'Laki-laki') ? 'Laki-laki' : 'Perempuan';
        }

        // Format tanggal lahir
        $tanggalLahir = '-';
        if ($user && $user->tanggal_lahir) {
            $tanggalLahir = \Carbon\Carbon::parse($user->tanggal_lahir)->translatedFormat('d F Y');
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->translatedFormat('d F Y'),
        ] + $this->getKepalaDesa() + [
            'nama_pemohon' => $user->nama_lengkap ?? $pengajuan->nama_lengkap,
            'nik_pemohon' => $user->nik ?? '-',
            'tempat_lahir' => $user->tempat_lahir ?? '-',
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'agama' => $user->agama ?? '-',
            'pekerjaan' => $user->pekerjaan ?? '-',
            'alamat' => 'Desa Ketapang Baru, Kec. Semidang Alas Maras Kab. Seluma.',
            'nama_usaha' => $data['nama_usaha'] ?? '-',
            'jenis_usaha' => $data['jenis_usaha'] ?? '-',
            'alamat_usaha' => $data['alamat_usaha'] ?? '-',
            'modal_usaha' => $data['modal_usaha'] ?? '-',
            'mulai_usaha' => $data['mulai_usaha'] ?? '-',
            'jumlah_karyawan' => $data['jumlah_karyawan'] ?? null,
            'keperluan' => $pengajuan->keperluan ?? $data['keperluan'] ?? '',
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

        return $pdf->stream('Surat-Keterangan-Usaha-' . $pengajuan->nama_lengkap . '.pdf');
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
            // Use QR Code TTD - QR code yang berisi gambar TTD
            $qrTtdBase64 = $pengajuan->data_surat['qr_ttd_base64'] ?? null;

            // Jika QR code TTD belum ada, generate sekarang
            if (!$qrTtdBase64) {
                try {
                    $qrCodeService = new \App\Services\QrCodeService();
                    $qrTtdBase64 = $qrCodeService->generateSuratQrCode($pengajuan);
                } catch (\Exception $e) {
                    \Log::error('Failed to generate QR TTD: ' . $e->getMessage());
                    $qrTtdBase64 = null;
                }
            }

            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $qrTtdBase64,
                'verification_url' => $pengajuan->data_surat['verification_url'] ?? null
            ];
        } elseif ($pengajuan->jenis_ttd === 'gambar') {
            // Use regular TTD - gambar TTD langsung
            $ttdData = [
                'jenis_ttd' => 'gambar',
                'ttd_base64' => file_exists(public_path('assets/images/ttd.png')) ? base64_encode(file_get_contents(public_path('assets/images/ttd.png'))) : null
            ];
        } else {
            // Manual TTD - tidak ada gambar atau QR code
            $ttdData = [
                'jenis_ttd' => 'manual'
            ];
        }

        // Format jenis kelamin
        $jenisKelamin = '-';
        if ($user && $user->jenis_kelamin) {
            $jenisKelamin = ($user->jenis_kelamin === 'L' || $user->jenis_kelamin === 'Laki-laki') ? 'Laki-laki' : 'Perempuan';
        }

        // Format tanggal lahir
        $tanggalLahir = '-';
        if ($user && $user->tanggal_lahir) {
            $tanggalLahir = \Carbon\Carbon::parse($user->tanggal_lahir)->translatedFormat('d F Y');
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->translatedFormat('d F Y'),
        ] + $this->getKepalaDesa() + [
            'nama_pemohon' => $user->nama_lengkap ?? $pengajuan->nama_lengkap,
            'nik_pemohon' => $user->nik ?? '-',
            'tempat_lahir' => $user->tempat_lahir ?? '-',
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'agama' => $user->agama ?? '-',
            'status_perkawinan' => $user->status_perkawinan ?? 'Belum Kawin',
            'pekerjaan' => $user->pekerjaan ?? '-',
            'alamat' => $user->alamat ?? $pengajuan->alamat ?? 'Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma.',
            'penghasilan_perbulan' => $data['penghasilan_perbulan'] ?? null,
            'jumlah_tanggungan' => $data['jumlah_tanggungan'] ?? null,
            'keperluan' => $pengajuan->keperluan ?? $data['keperluan'] ?? '',
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

        return $pdf->stream('Surat-Keterangan-Tidak-Mampu-' . $pengajuan->nama_lengkap . '.pdf');
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
                'lampiran' => $lampiranPath,
                'data_surat' => [
                    'nama_almarhum' => $request->nama_almarhum,
                    'hari_kematian' => $request->hari_kematian,
                    'tanggal_kematian' => $request->tanggal_kematian,
                    'tempat_kematian' => $request->tempat_kematian,
                    'sebab_kematian' => $request->sebab_kematian,
                ],
                'status' => 'Diajukan',
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
            // Use QR Code TTD - QR code yang berisi gambar TTD
            $qrTtdBase64 = $pengajuan->data_surat['qr_ttd_base64'] ?? null;

            // Jika QR code TTD belum ada, generate sekarang
            if (!$qrTtdBase64) {
                try {
                    $qrCodeService = new \App\Services\QrCodeService();
                    $qrTtdBase64 = $qrCodeService->generateSuratQrCode($pengajuan);
                } catch (\Exception $e) {
                    \Log::error('Failed to generate QR TTD: ' . $e->getMessage());
                    $qrTtdBase64 = null;
                }
            }

            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $qrTtdBase64,
                'verification_url' => $pengajuan->data_surat['verification_url'] ?? null
            ];
        } elseif ($pengajuan->jenis_ttd === 'gambar') {
            // Use regular TTD - gambar TTD langsung
            $ttdData = [
                'jenis_ttd' => 'gambar',
                'ttd_base64' => file_exists(public_path('assets/images/ttd.png')) ? base64_encode(file_get_contents(public_path('assets/images/ttd.png'))) : null
            ];
        } else {
            // Manual TTD - tidak ada gambar atau QR code
            $ttdData = [
                'jenis_ttd' => 'manual'
            ];
        }

        // Format jenis kelamin
        $jenisKelamin = '-';
        if ($user && $user->jenis_kelamin) {
            $jenisKelamin = ($user->jenis_kelamin === 'L' || $user->jenis_kelamin === 'Laki-laki') ? 'Laki-Laki' : 'Perempuan';
        }

        // Format tanggal lahir
        $tanggalLahir = '-';
        if ($user && $user->tanggal_lahir) {
            $tanggalLahir = \Carbon\Carbon::parse($user->tanggal_lahir)->translatedFormat('d F Y');
        }

        // Calculate age
        $umur = '-';
        if ($user && $user->tanggal_lahir) {
            $umur = \Carbon\Carbon::parse($user->tanggal_lahir)->age;
        }

        // Format tanggal kematian
        $tanggalKematian = '-';
        if (isset($data['tanggal_kematian'])) {
            $tanggalKematian = \Carbon\Carbon::parse($data['tanggal_kematian'])->translatedFormat('d F Y');
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->translatedFormat('d F Y'),
        ] + $this->getKepalaDesa() + [
            // Data Pemohon
            'nama_pemohon' => $user->nama_lengkap ?? $pengajuan->nama_lengkap,
            'nik_pemohon' => $user->nik ?? '-',
            'nkk_pemohon' => $user->nkk ?? '-',
            'jenis_kelamin_pemohon' => $jenisKelamin,
            'tempat_lahir_pemohon' => $user->tempat_lahir ?? '-',
            'tanggal_lahir_pemohon' => $tanggalLahir,
            'umur_pemohon' => $umur,
            'alamat_pemohon' => $user->alamat ?? $pengajuan->alamat ?? 'Desa Ketapang Baru, Kec. SAM, Kab. Seluma',
            // Data Almarhum/Almarhumah
            'nama_almarhum' => $data['nama_almarhum'] ?? '-',
            'hari_kematian' => $data['hari_kematian'] ?? '-',
            'tanggal_kematian' => $tanggalKematian,
            'tempat_kematian' => $data['tempat_kematian'] ?? '-',
            'sebab_kematian' => $data['sebab_kematian'] ?? '-',
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

        return $pdf->stream('Surat-Keterangan-Kematian-' . $pengajuan->nama_lengkap . '.pdf');
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
                'jenis_surat' => 'ket_menikah',
                'keperluan' => 'Surat Keterangan Menikah',
                'lampiran' => $lampiranPath,
                'data_surat' => [
                    'tanggal_menikah' => $request->tanggal_menikah,
                ],
                'status' => 'Diajukan',
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
            // Use QR Code TTD - QR code yang berisi gambar TTD
            $qrTtdBase64 = $pengajuan->data_surat['qr_ttd_base64'] ?? null;

            // Jika QR code TTD belum ada, generate sekarang
            if (!$qrTtdBase64) {
                try {
                    $qrCodeService = new \App\Services\QrCodeService();
                    $qrTtdBase64 = $qrCodeService->generateSuratQrCode($pengajuan);
                } catch (\Exception $e) {
                    \Log::error('Failed to generate QR TTD: ' . $e->getMessage());
                    $qrTtdBase64 = null;
                }
            }

            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $qrTtdBase64,
                'verification_url' => $pengajuan->data_surat['verification_url'] ?? null
            ];
        } elseif ($pengajuan->jenis_ttd === 'gambar') {
            // Use regular TTD - gambar TTD langsung
            $ttdData = [
                'jenis_ttd' => 'gambar',
                'ttd_base64' => file_exists(public_path('assets/images/ttd.png')) ? base64_encode(file_get_contents(public_path('assets/images/ttd.png'))) : null
            ];
        } else {
            // Manual TTD - tidak ada gambar atau QR code
            $ttdData = [
                'jenis_ttd' => 'manual'
            ];
        }

        // Format jenis kelamin
        $jenisKelamin = '-';
        if ($user && $user->jenis_kelamin) {
            $jenisKelamin = ($user->jenis_kelamin === 'L' || $user->jenis_kelamin === 'Laki-laki') ? 'Laki-Laki' : 'Perempuan';
        }

        // Format tanggal lahir
        $tanggalLahir = '-';
        if ($user && $user->tanggal_lahir) {
            $tanggalLahir = \Carbon\Carbon::parse($user->tanggal_lahir)->translatedFormat('d F Y');
        }

        // Format tanggal menikah
        $tanggalMenikah = '-';
        if (isset($data['tanggal_menikah'])) {
            $tanggalMenikah = \Carbon\Carbon::parse($data['tanggal_menikah'])->translatedFormat('d F Y');
        }

        // Format dusun from users table
        $dusun = '-';
        if ($user && $user->dusun) {
            $dusun = $user->dusun;
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->translatedFormat('d F Y'),
        ] + $this->getKepalaDesa() + [
            // Data User dari users table
            'nama' => $user->nama_lengkap ?? $pengajuan->nama_lengkap,
            'nik' => $user->nik ?? '-',
            'tempat_lahir' => $user->tempat_lahir ?? '-',
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'agama' => $user->agama ?? '-',
            'pekerjaan' => $user->pekerjaan ?? '-',
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

        return $pdf->stream('Surat-Keterangan-Menikah-' . $pengajuan->nama_lengkap . '.pdf');
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
                'jenis_surat' => 'ket_miskin_dtks',
                'keperluan' => 'Surat Keterangan Miskin DTKS untuk ' . $request->keperluan,
                'lampiran' => $lampiranPath,
                'data_surat' => [
                    'keperluan' => $request->keperluan,
                ],
                'status' => 'Diajukan',
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
                'ttd_base64' => file_exists(public_path('assets/images/ttd.png')) ? base64_encode(file_get_contents(public_path('assets/images/ttd.png'))) : null
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
        $jenisKelamin = '-';
        if ($user && $user->jenis_kelamin) {
            $jenisKelamin = ($user->jenis_kelamin === 'L' || $user->jenis_kelamin === 'Laki-laki') ? 'Laki-Laki' : 'Perempuan';
        }

        // Format tanggal lahir
        $tanggalLahir = '-';
        if ($user && $user->tanggal_lahir) {
            $tanggalLahir = \Carbon\Carbon::parse($user->tanggal_lahir)->translatedFormat('d F Y');
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->translatedFormat('d F Y'),
        ] + $this->getKepalaDesa() + [
            // Data dari admin input
            'nip' => $pengajuan->nip ?? null,
            'pangkat_golongan' => $pengajuan->pangkat_golongan ?? null,
            'nama_camat' => $pengajuan->nama_camat ?? null,
            'nip_camat' => $pengajuan->nip_camat ?? null,
            // Data User dari users table
            'nama' => $user->nama_lengkap ?? $pengajuan->nama_lengkap,
            'tempat_lahir' => $user->tempat_lahir ?? '-',
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'status_perkawinan' => $user->status_perkawinan ?? 'Belum Kawin',
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

        return $pdf->stream('Surat-Keterangan-Miskin-' . $pengajuan->nama_lengkap . '.pdf');
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
                'jenis_surat' => 'ket_penghasilan_ortu',
                'keperluan' => 'Surat Keterangan Penghasilan Orang Tua untuk Keperluan Administrasi',
                'lampiran' => $lampiranPath,
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
                'status' => 'Diajukan',
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
                'ttd_base64' => file_exists(public_path('assets/images/ttd.png')) ? base64_encode(file_get_contents(public_path('assets/images/ttd.png'))) : null
            ];
        }

        // Format jenis kelamin
        $jenisKelamin = '-';
        if ($user && $user->jenis_kelamin) {
            $jenisKelamin = ($user->jenis_kelamin === 'L' || $user->jenis_kelamin === 'Laki-laki') ? 'Laki-Laki' : 'Perempuan';
        }

        // Format tanggal lahir user
        $tanggalLahir = '-';
        if ($user && $user->tanggal_lahir) {
            $tanggalLahir = \Carbon\Carbon::parse($user->tanggal_lahir)->translatedFormat('d F Y');
        }

        // Format tanggal lahir ayah
        $tanggalLahirAyah = '-';
        if (isset($data['tanggal_lahir_ayah'])) {
            $tanggalLahirAyah = \Carbon\Carbon::parse($data['tanggal_lahir_ayah'])->translatedFormat('d F Y');
        }

        // Format tanggal lahir ibu
        $tanggalLahirIbu = '-';
        if (isset($data['tanggal_lahir_ibu'])) {
            $tanggalLahirIbu = \Carbon\Carbon::parse($data['tanggal_lahir_ibu'])->translatedFormat('d F Y');
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->translatedFormat('d F Y'),
        ] + $this->getKepalaDesa() + [
            // Data User (Anak)
            'nama' => $user->nama_lengkap ?? $pengajuan->nama_lengkap,
            'tempat_lahir' => $user->tempat_lahir ?? '-',
            'tanggal_lahir' => $tanggalLahir,
            'jenis_kelamin' => $jenisKelamin,
            'pekerjaan' => $user->pekerjaan ?? 'Pelajar/Mahasiswi',
            'alamat' => $user->alamat ?? $pengajuan->alamat ?? 'Desa Ketapang Baru, Kec. Semidang Alas Maras, Kab. Seluma',
            // Data Ayah
            'nama_ayah' => $data['nama_ayah'] ?? '-',
            'tempat_lahir_ayah' => $data['tempat_lahir_ayah'] ?? '-',
            'tanggal_lahir_ayah' => $tanggalLahirAyah,
            'agama_ayah' => $data['agama_ayah'] ?? 'Islam',
            'pekerjaan_ayah' => $data['pekerjaan_ayah'] ?? '-',
            'penghasilan_ayah' => $data['penghasilan_ayah'] ?? 0,
            'alamat_ayah' => $data['alamat_ayah'] ?? 'Desa Ketapang Baru, Kec. Semidang Alas Maras, Kab. Seluma',
            // Data Ibu
            'nama_ibu' => $data['nama_ibu'] ?? '-',
            'tempat_lahir_ibu' => $data['tempat_lahir_ibu'] ?? '-',
            'tanggal_lahir_ibu' => $tanggalLahirIbu,
            'agama_ibu' => $data['agama_ibu'] ?? 'Islam',
            'pekerjaan_ibu' => $data['pekerjaan_ibu'] ?? '-',
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

        return $pdf->stream('Surat-Keterangan-Penghasilan-Orang-Tua-' . $pengajuan->nama_lengkap . '.pdf');
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
        $pemohonTempatTanggal = $data['tempat_tanggal_lahir'] ?? ($user->tempat_lahir . ', ' . ($user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->translatedFormat('d F Y') : '-'));
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
        $ayahWarga = $data['ayah_warga_negara'] ?? 'Indonesia';
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

        // Prepare TTD data based on jenis_ttd
        $ttdData = [];
        if ($pengajuan->jenis_ttd === 'qrcode') {
            // Use QR Code TTD - QR code yang berisi gambar TTD
            $qrTtdBase64 = $pengajuan->data_surat['qr_ttd_base64'] ?? null;

            // Jika QR code TTD belum ada, generate sekarang
            if (!$qrTtdBase64) {
                try {
                    $qrCodeService = new \App\Services\QrCodeService();
                    $qrTtdBase64 = $qrCodeService->generateSuratQrCode($pengajuan);
                } catch (\Exception $e) {
                    \Log::error('Failed to generate QR TTD: ' . $e->getMessage());
                    $qrTtdBase64 = null;
                }
            }

            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $qrTtdBase64,
                'verification_url' => $pengajuan->data_surat['verification_url'] ?? null
            ];
        } elseif ($pengajuan->jenis_ttd === 'gambar') {
            // Use regular TTD - gambar TTD langsung
            $ttdData = [
                'jenis_ttd' => 'gambar',
                'ttd_base64' => file_exists(public_path('assets/images/ttd.png')) ? base64_encode(file_get_contents(public_path('assets/images/ttd.png'))) : null
            ];
        } else {
            // Manual TTD - tidak ada gambar atau QR code
            $ttdData = [
                'jenis_ttd' => 'manual'
            ];
        }

        $pdfData = [
            'nomor_surat' => $nomorSurat,
            'tanggal_surat' => now()->translatedFormat('d F Y'),
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
            'ayah_bin' => $data['ayah_bin'] ?? '-',
            'ayah_tempat_tanggal_lahir' => $ayahTempatTanggal,
            'ayah_warga_negara' => $ayahWarga,
            'ayah_agama' => $ayahAgama,
            'ayah_pekerjaan' => $ayahPekerjaan,
            'ayah_alamat' => $ayahAlamat,

            // Ibu Kandung - Data ibu dari pemohon (bukan calon istri)
            // Admin form menggunakan field wanita_* untuk data ibu
            'ibu_nama' => $data['ibu_nama'] ?? $data['wanita_nama'] ?? $data['nama_ibu'] ?? '-',
            'ibu_nik' => $data['ibu_nik'] ?? $data['wanita_nik'] ?? $data['nik_ibu'] ?? '-',
            'ibu_bin' => $data['ibu_bin'] ?? '-',
            'ibu_tempat_tanggal_lahir' => $data['ibu_tempat_tanggal_lahir'] ?? $data['wanita_tempat_tanggal_lahir'] ??
                (
                    isset($data['tempat_lahir_ibu']) || isset($data['tanggal_lahir_ibu'])
                    ? ($data['tempat_lahir_ibu'] ?? '-') . ', ' .
                      ($data['tanggal_lahir_ibu'] ? \Carbon\Carbon::parse($data['tanggal_lahir_ibu'])->translatedFormat('d F Y') : '-')
                    : '-'
                ),
            'ibu_warga_negara' => $data['ibu_warga_negara'] ?? $data['wanita_warga_negara'] ?? $data['kewarganegaraan_ibu'] ?? 'WNI',
            'ibu_agama' => $data['ibu_agama'] ?? $data['wanita_agama'] ?? $data['agama_ibu'] ?? '-',
            'ibu_pekerjaan' => $data['ibu_pekerjaan'] ?? $data['wanita_pekerjaan'] ?? $data['pekerjaan_ibu'] ?? '-',
            'ibu_alamat' => $data['ibu_alamat'] ?? $data['wanita_alamat'] ?? $data['alamat_ibu'] ?? '-',

            // Wanita (pasangan) - Legacy field untuk backward compatibility
            'wanita_nama' => $wanitaNama,
            'wanita_nik' => $wanitaNik,
            'wanita_tempat_tanggal_lahir' => $wanitaTempatTanggal,
            'wanita_warga_negara' => $wanitaWarga,
            'wanita_agama' => $wanitaAgama,
            'wanita_pekerjaan' => $wanitaPekerjaan,
            'wanita_alamat' => $wanitaAlamat,

            // Calon Istri Data - Mapping dari form user (wanita_*) ke PDF (calon_istri_*)
            'calon_istri_nama' => $data['calon_istri_nama'] ?? $data['wanita_nama'] ?? '-',
            'calon_istri_bin' => $data['calon_istri_bin'] ?? $data['ibu_bin'] ?? '-',
            'calon_istri_nik' => $data['calon_istri_nik'] ?? $data['wanita_nik'] ?? '-',
            'calon_istri_tempat_tanggal_lahir' => $data['calon_istri_tempat_tanggal_lahir'] ?? $data['wanita_tempat_tanggal_lahir'] ?? '-',
            'calon_istri_warga_negara' => $data['calon_istri_warga_negara'] ?? $data['wanita_warga_negara'] ?? 'Indonesia',
            'calon_istri_agama' => $data['calon_istri_agama'] ?? $data['wanita_agama'] ?? '-',
            'calon_istri_pekerjaan' => $data['calon_istri_pekerjaan'] ?? $data['wanita_pekerjaan'] ?? '-',
            'calon_istri_alamat' => $data['calon_istri_alamat'] ?? $data['wanita_alamat'] ?? '-',
        ] + $this->getKepalaDesa() + [
            'tembusan' => $pengajuan->tembusan ?? []
        ] + $ttdData;

        $pdf = Pdf::loadView('pdf.surat-pengantar-nikah', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions(['enable-local-file-access' => true]);

        return $pdf->stream('Surat-Pengantar-Nikah-' . Str::slug($pemohonNama) . '.pdf');
    }

    public function generatePDFHibah($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;

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
            // Use QR Code TTD - QR code yang berisi gambar TTD
            $qrTtdBase64 = $pengajuan->data_surat['qr_ttd_base64'] ?? null;

            // Jika QR code TTD belum ada, generate sekarang
            if (!$qrTtdBase64) {
                try {
                    $qrCodeService = new \App\Services\QrCodeService();
                    $qrTtdBase64 = $qrCodeService->generateSuratQrCode($pengajuan);
                } catch (\Exception $e) {
                    \Log::error('Failed to generate QR TTD: ' . $e->getMessage());
                    $qrTtdBase64 = null;
                }
            }

            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $qrTtdBase64,
                'verification_url' => $pengajuan->data_surat['verification_url'] ?? null
            ];
        } elseif ($pengajuan->jenis_ttd === 'gambar') {
            // Use regular TTD - gambar TTD langsung
            $ttdData = [
                'jenis_ttd' => 'gambar',
                'ttd_base64' => file_exists(public_path('assets/images/ttd.png')) ? base64_encode(file_get_contents(public_path('assets/images/ttd.png'))) : null
            ];
        } else {
            // Manual TTD - tidak ada gambar atau QR code
            $ttdData = [
                'jenis_ttd' => 'manual'
            ];
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $pengajuan->no_surat,
            'tanggal_surat' => $pengajuan->created_at->translatedFormat('d F Y'),

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
        ] + $this->getKepalaDesa() + $ttdData + [
            'qr_base64' => $trackingQrCode
        ];

        $pdf = Pdf::loadView('pdf.surat-hibah', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions(['enable-local-file-access' => true]);

        return $pdf->stream('Surat-Hibah-' . Str::slug($data['nama_penghibah'] ?? 'Penghibah') . '.pdf');
    }

    public function generatePDFPerjanjianPerdamaian($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $pengajuan->no_surat,
            'tanggal_surat' => $pengajuan->created_at->translatedFormat('d F Y'),

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
        ] + $this->getKepalaDesa() + [
        ];

        $pdf = Pdf::loadView('pdf.surat-perjanjian-perdamaian', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions(['enable-local-file-access' => true]);

        return $pdf->stream('Surat-Perjanjian-Perdamaian-' . Str::slug($data['pihak1_nama'] ?? 'Perjanjian') . '.pdf');
    }

    public function generatePDFSuratPindah($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;

        // Parse pengikut data if it exists
        $pengikut = [];
        if (isset($data['pengikut']) && is_string($data['pengikut'])) {
            $pengikut = json_decode($data['pengikut'], true) ?? [];
        } elseif (isset($data['pengikut']) && is_array($data['pengikut'])) {
            $pengikut = $data['pengikut'];
        }

        // Get user data for fallback
        $user = $pengajuan->user;
        
        // Build tempat_tanggal_lahir with proper null checks
        $tempatLahir = $data['tempat_lahir'] ?? ($user->tempat_lahir ?? '');
        $tanggalLahir = $data['tanggal_lahir'] ?? ($user->tanggal_lahir ?? null);
        $tempat_tanggal_lahir = $tempatLahir;
        if ($tanggalLahir) {
            $tempat_tanggal_lahir .= '/' . \Carbon\Carbon::parse($tanggalLahir)->translatedFormat('d F Y');
        }

        // Build tanggal_pindah with proper null checks
        $tanggalPindah = $data['tanggal_pindah'] ?? null;
        $tanggalPindahFormatted = '';
        if ($tanggalPindah) {
            $tanggalPindahFormatted = \Carbon\Carbon::parse($tanggalPindah)->translatedFormat('d F Y');
        }

        // Prepare TTD data based on jenis_ttd
        $ttdData = [];
        if ($pengajuan->jenis_ttd === 'qrcode') {
            // Use QR Code TTD
            $qrTtdBase64 = $data['qr_ttd_base64'] ?? null;

            // Jika QR code TTD belum ada, generate sekarang
            if (!$qrTtdBase64) {
                try {
                    $qrCodeService = new \App\Services\QrCodeService();
                    $qrTtdBase64 = $qrCodeService->generateSuratQrCode($pengajuan);
                } catch (\Exception $e) {
                    \Log::error('Failed to generate QR TTD for surat pindah: ' . $e->getMessage());
                    $qrTtdBase64 = null;
                }
            }

            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'qr_ttd_base64' => $qrTtdBase64,
                'verification_url' => $data['verification_url'] ?? null
            ];
        } elseif ($pengajuan->jenis_ttd === 'gambar') {
            // Use regular TTD - gambar TTD langsung
            $ttdData = [
                'jenis_ttd' => 'gambar',
                'ttd_base64' => file_exists(public_path('assets/images/ttd.png')) ? base64_encode(file_get_contents(public_path('assets/images/ttd.png'))) : null
            ];
        } else {
            // Manual TTD - tidak ada gambar atau QR code
            $ttdData = [
                'jenis_ttd' => 'manual'
            ];
        }

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $pengajuan->no_surat,
            'tanggal_surat' => $pengajuan->created_at->translatedFormat('d F Y'),

            // Data Pemohon - get from data_surat or fallback to user model
            'nama' => $data['nama'] ?? ($user->nama_lengkap ?? ''),
            'tempat_tanggal_lahir' => $tempat_tanggal_lahir,
            'jenis_kelamin' => $data['jenis_kelamin'] ?? ($user->jenis_kelamin ?? ''),
            'agama' => $data['agama'] ?? ($user->agama ?? ''),
            'status_perkawinan' => $data['status_perkawinan'] ?? ($user->status_perkawinan ?? ''),
            'pekerjaan' => $data['pekerjaan'] ?? ($user->mata_pencaharian ?? $user->pekerjaan ?? ''),
            'pendidikan' => $data['pendidikan'] ?? ($user->pendidikan ?? ''),
            'kewarganegaraan' => $data['kewarganegaraan'] ?? ($user->kewarganegaraan ?? 'WNI'),
            'alamat_asal' => $data['alamat_asal'] ?? ($user->alamat ?? ''),

            // Data Pindah
            'alamat_tujuan' => $data['alamat_tujuan'] ?? '',
            'tanggal_pindah' => $tanggalPindahFormatted,
            'alasan_pindah' => $data['alasan_pindah'] ?? '',
            'jenis_pindah' => $data['jenis_pindah'] ?? '',
            'keperluan' => $data['keperluan'] ?? '',

            // Data Pengikut (array)
            'pengikut' => $pengikut,

            // TTD Camat
            'nama_camat' => $data['nama_camat'] ?? '',
            'nip_camat' => $data['nip_camat'] ?? '',
        ] + $this->getKepalaDesa() + $ttdData;

        $pdf = Pdf::loadView('pdf.surat-pindah', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions(['enable-local-file-access' => true]);

        return $pdf->stream('Surat-Pindah-' . Str::slug($data['nama'] ?? 'Penduduk') . '.pdf');
    }

    public function generatePDFRekomendasi($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;

        // Prepare data for PDF
        $pdfData = [
            'nomor_surat' => $pengajuan->no_surat,
            'tanggal_surat' => $pengajuan->created_at->translatedFormat('d F Y'),

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
        ] + $this->getKepalaDesa() + [
        ];

        $pdf = Pdf::loadView('pdf.surat-rekomendasi', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions(['enable-local-file-access' => true]);

        return $pdf->stream('Surat-Rekomendasi-' . Str::slug($data['nama'] ?? 'Rekomendasi') . '.pdf');
    }

    public function generatePDFUndangan($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;

        // Convert tanggal ke format Indonesia
        // Check if date is already in Indonesian format (contains month name in Indonesian)
        $tanggalSurat = isset($data['tanggal_surat']) ? $this->formatIndonesianDate($data['tanggal_surat']) :
            Carbon::now()->locale('id')->isoFormat('D MMMM Y');

        $tanggalTtd = isset($data['tanggal_ttd']) ? $this->formatIndonesianDate($data['tanggal_ttd']) :
            Carbon::now()->locale('id')->isoFormat('D MMMM Y');

        // Prepare TTD data
        $ttdData = [];
        $jenisTtd = $pengajuan->jenis_ttd ?? 'manual';

        if ($jenisTtd == 'qrcode') {
            // Generate or get QR code for verification
            if (empty($data['qr_ttd_base64'])) {
                try {
                    $qrCodeService = app(\App\Services\QrCodeService::class);
                    $qrTtdBase64 = $qrCodeService->generateTtdQrCode($pengajuan);
                    // Save to data_surat for future use
                    $data['qr_ttd_base64'] = $qrTtdBase64;
                    $pengajuan->data_surat = $data;
                    $pengajuan->save();
                } catch (\Exception $e) {
                    $qrTtdBase64 = null;
                }
            } else {
                $qrTtdBase64 = $data['qr_ttd_base64'];
            }

            $ttdData = [
                'jenis_ttd' => 'qrcode',
                'ttd_base64' => $qrTtdBase64,
                'qr_ttd_base64' => $qrTtdBase64,
            ];
        } elseif ($jenisTtd == 'gambar') {
            $ttdImagePath = public_path('assets/images/ttd.png');
            if (file_exists($ttdImagePath)) {
                $ttdBase64 = base64_encode(file_get_contents($ttdImagePath));
                $ttdData = [
                    'jenis_ttd' => 'gambar',
                    'ttd_base64' => $ttdBase64,
                ];
            } else {
                $ttdData = ['jenis_ttd' => 'manual'];
            }
        } else {
            $ttdData = ['jenis_ttd' => 'manual'];
        }

        $pdfData = [
            'nomor_surat' => $pengajuan->no_surat ?? '09/SP/KTB/V/2025',
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
        ] + $this->getKepalaDesa() + $ttdData;

        $pdf = Pdf::loadView('pdf.surat-undangan', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions(['enable-local-file-access' => true]);

        return $pdf->stream('Surat-Undangan-' . Str::slug($data['kepada'] ?? 'Undangan') . '.pdf');
    }

    public function generatePDFPengantarKK($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;

        // Persiapkan data anggota keluarga
        $anggotaKeluarga = [];

        // Jika ada data anggota keluarga dari form
        if (isset($data['anggota_keluarga']) && is_array($data['anggota_keluarga'])) {
            $anggotaKeluarga = $data['anggota_keluarga'];
        }

        // Convert tanggal ke format Indonesia
        $tanggalTtd = isset($data['tanggal_ttd']) ?
            Carbon::parse($data['tanggal_ttd'])->locale('id')->isoFormat('D MMMM Y') :
            Carbon::now()->locale('id')->isoFormat('D MMMM Y');

        $pdfData = [
            'nomor_kk' => $data['nomor_kk'] ?? '1705052309190002',
            'nama_kepala_keluarga' => $data['nama_kepala_keluarga'] ?? 'ROZI PUTRA HANDI',
            'alamat' => $data['alamat'] ?? 'DESA KETAPANG BARU',
            'rt_rw' => $data['rt_rw'] ?? 'DUSUN 1',
            'desa' => $data['desa'] ?? 'KETAPANG BARU',
            'kecamatan' => $data['kecamatan'] ?? 'TALO',
            'kabupaten' => $data['kabupaten'] ?? 'SELUMA',
            'kode_pos' => $data['kode_pos'] ?? '38875',
            'propinsi' => $data['propinsi'] ?? 'BENGKULU',
            'anggota_keluarga' => $anggotaKeluarga,
            'tanggal_ttd' => $tanggalTtd,
            'kepala_desa' => $data['kepala_desa'] ?? 'Zultan Alhara',
        ];

        $pdf = Pdf::loadView('pdf.surat-pengantar-kk', $pdfData)
            ->setPaper('A4', 'landscape') // Landscape karena tabel lebar
            ->setOptions(['enable-local-file-access' => true]);

        return $pdf->stream('Surat-Pengantar-KK-' . Str::slug($data['nama_kepala_keluarga'] ?? 'KartuKeluarga') . '.pdf');
    }

    public function generatePDFPengantarAktaKelahiran($pengajuanId)
    {
        $pengajuan = PengajuanSurat::findOrFail($pengajuanId);
        $data = $pengajuan->data_surat;

        $pdfData = [
            'kabupaten' => $data['kabupaten'] ?? 'Seluma',
            'kecamatan' => $data['kecamatan'] ?? 'Talo',
            'desa' => $data['desa'] ?? 'Ketapang Baru',

            // Data KK
            'nama_kepala_keluarga' => $data['nama_kepala_keluarga'] ?? 'ROZI PUTRA HANDI',
            'no_kk' => $data['no_kk'] ?? '',
            'surat_ket_kelahiran' => $data['surat_ket_kelahiran'] ?? '',

            // Data Bayi
            'nama_bayi' => $data['nama_bayi'] ?? 'RAIQAL JUSTIN GILBERT',
            'jenis_kelamin_bayi' => $data['jenis_kelamin_bayi'] ?? 'Laki-Laki',
            'tempat_lahir_bayi' => $data['tempat_lahir_bayi'] ?? 'Seluma',
            'hari_tanggal_lahir' => $data['hari_tanggal_lahir'] ?? '12 Agustus 2024',
            'pukul_lahir' => $data['pukul_lahir'] ?? '',
            'jenis_kelahiran' => $data['jenis_kelahiran'] ?? 'Tunggal',
            'kelahiran_ke' => $data['kelahiran_ke'] ?? '2 (Dua)',
            'penolong_kelahiran' => $data['penolong_kelahiran'] ?? 'Bidan',
            'berat_bayi' => $data['berat_bayi'] ?? '',
            'panjang_bayi' => $data['panjang_bayi'] ?? '',

            // Data Ibu
            'nik_ibu' => $data['nik_ibu'] ?? '1705054507980001',
            'nama_ibu' => $data['nama_ibu'] ?? 'HAVEZA DIANA',
            'tanggal_lahir_ibu' => $data['tanggal_lahir_ibu'] ?? 'Ketapang Baru, 15 Juli 1998',
            'pekerjaan_ibu' => $data['pekerjaan_ibu'] ?? 'Mengurus Rumah Tangga',
            'alamat_ibu' => $data['alamat_ibu'] ?? 'Ketapang Baru, Kec. Talo, Kab. Seluma',
            'kewarganegaraan_ibu' => $data['kewarganegaraan_ibu'] ?? 'WNI',
            'kebangsaan_ibu' => $data['kebangsaan_ibu'] ?? 'Indonesia',
            'tanggal_perkawinan' => $data['tanggal_perkawinan'] ?? '31 Agustus 2019',

            // Data Ayah
            'nik_ayah' => $data['nik_ayah'] ?? '1705050208000002',
            'nama_ayah' => $data['nama_ayah'] ?? 'ROZI PUTRA HANDI',
            'tanggal_lahir_ayah' => $data['tanggal_lahir_ayah'] ?? 'Ketapang Baru, 01 September 1997',
            'pekerjaan_ayah' => $data['pekerjaan_ayah'] ?? 'Wiraswasta',
            'alamat_ayah' => $data['alamat_ayah'] ?? 'Ketapang Baru, Kec. Talo, Kab. Seluma',
            'kewarganegaraan_ayah' => $data['kewarganegaraan_ayah'] ?? 'WNI',

            // Data Pelapor
            'nik_pelapor' => $data['nik_pelapor'] ?? '1705054507980001',
            'nama_pelapor' => $data['nama_pelapor'] ?? 'HAVEZA DIANA',
            'umur_pelapor' => $data['umur_pelapor'] ?? '28 Tahun',
            'jenis_kelamin_pelapor' => $data['jenis_kelamin_pelapor'] ?? 'Perempuan',

            // Data Saksi 1
            'nik_saksi1' => $data['nik_saksi1'] ?? '1605214503890002',
            'nama_saksi1' => $data['nama_saksi1'] ?? 'UMIYATI',
            'umur_saksi1' => $data['umur_saksi1'] ?? '35 Tahun',
            'jenis_kelamin_saksi1' => $data['jenis_kelamin_saksi1'] ?? 'Perempuan',
            'pekerjaan_saksi1' => $data['pekerjaan_saksi1'] ?? 'Bidan',
            'alamat_saksi1' => $data['alamat_saksi1'] ?? 'Muara Timput, Kec. Talo, Kab. Seluma',

            // Data Saksi 2
            'nik_saksi2' => $data['nik_saksi2'] ?? '1705054107780042',
            'nama_saksi2' => $data['nama_saksi2'] ?? 'HERMAYATI',
            'umur_saksi2' => $data['umur_saksi2'] ?? '47 Tahun',
            'jenis_kelamin_saksi2' => $data['jenis_kelamin_saksi2'] ?? 'Perempuan',
            'pekerjaan_saksi2' => $data['pekerjaan_saksi2'] ?? 'Petani/Pekebun',
            'alamat_saksi2' => $data['alamat_saksi2'] ?? 'Muara Timput, Kec. Talo, Kab. Seluma',

            'kepala_desa' => $data['kepala_desa'] ?? 'Zultan Alhara',
        ];

        $pdf = Pdf::loadView('pdf.surat-pengantar-akta-kelahiran', $pdfData)
            ->setPaper('A4', 'portrait')
            ->setOptions(['enable-local-file-access' => true]);

    }

    private function handlePengantarNikah(Request $request)
    {
        // Validasi data request
        $request->validate([
            // Status Perkawinan
            'status_pria' => 'required|in:Jejaka,Duda,Beristri',
            'beristri_ke' => 'nullable|integer|min:1',
            'status_wanita' => 'required|in:Perawan,Janda',
            'nama_pasangan_terdahulu' => 'nullable|string|max:255',

            // Data Ayah
            'ayah_nama' => 'required|string|max:255',
            'ayah_bin' => 'nullable|string|max:255',
            'ayah_nik' => 'required|string|max:16',
            'ayah_tempat_tanggal_lahir' => 'required|string|max:255',
            'ayah_agama' => 'required|string',
            'ayah_pekerjaan' => 'required|string|max:255',
            'ayah_alamat' => 'required|string',

            // Data Ibu
            'ibu_nama' => 'required|string|max:255',
            'ibu_bin' => 'nullable|string|max:255',
            'ibu_nik' => 'required|string|max:16',
            'ibu_tempat_tanggal_lahir' => 'required|string|max:255',
            'ibu_warga_negara' => 'required|string',
            'ibu_agama' => 'required|string',
            'ibu_pekerjaan' => 'required|string|max:255',
            'ibu_alamat' => 'required|string',

            // Data Calon Istri
            'calon_istri_nama' => 'required|string|max:255',
            'calon_istri_bin' => 'required|string|max:255',
            'calon_istri_nik' => 'required|string|max:16',
            'calon_istri_tempat_tanggal_lahir' => 'required|string|max:255',
            'calon_istri_warga_negara' => 'required|string',
            'calon_istri_agama' => 'required|string',
            'calon_istri_pekerjaan' => 'required|string|max:255',
            'calon_istri_alamat' => 'required|string',

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
                'jenis_surat' => 'pengantar_nikah',
                'keperluan' => 'Pengantar Perkawinan',
                'lampiran' => $lampiranPath,
               'data_surat' => [
                    // Data Pemohon (diambil dari user yang login)
                    'nama' => $user->nama_lengkap ?? $user->name,
                    'nik' => $user->nik ?? '',
                    'jenis_kelamin' => $user->jenis_kelamin ?? 'Laki-Laki',
                    'tempat_tanggal_lahir' => ($user->tempat_lahir ?? '') . ', ' . ($user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->translatedFormat('d F Y') : ''),
                    'warga_negara' => 'Indonesia',
                    'agama' => $user->agama ?? 'Islam',
                    'pekerjaan' => $user->pekerjaan ?? '-',
                    'alamat' => $user->alamat ?? $user->address ?? '',

                    // Status Perkawinan
                    'status_pria' => $request->status_pria,
                    'beristri_ke' => $request->beristri_ke ?? '',
                    'status_wanita' => $request->status_wanita,
                    'nama_pasangan_terdahulu' => $request->nama_pasangan_terdahulu ?? '',

                    // Data Ayah
                    'ayah_nama' => $request->ayah_nama,
                    'ayah_bin' => $request->ayah_bin ?? '',
                    'ayah_nik' => $request->ayah_nik,
                    'ayah_tempat_tanggal_lahir' => $request->ayah_tempat_tanggal_lahir,
                    'ayah_warga_negara' => 'Indonesia', // Default value
                    'ayah_agama' => $request->ayah_agama,
                    'ayah_pekerjaan' => $request->ayah_pekerjaan,
                    'ayah_alamat' => $request->ayah_alamat,

                    // Data Ibu
                    'ibu_nama' => $request->ibu_nama,
                    'ibu_bin' => $request->ibu_bin ?? '',
                    'ibu_nik' => $request->ibu_nik,
                    'ibu_tempat_tanggal_lahir' => $request->ibu_tempat_tanggal_lahir,
                    'ibu_warga_negara' => $request->ibu_warga_negara,
                    'ibu_agama' => $request->ibu_agama,
                    'ibu_pekerjaan' => $request->ibu_pekerjaan,
                    'ibu_alamat' => $request->ibu_alamat,

                    // Data Calon Istri
                    'calon_istri_nama' => $request->calon_istri_nama,
                    'calon_istri_bin' => $request->calon_istri_bin,
                    'calon_istri_nik' => $request->calon_istri_nik,
                    'calon_istri_tempat_tanggal_lahir' => $request->calon_istri_tempat_tanggal_lahir,
                    'calon_istri_warga_negara' => $request->calon_istri_warga_negara,
                    'calon_istri_agama' => $request->calon_istri_agama,
                    'calon_istri_pekerjaan' => $request->calon_istri_pekerjaan,
                    'calon_istri_alamat' => $request->calon_istri_alamat,
                ],
                'status' => 'Diajukan',
                'tracking_number' => $trackingNumber,
                'user_id' => $user->id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pengajuan Surat Pengantar Nikah berhasil disubmit!',
                'tracking_number' => $trackingNumber,
                'pengajuan_id' => $pengajuan->id
            ]);

        } catch (\Exception $e) {
            Log::error('Error in handlePengantarNikah: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    private function handleGenericSurat(Request $request, $jenisSurat)
    {
        // Generate tracking number
        $trackingNumber = 'TRK' . strtoupper(uniqid());
        $user = $request->user();
        $keperluan = $request->keperluan ?? str_replace('_', ' ', ucwords($jenisSurat));

        // Handle file upload generic
        $lampiranPath = null;
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $lampiranPath = $file->storeAs('lampiran', $fileName, 'public');
        }

        // Prepare data_surat
        $dataSurat = $request->except(['lampiran', '_token', 'jenis_surat']);

        // AUTO-FILL DATA FOR SURAT HIBAH (from logged-in user)
        if ($jenisSurat === 'surat_hibah') {
            $dataSurat['nama_penghibah'] = $user->nama_lengkap ?? $user->name;
            $dataSurat['umur_penghibah'] = $user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->age : '-';
            $dataSurat['pekerjaan_penghibah'] = $user->mata_pencaharian ?? $user->pekerjaan ?? '-';
            $dataSurat['agama_penghibah'] = $user->agama ?? '-';
            $dataSurat['alamat_penghibah'] = $user->alamat ?? '-';
        }

        // Create pengajuan surat
        $pengajuan = PengajuanSurat::create([
            'nama_lengkap' => $user->nama_lengkap ?? $user->name,
            'email' => $user->email,
            'no_telepon' => $user->no_hp ?? $user->phone ?? '',
            'alamat' => $user->alamat ?? $user->address ?? '',
            'jenis_surat' => $jenisSurat,
            'keperluan' => $keperluan,
            'lampiran' => $lampiranPath,
            'data_surat' => $dataSurat,
            'status' => 'Diajukan',
            'tracking_number' => $trackingNumber,
            'user_id' => $user->id,
        ]);

        // Generate informative message based on jenis_surat
        $suratNames = [
            'surat_hibah' => 'Surat Keterangan Hibah',
            'perjanjian_perdamaian' => 'Surat Perjanjian Perdamaian',
            'surat_rekomendasi' => 'Surat Rekomendasi',
            'surat_tidak_mampu' => 'Surat Keterangan Tidak Mampu',
            'surat_undangan' => 'Surat Undangan',
        ];
        
        $suratName = $suratNames[$jenisSurat] ?? ucwords(str_replace('_', ' ', $jenisSurat));

        return response()->json([
            'success' => true,
            'message' => "Pengajuan {$suratName} berhasil disubmit!",
            'tracking_number' => $trackingNumber,
            'pengajuan_id' => $pengajuan->id
        ]);
    }

    /**
     * Helper method to parse date safely
     * If date is already in Indonesian format, return it as is
     * Otherwise, parse it and format to Indonesian
     */
    private function formatIndonesianDate($date)
    {
        if (empty($date)) {
            return Carbon::now()->locale('id')->isoFormat('D MMMM Y');
        }

        // Check if date is already in Indonesian format (contains Indonesian month names)
        $indonesianMonths = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $containsIndonesianMonth = false;

        foreach ($indonesianMonths as $month) {
            if (strpos($date, $month) !== false) {
                $containsIndonesianMonth = true;
                break;
            }
        }

        // If already in Indonesian format, return as is
        if ($containsIndonesianMonth) {
            return $date;
        }

        // Otherwise, parse and format to Indonesian
        try {
            return Carbon::parse($date)->locale('id')->isoFormat('D MMMM Y');
        } catch (\Exception $e) {
            // If parsing fails, return current date
            return Carbon::now()->locale('id')->isoFormat('D MMMM Y');
        }
    }
}
