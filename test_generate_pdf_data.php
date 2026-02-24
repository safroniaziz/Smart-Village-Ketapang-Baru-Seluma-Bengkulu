<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\StrukturOrganisasi;

echo "=== Testing getKepalaDesa() Method ===\n\n";

// Simulate the controller method
$kepalaDesa = StrukturOrganisasi::where('level', 'kepala')
    ->where('kategori', 'pemerintahan')
    ->where('aktif', true)
    ->first();

$result = [
    'kepala_desa_nama' => $kepalaDesa->nama ?? 'Zultan Alhara',
    'nip' => $kepalaDesa->nip ?? 'NIP. -',
];

echo "Data yang akan di-pass ke PDF:\n";
print_r($result);

echo "\n=== Testing Array Merge ===\n\n";

$pdfData = [
    'nomor_surat' => '001/TEST/2025',
    'tanggal_surat' => '17 Januari 2025',
] + $result + [
    'nama_pemohon' => 'Test User',
];

echo "Final PDF Data:\n";
print_r($pdfData);
