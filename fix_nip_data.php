<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\StrukturOrganisasi;

echo "=== Fixing NIP Data ===\n\n";

// Fix semua data yang masih pakai format lama "NIP. -"
$strukturWithOldFormat = StrukturOrganisasi::where('nip', 'NIP. -')
    ->orWhere('nip', 'LIKE', 'NIP.%')
    ->get();

if ($strukturWithOldFormat->count() > 0) {
    echo "Ditemukan " . $strukturWithOldFormat->count() . " data dengan format lama\n\n";
    
    foreach ($strukturWithOldFormat as $struktur) {
        $oldNip = $struktur->nip;
        
        // Jika kepala desa, set NIP contoh
        if ($struktur->level == 'kepala' && $struktur->kategori == 'pemerintahan') {
            $struktur->nip = '19800101 200604 1 001';
            echo "✅ Update Kepala Desa: {$struktur->nama}\n";
            echo "   Old: {$oldNip}\n";
            echo "   New: {$struktur->nip}\n\n";
        } else {
            // Untuk yang lain, set ke "-"
            $struktur->nip = '-';
            echo "✅ Update {$struktur->jabatan}: {$struktur->nama}\n";
            echo "   Old: {$oldNip}\n";
            echo "   New: {$struktur->nip}\n\n";
        }
        
        $struktur->save();
    }
    
    echo "\n✅ Selesai! Semua NIP sudah diperbaiki\n";
    echo "💡 Silakan ubah NIP Kepala Desa melalui Admin Panel sesuai data sebenarnya\n";
} else {
    echo "✅ Tidak ada data yang perlu diperbaiki\n";
}
