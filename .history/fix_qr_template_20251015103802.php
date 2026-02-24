<?php

/**
 * Script untuk memperbaiki template QR code TTD
 */

$pdfDir = '/Users/jurusankoding/docker/smart-village/resources/views/pdf/';

if (!is_dir($pdfDir)) {
    echo "PDF directory tidak ditemukan!\n";
    exit;
}

$files = glob($pdfDir . '*.blade.php');
$updatedFiles = 0;

echo "Memperbaiki template QR code TTD di " . count($files) . " template PDF...\n";

foreach ($files as $file) {
    $content = file_get_contents($file);
    $originalContent = $content;
    
    // Pattern untuk memperbaiki QR code TTD display
    $oldPattern = '/@elseif\(\$jenis_ttd == \'qrcode\' && isset\(\$ttd_base64\) && \$ttd_base64\)\s*<!-- QR Code TTD -->\s*<div[^>]*>\s*<img src="data:image\/png;base64,\{\{ \$ttd_base64 \}\}"[^>]*>\s*<\/div>/s';
    
    $newTemplate = '@elseif($jenis_ttd == \'qrcode\')
                            <!-- QR Code TTD -->
                            <div style="margin-bottom: 15px;">
                                @if(isset($ttd_base64) && $ttd_base64)
                                    <img src="{{ $ttd_base64 }}" style="width: 120px; height: auto;" alt="QR Code TTD">
                                @else
                                    <div style="width: 120px; height: 120px; border: 2px dashed #ccc; display: flex; align-items: center; justify-content: center; color: #666;">
                                        QR Code TTD<br>Tidak tersedia
                                    </div>
                                @endif
                            </div>';
    
    $content = preg_replace($oldPattern, $newTemplate, $content);
    
    if ($content !== $originalContent) {
        file_put_contents($file, $content);
        $updatedFiles++;
        echo "✓ " . basename($file) . " diperbaiki\n";
    } else {
        echo "- " . basename($file) . " sudah benar\n";
    }
}

echo "\nPerbaikan selesai! {$updatedFiles} file diperbarui.\n";
