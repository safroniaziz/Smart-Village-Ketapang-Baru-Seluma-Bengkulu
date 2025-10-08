<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BatasWilayah;

class BatasWilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batas_wilayah = [
            [
                'arah' => 'utara',
                'berbatasan_dengan' => 'Muara Timput',
                'jenis_wilayah' => 'desa',
                'jarak_km' => null,
                'landmark' => 'Sungai Timput',
                'koordinat' => null,
                'keterangan' => 'Berbatasan langsung dengan Desa Muara Timput'
            ],
            [
                'arah' => 'timur',
                'berbatasan_dengan' => 'Talang Beringin',
                'jenis_wilayah' => 'desa',
                'jarak_km' => null,
                'landmark' => 'Hutan dan perkebunan',
                'koordinat' => null,
                'keterangan' => 'Berbatasan dengan area perkebunan Talang Beringin'
            ],
            [
                'arah' => 'selatan',
                'berbatasan_dengan' => 'Padang Bakung',
                'jenis_wilayah' => 'desa',
                'jarak_km' => null,
                'landmark' => 'Area pesawahan',
                'koordinat' => null,
                'keterangan' => 'Berbatasan dengan area persawahan Padang Bakung'
            ],
            [
                'arah' => 'barat',
                'berbatasan_dengan' => 'Laut',
                'jenis_wilayah' => 'laut',
                'jarak_km' => 0.0,
                'landmark' => 'Pantai dan pesisir',
                'koordinat' => null,
                'keterangan' => 'Berbatasan langsung dengan laut, memiliki garis pantai'
            ]
        ];

        foreach ($batas_wilayah as $data) {
            BatasWilayah::create($data);
        }
    }
}
