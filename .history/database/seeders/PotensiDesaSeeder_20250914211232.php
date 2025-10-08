<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PotensiDesa;

class PotensiDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $potensi_desa = [
            [
                'kategori' => 'pertanian',
                'nama_potensi' => 'Padi Sawah',
                'deskripsi' => 'Komoditas utama desa dengan luas sawah mencapai 80 hektar, terdiri dari sawah tadah hujan dan pasang surut',
                'nilai_ekonomi' => 2500000000.00, // 2.5 miliar per tahun
                'jumlah_unit' => 80,
                'satuan' => 'hektar',
                'lokasi' => 'Area persawahan desa',
                'pengelola' => 'kelompok',
                'status' => 'aktif',
                'icon' => 'fas fa-wheat-awn',
                'foto' => null,
                'peluang_pengembangan' => 'Peningkatan produktivitas melalui teknologi pertanian modern dan irigasi yang lebih baik',
                'kendala' => 'Ketergantungan pada cuaca dan ketersediaan air',
                'is_unggulan' => true,
                'urutan' => 1
            ],
            [
                'kategori' => 'pertanian',
                'nama_potensi' => 'Kelapa',
                'deskripsi' => 'Perkebunan kelapa tradisional yang menjadi sumber pendapatan masyarakat',
                'nilai_ekonomi' => 800000000.00, // 800 juta per tahun
                'jumlah_unit' => 150,
                'satuan' => 'pohon',
                'lokasi' => 'Area pesisir dan pekarangan',
                'pengelola' => 'individu',
                'status' => 'aktif',
                'icon' => 'fas fa-tree',
                'foto' => null,
                'peluang_pengembangan' => 'Diversifikasi produk kelapa menjadi VCO, kopra, dan kerajinan',
                'kendala' => 'Harga jual yang fluktuatif dan akses pasar terbatas',
                'is_unggulan' => true,
                'urutan' => 2
            ],
            [
                'kategori' => 'pertanian',
                'nama_potensi' => 'Kelapa Sawit',
                'deskripsi' => 'Pengembangan perkebunan kelapa sawit sebagai komoditas ekspor',
                'nilai_ekonomi' => 500000000.00, // 500 juta per tahun
                'jumlah_unit' => 50,
                'satuan' => 'hektar',
                'lokasi' => 'Area perkebunan',
                'pengelola' => 'koperasi',
                'status' => 'berkembang',
                'icon' => 'fas fa-leaf',
                'foto' => null,
                'peluang_pengembangan' => 'Perluasan area tanam dan kemitraan dengan pabrik pengolahan',
                'kendala' => 'Modal awal yang besar dan masa tunggu produksi yang lama',
                'is_unggulan' => false,
                'urutan' => 3
            ],
            [
                'kategori' => 'perikanan',
                'nama_potensi' => 'Ikan Air Tawar',
                'deskripsi' => 'Perikanan di sungai dan muara dengan berbagai jenis ikan lokal',
                'nilai_ekonomi' => 600000000.00, // 600 juta per tahun
                'jumlah_unit' => 45,
                'satuan' => 'unit usaha',
                'lokasi' => 'Sungai dan muara',
                'pengelola' => 'kelompok',
                'status' => 'aktif',
                'icon' => 'fas fa-river',
                'foto' => null,
                'peluang_pengembangan' => 'Pengembangan budidaya ikan dalam keramba dan kolam',
                'kendala' => 'Pencemaran air dan overfishing',
                'is_unggulan' => true,
                'urutan' => 4
            ],
            [
                'kategori' => 'perikanan',
                'nama_potensi' => 'Ikan Laut',
                'deskripsi' => 'Perikanan laut dengan akses langsung ke pantai',
                'nilai_ekonomi' => 900000000.00, // 900 juta per tahun
                'jumlah_unit' => 60,
                'satuan' => 'unit usaha',
                'lokasi' => 'Pantai dan laut',
                'pengelola' => 'kelompok',
                'status' => 'aktif',
                'icon' => 'fas fa-waves',
                'foto' => null,
                'peluang_pengembangan' => 'Modernisasi alat tangkap dan cold storage',
                'kendala' => 'Cuaca buruk dan keterbatasan modal untuk kapal modern',
                'is_unggulan' => true,
                'urutan' => 5
            ],
            [
                'kategori' => 'wisata',
                'nama_potensi' => 'Pantai Ancol Seluma',
                'deskripsi' => 'Destinasi wisata alam pantai dengan keindahan yang memukau',
                'nilai_ekonomi' => 300000000.00, // 300 juta per tahun
                'jumlah_unit' => 1,
                'satuan' => 'lokasi',
                'lokasi' => 'Pantai Ancol Seluma',
                'pengelola' => 'kelompok',
                'status' => 'berkembang',
                'icon' => 'fas fa-umbrella-beach',
                'foto' => null,
                'peluang_pengembangan' => 'Pengembangan fasilitas wisata dan promosi digital',
                'kendala' => 'Infrastruktur akses dan fasilitas pendukung yang terbatas',
                'is_unggulan' => true,
                'urutan' => 6
            ],
            [
                'kategori' => 'teknologi',
                'nama_potensi' => 'Smart Village System',
                'deskripsi' => 'Sistem desa digital untuk pelayanan publik dan informasi masyarakat',
                'nilai_ekonomi' => 100000000.00, // 100 juta nilai investasi
                'jumlah_unit' => 1,
                'satuan' => 'sistem',
                'lokasi' => 'Kantor desa dan seluruh wilayah',
                'pengelola' => 'koperasi',
                'status' => 'aktif',
                'icon' => 'fas fa-laptop',
                'foto' => null,
                'peluang_pengembangan' => 'Ekspansi layanan digital dan integrasi dengan sistem e-government',
                'kendala' => 'Keterbatasan SDM IT dan infrastruktur internet',
                'is_unggulan' => false,
                'urutan' => 7
            ],
            [
                'kategori' => 'perdagangan',
                'nama_potensi' => 'Sumber Daya Manusia',
                'deskripsi' => 'Masyarakat dengan semangat gotong royong dan komitmen untuk berkembang',
                'nilai_ekonomi' => null,
                'jumlah_unit' => 2841,
                'satuan' => 'jiwa',
                'lokasi' => 'Seluruh desa',
                'pengelola' => 'koperasi',
                'status' => 'aktif',
                'icon' => 'fas fa-users',
                'foto' => null,
                'peluang_pengembangan' => 'Pelatihan keterampilan dan pengembangan kewirausahaan',
                'kendala' => 'Akses pendidikan dan pelatihan yang terbatas',
                'is_unggulan' => false,
                'urutan' => 8
            ]
        ];

        foreach ($potensi_desa as $data) {
            PotensiDesa::create($data);
        }
    }
}
