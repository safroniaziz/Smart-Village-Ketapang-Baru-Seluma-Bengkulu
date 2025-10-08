<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PotensiWisata;

class PotensiWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🏖️ Seeding Potensi Wisata Pantai Ancol Seluma...');

        $wisataData = [
            [
                'nama' => 'Pantai Ancol Seluma',
                'deskripsi' => 'Pantai Ancol Seluma merupakan destinasi wisata unggulan di Kabupaten Seluma, Bengkulu. Pantai ini menawarkan keindahan alam yang memukau dengan pasir putih yang lembut, air laut yang jernih, dan pemandangan sunset yang spektakuler. Terletak di Desa Ketapang Baru, pantai ini menjadi tempat favorit wisatawan untuk menikmati ketenangan alam, berenang, dan berbagai aktivitas pantai lainnya.

Keunikan Pantai Ancol Seluma terletak pada kombinasi antara keindahan alam yang masih asri dengan fasilitas yang memadai untuk kenyamanan pengunjung. Pantai ini juga memiliki nilai sejarah dan budaya lokal yang kental, menjadikannya tidak hanya sebagai tempat wisata tetapi juga sebagai warisan alam yang harus dilestarikan.

Aktivitas yang dapat dilakukan di pantai ini sangat beragam, mulai dari berenang, bermain voli pantai, memancing, hingga sekadar berjalan-jalan menikmati hembusan angin laut. Area pantai yang luas juga cocok untuk camping dan piknik bersama keluarga.',
                'lokasi' => 'Desa Ketapang Baru, Kecamatan Seluma, Kabupaten Seluma, Bengkulu',
                'gambar' => [
                    'https://lh3.googleusercontent.com/p/AF1QipNxQJZxRzQYKjHxHHxHHxHHx_example1',
                    'https://lh3.googleusercontent.com/p/AF1QipNxQJZxRzQYKjHxHHxHHxHHx_example2', 
                    'https://lh3.googleusercontent.com/p/AF1QipNxQJZxRzQYKjHxHHxHHxHHx_example3',
                    'https://lh3.googleusercontent.com/p/AF1QipNxQJZxRzQYKjHxHHxHHxHHx_example4',
                    'https://lh3.googleusercontent.com/p/AF1QipNxQJZxRzQYKjHxHHxHHxHHx_example5',
                    'https://lh3.googleusercontent.com/p/AF1QipNxQJZxRzQYKjHxHHxHHxHHx_example6'
                ],
                'video_youtube' => 'https://www.youtube.com/watch?v=VIDEO_ID_PANTAI_ANCOL',
                'thumbnail' => 'https://lh3.googleusercontent.com/p/AF1QipNxQJZxRzQYKjHxHHxHHxHHx_thumbnail',
                'kategori_wisata' => 'alam',
                'fasilitas' => ['toilet', 'parkir', 'warung', 'gazebo', 'musholla', 'wifi', 'penginapan'],
                'jam_operasional' => '24 Jam (Terbaik pukul 06:00-18:00)',
                'tiket_masuk' => 'Rp 5.000/orang',
                'kontak_informasi' => '+62 813-6789-0123 (Pengelola Wisata)',
                'latitude' => -4.0642,
                'longitude' => 102.4707,
                'status_aktif' => true,
                'urutan' => 1,
                'jumlah_pengunjung' => 15420
            ],
            [
                'nama' => 'Pantai Berkas',
                'deskripsi' => 'Pantai eksotis dengan batu karang unik dan air laut yang jernih. Terletak tidak jauh dari pusat kota Bengkulu, pantai ini menawarkan suasana yang tenang dan cocok untuk fotografi. Terdapat mercusuar bersejarah yang menambah keindahan pantai ini.',
                'lokasi' => 'Bengkulu Tengah, Bengkulu',
                'gambar' => [
                    'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800',
                    'https://images.unsplash.com/photo-1544984243-ec57ea16fe25?w=800'
                ],
                'video_youtube' => 'dQw4w9WgXcQ',
                'thumbnail' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800',
                'kategori_wisata' => 'pantai',
                'fasilitas' => ['toilet', 'parkir', 'warung', 'gazebo'],
                'jam_operasional' => '06:00 - 18:00',
                'tiket_masuk' => 'Rp 5.000',
                'kontak' => '+62 813-4567-8901',
                'latitude' => -3.7500,
                'longitude' => 102.2800,
                'status_aktif' => true,
                'urutan' => 2
            ],

            // Air Terjun
            [
                'nama' => 'Air Terjun Curug Embun',
                'deskripsi' => 'Air terjun yang tersembunyi di tengah hutan tropis dengan ketinggian sekitar 30 meter. Air terjun ini memiliki kolam alami yang jernih dan segar, cocok untuk berenang dan bermain air. Suasana hutan yang asri membuat tempat ini sempurna untuk healing dan melepas penat.',
                'lokasi' => 'Rejang Lebong, Bengkulu',
                'gambar' => [
                    'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800',
                    'https://images.unsplash.com/photo-1441906363616-80b4676b2dca?w=800',
                    'https://images.unsplash.com/photo-1518837695005-2083093ee35b?w=800'
                ],
                'video_youtube' => 'https://youtu.be/dQw4w9WgXcQ',
                'thumbnail' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800',
                'kategori_wisata' => 'air_terjun',
                'fasilitas' => ['toilet', 'parkir', 'warung', 'gazebo', 'guide'],
                'jam_operasional' => '08:00 - 17:00',
                'tiket_masuk' => 'Rp 10.000',
                'kontak' => '+62 814-5678-9012',
                'latitude' => -3.5000,
                'longitude' => 102.1500,
                'status_aktif' => true,
                'urutan' => 3
            ],

            // Budaya & Sejarah
            [
                'nama' => 'Benteng Marlborough',
                'deskripsi' => 'Benteng bersejarah peninggalan Inggris yang dibangun tahun 1714-1719. Benteng ini merupakan salah satu benteng terkuat di Asia Tenggara dengan arsitektur yang megah. Menyimpan sejarah panjang perjuangan rakyat Bengkulu melawan penjajah.',
                'lokasi' => 'Bengkulu, Sumatera Barat',
                'gambar' => [
                    'https://images.unsplash.com/photo-1583037189850-1921ae7c6c22?w=800',
                    'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800'
                ],
                'video_youtube' => 'dQw4w9WgXcQ',
                'thumbnail' => 'https://images.unsplash.com/photo-1583037189850-1921ae7c6c22?w=800',
                'kategori_wisata' => 'sejarah',
                'fasilitas' => ['toilet', 'parkir', 'guide', 'souvenir', 'wifi'],
                'jam_operasional' => '08:00 - 17:00',
                'tiket_masuk' => 'Rp 15.000',
                'kontak' => '+62 815-6789-0123',
                'latitude' => -3.8000,
                'longitude' => 102.2600,
                'status_aktif' => true,
                'urutan' => 4
            ],

            // Kuliner
            [
                'nama' => 'Pasar Minggu Bengkulu',
                'deskripsi' => 'Surga kuliner tradisional Bengkulu dengan berbagai macam makanan khas seperti Pendap, Lempah Kuning, dan Es Kacang Merah. Pasar ini ramai dikunjungi wisatawan yang ingin merasakan cita rasa autentik Bengkulu dengan harga yang terjangkau.',
                'lokasi' => 'Bengkulu, Sumatera Barat',
                'gambar' => [
                    'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=800',
                    'https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?w=800',
                    'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=800'
                ],
                'video_youtube' => 'dQw4w9WgXcQ',
                'thumbnail' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=800',
                'kategori_wisata' => 'kuliner',
                'fasilitas' => ['toilet', 'parkir', 'warung', 'wifi', 'atm'],
                'jam_operasional' => '06:00 - 14:00 (Minggu)',
                'tiket_masuk' => 'Gratis',
                'kontak' => '+62 816-7890-1234',
                'latitude' => -3.7900,
                'longitude' => 102.2700,
                'status_aktif' => true,
                'urutan' => 5
            ],

            // Alam & Adventure
            [
                'nama' => 'Danau Dendam Tak Sudah',
                'deskripsi' => 'Danau alami dengan legenda menarik yang terletak di ketinggian. Air danau yang jernih dan suasana sejuk menjadikan tempat ini perfect untuk camping dan fotografi. Dikelilingi bukit-bukit hijau yang menambah keindahan pemandangan.',
                'lokasi' => 'Bengkulu Tengah, Bengkulu',
                'gambar' => [
                    'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800',
                    'https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=800'
                ],
                'video_youtube' => 'https://youtube.com/watch?v=dQw4w9WgXcQ',
                'thumbnail' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800',
                'kategori_wisata' => 'alam',
                'fasilitas' => ['toilet', 'parkir', 'gazebo', 'camping', 'guide'],
                'jam_operasional' => '24 Jam',
                'tiket_masuk' => 'Rp 8.000',
                'kontak' => '+62 817-8901-2345',
                'latitude' => -3.6500,
                'longitude' => 102.2200,
                'status_aktif' => true,
                'urutan' => 6
            ],

            // Religi
            [
                'nama' => 'Masjid Jamik Bengkulu',
                'deskripsi' => 'Masjid bersejarah dengan arsitektur klasik yang memadukan gaya Melayu dan colonial. Dibangun pada masa Sultan Bengkulu, masjid ini menjadi pusat kegiatan keagamaan dan wisata religi. Interior yang indah dengan kaligrafi Arab menawan.',
                'lokasi' => 'Bengkulu, Sumatera Barat',
                'gambar' => [
                    'https://images.unsplash.com/photo-1564769625392-651b2280f45c?w=800',
                    'https://images.unsplash.com/photo-1542816417-0983c9c9ad53?w=800'
                ],
                'video_youtube' => 'dQw4w9WgXcQ',
                'thumbnail' => 'https://images.unsplash.com/photo-1564769625392-651b2280f45c?w=800',
                'kategori_wisata' => 'religi',
                'fasilitas' => ['toilet', 'parkir', 'mushola', 'guide', 'wifi'],
                'jam_operasional' => '05:00 - 21:00',
                'tiket_masuk' => 'Gratis',
                'kontak' => '+62 818-9012-3456',
                'latitude' => -3.7950,
                'longitude' => 102.2650,
                'status_aktif' => true,
                'urutan' => 7
            ],

            // Adventure
            [
                'nama' => 'Rafting Sungai Musi',
                'deskripsi' => 'Pengalaman arung jeram yang menantang di sungai Musi dengan tingkat kesulitan menengah. Dikelilingi hutan tropis yang masih asri dengan jeram-jeram yang menguji adrenalin. Cocok untuk petualang yang menyukai tantangan dan olahraga air.',
                'lokasi' => 'Kepahiang, Bengkulu',
                'gambar' => [
                    'https://images.unsplash.com/photo-1544551763-77ef2d0cfc6c?w=800',
                    'https://images.unsplash.com/photo-1558618042-5c918c2efe1a?w=800'
                ],
                'video_youtube' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'thumbnail' => 'https://images.unsplash.com/photo-1544551763-77ef2d0cfc6c?w=800',
                'kategori_wisata' => 'adventure',
                'fasilitas' => ['toilet', 'parkir', 'guide', 'rescue', 'warung'],
                'jam_operasional' => '08:00 - 16:00',
                'tiket_masuk' => 'Rp 150.000 (include equipment)',
                'kontak' => '+62 819-0123-4567',
                'latitude' => -3.4500,
                'longitude' => 102.1800,
                'status_aktif' => true,
                'urutan' => 8
            ]
        ];

        foreach ($wisataData as $wisata) {
            PotensiWisata::create($wisata);
            $this->command->info("✅ Created: {$wisata['nama']}");
        }

        $this->command->info('🎉 Potensi Wisata seeder completed successfully!');
    }
}
