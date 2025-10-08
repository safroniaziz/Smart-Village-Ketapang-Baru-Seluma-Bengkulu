<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GalleryFoto;

class GalleryFotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('📸 Seeding Gallery Foto...');

        // Hapus data lama
        GalleryFoto::truncate();

        $galleries = [
            // Pantai Ancol Seluma
            [
                'judul' => 'Panorama Pantai Ancol Seluma',
                'deskripsi' => 'Pemandangan indah pantai dengan pasir putih dan air laut yang jernih',
                'kategori' => 'pantai',
                'url_foto' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800',
                'alt_text' => 'Pantai Ancol Seluma dari udara',
                'urutan' => 1,
                'photographer' => 'Dinas Pariwisata Seluma',
                'tanggal_foto' => '2024-08-15'
            ],
            [
                'judul' => 'Sunset di Pantai Ancol',
                'deskripsi' => 'Momen matahari terbenam yang memukau dengan gradasi warna emas',
                'kategori' => 'pantai',
                'url_foto' => 'https://images.unsplash.com/photo-1505142468610-359e7d316be0?w=800',
                'alt_text' => 'Sunset pantai yang indah',
                'urutan' => 2,
                'photographer' => 'Komunitas Fotografi Seluma',
                'tanggal_foto' => '2024-07-20'
            ],
            [
                'judul' => 'Area Bermain Anak',
                'deskripsi' => 'Fasilitas area bermain yang aman untuk anak-anak dengan ombak tenang',
                'kategori' => 'pantai',
                'url_foto' => 'https://images.unsplash.com/photo-1582721478779-0ae163c05a60?w=800',
                'alt_text' => 'Keluarga bermain di pantai',
                'urutan' => 3,
                'photographer' => 'Tim Dokumentasi Desa',
                'tanggal_foto' => '2024-09-10'
            ],
            [
                'judul' => 'Gazebo Tepi Pantai',
                'deskripsi' => 'Gazebo-gazebo yang tersedia untuk pengunjung beristirahat',
                'kategori' => 'pantai',
                'url_foto' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800',
                'alt_text' => 'Gazebo di tepi pantai',
                'urutan' => 4,
                'photographer' => 'Pengelola Wisata',
                'tanggal_foto' => '2024-06-25'
            ],

            // Makanan Khas
            [
                'judul' => 'Ikan Bakar Khas Seluma',
                'deskripsi' => 'Ikan segar hasil tangkapan nelayan lokal yang dibakar dengan bumbu tradisional',
                'kategori' => 'makanan_khas',
                'url_foto' => 'https://images.unsplash.com/photo-1544025162-d76694265947?w=800',
                'alt_text' => 'Ikan bakar dengan sambal',
                'urutan' => 1,
                'photographer' => 'Kuliner Nusantara',
                'tanggal_foto' => '2024-08-01'
            ],
            [
                'judul' => 'Kerupuk Ikan Tenggiri',
                'deskripsi' => 'Kerupuk tradisional berbahan dasar ikan tenggiri segar',
                'kategori' => 'makanan_khas',
                'url_foto' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?w=800',
                'alt_text' => 'Kerupuk ikan khas daerah',
                'urutan' => 2,
                'photographer' => 'UMKM Ketapang Baru',
                'tanggal_foto' => '2024-07-15'
            ],
            [
                'judul' => 'Gulai Ikan Patin',
                'deskripsi' => 'Gulai ikan patin dengan santan kelapa dan rempah-rempah pilihan',
                'kategori' => 'makanan_khas',
                'url_foto' => 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=800',
                'alt_text' => 'Gulai ikan dalam mangkuk',
                'urutan' => 3,
                'photographer' => 'Chef Tradisional',
                'tanggal_foto' => '2024-09-05'
            ],

            // Seni & Budaya
            [
                'judul' => 'Tari Tradisional Rejang',
                'deskripsi' => 'Pertunjukan tari tradisional Rejang yang mempesona',
                'kategori' => 'seni_budaya',
                'url_foto' => 'https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?w=800',
                'alt_text' => 'Penari tradisional dalam kostum adat',
                'urutan' => 1,
                'photographer' => 'Sanggar Seni Tradisional',
                'tanggal_foto' => '2024-08-17'
            ],
            [
                'judul' => 'Musik Tradisional Terbang',
                'deskripsi' => 'Ensemble musik tradisional dengan alat musik terbang',
                'kategori' => 'seni_budaya',
                'url_foto' => 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=800',
                'alt_text' => 'Musisi memainkan alat musik tradisional',
                'urutan' => 2,
                'photographer' => 'Grup Musik Tradisional',
                'tanggal_foto' => '2024-06-30'
            ],
            [
                'judul' => 'Festival Budaya Tahunan',
                'deskripsi' => 'Perayaan festival budaya yang melibatkan seluruh komunitas',
                'kategori' => 'seni_budaya',
                'url_foto' => 'https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=800',
                'alt_text' => 'Festival budaya dengan banyak pengunjung',
                'urutan' => 3,
                'photographer' => 'Panitia Festival',
                'tanggal_foto' => '2024-07-10'
            ],

            // Kerajinan Lokal
            [
                'judul' => 'Anyaman Pandan',
                'deskripsi' => 'Kerajinan anyaman pandan untuk tas dan peralatan rumah tangga',
                'kategori' => 'kerajinan',
                'url_foto' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800',
                'alt_text' => 'Kerajinan anyaman pandan',
                'urutan' => 1,
                'photographer' => 'Pengrajin Lokal',
                'tanggal_foto' => '2024-09-01'
            ],
            [
                'judul' => 'Kerajinan Bambu',
                'deskripsi' => 'Berbagai produk kerajinan dari bambu hasil karya tangan terampil',
                'kategori' => 'kerajinan',
                'url_foto' => 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=800',
                'alt_text' => 'Kerajinan bambu handmade',
                'urutan' => 2,
                'photographer' => 'Komunitas Pengrajin',
                'tanggal_foto' => '2024-08-20'
            ],

            // Aktivitas Wisata
            [
                'judul' => 'Memancing di Tepi Pantai',
                'deskripsi' => 'Aktivitas memancing yang populer di kalangan wisatawan',
                'kategori' => 'aktivitas',
                'url_foto' => 'https://images.unsplash.com/photo-1544984243-ec57ea16fe25?w=800',
                'alt_text' => 'Orang memancing di pantai',
                'urutan' => 1,
                'photographer' => 'Klub Memancing Lokal',
                'tanggal_foto' => '2024-07-05'
            ],
            [
                'judul' => 'Bermain Voli Pantai',
                'deskripsi' => 'Area voli pantai untuk aktivitas olahraga yang menyenangkan',
                'kategori' => 'aktivitas',
                'url_foto' => 'https://images.unsplash.com/photo-1544966503-7cc5ac882d5f?w=800',
                'alt_text' => 'Permainan voli pantai',
                'urutan' => 2,
                'photographer' => 'Tim Olahraga Pantai',
                'tanggal_foto' => '2024-08-25'
            ],

            // Pemandangan Alam
            [
                'judul' => 'Hutan Mangrove Sekitar',
                'deskripsi' => 'Ekosistem mangrove yang masih terjaga di sekitar pantai',
                'kategori' => 'pemandangan',
                'url_foto' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800',
                'alt_text' => 'Hutan mangrove yang hijau',
                'urutan' => 1,
                'photographer' => 'Pecinta Alam',
                'tanggal_foto' => '2024-06-10'
            ],
            [
                'judul' => 'Bukit Pandang Sekitar Pantai',
                'deskripsi' => 'Pemandangan dari bukit yang menghadap ke laut lepas',
                'kategori' => 'pemandangan',
                'url_foto' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800',
                'alt_text' => 'Pemandangan dari bukit ke laut',
                'urutan' => 2,
                'photographer' => 'Adventure Club',
                'tanggal_foto' => '2024-09-15'
            ]
        ];

        foreach ($galleries as $gallery) {
            GalleryFoto::create($gallery);
            $this->command->info("✅ Created: {$gallery['judul']} ({$gallery['kategori']})");
        }

        // Set first pantai photo as hero
        $heroPhoto = GalleryFoto::where('kategori', 'pantai')->first();
        if ($heroPhoto) {
            $heroPhoto->setAsHero();
            $this->command->info("⭐ Set as Hero: {$heroPhoto->judul}");
        }

        $this->command->info('🎉 Gallery Foto seeder completed successfully!');
        $this->command->info('📊 Total kategori: ' . count(GalleryFoto::getKategoriList()));
        $this->command->info('📸 Total foto: ' . GalleryFoto::count());
    }
}
