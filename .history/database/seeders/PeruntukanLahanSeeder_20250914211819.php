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
            // Tanah Pertanian
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
                'icon' => 'fas fa-water',
                'warna' => 'teal',
                'deskripsi' => 'Sawah pasang surut memanfaatkan air laut',
                'urutan' => 2
            ],
            [
                'kategori' => 'tanah_kosong',
                'sub_kategori' => 'lahan_kosong',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-map',
                'warna' => 'gray',
                'deskripsi' => 'Tanah kosong yang belum dimanfaatkan',
                'urutan' => 3
            ],
            [
                'kategori' => 'irigasi',
                'sub_kategori' => 'teknis',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-tint',
                'warna' => 'blue',
                'deskripsi' => 'Lahan dengan sistem irigasi teknis',
                'urutan' => 4
            ],
            [
                'kategori' => 'irigasi',
                'sub_kategori' => 'setengah_teknis',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-tint',
                'warna' => 'blue',
                'deskripsi' => 'Lahan dengan sistem irigasi setengah teknis',
                'urutan' => 5
            ],
            [
                'kategori' => 'basah',
                'sub_kategori' => 'rawa',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-water',
                'warna' => 'cyan',
                'deskripsi' => 'Area rawa dan lahan basah',
                'urutan' => 6
            ],
            [
                'kategori' => 'kering',
                'sub_kategori' => 'pekarangan',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-home',
                'warna' => 'yellow',
                'deskripsi' => 'Area pekarangan rumah penduduk',
                'urutan' => 7
            ],
            [
                'kategori' => 'kering',
                'sub_kategori' => 'tegal_kebun',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-mountain',
                'warna' => 'yellow',
                'deskripsi' => 'Lahan tegal dan kebun rakyat',
                'urutan' => 8
            ],
            [
                'kategori' => 'kering',
                'sub_kategori' => 'ladang_huma',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-mountain',
                'warna' => 'yellow',
                'deskripsi' => 'Lahan ladang dan huma tradisional',
                'urutan' => 9
            ],
            [
                'kategori' => 'basah',
                'sub_kategori' => 'tambak',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-fish',
                'warna' => 'cyan',
                'deskripsi' => 'Area tambak untuk budidaya perikanan',
                'urutan' => 10
            ],
            [
                'kategori' => 'basah',
                'sub_kategori' => 'kolam_empang',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-water',
                'warna' => 'cyan',
                'deskripsi' => 'Kolam dan empang air tawar',
                'urutan' => 11
            ],
            // Perkebunan
            [
                'kategori' => 'perkebunan',
                'sub_kategori' => 'karet',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-tree',
                'warna' => 'amber',
                'deskripsi' => 'Perkebunan karet rakyat',
                'urutan' => 12
            ],
            [
                'kategori' => 'perkebunan',
                'sub_kategori' => 'kelapa_sawit',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-tree',
                'warna' => 'orange',
                'deskripsi' => 'Perkebunan kelapa sawit',
                'urutan' => 13
            ],
            [
                'kategori' => 'perkebunan',
                'sub_kategori' => 'kelapa',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-tree',
                'warna' => 'green',
                'deskripsi' => 'Perkebunan kelapa tradisional',
                'urutan' => 14
            ],
            [
                'kategori' => 'perkebunan',
                'sub_kategori' => 'lainnya',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-tree',
                'warna' => 'purple',
                'deskripsi' => 'Perkebunan tanaman lainnya',
                'urutan' => 15
            ],
            // Kawasan Hutan
            [
                'kategori' => 'hutan',
                'sub_kategori' => 'hutan_lindung',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-shield-alt',
                'warna' => 'emerald',
                'deskripsi' => 'Hutan lindung untuk konservasi',
                'urutan' => 16
            ],
            [
                'kategori' => 'hutan',
                'sub_kategori' => 'hutan_produksi',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-tree',
                'warna' => 'emerald',
                'deskripsi' => 'Hutan produksi untuk hasil hutan',
                'urutan' => 17
            ],
            [
                'kategori' => 'hutan',
                'sub_kategori' => 'hutan_rakyat',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-tree',
                'warna' => 'emerald',
                'deskripsi' => 'Hutan rakyat milik masyarakat',
                'urutan' => 18
            ],
            [
                'kategori' => 'hutan',
                'sub_kategori' => 'semak_belukar',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-leaf',
                'warna' => 'emerald',
                'deskripsi' => 'Area semak belukar',
                'urutan' => 19
            ],
            // Fasilitas Umum
            [
                'kategori' => 'fasilitas_umum',
                'sub_kategori' => 'tanah_kuburan',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-cross',
                'warna' => 'gray',
                'deskripsi' => 'Area pemakaman umum',
                'urutan' => 20
            ],
            [
                'kategori' => 'fasilitas_umum',
                'sub_kategori' => 'kantor_desa',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-building',
                'warna' => 'red',
                'deskripsi' => 'Kantor desa dan fasilitas pemerintahan',
                'urutan' => 21
            ],
            [
                'kategori' => 'fasilitas_umum',
                'sub_kategori' => 'sekolah',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-school',
                'warna' => 'blue',
                'deskripsi' => 'Fasilitas pendidikan dan sekolah',
                'urutan' => 22
            ],
            [
                'kategori' => 'fasilitas_umum',
                'sub_kategori' => 'masjid_mushola',
                'luas_hektar' => 0.00,
                'icon' => 'fas fa-mosque',
                'warna' => 'green',
                'deskripsi' => 'Masjid dan mushola untuk ibadah',
                'urutan' => 23
            ]
        ];

        foreach ($peruntukan_lahan as $data) {
            PeruntukanLahan::create($data);
        }
    }
}
