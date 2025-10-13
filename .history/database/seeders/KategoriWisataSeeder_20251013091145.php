<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('🏷️ Seeding Kategori Wisata...');

        $kategoris = [
            [
                'nama' => 'Wisata Alam',
                'deskripsi' => 'Destinasi wisata yang menonjolkan keindahan alam seperti pantai, gunung, hutan, dan air terjun',
                'icon' => 'fas fa-mountain',
                'warna' => '#10B981',
                'urutan' => 1
            ],
            [
                'nama' => 'Wisata Budaya',
                'deskripsi' => 'Wisata yang menampilkan kearifan lokal, tradisi, dan budaya masyarakat setempat',
                'icon' => 'fas fa-theater-masks',
                'warna' => '#8B5CF6',
                'urutan' => 2
            ],
            [
                'nama' => 'Wisata Kuliner',
                'deskripsi' => 'Pengalaman mencicipi makanan dan minuman khas daerah dengan cita rasa autentik',
                'icon' => 'fas fa-utensils',
                'warna' => '#F59E0B',
                'urutan' => 3
            ],
            [
                'nama' => 'Wisata Edukasi',
                'deskripsi' => 'Wisata yang memberikan pembelajaran dan wawasan tentang berbagai hal',
                'icon' => 'fas fa-graduation-cap',
                'warna' => '#3B82F6',
                'urutan' => 4
            ],
            [
                'nama' => 'Wisata Religi',
                'deskripsi' => 'Destinasi wisata yang berkaitan dengan tempat ibadah dan nilai-nilai spiritual',
                'icon' => 'fas fa-pray',
                'warna' => '#06B6D4',
                'urutan' => 5
            ],
            [
                'nama' => 'Wisata Adventure',
                'deskripsi' => 'Wisata petualangan dengan berbagai aktivitas menantang dan memacu adrenalin',
                'icon' => 'fas fa-hiking',
                'warna' => '#EF4444',
                'urutan' => 6
            ]
        ];

        foreach ($kategoris as $kategori) {
            \App\Models\KategoriWisata::updateOrCreate(
                ['nama' => $kategori['nama']],
                $kategori
            );
            $this->command->info("✅ Created: {$kategori['nama']}");
        }

        $this->command->info('🎉 Kategori Wisata seeded successfully!');
    }
}
