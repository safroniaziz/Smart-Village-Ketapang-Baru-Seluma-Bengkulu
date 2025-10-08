<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PendekatanDesa;

class PendekatanDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pendekatanData = [
            [
                'nama_pendekatan' => 'Partisipasi Masyarakat',
                'deskripsi' => 'Melibatkan seluruh elemen masyarakat dalam setiap tahap perencanaan dan pelaksanaan pembangunan desa.',
                'strategi' => 'Mengadakan musyawarah desa, pembentukan kelompok kerja, dan mekanisme umpan balik yang efektif',
                'icon' => 'fas fa-users',
            ],
            [
                'nama_pendekatan' => 'Pembangunan Berkelanjutan',
                'deskripsi' => 'Menerapkan prinsip-prinsip pembangunan yang mempertimbangkan aspek ekonomi, sosial, dan lingkungan secara seimbang.',
                'strategi' => 'Integrasi perencanaan jangka panjang, pengelolaan sumber daya yang efisien, dan monitoring dampak lingkungan',
                'icon' => 'fas fa-leaf',
            ],
            [
                'nama_pendekatan' => 'Pemberdayaan Masyarakat',
                'deskripsi' => 'Meningkatkan kapasitas dan kemandirian masyarakat dalam mengelola pembangunan desa secara mandiri.',
                'strategi' => 'Pelatihan keterampilan, penguatan kelembagaan, dan akses terhadap sumber daya dan informasi',
                'icon' => 'fas fa-hands-helping',
            ],
            [
                'nama_pendekatan' => 'Kolaborasi Multi-Pihak',
                'deskripsi' => 'Membangun kerjasama yang sinergis antara pemerintah desa, swasta, LSM, dan organisasi masyarakat.',
                'strategi' => 'Memfasilitasi forum koordinasi, kemitraan strategis, dan sharing resources antar pihak',
                'icon' => 'fas fa-handshake',
            ]
        ];

        foreach ($pendekatanData as $pendekatan) {
            PendekatanDesa::create($pendekatan);
        }
    }
}