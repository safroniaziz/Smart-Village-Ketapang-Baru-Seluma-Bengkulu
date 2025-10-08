<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PeruntukanLahan;

class PeruntukanLahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peruntukan_lahan = [
            [
                'kategori' => 'sawah',
                'sub_kategori' => 'tadah_hujan',
                'luas_hektar' => 75.00,
                'icon' => 'fas fa-seedling',
                'warna' => 'green',
                'deskripsi' => 'Sawah tadah hujan/rendengan untuk produksi padi',
                'urutan' => 1
            ],
            [
                'kategori' => 'sawah',
                'sub_kategori' => 'pasang_surut',
                'luas_hektar' => 5.00,
                'icon' => 'fas fa-seedling',
                'warna' => 'green',
                'deskripsi' => 'Sawah pasang surut memanfaatkan air laut',
                'urutan' => 2
            ],
            [
                'kategori' => 'kering',
                'sub_kategori' => 'pekarangan',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-home',
                'warna' => 'yellow',
                'deskripsi' => 'Area pekarangan rumah penduduk',
                'urutan' => 3
            ],
            [
                'kategori' => 'kering',
                'sub_kategori' => 'tegal_kebun',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-mountain',
                'warna' => 'yellow',
                'deskripsi' => 'Lahan tegal dan kebun rakyat',
                'urutan' => 4
            ],
            [
                'kategori' => 'kering',
                'sub_kategori' => 'ladang_huma',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-mountain',
                'warna' => 'yellow',
                'deskripsi' => 'Lahan ladang dan huma tradisional',
                'urutan' => 5
            ],
            [
                'kategori' => 'basah',
                'sub_kategori' => 'tambak',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-water',
                'warna' => 'cyan',
                'deskripsi' => 'Area tambak untuk budidaya perikanan',
                'urutan' => 6
            ],
            [
                'kategori' => 'basah',
                'sub_kategori' => 'kolam_empang',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-water',
                'warna' => 'cyan',
                'deskripsi' => 'Kolam dan empang air tawar',
                'urutan' => 7
            ],
            [
                'kategori' => 'perkebunan',
                'sub_kategori' => 'kelapa_sawit',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-tree',
                'warna' => 'purple',
                'deskripsi' => 'Perkebunan kelapa sawit',
                'urutan' => 8
            ],
            [
                'kategori' => 'perkebunan',
                'sub_kategori' => 'kelapa',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-tree',
                'warna' => 'purple',
                'deskripsi' => 'Perkebunan kelapa tradisional',
                'urutan' => 9
            ],
            [
                'kategori' => 'hutan',
                'sub_kategori' => 'hutan_negara',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-tree',
                'warna' => 'emerald',
                'deskripsi' => 'Area hutan negara dan konservasi',
                'urutan' => 10
            ],
            [
                'kategori' => 'fasilitas_umum',
                'sub_kategori' => 'pemerintahan',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-building',
                'warna' => 'red',
                'deskripsi' => 'Kantor desa dan fasilitas pemerintahan',
                'urutan' => 11
            ]
        ];

        foreach ($peruntukan_lahan as $data) {
            PeruntukanLahan::create($data);
        }
    }
}
