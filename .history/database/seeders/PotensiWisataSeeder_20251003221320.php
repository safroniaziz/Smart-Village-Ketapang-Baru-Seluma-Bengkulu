<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PotensiWisata;
use App\Services\ImageProcessingService;

class PotensiWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🏖️ Seeding Potensi Wisata Pantai Ancol Seluma...');

        // Copy PDF file to storage
        $this->copyPdfFileToStorage();

        // Initialize Image Processing Service
        $imageProcessor = new ImageProcessingService();

        // Original gallery data from external URLs
        $originalGalleryData = [
            [
                'url' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800',
                'judul' => 'Pemandangan Pantai dari Udara',
                'keterangan' => 'Panorama indah Pantai Ancol Seluma yang terlihat dari atas dengan hamparan pasir putih dan air laut yang jernih.'
            ],
            [
                'url' => 'https://images.unsplash.com/photo-1505142468610-359e7d316be0?w=800',
                'judul' => 'Sunset di Pantai Ancol',
                'keterangan' => 'Momen matahari terbenam yang memukau di Pantai Ancol Seluma, menciptakan gradasi warna emas di langit dan laut.'
            ],
            [
                'url' => 'https://images.unsplash.com/photo-1582721478779-0ae163c05a60?w=800',
                'judul' => 'Area Bermain Anak',
                'keterangan' => 'Fasilitas area bermain yang aman untuk anak-anak dengan pasir putih yang lembut dan ombak yang tenang.'
            ],
            [
                'url' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800',
                'judul' => 'Gazebo dan Tempat Istirahat',
                'keterangan' => 'Gazebo-gazebo yang tersedia untuk pengunjung beristirahat sambil menikmati pemandangan pantai.'
            ],
            [
                'url' => 'https://images.unsplash.com/photo-1544984243-ec57ea16fe25?w=800',
                'judul' => 'Aktivitas Memancing',
                'keterangan' => 'Spot memancing yang populer di Pantai Ancol Seluma dengan hasil tangkapan ikan laut yang beragam.'
            ],
            [
                'url' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800',
                'judul' => 'Fasilitas Parkir dan Warung',
                'keterangan' => 'Area parkir yang luas dan warung-warung makanan khas Seluma yang menyajikan kuliner lezat.'
            ]
        ];

        // Process images to create consistent landscape gallery
        $this->command->info('🖼️ Processing gallery images to landscape format...');
        $this->command->info('📸 Processing from external URLs (can also handle uploaded files)...');
        $processedGallery = $imageProcessor->processGalleryImages($originalGalleryData);

        $wisataData = [
            [
                'nama' => 'Pantai Ancol Seluma',
                'deskripsi' => '<p>Pantai Ancol Seluma merupakan destinasi wisata unggulan di Kabupaten Seluma, Bengkulu yang menawarkan keindahan alam yang memukau dengan hamparan pasir putih yang lembut dan air laut yang jernih kebiruan.</p>

                <p>Pantai ini menjadi tempat favorit wisatawan untuk menikmati sunset yang spektakuler, berenang di air yang tenang, atau sekedar bersantai di bawah rindangnya pohon kelapa. Dengan fasilitas yang lengkap seperti gazebo, area parkir yang luas, dan warung-warung kuliner khas Seluma.</p>

                <p>Keindahan alam Pantai Ancol Seluma yang masih alami membuat pengunjung dapat merasakan kedamaian dan ketenangan yang jauh dari hiruk pikuk kota. Cocok untuk liburan keluarga, retreat, atau sebagai lokasi foto pre-wedding yang romantis.</p>

                <p><strong>Video Tour:</strong> Saksikan keindahan Pantai Ancol Seluma dari udara melalui video drone eksklusif yang menampilkan panorama menakjubkan dari berbagai sudut pandang.</p>

                <p><em>Sumber video: YT Pilot Drone</em></p>',
                'lokasi' => 'Desa Ketapang Baru, Kecamatan Seluma, Kabupaten Seluma, Provinsi Bengkulu',
                'gambar' => $processedGallery,
                'video_youtube' => 'https://www.youtube.com/watch?v=dmW7ahw35gw',
                'sumber_video' => 'YT Pilot Drone',
                'file_potensi_desa' => 'files/berkas-lomba-desa-wisata-ketapang-baru.pdf',
                'views' => 1542
            ]
        ];

        foreach ($wisataData as $wisata) {
            PotensiWisata::create($wisata);
            $this->command->info("✅ Created: {$wisata['nama']}");
        }

        $this->command->info('🎉 Potensi Wisata seeder completed successfully!');
    }
}
