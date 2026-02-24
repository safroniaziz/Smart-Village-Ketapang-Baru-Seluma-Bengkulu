<?php

/**
 * Script untuk menambahkan logika TTD ke method generate PDF yang terlewat
 */

$controllerFile = '/Users/jurusankoding/docker/smart-village/app/Http/Controllers/SuratController.php';

if (!file_exists($controllerFile)) {
    echo "Controller file tidak ditemukan!\n";
    exit;
}

$content = file_get_contents($controllerFile);
$originalContent = $content;

// Pattern untuk menambahkan logika TTD ke method generatePDFPengantarNikah
$pattern1 = '/(\$pdfData = \[\s*\'nomor_surat\' => \$nomorSurat,\s*\'tanggal_surat\' => now\(\)->format\(\'d F Y\'\),\s*\'nama\' => \$pemohonNama,.*?\'kepala_desa_nama\' => \'Zultan Alhara\',\s*\'tembusan\' => \$pengajuan->tembusan \?\? \[\]\s*\]);/s';

$replacement1 = '// Prepare TTD data based on jenis_ttd
        $ttdData = [];
        if ($pengajuan->jenis_ttd === \'qrcode\') {
            // Use QR Code TTD
            $ttdData = [
                \'jenis_ttd\' => \'qrcode\',
                \'qr_ttd_base64\' => $pengajuan->data_surat[\'qr_ttd_base64\'] ?? null,
            ];
        } elseif ($pengajuan->jenis_ttd === \'gambar\') {
            // Use regular TTD
            $ttdData = [
                \'jenis_ttd\' => \'gambar\',
                \'ttd_image_path\' => \'assets/images/ttd.png\'
            ];
        } else {
            // Manual TTD
            $ttdData = [
                \'jenis_ttd\' => \'manual\'
            ];
        }

        $pdfData = [
            \'nomor_surat\' => $nomorSurat,
            \'tanggal_surat\' => now()->format(\'d F Y\'),
            \'nama\' => $pemohonNama,
            \'nik\' => $pemohonNik,
            \'jenis_kelamin\' => $pemohonJenisKelamin,
            \'tempat_tanggal_lahir\' => $pemohonTempatTanggal,
            \'warga_negara\' => $pemohonWarga,
            \'agama\' => $pemohonAgama,
            \'pekerjaan\' => $pemohonPekerjaan,
            \'alamat\' => $pemohonAlamat,
            \'status_pria\' => $pemohonStatusPria,
            \'status_wanita\' => $pemohonStatusWanita,
            \'nama_pasangan_terdahulu\' => $pemohonNamaPasanganTerdahulu,

            \'ayah_nama\' => $ayahNama,
            \'ayah_nik\' => $ayahNik,
            \'ayah_tempat_tanggal_lahir\' => $ayahTempatTanggal,
            \'ayah_warga_negara\' => $ayahWarga,
            \'ayah_agama\' => $ayahAgama,
            \'ayah_pekerjaan\' => $ayahPekerjaan,
            \'ayah_alamat\' => $ayahAlamat,

            \'wanita_nama\' => $wanitaNama,
            \'wanita_nik\' => $wanitaNik,
            \'wanita_tempat_tanggal_lahir\' => $wanitaTempatTanggal,
            \'wanita_warga_negara\' => $wanitaWarga,
            \'wanita_agama\' => $wanitaAgama,
            \'wanita_pekerjaan\' => $wanitaPekerjaan,
            \'wanita_alamat\' => $wanitaAlamat,

            \'kepala_desa_nama\' => \'Zultan Alhara\',
            \'tembusan\' => $pengajuan->tembusan ?? []
        ] + $ttdData;';

$content = preg_replace($pattern1, $replacement1, $content);

if ($content !== $originalContent) {
    file_put_contents($controllerFile, $content);
    echo "✓ Method generatePDFPengantarNikah diperbaiki!\n";
} else {
    echo "- Method generatePDFPengantarNikah sudah benar\n";
}

echo "Perbaikan method TTD selesai!\n";
