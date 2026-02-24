<?php

/**
 * Script untuk memperbaiki logika TTD di semua file PDF dan controller
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

echo "Memperbaiki logika TTD di semua file PDF...\n";

foreach ($pdfFiles as $file) {
    $filePath = $pdfPath . $file;
    
    if (!file_exists($filePath)) {
        echo "File tidak ditemukan: $file\n";
        continue;
    }
    
    $content = file_get_contents($filePath);
    $originalContent = $content;
    
    // Perbaiki kondisi TTD agar menangani 'manual' dengan benar
    $content = preg_replace(
        '/@else\s*<!-- Manual TTD - Ruang kosong -->/',
        '@elseif($jenis_ttd == \'manual\')\n                        <!-- Manual TTD - Ruang kosong -->',
        $content
    );
    
    // Tambahkan kondisi default jika belum ada
    $content = preg_replace(
        '/@endif\s*<!-- QR Code Verifikasi/',
        '@else\n                            <!-- Default - Ruang kosong -->\n                            <div style="height: 80px; margin-bottom: 15px;">\n                                <!-- Ruang kosong untuk TTD -->\n                            </div>\n                        @endif\n\n                        <!-- QR Code Verifikasi',
        $content
    );
    
    if ($content !== $originalContent) {
        file_put_contents($filePath, $content);
        echo "✓ Diperbaiki: $file\n";
    } else {
        echo "- Sudah benar: $file\n";
    }
}

echo "\nPerbaikan logika TTD selesai!\n";
