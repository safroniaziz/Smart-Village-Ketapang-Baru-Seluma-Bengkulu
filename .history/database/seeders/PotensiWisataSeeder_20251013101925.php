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
        $this->command->info('🏖️ Seeding Potensi Wisata - Pantai Ancol Seluma...');

        // Initialize Image Processing Service
        $imageProcessor = new ImageProcessingService();

        // Gallery data for Pantai Ancol Seluma
        $pantaiGallery = [
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
                'judul' => 'Gazebo Tepi Pantai',
                'keterangan' => 'Gazebo-gazebo yang tersebar di sepanjang pantai untuk bersantai sambil menikmati pemandangan laut.'
            ]
        ];

        // Process gallery images
        $this->command->info('🖼️ Processing gallery images...');
        $processedGallery = $imageProcessor->processMixedGalleryData($pantaiGallery);

        // Data Pantai Ancol Seluma
        $wisataData = [
            [
                'nama' => 'Pantai Ancol Seluma',
                'deskripsi' => 'Pantai Ancol Seluma adalah destinasi wisata pantai yang memukau di Kabupaten Seluma, Bengkulu. Dengan hamparan pasir putih yang lembut dan air laut yang jernih berwarna biru tosca, pantai ini menawarkan pengalaman wisata yang tak terlupakan. Pantai ini dikelilingi oleh hutan mangrove yang masih alami dan bukit-bukit hijau yang menciptakan panorama yang sangat indah.',
                'lokasi' => 'Desa Ancol, Kecamatan Seluma, Kabupaten Seluma, Bengkulu',
                'aktivitas_wisata' => 'Berenang, bermain pasir, fotografi, menikmati sunset, memancing, berjalan-jalan di tepi pantai, dan bersantai di gazebo.',
                'nomor_telepon' => '+62 812-3456-7890',
                'whatsapp' => '+62 812-3456-7890',
                'info_guide' => 'Pemandu wisata lokal tersedia untuk menjelaskan sejarah dan keunikan Pantai Ancol Seluma',
                'jam_buka' => '06:00 - 18:00 WIB',
                'harga_tiket' => 'Rp 5.000 per orang',
                'fasilitas_parkir' => 'Tersedia area parkir luas untuk kendaraan roda dua dan empat',
                'warung_makan' => 'Warung-warung tradisional menyajikan makanan laut segar dan minuman khas',
                'gambar' => $processedGallery,
                'fitur_unggulan' => [
                    [
                        'icon' => 'fas fa-water',
                        'judul' => 'Air Laut Jernih',
                        'deskripsi' => 'Air laut yang sangat jernih dengan gradasi warna biru tosca yang memukau.'
                    ],
                    [
                        'icon' => 'fas fa-sun',
                        'judul' => 'Sunset Spektakuler',
                        'deskripsi' => 'Momen sunset yang sangat indah dengan gradasi warna emas dan oranye di langit.'
                    ],
                    [
                        'icon' => 'fas fa-leaf',
                        'judul' => 'Ekosistem Alami',
                        'deskripsi' => 'Dikelilingi hutan mangrove yang masih terjaga dan berbagai jenis burung laut.'
                    ],
                    [
                        'icon' => 'fas fa-child',
                        'judul' => 'Ramah Keluarga',
                        'deskripsi' => 'Area yang aman dan nyaman untuk keluarga dengan anak-anak.'
                    ]
                ],
                'video_youtube' => 'https://www.youtube.com/watch?v=DENsLsFdHKw',
                'sumber_video' => 'YT Aneka Hobi',
                'file_potensi_desa' => 'assets/files/berkas-lomba-desa-wisata-ketapang-baru.pdf',
                'views' => 1542
            ]
        ];

        foreach ($wisataData as $wisata) {
            PotensiWisata::updateOrCreate(
                ['nama' => $wisata['nama']], // Match by nama
                $wisata // Update with all data
            );
            $this->command->info("✅ Updated: {$wisata['nama']}");
        }

        $this->command->info('🎉 Potensi Wisata seeder completed successfully!');
        $this->command->info('📊 Total data: ' . PotensiWisata::count());
    }
}