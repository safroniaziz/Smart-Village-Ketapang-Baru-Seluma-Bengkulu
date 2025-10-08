<?php
require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== PERBAIKI JENIS KELAMIN NULL BERDASARKAN NAMA ===\n\n";

// Daftar nama yang umum untuk laki-laki
$maleNames = [
    'ahmad', 'muhammad', 'abdul', 'andi', 'budi', 'agus', 'slamet', 'bambang', 
    'hendra', 'anton', 'dedi', 'rudi', 'eko', 'imam', 'yusuf', 'ali', 'umar',
    'ibrahim', 'rahman', 'malik', 'farid', 'rizki', 'dimas', 'bayu', 'ardi',
    'joko', 'wawan', 'gunawan', 'sutrisno', 'supriyanto', 'wahyu', 'taufik',
    'admin', 'user'
];

// Daftar nama yang umum untuk perempuan
$femaleNames = [
    'siti', 'sri', 'nur', 'dewi', 'indra', 'fitri', 'rina', 'lina', 'maya', 
    'ratna', 'wati', 'ningsih', 'yanti', 'safitri', 'putri', 'ayu', 'kartini',
    'sari', 'wulandari', 'rahayu', 'suci', 'mutiara', 'anggraini', 'pratiwi',
    'lestari', 'handayani', 'permata', 'cahaya', 'fajar'
];

// Ambil semua user dengan jenis_kelamin NULL
$nullUsers = \App\Models\User::whereNull('jenis_kelamin')->get();

echo "Ditemukan " . $nullUsers->count() . " user dengan jenis kelamin NULL:\n\n";

$fixedCount = 0;

foreach ($nullUsers as $user) {
    $nama = strtolower($user->nama_lengkap);
    $detectedGender = 'Laki-laki'; // default
    $reason = 'default';
    
    // Cek apakah nama mengandung kata-kata perempuan
    foreach ($femaleNames as $femaleName) {
        if (strpos($nama, $femaleName) !== false) {
            $detectedGender = 'Perempuan';
            $reason = "mengandung '{$femaleName}'";
            break;
        }
    }
    
    // Jika belum ketemu perempuan, cek laki-laki
    if ($detectedGender == 'Laki-laki') {
        foreach ($maleNames as $maleName) {
            if (strpos($nama, $maleName) !== false) {
                $detectedGender = 'Laki-laki';
                $reason = "mengandung '{$maleName}'";
                break;
            }
        }
    }
    
    echo "ID: {$user->id}\n";
    echo "Nama: {$user->nama_lengkap}\n";
    echo "Email: {$user->email}\n";
    echo "NIK: " . ($user->nik ?? 'NULL') . "\n";
    echo "Jenis Kelamin Terdeteksi: {$detectedGender} ({$reason})\n";
    
    // Update jenis kelamin
    $user->update(['jenis_kelamin' => $detectedGender]);
    $fixedCount++;
    
    echo "✅ Updated!\n";
    echo "----------------------------------------\n";
}

echo "\n=== SELESAI ===\n";
echo "Total user yang diperbaiki: {$fixedCount}\n";
echo "\nVerifikasi hasil:\n";
echo "Total User: " . \App\Models\User::count() . "\n";
echo "Laki-laki: " . \App\Models\User::whereIn('jenis_kelamin', ['Laki-laki', 'L'])->count() . "\n";
echo "Perempuan: " . \App\Models\User::whereIn('jenis_kelamin', ['Perempuan', 'P'])->count() . "\n";
echo "NULL: " . \App\Models\User::whereNull('jenis_kelamin')->count() . "\n";