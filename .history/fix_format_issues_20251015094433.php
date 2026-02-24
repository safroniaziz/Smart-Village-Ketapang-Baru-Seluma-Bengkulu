<?php

/**
 * Script untuk memperbaiki format yang rusak di file PDF
 */

$pdfFiles = [
    'surat-keterangan-tidak-mampu.blade.php',
    'surat-keterangan-kematian.blade.php',
    'surat-keterangan-menikah.blade.php',
    'surat-keterangan-belum-menikah.blade.php',
    'surat-keterangan-berkelakuan-baik.blade.php',
    'surat-kehilangan.blade.php',
    'surat-keterangan-miskin.blade.php',
    'surat-hibah.blade.php',
    'surat-rekomendasi.blade.php',
    'surat-izin-keramaian.blade.php',
    'surat-pengantar-akta-kelahiran.blade.php',
    'surat-pindah.blade.php'
];

$pdfPath = '/Users/jurusankoding/docker/smart-village/resources/views/pdf/';

echo "Memperbaiki format yang rusak...\n";

foreach ($pdfFiles as $file) {
    $filePath = $pdfPath . $file;
    
    if (!file_exists($filePath)) {
        echo "File tidak ditemukan: $file\n";
        continue;
    }
    
    $content = file_get_contents($filePath);
    $originalContent = $content;
    
    // Perbaiki format yang rusak
    $content = preg_replace(
        '/@if\(isset\(\$qr_base64\) && \$qr_base64\)\\\\n\s*<div style="margin-bottom: 15px;">\\\\n\s*<img class="qr-code" src="data:image\/png;base64,\{\{ \$qr_base64 \}\}" alt="QR Code Verifikasi Surat" style="width: 60px; height: 60px;">\\\\n\s*<\/div>\\\\n\s*@endif/',
        '@if(isset($qr_base64) && $qr_base64)
                <div style="margin-bottom: 15px;">
                    <img class="qr-code" src="data:image/png;base64,{{ $qr_base64 }}" alt="QR Code Verifikasi Surat" style="width: 60px; height: 60px;">
                </div>
                @endif',
        $content
    );
    
    if ($content !== $originalContent) {
        file_put_contents($filePath, $content);
        echo "✓ Diperbaiki format: $file\n";
    } else {
        echo "- Format sudah benar: $file\n";
    }
}

echo "\nPerbaikan format selesai!\n";
