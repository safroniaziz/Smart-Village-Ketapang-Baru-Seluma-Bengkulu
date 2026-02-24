<?php

/**
 * Script untuk menambahkan logika TTD ke template PDF yang terlewat
 */

$pdfFiles = [
    'surat-pengantar-nikah.blade.php',
    'surat-undangan.blade.php', 
    'surat-pengantar-kk.blade.php',
    'surat-perjanjian-perdamaian.blade.php'
];

$pdfPath = '/Users/jurusankoding/docker/smart-village/resources/views/pdf/';

echo "Menambahkan logika TTD ke template PDF yang terlewat...\n";

foreach ($pdfFiles as $file) {
    $filePath = $pdfPath . $file;
    
    if (!file_exists($filePath)) {
        echo "File tidak ditemukan: $file\n";
        continue;
    }
    
    $content = file_get_contents($filePath);
    $originalContent = $content;
    
    // Tambahkan logika TTD sebelum nama kepala desa
    $ttdLogic = '
                        <!-- TTD berdasarkan pilihan admin -->
                        @if($jenis_ttd == \'gambar\')
                            <!-- Gambar TTD -->
                            <div style="margin-bottom: 15px;">
                                <img src="{{ public_path($ttd_image_path ?? \'assets/images/ttd.png\') }}" style="width: 150px; height: auto;" alt="TTD Gambar">
                            </div>
                        @elseif($jenis_ttd == \'qrcode\')
                            <!-- QR Code TTD - QR code yang berisi gambar TTD -->
                            <div style="margin-bottom: 15px;">
                                <img src="data:image/png;base64,{{ $qr_ttd_base64 }}" style="width: 120px; height: auto;" alt="QR Code TTD">
                            </div>
                        @elseif($jenis_ttd == \'manual\')
                            <!-- Manual TTD - Ruang kosong -->
                            <div style="height: 80px; margin-bottom: 15px;">
                                <!-- Ruang kosong untuk TTD manual -->
                            </div>
                        @else
                            <!-- Default - Ruang kosong -->
                            <div style="height: 80px; margin-bottom: 15px;">
                                <!-- Ruang kosong untuk TTD -->
                            </div>
                        @endif
';
    
    // Cari pola yang cocok untuk setiap file
    $patterns = [
        // Pattern untuk surat-pengantar-nikah.blade.php
        '/(<div class="bold">Kepala Desa<\/div>\s*<div class="line"><\/div>\s*<div class="bold">)/',
        
        // Pattern untuk surat-undangan.blade.php  
        '/(<p><strong>Kepala Desa<\/strong><\/p>\s*<p class="signature-name">)/',
        
        // Pattern untuk surat-pengantar-kk.blade.php
        '/(<p><strong>Kepala Desa Ketapang Baru<\/strong><\/p>\s*<p class="signature-name">)/',
        
        // Pattern untuk surat-perjanjian-perdamaian.blade.php
        '/(<p><strong>Kepala Desa<\/strong><\/p>\s*<p class="signature-name">)/'
    ];
    
    $replaced = false;
    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $content)) {
            $content = preg_replace($pattern, $ttdLogic . '$1', $content);
            $replaced = true;
            break;
        }
    }
    
    if ($replaced) {
        file_put_contents($filePath, $content);
        echo "✓ Ditambahkan logika TTD: $file\n";
    } else {
        echo "- Tidak ada pola yang cocok: $file\n";
    }
}

echo "\nPenambahan logika TTD selesai!\n";
