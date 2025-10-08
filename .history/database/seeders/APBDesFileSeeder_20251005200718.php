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

        // Data BLT-DD tahun 2025 (sesuai dokumen resmi - 18 KK dengan total 64.800.000)
        $bltData2025 = [
            [
                'tahun' => 2025,
                'user_id' => 1,
                'nama_penerima' => 'Muhammad Hasyim',
                'nik_penerima' => '1705050811920002',
                'jumlah_bantuan' => 3600000, // 64.800.000 / 18 KK = 3.600.000 per KK
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 2,
                'nama_penerima' => 'Dapit Kiswanto',
                'nik_penerima' => '1705052807870001',
                'jumlah_bantuan' => 3600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 3,
                'nama_penerima' => 'Widia Kartini',
                'nik_penerima' => '1771101470870005',
                'jumlah_bantuan' => 3600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 4,
                'nama_penerima' => 'Nasir',
                'nik_penerima' => '1705050101430023',
                'jumlah_bantuan' => 3600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 5,
                'nama_penerima' => 'Sihaini',
                'nik_penerima' => '1705055205560001',
                'jumlah_bantuan' => 3600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 6,
                'nama_penerima' => 'Ridun',
                'nik_penerima' => '1705050205082284',
                'jumlah_bantuan' => 3600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 7,
                'nama_penerima' => 'Luna',
                'nik_penerima' => '1705050402200003',
                'jumlah_bantuan' => 3600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 8,
                'nama_penerima' => 'Baruya',
                'nik_penerima' => '1705056704500001',
                'jumlah_bantuan' => 3600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 9,
                'nama_penerima' => 'Sekeran',
                'nik_penerima' => '1705050708740001',
                'jumlah_bantuan' => 3600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 10,
                'nama_penerima' => 'Hadi Kusumo',
                'nik_penerima' => '1705050107750079',
                'jumlah_bantuan' => 3600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 11,
                'nama_penerima' => 'Casim',
                'nik_penerima' => '1705050506340001',
                'jumlah_bantuan' => 3600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 12,
                'nama_penerima' => 'Sumar Hadi',
                'nik_penerima' => '1705052709630001',
                'jumlah_bantuan' => 3600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 13,
                'nama_penerima' => 'Remen',
                'nik_penerima' => '1705052806790001',
                'jumlah_bantuan' => 3600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 14,
                'nama_penerima' => 'Eni Purwanti',
                'nik_penerima' => '1705055206750001',
                'jumlah_bantuan' => 3600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 15,
                'nama_penerima' => 'Lasarman',
                'nik_penerima' => '1702101212680003',
                'jumlah_bantuan' => 3600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 16,
                'nama_penerima' => 'Pauzan',
                'nik_penerima' => '1705050706870002',
                'jumlah_bantuan' => 3600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 17,
                'nama_penerima' => 'Medo',
                'nik_penerima' => '1705052205950001',
                'jumlah_bantuan' => 3600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 18,
                'nama_penerima' => 'Yuhadi',
                'nik_penerima' => '1705051501850003',
                'jumlah_bantuan' => 3600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ]
        ];

        // Data Pagu Earmark Desa 2025
        $paguEarmarkData2025 = [
            [
                'tahun' => 2025,
                'kegiatan' => 'Bantuan Langsung Tunai (BLT - DD)',
                'satuan' => '18 KK',
                'jumlah_pagu' => 64800000,
                'sumber_dana' => 'Dana Desa',
                'keterangan' => 'Bantuan langsung tunai untuk 18 Kepala Keluarga'
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
