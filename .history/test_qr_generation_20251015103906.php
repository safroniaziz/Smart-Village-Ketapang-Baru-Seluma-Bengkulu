<?php

require_once 'vendor/autoload.php';

use App\Services\QrCodeService;
use App\Models\PengajuanSurat;

// Test QR code generation
echo "Testing QR code generation...\n";

try {
    // Get a sample pengajuan
    $pengajuan = PengajuanSurat::first();

    if (!$pengajuan) {
        echo "No pengajuan found in database\n";
        exit;
    }

    echo "Testing with pengajuan ID: " . $pengajuan->id . "\n";
    echo "Tracking number: " . ($pengajuan->tracking_number ?? 'NULL') . "\n";
    echo "Nama: " . ($pengajuan->nama_lengkap ?? 'NULL') . "\n";

    $qrCodeService = new QrCodeService();
    $result = $qrCodeService->generateSuratQrCode($pengajuan);

    if ($result) {
        echo "✓ QR code generated successfully!\n";
        echo "Result length: " . strlen($result) . " characters\n";
        echo "Starts with: " . substr($result, 0, 50) . "...\n";
    } else {
        echo "✗ QR code generation failed - empty result\n";
    }

} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
}
