<?php

/**
 * Script untuk menyederhanakan logika TTD di semua method generate PDF
 * Logika: admin pilih 1 dari 3 opsi -> controller kirim base64 yang sudah siap pakai
 */

$controllerFile = '/Users/jurusankoding/docker/smart-village/app/Http/Controllers/SuratController.php';

if (!file_exists($controllerFile)) {
    echo "Controller file tidak ditemukan!\n";
    exit;
}

$content = file_get_contents($controllerFile);
$originalContent = $content;

// Pattern untuk mengganti logika TTD yang kompleks dengan yang simple
$oldPattern = '/\/\/ Prepare TTD data based on jenis_ttd\s*\$ttdData = \[\];\s*\$qrCodeBase64 = null;.*?else \{\s*\/\/ Manual TTD.*?\$ttdData = \[\s*\'jenis_ttd\' => \'manual\'\s*\];\s*\}\s*/s';

$newLogic = '// Prepare TTD data based on jenis_ttd - SIMPLE LOGIC
        $ttdData = [];
        $qrCodeBase64 = null; // QR code verifikasi surat - hanya untuk tracking, bukan TTD

        if ($pengajuan->jenis_ttd === \'gambar\') {
            // Gambar TTD - convert ke base64 langsung
            $ttdImagePath = public_path(\'assets/images/ttd.png\');
            $ttdBase64 = file_exists($ttdImagePath) ? base64_encode(file_get_contents($ttdImagePath)) : null;
            
            $ttdData = [
                \'jenis_ttd\' => \'gambar\',
                \'ttd_base64\' => $ttdBase64
            ];
        } elseif ($pengajuan->jenis_ttd === \'qrcode\') {
            // QR Code TTD - convert gambar TTD ke QR code
            $ttdImagePath = public_path(\'assets/images/ttd.png\');
            if (file_exists($ttdImagePath)) {
                try {
                    $qrCodeService = new \\App\\Services\\QrCodeService();
                    $ttdBase64 = $qrCodeService->generateSuratQrCode($pengajuan);
                } catch (\\Exception $e) {
                    \\Log::error(\'Failed to generate QR TTD: \' . $e->getMessage());
                    $ttdBase64 = null;
                }
            } else {
                $ttdBase64 = null;
            }
            
            $ttdData = [
                \'jenis_ttd\' => \'qrcode\',
                \'ttd_base64\' => $ttdBase64
            ];
        } else {
            // Manual TTD - kosong
            $ttdData = [
                \'jenis_ttd\' => \'manual\',
                \'ttd_base64\' => null
            ];
        }';

echo "Menyederhanakan logika TTD di controller...\n";

// Ganti semua instance logika TTD yang kompleks
$content = preg_replace($oldPattern, $newLogic, $content);

if ($content !== $originalContent) {
    file_put_contents($controllerFile, $content);
    echo "✓ Controller berhasil disederhanakan!\n";
} else {
    echo "- Controller sudah benar\n";
}

echo "Penyederhanaan logika TTD selesai!\n";
