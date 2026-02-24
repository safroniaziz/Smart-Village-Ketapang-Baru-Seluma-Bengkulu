<?php

/**
 * Script untuk memperbaiki QR code TTD generation di semua method generate PDF
 */

$controllerFile = '/Users/jurusankoding/docker/smart-village/app/Http/Controllers/SuratController.php';

if (!file_exists($controllerFile)) {
    echo "Controller file tidak ditemukan!\n";
    exit;
}

$content = file_get_contents($controllerFile);
$originalContent = $content;

// Pattern untuk memperbaiki QR code TTD generation
$pattern = '/if \(\$pengajuan->jenis_ttd === \'qrcode\'\) \{\s*\/\/ Use QR Code TTD\s*\$ttdData = \[\s*\'jenis_ttd\' => \'qrcode\',\s*\'qr_ttd_base64\' => \$pengajuan->data_surat\[\'qr_ttd_base64\'\] \?\? null,.*?\];/s';

$replacement = 'if ($pengajuan->jenis_ttd === \'qrcode\') {
            // Use QR Code TTD - QR code yang berisi gambar TTD
            $qrTtdBase64 = $pengajuan->data_surat[\'qr_ttd_base64\'] ?? null;
            
            // Jika QR code TTD belum ada, generate sekarang
            if (!$qrTtdBase64) {
                try {
                    $qrCodeService = new \\App\\Services\\QrCodeService();
                    $qrTtdBase64 = $qrCodeService->generateSuratQrCode($pengajuan);
                } catch (\\Exception $e) {
                    \\Log::error(\'Failed to generate QR TTD: \' . $e->getMessage());
                    $qrTtdBase64 = null;
                }
            }
            
            $ttdData = [
                \'jenis_ttd\' => \'qrcode\',
                \'qr_ttd_base64\' => $qrTtdBase64,
                \'verification_url\' => $pengajuan->data_surat[\'verification_url\'] ?? null
            ];';

echo "Memperbaiki QR code TTD generation di controller...\n";

$content = preg_replace($pattern, $replacement, $content);

if ($content !== $originalContent) {
    file_put_contents($controllerFile, $content);
    echo "✓ Controller berhasil diperbaiki!\n";
} else {
    echo "- Controller sudah benar\n";
}

echo "Perbaikan QR code TTD generation selesai!\n";
