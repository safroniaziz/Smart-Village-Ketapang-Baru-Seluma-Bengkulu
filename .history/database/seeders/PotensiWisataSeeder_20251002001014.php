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
                'kontak' => '+62 813-6789-0123 (Pengelola Wisata)',
                'latitude' => -4.0642,
                'longitude' => 102.4707,
                'status_aktif' => true,
                'urutan' => 1,
                'jumlah_pengunjung' => 15420
            ]
        ];

        foreach ($wisataData as $wisata) {
            PotensiWisata::create($wisata);
            $this->command->info("✅ Created: {$wisata['nama']}");
        }

        $this->command->info('🎉 Potensi Wisata seeder completed successfully!');
    }
}
