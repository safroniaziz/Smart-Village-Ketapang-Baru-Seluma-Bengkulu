<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FasilitasDesa;

class FasilitasDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fasilitas = [
            [
                'nama_fasilitas' => 'Balai Desa Ketapang Baru',
                'kategori' => 'pemerintahan',
                'deskripsi' => 'Kantor pusat pemerintahan desa dengan koordinat GPS yang terverifikasi',
                'alamat' => 'Desa Ketapang Baru, Kec. Semidang Alas Maras',
                'kondisi' => 'baik',
                'tahun_dibangun' => 2010,
                'luas_bangunan' => 200.00,
                'luas_tanah' => 500.00,
                'status_kepemilikan' => 'milik_desa',
                'fasilitas_yang_tersedia' => 'Ruang kepala desa, ruang rapat, ruang pelayanan masyarakat, toilet',
                'kapasitas' => 50,
                'pengelola' => 'Pemerintah Desa',
                'foto' => null,
                'koordinat' => '-4.3221828, 102.7635049',
                'urutan' => 1
            ],
            [
                'nama_fasilitas' => 'TPU (Tempat Pemakaman Umum)',
                'kategori' => 'umum',
                'deskripsi' => 'Pemakaman umum desa dengan luas 1 hektar',
                'alamat' => 'Desa Ketapang Baru',
                'kondisi' => 'baik',
                'tahun_dibangun' => 1990,
                'luas_bangunan' => 0.00,
                'luas_tanah' => 10000.00, // 1 hektar = 10000 m2
                'status_kepemilikan' => 'milik_desa',
                'fasilitas_yang_tersedia' => 'Lahan pemakaman, akses jalan',
                'kapasitas' => 500, // estimasi kapasitas makam
                'pengelola' => 'Pemerintah Desa',
                'foto' => null,
                'koordinat' => null,
,
                'urutan' => 2
            ],
            [
                'nama_fasilitas' => 'SD Negeri Ketapang Baru',
                'kategori' => 'pendidikan',
                'deskripsi' => 'Sekolah Dasar Negeri yang melayani pendidikan dasar untuk anak-anak desa',
                'alamat' => 'Desa Ketapang Baru',
                'kondisi' => 'baik',
                'tahun_dibangun' => 1995,
                'luas_bangunan' => 400.00,
                'luas_tanah' => 1000.00,
                'status_kepemilikan' => 'pemerintah',
                'fasilitas_yang_tersedia' => 'Ruang kelas, ruang guru, perpustakaan, toilet, lapangan',
                'kapasitas' => 150,
                'pengelola' => 'Dinas Pendidikan',
                'foto' => null,
                'koordinat' => null,
,
                'urutan' => 3
            ],
            [
                'nama_fasilitas' => 'Masjid Al-Ikhlas',
                'kategori' => 'ibadah',
                'deskripsi' => 'Masjid utama desa untuk kegiatan ibadah dan keagamaan',
                'alamat' => 'Desa Ketapang Baru',
                'kondisi' => 'baik',
                'tahun_dibangun' => 2000,
                'luas_bangunan' => 300.00,
                'luas_tanah' => 600.00,
                'status_kepemilikan' => 'hibah',
                'fasilitas_yang_tersedia' => 'Ruang sholat, mihrab, mimbar, toilet, tempat wudhu',
                'kapasitas' => 200,
                'pengelola' => 'Takmir Masjid',
                'foto' => null,
                'koordinat' => null,
,
                'urutan' => 4
            ],
            [
                'nama_fasilitas' => 'Mushola An-Nur',
                'kategori' => 'ibadah',
                'deskripsi' => 'Mushola di area Dusun untuk ibadah sehari-hari',
                'alamat' => 'Dusun II, Desa Ketapang Baru',
                'kondisi' => 'baik',
                'tahun_dibangun' => 2005,
                'luas_bangunan' => 100.00,
                'luas_tanah' => 200.00,
                'status_kepemilikan' => 'hibah',
                'fasilitas_yang_tersedia' => 'Ruang sholat, tempat wudhu',
                'kapasitas' => 50,
                'pengelola' => 'Masyarakat Dusun',
                'foto' => null,
                'koordinat' => null,
,
                'urutan' => 5
            ]
        ];

        foreach ($fasilitas as $item) {
            FasilitasDesa::create($item);
        }
    }
}
