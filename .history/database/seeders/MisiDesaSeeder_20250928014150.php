<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MisiDesa;

class MisiDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $misiData = [
            [
                'judul' => 'Meningkatkan Kualitas Sumber Daya Manusia',
                'deskripsi' => 'Mengembangkan program pendidikan dan pelatihan yang komprehensif untuk meningkatkan keterampilan dan pengetahuan masyarakat desa.',
                'indikator' => 'Peningkatan tingkat pendidikan, jumlah pelatihan yang diikuti, dan keterampilan teknis masyarakat',
                'is_active' => true
            ],
            [
                'judul' => 'Mengembangkan Ekonomi Kerakyatan',
                'deskripsi' => 'Mendorong pertumbuhan ekonomi lokal melalui pengembangan UMKM, koperasi, dan sektor produktif lainnya.',
                'indikator' => 'Peningkatan jumlah UMKM, pertumbuhan ekonomi lokal, dan penyerapan tenaga kerja',
                'is_active' => true
            ],
            [
                'judul' => 'Memperkuat Infrastruktur Desa',
                'deskripsi' => 'Membangun dan memperbaiki infrastruktur dasar seperti jalan, jembatan, irigasi, dan fasilitas umum lainnya.',
                'indikator' => 'Peningkatan kualitas infrastruktur, aksesibilitas, dan konektivitas desa',
                'is_active' => true
            ],
            [
                'judul' => 'Melestarikan Lingkungan dan Budaya',
                'deskripsi' => 'Menjaga kelestarian lingkungan alam dan budaya lokal sebagai aset berharga desa.',
                'indikator' => 'Kondisi lingkungan yang terjaga, pelestarian budaya lokal, dan partisipasi masyarakat dalam konservasi',
                'is_active' => true
            ],
            [
                'judul' => 'Meningkatkan Pelayanan Publik',
                'deskripsi' => 'Menyediakan pelayanan publik yang berkualitas, transparan, dan responsif terhadap kebutuhan masyarakat.',
                'indikator' => 'Tingkat kepuasan masyarakat, efisiensi pelayanan, dan transparansi pengelolaan',
                'is_active' => true
            ]
        ];

        foreach ($misiData as $misi) {
            MisiDesa::create($misi);
        }
    }
}