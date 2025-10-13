<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LahanPoint;

class LahanPointSeeder extends Seeder
{
    public function run(): void
    {
        $realData = [
            [
                // No.1 — Data Tidak ditemukan pada excel
                'nik' => '-',
                'nama_lengkap' => 'TABRIN',
                'lat' => '-4.314632',
                'long' => '102.763257',
            ],
            [
                // No.2
                'nik' => '1705052610030002',
                'nama_lengkap' => 'DAPIT HARJUNAI',
                'lat' => '-4.314632',
                'long' => '102.763257',
            ],
        ];

        foreach ($realData as $row) {
            LahanPoint::updateOrCreate(
                ['nik' => $row['nik'] ?? null, 'nama_lengkap' => $row['nama_lengkap'] ?? null],
                [
                    'lat' => $row['lat'] ?? null,
                    'long' => $row['long'] ?? null,
                ]
            );
        }
    }
}


