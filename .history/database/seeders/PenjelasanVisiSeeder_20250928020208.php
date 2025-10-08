<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PenjelasanVisi;

class PenjelasanVisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Bermartabat',
                'deskripsi' => 'Menjunjung tinggi nilai-nilai kemanusiaan dan harga diri dalam setiap aspek kehidupan bermasyarakat',
                'icon' => 'fas fa-heart',
                'warna' => 'yellow-400',
                'is_active' => true,
                'urutan' => 1
            ],
            [
                'judul' => 'Religius',
                'deskripsi' => 'Berdasarkan nilai-nilai agama dan spiritual yang menjadi landasan moral dalam pembangunan',
                'icon' => 'fas fa-mosque',
                'warna' => 'yellow-400',
                'is_active' => true,
                'urutan' => 2
            ],
            [
                'judul' => 'Potensi Sumberdaya',
                'deskripsi' => 'Mengoptimalkan sumber daya alam dan manusia untuk kesejahteraan bersama',
                'icon' => 'fas fa-seedling',
                'warna' => 'yellow-400',
                'is_active' => true,
                'urutan' => 3
            ]
        ];

        foreach ($data as $item) {
            PenjelasanVisi::create($item);
        }
    }
}
