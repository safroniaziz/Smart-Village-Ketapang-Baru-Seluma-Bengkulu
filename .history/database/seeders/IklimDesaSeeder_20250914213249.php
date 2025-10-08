<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\IklimDesa;

class IklimDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IklimDesa::create([
            'jenis_iklim' => 'Tropis Pesisir',
            'suhu_min' => 23.00,
            'suhu_max' => 30.00,
            'kelembaban_rata' => 85.00, // %
            'curah_hujan_tahunan' => 2500, // mm per tahun (estimasi daerah pesisir Bengkulu)
            'musim_kering' => 'Juni - September',
            'musim_hujan' => 'Oktober - Mei',
            'karakteristik_iklim' => 'Iklim tropis dengan pengaruh laut, curah hujan tinggi, kelembaban tinggi, suhu relatif stabil sepanjang tahun',
            'angin_dominan' => 'Angin Laut (Barat-Barat Daya)',
            'hari_hujan_pertahun' => 180, // hari (estimasi)
            'is_active' => true
        ]);
    }
}
