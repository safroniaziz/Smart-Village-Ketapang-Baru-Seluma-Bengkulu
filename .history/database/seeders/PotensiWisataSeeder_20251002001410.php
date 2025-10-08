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
                    'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800',
                    'https://images.unsplash.com/photo-1505142468610-359e7d316be0?w=800',
                    'https://images.unsplash.com/photo-1582721478779-0ae163c05a60?w=800',
                    'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=800',
                    'https://images.unsplash.com/photo-1544984243-ec57ea16fe25?w=800',
                    'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=800'
                ],
                'video_youtube' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'thumbnail' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800',
                'kategori_wisata' => 'pantai',
                'fasilitas' => ['toilet', 'parkir', 'warung'],
                'jam_operasional' => '24 Jam',
                'tiket_masuk' => 'Gratis',
                'kontak' => '+62 813-6789-0123',
                'status_aktif' => true,
                'urutan' => 1
            ]
        ];

        foreach ($wisataData as $wisata) {
            PotensiWisata::create($wisata);
            $this->command->info("✅ Created: {$wisata['nama']}");
        }

        $this->command->info('🎉 Potensi Wisata seeder completed successfully!');
    }
}
