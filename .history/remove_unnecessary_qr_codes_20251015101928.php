<?php

/**
 * Script untuk menghapus QR code verifikasi surat yang tidak diperlukan
 */

$controllerFile = '/Users/jurusankoding/docker/smart-village/app/Http/Controllers/SuratController.php';

if (!file_exists($controllerFile)) {
    echo "Controller file tidak ditemukan!\n";
    exit;
}

$content = file_get_contents($controllerFile);
$originalContent = $content;

// Pattern untuk menghapus generate QR code verifikasi surat
$patterns = [
    // Pattern 1: Generate QR Code for verification surat
    [
        'search' => '/\/\/ Generate QR Code for verification surat.*?\n\s*if \(\$pengajuan->tracking_number\) \{\s*\$qrCodeService = new.*?\n\s*\$qrCodeBase64 = base64_encode.*?\n\s*\}/s',
        'replace' => '// QR Code verifikasi surat dihapus - tidak diperlukan
        $qrCodeBase64 = null;'
    ],

    // Pattern 2: Generate tracking QR code
    [
        'search' => '/\/\/ Generate tracking QR code.*?\n\s*\$trackingQrCode = null;.*?\n\s*if \(\$pengajuan->tracking_number\) \{\s*\$verifyUrl = url.*?\n\s*\$trackingQrCode = \$qrCodeService->generateSimpleQrCode.*?\n\s*\}/s',
        'replace' => '// QR Code verifikasi surat dihapus - tidak diperlukan
        $trackingQrCode = null;'
    ]
];

echo "Menghapus QR code verifikasi surat yang tidak diperlukan...\n";

foreach ($patterns as $pattern) {
    $content = preg_replace($pattern['search'], $pattern['replace'], $content);
}

if ($content !== $originalContent) {
    file_put_contents($controllerFile, $content);
    echo "✓ Controller berhasil diperbaiki!\n";
} else {
    echo "- Controller sudah benar\n";
}

echo "Perbaikan controller selesai!\n";
