<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MonografiDesa;

class MonografiDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MonografiDesa::create([
            'nama_desa' => 'Ketapang Baru',
            'kecamatan' => 'Semidang Alas Maras',
            'kabupaten' => 'Seluma',
            'provinsi' => 'Bengkulu',
            'kode_pos' => '38875',
            'kode_area' => '170505',
            'status_desa' => 'Desa Berkembang',
            'tahun_berdiri' => 1985,
            'luas_wilayah' => 24771.00, // dalam hektar
            'ketinggian_mdpl' => 3, // 3 meter di atas permukaan laut
            'topografi' => 'Datar-Berombak',
            'iklim' => 'Tropis Pesisir',
            'suhu_rata_rata' => '23-30°C',
            'jarak_ke_kecamatan' => 3.0, // 3 km ke kecamatan
            'waktu_ke_kecamatan' => 0.2, // 0,2 jam
            'jarak_ke_kabupaten' => 55.0, // 55 km ke kabupaten
            'waktu_ke_kabupaten' => 1.5, // 1,5 jam
            'latitude' => -4.3221828,
            'longitude' => 102.7635049,
            'google_street_view_url' => 'https://www.google.com/maps/@-4.3221828,102.7635049,3a,75y,82.05h,79.18t/data=!3m7!1e1!3m5!1sPFCbe1x0vFzhf8kg4ySPRA!2e0',
            'deskripsi' => 'Desa Ketapang Baru adalah desa pesisir yang terletak di Kecamatan Semidang Alas Maras, Kabupaten Seluma, Provinsi Bengkulu. Desa ini memiliki potensi besar dalam sektor pertanian, perikanan, dan pariwisata bahari dengan status sebagai Desa Digital Terdepan.'
        ]);
    }
}
