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

                 [
                'tahun_anggaran' => 2025,
                'kegiatan' => 'Penguatan Desa Yang Adaptif Terhadap Perubahan Iklim',
                'satuan' => '2 Paket',
                'jumlah_pagu' => 59354400,
                'keterangan' => 'Program adaptasi perubahan iklim desa dari Dana Desa'
            ],py files to storage/app/public jika belum ada
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

        // Data BLT-DD tahun 2025 (sesuai dokumen resmi - 18 KK dengan total 64.800.000)
        $bltData2025 = [
            [
                'tahun_anggaran' => 2025,
                'nama' => 'Muhammad Hasyim',
                'jenis_kelamin' => 'L',
                'nik' => '1705050811920002',
                'alamat' => 'Dusun 3',
                'nominal_bantuan' => 3600000, // 64.800.000 / 18 KK = 3.600.000 per KK
                'no_rekening' => null
            ],
            [
                'tahun_anggaran' => 2025,
                'nama' => 'Dapit Kiswanto',
                'jenis_kelamin' => 'L',
                'nik' => '1705052807870001',
                'alamat' => 'Dusun 3',
                'nominal_bantuan' => 3600000,
                'no_rekening' => null
            ],
            [
                'tahun_anggaran' => 2025,
                'nama' => 'Widia Kartini',
                'jenis_kelamin' => 'P',
                'nik' => '1771101470870005',
                'alamat' => 'Dusun 2',
                'nominal_bantuan' => 3600000,
                'no_rekening' => null
            ],
            [
                'tahun_anggaran' => 2025,
                'nama' => 'Nasir',
                'jenis_kelamin' => 'L',
                'nik' => '1705050101430023',
                'alamat' => 'Dusun 3',
                'nominal_bantuan' => 3600000,
                'no_rekening' => null
            ],
            [
                'tahun_anggaran' => 2025,
                'nama' => 'Sihaini',
                'jenis_kelamin' => 'P',
                'nik' => '1705055205560001',
                'alamat' => 'Dusun 1',
                'nominal_bantuan' => 3600000,
                'no_rekening' => null
            ],
            [
                'tahun_anggaran' => 2025,
                'nama' => 'Ridun',
                'jenis_kelamin' => 'L',
                'nik' => '1705050205082284',
                'alamat' => 'Dusun 1',
                'nominal_bantuan' => 3600000,
                'no_rekening' => null
            ],
            [
                'tahun_anggaran' => 2025,
                'nama' => 'Luna',
                'jenis_kelamin' => 'P',
                'nik' => '1705050402200003',
                'alamat' => 'Dusun 1',
                'nominal_bantuan' => 3600000,
                'no_rekening' => null
            ],
            [
                'tahun_anggaran' => 2025,
                'nama' => 'Baruya',
                'jenis_kelamin' => 'P',
                'nik' => '1705056704500001',
                'alamat' => 'Dusun 1',
                'nominal_bantuan' => 3600000,
                'no_rekening' => null
            ],
            [
                'tahun_anggaran' => 2025,
                'nama' => 'Sekeran',
                'jenis_kelamin' => 'L',
                'nik' => '1705050708740001',
                'alamat' => 'Dusun 1',
                'nominal_bantuan' => 3600000,
                'no_rekening' => null
            ],
            [
                'tahun_anggaran' => 2025,
                'nama' => 'Hadi Kusumo',
                'jenis_kelamin' => 'L',
                'nik' => '1705050107750079',
                'alamat' => 'Dusun 1',
                'nominal_bantuan' => 3600000,
                'no_rekening' => null
            ],
            [
                'tahun_anggaran' => 2025,
                'nama' => 'Casim',
                'jenis_kelamin' => 'L',
                'nik' => '1705050506340001',
                'alamat' => 'Dusun 2',
                'nominal_bantuan' => 3600000,
                'no_rekening' => null
            ],
            [
                'tahun_anggaran' => 2025,
                'nama' => 'Sumar Hadi',
                'jenis_kelamin' => 'L',
                'nik' => '1705052709630001',
                'alamat' => 'Dusun 3',
                'nominal_bantuan' => 3600000,
                'no_rekening' => null
            ],
            [
                'tahun_anggaran' => 2025,
                'nama' => 'Remen',
                'jenis_kelamin' => 'L',
                'nik' => '1705052806790001',
                'alamat' => 'Dusun 3',
                'nominal_bantuan' => 3600000,
                'no_rekening' => null
            ],
            [
                'tahun_anggaran' => 2025,
                'nama' => 'Eni Purwanti',
                'jenis_kelamin' => 'P',
                'nik' => '1705055206750001',
                'alamat' => 'Dusun 3',
                'nominal_bantuan' => 3600000,
                'no_rekening' => null
            ],
            [
                'tahun_anggaran' => 2025,
                'nama' => 'Lasarman',
                'jenis_kelamin' => 'L',
                'nik' => '1702101212680003',
                'alamat' => 'Dusun 1',
                'nominal_bantuan' => 3600000,
                'no_rekening' => null
            ],
            [
                'tahun_anggaran' => 2025,
                'nama' => 'Pauzan',
                'jenis_kelamin' => 'L',
                'nik' => '1705050706870002',
                'alamat' => 'Dusun 2',
                'nominal_bantuan' => 3600000,
                'no_rekening' => null
            ],
            [
                'tahun_anggaran' => 2025,
                'nama' => 'Medo',
                'jenis_kelamin' => 'L',
                'nik' => '1705052205950001',
                'alamat' => 'Dusun 3',
                'nominal_bantuan' => 3600000,
                'no_rekening' => null
            ],
            [
                'tahun_anggaran' => 2025,
                'nama' => 'Yuhadi',
                'jenis_kelamin' => 'L',
                'nik' => '1705051501850003',
                'alamat' => 'Dusun 3',
                'nominal_bantuan' => 3600000,
                'no_rekening' => null
            ]
        ];

        // Data Pagu Earmark Desa 2025
        $paguEarmarkData2025 = [
            [
                'tahun_anggaran' => 2025,
                'kegiatan' => 'Bantuan Langsung Tunai (BLT - DD)',
                'satuan' => '18 KK',
                'jumlah_pagu' => 64800000,
                'keterangan' => 'Bantuan langsung tunai untuk 18 Kepala Keluarga dari Dana Desa'
            ],
            [
                'tahun' => 2025,
                'kegiatan' => 'Penguatan Desa Yang Adaptif Terhadap Perubahan Iklim',
                'satuan' => '2 Paket',
                'jumlah_pagu' => 59354400,
                'sumber_dana' => 'Dana Desa',
                'keterangan' => 'Program adaptasi perubahan iklim desa'
            ],
            [
                'tahun' => 2025,
                'kegiatan' => 'Peningkatan Promosi & Penyediaan Layanan Dasar Kesehatan Desa Termasuk Stunting',
                'satuan' => '3 Paket',
                'jumlah_pagu' => 64275050,
                'sumber_dana' => 'Dana Desa',
                'keterangan' => 'Program kesehatan dasar dan pencegahan stunting'
            ],
            [
                'tahun' => 2025,
                'kegiatan' => 'Dukungan Program Ketahanan Pangan',
                'satuan' => '1 Paket',
                'jumlah_pagu' => 148400000,
                'sumber_dana' => 'Dana Desa',
                'keterangan' => 'Program ketahanan pangan desa'
            ],
            [
                'tahun' => 2025,
                'kegiatan' => 'Pengembangan Potensi & Keunggulan Desa',
                'satuan' => '1 Paket',
                'jumlah_pagu' => 2000000,
                'sumber_dana' => 'Dana Desa',
                'keterangan' => 'Pengembangan potensi unggulan desa'
            ],
            [
                'tahun' => 2025,
                'kegiatan' => 'Pemanfaatan Teknologi & Informasi Untuk Percepatan Implementasi Desa Digital',
                'satuan' => '1 Paket',
                'jumlah_pagu' => 43000000,
                'sumber_dana' => 'Dana Desa',
                'keterangan' => 'Digitalisasi sistem informasi desa'
            ],
            [
                'tahun' => 2025,
                'kegiatan' => 'Pembangunan Berbasis Padat Karya Tunai & Penggunaan Bahan Lokal Desa',
                'satuan' => '1 Paket',
                'jumlah_pagu' => 3240000,
                'sumber_dana' => 'Dana Desa',
                'keterangan' => 'Program padat karya dengan bahan lokal'
            ]
        ];

        // Seed data BLT-DD 2025
        foreach ($bltData2025 as $bltData) {
            \App\Models\BltDd::create($bltData);
        }

        // Seed data Pagu Earmark 2025 (jika ada model PaguEarmark)
        foreach ($paguEarmarkData2025 as $paguData) {
            \App\Models\PaguEarmark::create($paguData);
        }

        $this->command->info('APBDes data, BLT-DD, and Pagu Earmark 2025 seeded successfully with file references!');
    }
}
