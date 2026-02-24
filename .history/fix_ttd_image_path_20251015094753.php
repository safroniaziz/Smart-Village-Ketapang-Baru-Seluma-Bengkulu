<?php

/**
 * Script untuk memperbaiki path gambar TTD di semua file PDF
 */

$pdfFiles = [
    'surat-keterangan-domisili.blade.php',
    'surat-keterangan-usaha.blade.php',
    'surat-pindah.blade.php',
    'surat-rekomendasi.blade.php',
    'surat-hibah.blade.php',
    'surat-keterangan-miskin.blade.php',
    'surat-kehilangan.blade.php',
    'surat-pengantar-akta-kelahiran.blade.php',
    'surat-keterangan-berkelakuan-baik.blade.php',
    'surat-keterangan-belum-menikah.blade.php',
    'surat-keterangan-menikah.blade.php',
    'surat-keterangan-kematian.blade.php',
    'surat-izin-keramaian.blade.php',
    'surat-keterangan-tidak-mampu.blade.php',
    'surat-keterangan-penghasilan-ortu.blade.php'
];

$pdfPath = '/Users/jurusankoding/docker/smart-village/resources/views/pdf/';

echo "Memperbaiki path gambar TTD di semua file PDF...\n";

foreach ($pdfFiles as $file) {
    $filePath = $pdfPath . $file;
    
    if (!file_exists($filePath)) {
        echo "File tidak ditemukan: $file\n";
        continue;
    }
    
    $content = file_get_contents($filePath);
    $originalContent = $content;
    
    // Perbaiki path gambar TTD
    $content = preg_replace(
        '/src="\{\{ \$ttd_image_path \?\? public_path\(\'assets\/images\/ttd\.png\'\) \}\}"/',
        'src="{{ public_path($ttd_image_path ?? \'assets/images/ttd.png\') }}"',
        $content
    );
    
    // Perbaiki path gambar TTD untuk surat-keterangan-penghasilan-ortu.blade.php yang menggunakan asset()
    $content = preg_replace(
        '/src="\{\{ \$ttd_image_path \?\? asset\(\'images\/ttd-kepala-desa\.png\'\) \}\}"/',
        'src="{{ public_path($ttd_image_path ?? \'images/ttd-kepala-desa.png\') }}"',
        $content
    );
    
    if ($content !== $originalContent) {
        file_put_contents($filePath, $content);
        echo "✓ Diperbaiki: $file\n";
    } else {
        echo "- Sudah benar: $file\n";
    }
}

echo "\nPerbaikan path gambar TTD selesai!\n";
