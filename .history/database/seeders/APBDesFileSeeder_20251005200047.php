<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\APBDes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class APBDesFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        APBDes::truncate();

        // Copy files to storage/app/public jika belum ada
        $sourceFiles = [
            'APBDes 2024.pdf' => 'apbdes-2024.pdf',
            'APBDes tahun 2025.pdf' => 'apbdes-2025.pdf'
        ];

        foreach ($sourceFiles as $sourceFile => $targetFile) {
            $sourcePath = public_path('assets/files/' . $sourceFile);
            $targetPath = 'apbdes/' . $targetFile;

            if (file_exists($sourcePath)) {
                // Buat direktori jika belum ada
                Storage::disk('public')->makeDirectory('apbdes');

                // Copy file
                Storage::disk('public')->put($targetPath, file_get_contents($sourcePath));

                $this->command->info("Copied: {$sourceFile} -> storage/app/public/{$targetPath}");
            } else {
                $this->command->warn("File not found: {$sourcePath}");
            }
        }

        $apbdesData = [
            // TAHUN 2024 - PENDAPATAN (Berdasarkan data resmi APBDes 2024)
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'PAD',
                'anggaran' => 0,
                'keterangan_detail' => 'Pendapatan Asli Desa',
                'file_apbdes' => 'apbdes/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Dana Desa',
                'anggaran' => 741017000,
                'keterangan_detail' => 'Dana Desa dari APBN',
                'file_apbdes' => 'apbdes/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Alokasi Dana Desa',
                'anggaran' => 319120989,
                'keterangan_detail' => 'Alokasi Dana Desa dari Kabupaten',
                'file_apbdes' => 'apbdes/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Bunga Bank',
                'anggaran' => 200000,
                'keterangan_detail' => 'Bunga Bank dari dana desa di bank',
                'file_apbdes' => 'apbdes/apbdes-2024.pdf'
            ],

            // TAHUN 2024 - BELANJA (Berdasarkan data resmi APBDes 2024)
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Penyelenggaraan Belanja Siltap, Tunjangan dan Operasional Pemerintah Desa',
                'anggaran' => 327030989,
                'keterangan_detail' => 'Bidang Penyelenggaraan Pemerintahan Desa - ADD,DD',
                'file_apbdes' => 'apbdes/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Sub Bidang Pendidikan',
                'anggaran' => 240862500,
                'keterangan_detail' => 'Bidang Pembangunan Desa - DD',
                'file_apbdes' => 'apbdes/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Sub Bidang Kesehatan',
                'anggaran' => 50400000,
                'keterangan_detail' => 'Bidang Pembangunan Desa - DD',
                'file_apbdes' => 'apbdes/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Sub Bidang Pekerjaan Umum dan Penataan Ruang',
                'anggaran' => 92855500,
                'keterangan_detail' => 'Bidang Pembangunan Desa - DD',
                'file_apbdes' => 'apbdes/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Sub Bidang Kawasan Pemukiman',
                'anggaran' => 62594000,
                'keterangan_detail' => 'Bidang Pembangunan Desa - DD',
                'file_apbdes' => 'apbdes/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Sub Bidang Perhubungan, Komunikasi dan Informatika',
                'anggaran' => 43000000,
                'keterangan_detail' => 'Bidang Pembangunan Desa - DD',
                'file_apbdes' => 'apbdes/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Sub Bidang Pariwisata',
                'anggaran' => 2000000,
                'keterangan_detail' => 'Bidang Pembangunan Desa - DD',
                'file_apbdes' => 'apbdes/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Sub Bidang Ketrampilan, Ketertiban Umum dan Perundungan Masyarakat',
                'anggaran' => 6480000,
                'keterangan_detail' => 'Bidang Pembinaan Masyarakat - ADD',
                'file_apbdes' => 'apbdes/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Sub Bidang Kebudayaan dan Keagamaan',
                'anggaran' => 7020000,
                'keterangan_detail' => 'Bidang Pembinaan Masyarakat - ADD',
                'file_apbdes' => 'apbdes/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Sub Bidang Kelembagaan Masyarakat',
                'anggaran' => 1020000,
                'keterangan_detail' => 'Bidang Pembinaan Masyarakat - ADD',
                'file_apbdes' => 'apbdes/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Sub Bidang Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga',
                'anggaran' => 13875000,
                'keterangan_detail' => 'Bidang Pemberdayaan Masyarakat - DD',
                'file_apbdes' => 'apbdes/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Sub Bidang Keadaan Mendesak',
                'anggaran' => 64800000,
                'keterangan_detail' => 'Bidang Penanggulangan Bencana, Darurat, dan Mendesak - DD',
                'file_apbdes' => 'apbdes/apbdes-2024.pdf'
            ],

            // TAHUN 2025 - PENDAPATAN (sesuai dokumen resmi)
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Alokasi Dana Desa',
                'anggaran' => 319120989,
                'keterangan_detail' => 'Dana transfer dari pemerintah kabupaten berdasarkan perda',
                'file_apbdes' => 'apbdes/apbdes-2025.pdf'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Dana Desa',
                'anggaran' => 741017000,
                'keterangan_detail' => 'Dana transfer dari pemerintah pusat sesuai alokasi dana desa tahun 2025',
                'file_apbdes' => 'apbdes/apbdes-2025.pdf'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Pendapatan Lain - Lain',
                'anggaran' => 200000,
                'keterangan_detail' => 'Pendapatan lain-lain yang sah',
                'file_apbdes' => 'apbdes/apbdes-2025.pdf'
            ],            // TAHUN 2025 - BELANJA (sesuai dokumen resmi)
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Bidang Penyelenggaraan Pemerintahan Desa',
                'anggaran' => 327030989,
                'keterangan_detail' => 'Belanja untuk penyelenggaraan pemerintahan desa',
                'file_apbdes' => 'apbdes/apbdes-2025.pdf'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Bidang Pelaksanaan Pembangunan Desa',
                'anggaran' => 491711950,
                'keterangan_detail' => 'Infrastruktur dan pembangunan fisik desa',
                'file_apbdes' => 'apbdes/apbdes-2025.pdf'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Bidang Pembinaan Kemasyarakatan Desa',
                'anggaran' => 14520000,
                'keterangan_detail' => 'Kegiatan PKK, karang taruna, dan organisasi masyarakat',
                'file_apbdes' => 'apbdes/apbdes-2025.pdf'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Bidang Pemberdayaan Masyarakat Desa',
                'anggaran' => 13875050,
                'keterangan_detail' => 'Program pemberdayaan dan pelatihan masyarakat',
                'file_apbdes' => 'apbdes/apbdes-2025.pdf'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Bidang Penanggulangan Bencana, Keadaan Darurat dan Mendesak Desa',
                'anggaran' => 64800000,
                'keterangan_detail' => 'Cadangan untuk keadaan darurat dan bencana alam',
                'file_apbdes' => 'apbdes/apbdes-2025.pdf'
            ]
        ];

        foreach ($apbdesData as $data) {
            APBDes::create($data);
        }

        $this->command->info('APBDes data seeded successfully with file references!');
    }
}
