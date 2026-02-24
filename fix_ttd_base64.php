<?php

/**
 * Script untuk memperbaiki semua file PDF agar menggunakan base64 encoding untuk gambar TTD
 */

$pdfFiles = [
    'surat-keterangan-domisili.blade.php',
    'surat-keterangan-usaha.blade.php',
    'surat-pindah.blade.php',
    'surat-rekomendasi.blade.php',
    'surat-pengantar-nikah.blade.php',
    'surat-hibah.blade.php',
    'surat-keterangan-miskin.blade.php',
    'surat-kehilangan.blade.php',
    'surat-pengantar-akta-kelahiran.blade.php',
    'surat-keterangan-berkelakuan-baik.blade.php',
    'surat-undangan.blade.php',
    'surat-keterangan-belum-menikah.blade.php',
    'surat-keterangan-menikah.blade.php',
    'surat-pengantar-kk.blade.php',
    'surat-keterangan-kematian.blade.php',
    'surat-izin-keramaian.blade.php',
    'surat-keterangan-tidak-mampu.blade.php',
    'surat-keterangan-penghasilan-ortu.blade.php',
    'surat-perjanjian-perdamaian.blade.php'
];

$pdfPath = '/Users/jurusankoding/docker/smart-village/resources/views/pdf/';

echo "Memperbaiki gambar TTD agar menggunakan base64 encoding...\n";

foreach ($pdfFiles as $file) {
    $filePath = $pdfPath . $file;

    if (!file_exists($filePath)) {
        echo "File tidak ditemukan: $file\n";
        continue;
    }

    $content = file_get_contents($filePath);
    $originalContent = $content;

    // Ganti public_path dengan base64 encoding
    $content = preg_replace(
        '/src="\{\{ public_path\(\$ttd_image_path \?\? \'assets\/images\/ttd\.png\'\) \}\}"/',
        'src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path($ttd_image_path ?? \'assets/images/ttd.png\'))) }}"',
        $content
    );

    // Ganti untuk surat-keterangan-penghasilan-ortu.blade.php yang menggunakan path berbeda
    $content = preg_replace(
        '/src="\{\{ public_path\(\$ttd_image_path \?\? \'images\/ttd-kepala-desa\.png\'\) \}\}"/',
        'src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path($ttd_image_path ?? \'images/ttd-kepala-desa.png\'))) }}"',
        $content
    );

    if ($content !== $originalContent) {
        file_put_contents($filePath, $content);
        echo "✓ Diperbaiki: $file\n";
    } else {
        echo "- Sudah benar: $file\n";
    }
}

echo "\nPerbaikan base64 encoding selesai!\n";
