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

        // Data BLT-DD tahun 2025 (sesuai screenshot yang diberikan)
        $bltData2025 = [
            [
                'tahun' => 2025,
                'user_id' => 1,
                'nama_penerima' => 'WARNI',
                'nik_penerima' => '1709044209620001',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 2,
                'nama_penerima' => 'SUHARTINI',
                'nik_penerima' => '1709044209680003',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 3,
                'nama_penerima' => 'SUPINAH',
                'nik_penerima' => '1709044209700003',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 4,
                'nama_penerima' => 'SUNARSIH',
                'nik_penerima' => '1709044209650002',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 5,
                'nama_penerima' => 'SITI ZUBAIDAH',
                'nik_penerima' => '1709044209630001',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 6,
                'nama_penerima' => 'SITI ROHANI',
                'nik_penerima' => '1709044209660002',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 7,
                'nama_penerima' => 'SITI PATIMAH',
                'nik_penerima' => '1709044209630003',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 8,
                'nama_penerima' => 'SITI MARDIAH',
                'nik_penerima' => '1709044209600001',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 9,
                'nama_penerima' => 'SITI KHODIJAH',
                'nik_penerima' => '1709044209710002',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 10,
                'nama_penerima' => 'SITI HALIMAH',
                'nik_penerima' => '1709044209650001',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 11,
                'nama_penerima' => 'SITI AMINAH',
                'nik_penerima' => '1709044209590002',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 12,
                'nama_penerima' => 'SARIYEM',
                'nik_penerima' => '1709044209620002',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 13,
                'nama_penerima' => 'SALMIYAH',
                'nik_penerima' => '1709044209580001',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 14,
                'nama_penerima' => 'RUKIYAH',
                'nik_penerima' => '1709044209650003',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 15,
                'nama_penerima' => 'ROHAYATI',
                'nik_penerima' => '1709044209690001',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 16,
                'nama_penerima' => 'RODIYAH',
                'nik_penerima' => '1709044209610002',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 17,
                'nama_penerima' => 'RASMI',
                'nik_penerima' => '1709044209630002',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 18,
                'nama_penerima' => 'RAMLAH',
                'nik_penerima' => '1709044209600002',
                'jumlah_bantuan' => 600000,
                'bulan' => 'januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 19,
                'nama_penerima' => 'PARTINI',
                'nik_penerima' => '1709044209640001',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 20,
                'nama_penerima' => 'PAINEM',
                'nik_penerima' => '1709044209600003',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 21,
                'nama_penerima' => 'NURHAYATI',
                'nik_penerima' => '1709044209710003',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 22,
                'nama_penerima' => 'NURHANI',
                'nik_penerima' => '1709044209700001',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 23,
                'nama_penerima' => 'NURSIAH',
                'nik_penerima' => '1709044209640002',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 24,
                'nama_penerima' => 'NURBAYA',
                'nik_penerima' => '1709044209670001',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 25,
                'nama_penerima' => 'NURBANIYAH',
                'nik_penerima' => '1709044209710001',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 26,
                'nama_penerima' => 'NURAMIN',
                'nik_penerima' => '1709044209670002',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 27,
                'nama_penerima' => 'NAFISAH',
                'nik_penerima' => '1709044209680001',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 28,
                'nama_penerima' => 'NAFSIAH',
                'nik_penerima' => '1709044209690002',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 29,
                'nama_penerima' => 'MULYATI',
                'nik_penerima' => '1709044209660001',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 30,
                'nama_penerima' => 'MUNIROH',
                'nik_penerima' => '1709044209680002',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 31,
                'nama_penerima' => 'MISDI',
                'nik_penerima' => '1709044209670003',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 32,
                'nama_penerima' => 'MASPIYAH',
                'nik_penerima' => '1709044209640003',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 33,
                'nama_penerima' => 'MARNI',
                'nik_penerima' => '1709044209590001',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 34,
                'nama_penerima' => 'MARIYEM',
                'nik_penerima' => '1709044209700002',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 35,
                'nama_penerima' => 'KUSPANAH',
                'nik_penerima' => '1709044209610001',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 36,
                'nama_penerima' => 'KHUSNUL KHOTIMAH',
                'nik_penerima' => '1709044209580002',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 37,
                'nama_penerima' => 'KASMIRAH',
                'nik_penerima' => '1709044209590003',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 38,
                'nama_penerima' => 'JARIYAH',
                'nik_penerima' => '1709044209580003',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 39,
                'nama_penerima' => 'JAELANI',
                'nik_penerima' => '1709044209610003',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ],
            [
                'tahun' => 2025,
                'user_id' => 40,
                'nama_penerima' => 'HALIJAH',
                'nik_penerima' => '1709044209690003',
                'jumlah_bantuan' => 600000,
                'bulan' => 'Januari',
                'status' => 'Sudah Disalurkan'
            ]
        ];

        // Seed data BLT-DD 2025
        foreach ($bltData2025 as $bltData) {
            \App\Models\BltDd::create($bltData);
        }

        $this->command->info('APBDes data and BLT-DD 2025 seeded successfully with file references!');
    }
}
