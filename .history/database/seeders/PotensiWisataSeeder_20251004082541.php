<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
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
                'nama_wisata' => 'Pantai Ancol Seluma',
                'deskripsi' => 'Pantai Ancol Seluma merupakan destinasi wisata unggulan di Kabupaten Seluma dengan panorama alam yang menakjubkan. Pantai ini menawarkan hamparan pasir putih yang lembut, air laut yang jernih, dan suasana yang tenang, menjadikannya tempat yang sempurna untuk berlibur bersama keluarga.',
                'sumber_video' => 'YT Pilot Drone',
                'file_potensi_desa' => 'assets/files/BERKAS LOMBA DESA WISATA KETAPANG BARU.pdf',
                'views' => 1542
            ]
        ];

        foreach ($wisataData as $wisata) {
            PotensiWisata::create($wisata);
            $this->command->info("✅ Created: {$wisata['nama']}");
        }

        $this->command->info('🎉 Potensi Wisata seeder completed successfully!');
    }

    /**
     * Copy PDF file from public to storage
     */
    private function copyPdfFileToStorage(): void
    {
        $this->command->info('📄 Copying PDF file to storage...');

        $sourcePath = public_path('files/BERKAS LOMBA DESA WISATA KETAPANG BARU.pdf');
        $storagePath = 'files/berkas-lomba-desa-wisata-ketapang-baru.pdf';

        // Create files directory if not exists
        Storage::disk('public')->makeDirectory('files');

        if (file_exists($sourcePath)) {
            // Copy file to storage
            $fileContent = file_get_contents($sourcePath);
            Storage::disk('public')->put($storagePath, $fileContent);
            $this->command->info("✅ PDF copied to storage: {$storagePath}");
        } else {
            $this->command->warn("⚠️ Source PDF not found: {$sourcePath}");
            $this->command->info("💡 Creating placeholder PDF file for demo purposes...");

            // Create a simple placeholder text file as PDF substitute
            $placeholderContent = "Berkas Lomba Desa Wisata Ketapang Baru\n\nFile ini adalah placeholder untuk demo.\nFile PDF asli belum tersedia di lokasi: {$sourcePath}";
            Storage::disk('public')->put($storagePath, $placeholderContent);
        }
    }
}
