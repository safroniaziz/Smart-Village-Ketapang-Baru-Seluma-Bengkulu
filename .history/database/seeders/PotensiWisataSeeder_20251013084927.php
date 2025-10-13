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
        $this->command->info('🏖️ Seeding Multiple Potensi Wisata Categories...');

        // Initialize Image Processing Service
        $imageProcessor = new ImageProcessingService();

        // Gallery data for different categories
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
            ]
        ];

        $airTerjunGallery = [
            [
                'url' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800',
                'judul' => 'Air Terjun Utama',
                'keterangan' => 'Pemandangan air terjun yang memukau dengan ketinggian 50 meter dan kolam alami yang jernih.'
            ],
            [
                'url' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800',
                'judul' => 'Trek Menuju Air Terjun',
                'keterangan' => 'Jalur trekking yang menantang melalui hutan tropis dengan keanekaragaman flora dan fauna.'
            ],
            [
                'url' => 'https://images.unsplash.com/photo-1574263867128-a3d5c1b1dedc?w=800',
                'judul' => 'Kolam Renang Alami',
                'keterangan' => 'Area kolam alami di bawah air terjun yang cocok untuk berenang dan relaksasi.'
            ]
        ];

        $budayaGallery = [
            [
                'url' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800',
                'judul' => 'Rumah Adat Seluma',
                'keterangan' => 'Arsitektur tradisional Rumah Adat Seluma yang menampilkan keunikan budaya lokal.'
            ],
            [
                'url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800',
                'judul' => 'Pertunjukan Tari Tradisional',
                'keterangan' => 'Tarian khas daerah Seluma yang ditampilkan dalam berbagai acara budaya.'
            ],
            [
                'url' => 'https://images.unsplash.com/photo-1582046904170-d2ca4fa7d566?w=800',
                'judul' => 'Kerajinan Tangan Lokal',
                'keterangan' => 'Berbagai kerajinan tangan tradisional yang diproduksi oleh masyarakat setempat.'
            ]
        ];

        // Process galleries
        $this->command->info('🖼️ Processing gallery images...');
        $pantaiProcessed = $imageProcessor->processGalleryImages($pantaiGallery);
        $airTerjunProcessed = $imageProcessor->processGalleryImages($airTerjunGallery);
        $budayaProcessed = $imageProcessor->processGalleryImages($budayaGallery);

        $wisataData = [
            [
                'nama' => 'Pantai Ancol Seluma',
                'deskripsi' => 'Pantai Ancol Seluma merupakan destinasi wisata unggulan di Kabupaten Seluma dengan panorama alam yang menakjubkan. Pantai ini menawarkan hamparan pasir putih yang lembut, air laut yang jernih, dan suasana yang tenang, menjadikannya tempat yang sempurna untuk berlibur bersama keluarga.',
                'lokasi' => 'Ketapang Baru, Seluma, Bengkulu',
                'aktivitas_wisata' => 'Memancing tradisional, bermain dan rekreasi keluarga, jalan santai menikmati pemandangan pantai, piknik bersama keluarga, berenang di air yang jernih, dan berbagai aktivitas menarik lainnya yang cocok untuk semua usia.',
                'nomor_telepon' => '+62 812-3456-7890',
                'whatsapp' => '+62 812-3456-7890',
                'info_guide' => 'Tersedia guide lokal berpengalaman untuk menjelaskan sejarah dan keunikan Pantai Ancol Seluma',
                'jam_buka' => '24 Jam',
                'harga_tiket' => 'Gratis',
                'fasilitas_parkir' => 'Tersedia',
                'warung_makan' => 'Ada di sekitar pantai',
                'gambar' => $pantaiProcessed,
                'fitur_unggulan' => [
                    [
                        'icon' => 'fas fa-leaf',
                        'judul' => 'Alam Asri',
                        'deskripsi' => 'Lingkungan alami yang terjaga dengan keindahan pantai yang memukau dan udara segar.'
                    ],
                    [
                        'icon' => 'fas fa-tools',
                        'judul' => 'Fasilitas Lengkap',
                        'deskripsi' => 'Dilengkapi fasilitas pendukung seperti area parkir, warung makan, dan toilet yang bersih.'
                    ],
                    [
                        'icon' => 'fas fa-sun',
                        'judul' => 'Sunset Indah',
                        'deskripsi' => 'Nikmati momen sunset yang spektakuler dengan panorama langit yang menawan.'
                    ],
                    [
                        'icon' => 'fas fa-camera',
                        'judul' => 'Spot Foto Menarik',
                        'deskripsi' => 'Spot foto yang menawan untuk mengabadikan momen indah liburan Anda.'
                    ]
                ],
                'video_youtube' => 'https://www.youtube.com/watch?v=DENsLsFdHKw',
                'sumber_video' => 'YT Aneka Hobi',
                'file_potensi_desa' => 'assets/files/berkas-lomba-desa-wisata-ketapang-baru.pdf',
                'views' => 1542
            ],
            [
                'nama' => 'Air Terjun Curup Maung',
                'deskripsi' => 'Air Terjun Curup Maung adalah destinasi wisata alam yang mempesona dengan ketinggian sekitar 50 meter. Dikelilingi oleh hutan tropis yang lebat, air terjun ini menawarkan kesegaran alami dan keindahan yang menakjubkan bagi para pengunjung.',
                'lokasi' => 'Desa Maung, Seluma, Bengkulu',
                'aktivitas_wisata' => 'Trekking hutan, fotografi alam, berenang di kolam alami, bird watching, camping, dan menikmati ketenangan suara air terjun.',
                'nomor_telepon' => '+62 813-7654-3210',
                'whatsapp' => '+62 813-7654-3210',
                'info_guide' => 'Guide lokal tersedia untuk mengantar pengunjung melalui jalur trekking yang aman',
                'jam_buka' => '07:00 - 17:00',
                'harga_tiket' => 'Rp 15.000/orang',
                'fasilitas_parkir' => 'Tersedia di area masuk',
                'warung_makan' => 'Tersedia di pos masuk',
                'gambar' => $airTerjunProcessed,
                'fitur_unggulan' => [
                    [
                        'icon' => 'fas fa-mountain',
                        'judul' => 'Trekking Adventure',
                        'deskripsi' => 'Jalur trekking menantang melalui hutan tropis dengan pemandangan alam yang spektakuler.'
                    ],
                    [
                        'icon' => 'fas fa-water',
                        'judul' => 'Air Jernih',
                        'deskripsi' => 'Air terjun dengan air yang sangat jernih dan segar langsung dari mata air pegunungan.'
                    ],
                    [
                        'icon' => 'fas fa-tree',
                        'judul' => 'Hutan Tropis',
                        'deskripsi' => 'Ekosistem hutan tropis yang terjaga dengan flora dan fauna yang beragam.'
                    ]
                ],
                'video_youtube' => 'https://www.youtube.com/watch?v=example2',
                'sumber_video' => 'Wisata Bengkulu Channel',
                'views' => 847
            ],
            [
                'nama' => 'Desa Wisata Budaya Ketapang Baru',
                'deskripsi' => 'Desa Wisata Budaya Ketapang Baru menawarkan pengalaman autentik kehidupan masyarakat Seluma dengan berbagai atraksi budaya, kerajinan tradisional, dan kuliner khas daerah. Pengunjung dapat belajar langsung tentang tradisi dan adat istiadat setempat.',
                'lokasi' => 'Ketapang Baru, Seluma, Bengkulu',
                'aktivitas_wisata' => 'Workshop kerajinan tangan, pertunjukan tari tradisional, kuliner tour, homestay, belajar pertanian organik, dan interaksi dengan masyarakat lokal.',
                'nomor_telepon' => '+62 814-5678-9012',
                'whatsapp' => '+62 814-5678-9012',
                'info_guide' => 'Pemandu wisata lokal yang berpengalaman dalam sejarah dan budaya desa',
                'jam_buka' => '08:00 - 16:00',
                'harga_tiket' => 'Paket mulai Rp 50.000/orang',
                'fasilitas_parkir' => 'Luas dan aman',
                'warung_makan' => 'Rumah makan tradisional',
                'gambar' => $budayaProcessed,
                'latitude' => -4.0789,
                'longitude' => 102.0654,
                'fitur_unggulan' => [
                    [
                        'icon' => 'fas fa-home',
                        'judul' => 'Rumah Adat',
                        'deskripsi' => 'Arsitektur tradisional yang masih terjaga dengan baik dan penuh nilai sejarah.'
                    ],
                    [
                        'icon' => 'fas fa-music',
                        'judul' => 'Seni Budaya',
                        'deskripsi' => 'Pertunjukan seni budaya tradisional yang autentik dan menarik.'
                    ],
                    [
                        'icon' => 'fas fa-utensils',
                        'judul' => 'Kuliner Tradisional',
                        'deskripsi' => 'Makanan khas Seluma yang lezat dengan resep turun temurun.'
                    ]
                ],
                'video_youtube' => 'https://www.youtube.com/watch?v=example3',
                'sumber_video' => 'Budaya Nusantara TV',
                'views' => 1256,
                'status_aktif' => true
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
    }


}
