<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\StrukturOrganisasi;

echo "=== Testing Kepala Desa Data ===\n\n";

$kepalaDesa = StrukturOrganisasi::where('level', 'kepala')
    ->where('kategori', 'pemerintahan')
    ->where('aktif', true)
    ->first();

if ($kepalaDesa) {
    echo "✅ Kepala Desa ditemukan:\n";
    echo "   Nama: " . $kepalaDesa->nama . "\n";
    echo "   Jabatan: " . $kepalaDesa->jabatan . "\n";
    echo "   NIP: " . ($kepalaDesa->nip ?? 'NULL') . "\n";
    echo "   Level: " . $kepalaDesa->level . "\n";
    echo "   Kategori: " . $kepalaDesa->kategori . "\n";
    echo "   Aktif: " . ($kepalaDesa->aktif ? 'Ya' : 'Tidak') . "\n";
} else {
    echo "❌ Kepala Desa tidak ditemukan!\n";
    echo "\nMencari semua data struktur organisasi:\n";
    
    $all = StrukturOrganisasi::all();
    echo "Total data: " . $all->count() . "\n\n";
    
    foreach ($all as $struktur) {
        echo "- {$struktur->nama} ({$struktur->jabatan}) - Level: {$struktur->level}, Kategori: {$struktur->kategori}, Aktif: " . ($struktur->aktif ? 'Ya' : 'Tidak') . "\n";
    }
}
