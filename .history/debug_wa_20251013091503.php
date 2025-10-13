<?php

require_once 'vendor/autoload.php';

use App\Services\FonnteService;

// Test Fonnte service
$fonnte = new FonnteService();

// Test phone number (ganti dengan nomor yang valid)
$testPhone = '6281279802064'; // Kades phone number
$testMessage = 'Test WhatsApp dari Smart Village - ' . date('Y-m-d H:i:s');

echo "Testing WhatsApp notification...\n";
echo "Phone: $testPhone\n";
echo "Message: $testMessage\n\n";

$result = $fonnte->sendWithResponse($testPhone, $testMessage);

echo "Result:\n";
print_r($result);

if ($result['ok']) {
    echo "\n✅ WhatsApp test berhasil!\n";
} else {
    echo "\n❌ WhatsApp test gagal!\n";
    echo "Error: " . json_encode($result['response']) . "\n";
}
