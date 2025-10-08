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
            'kode_desa' => '16070101', // Kode kemendagri standar
            'nama_kecamatan' => 'Semidang Alas Maras',
            'nama_kabupaten' => 'Seluma',
            'nama_provinsi' => 'Bengkulu',
            'kode_pos' => '38875', // BARU: Data yang terlewat
            'kode_area' => '170505', // BARU: Data yang terlewat
            'tahun_pembentukan' => 1985,
            'dasar_hukum' => 'Keputusan Gubernur Bengkulu',
            'tipologi_desa' => 'Pesisir',
            'klasifikasi_desa' => 'Desa Berkembang',
            'kategori_desa' => 'Desa Digital Terdepan',
            'luas_wilayah' => 24771.00, // dalam hektar
            'batas_utara' => 'Muara Timput',
            'batas_selatan' => 'Padang Bakung',
            'batas_timur' => 'Talang Beringin',
            'batas_barat' => 'Laut',
            'orbitrasi_kecamatan' => 3.0, // 3 km ke kecamatan
            'orbitrasi_kabupaten' => 55.0, // 55 km ke kabupaten
            'orbitrasi_provinsi' => 85.0, // perkiraan jarak ke provinsi
            'waktu_ke_kecamatan' => 0.2, // BARU: 0,2 jam - Data yang terlewat
            'waktu_ke_kabupaten' => 1.5, // BARU: 1,5 jam - Data yang terlewat
            'jumlah_penduduk' => 2841, // sesuai data dari controller
            'jumlah_kk' => 890, // perkiraan KK
            'kepadatan_penduduk' => 11.47, // jiwa per km2
            'koordinat_kantor' => '-4.3221828, 102.7635049',
            'ketinggian_dpl' => 3 // 3 meter di atas permukaan laut
        ]);
    }
}
