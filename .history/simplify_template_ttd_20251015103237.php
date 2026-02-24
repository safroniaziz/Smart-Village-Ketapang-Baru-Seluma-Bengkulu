<?php

/**
 * Script untuk menyederhanakan template TTD di semua PDF
 * Logika: controller kirim ttd_base64 yang sudah siap pakai
 */

$pdfDir = '/Users/jurusankoding/docker/smart-village/resources/views/pdf/';

if (!is_dir($pdfDir)) {
    echo "PDF directory tidak ditemukan!\n";
    exit;
}

$files = glob($pdfDir . '*.blade.php');
$updatedFiles = 0;

echo "Menyederhanakan template TTD di " . count($files) . " template PDF...\n";

foreach ($files as $file) {
    $content = file_get_contents($file);
    $originalContent = $content;
    
    // Pattern untuk mengganti logika TTD yang kompleks dengan yang simple
    $oldPattern = '/@if\(\$jenis_ttd == \'gambar\'\)\s*<!-- Gambar TTD -->\s*<div[^>]*>\s*<img src="data:image\/png;base64,\{\{ base64_encode\(file_get_contents\(public_path\(\$ttd_image_path \?\? \'assets\/images\/ttd\.png\'\)\)\) \}\}"[^>]*>\s*<\/div>\s*@elseif\(\$jenis_ttd == \'qrcode\'\)\s*<!-- QR Code TTD.*?@elseif\(\$jenis_ttd == \'manual\'\)\s*<!-- Manual TTD.*?@else\s*<!-- Default.*?@endif/s';
    
    $newTemplate = '@if($jenis_ttd == \'gambar\' && isset($ttd_base64) && $ttd_base64)
                            <!-- Gambar TTD -->
                            <div style="margin-bottom: 15px;">
                                <img src="data:image/png;base64,{{ $ttd_base64 }}" style="width: 150px; height: auto;" alt="TTD Gambar">
                            </div>
                        @elseif($jenis_ttd == \'qrcode\' && isset($ttd_base64) && $ttd_base64)
                            <!-- QR Code TTD -->
                            <div style="margin-bottom: 15px;">
                                <img src="data:image/png;base64,{{ $ttd_base64 }}" style="width: 120px; height: auto;" alt="QR Code TTD">
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
                        @endif';
    
    $content = preg_replace($oldPattern, $newTemplate, $content);
    
    if ($content !== $originalContent) {
        file_put_contents($file, $content);
        $updatedFiles++;
        echo "✓ " . basename($file) . " disederhanakan\n";
    } else {
        echo "- " . basename($file) . " sudah benar\n";
    }
}

echo "\nPenyederhanaan selesai! {$updatedFiles} file diperbarui.\n";
