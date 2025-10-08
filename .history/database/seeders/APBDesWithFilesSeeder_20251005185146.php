<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\APBDes;

class APBDesWithFilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama jika ada
        APBDes::truncate();

        $apbdesData = [
            // TAHUN 2024 - PENDAPATAN
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Dana Desa dari APBN',
                'anggaran' => 800000000,
                'keterangan_detail' => 'Dana transfer dari pemerintah pusat sesuai alokasi dana desa tahun 2024',
                'file_apbdes' => 'assets/files/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Alokasi Dana Desa (ADD)',
                'anggaran' => 450000000,
                'keterangan_detail' => 'Dana transfer dari pemerintah kabupaten berdasarkan perda',
                'file_apbdes' => 'assets/files/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Dana Bagi Hasil Pajak dan Retribusi',
                'anggaran' => 75000000,
                'keterangan_detail' => 'Bagian desa dari pajak bumi dan bangunan serta retribusi daerah',
                'file_apbdes' => 'assets/files/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Pendapatan Asli Desa',
                'anggaran' => 125000000,
                'keterangan_detail' => 'Hasil usaha desa, hasil aset, swadaya, partisipasi dan gotong royong',
                'file_apbdes' => 'assets/files/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Bantuan Keuangan Provinsi',
                'anggaran' => 150000000,
                'keterangan_detail' => 'Bantuan langsung dari pemerintah provinsi untuk pembangunan desa',
                'file_apbdes' => 'assets/files/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Hibah dan Bantuan Pihak Ketiga',
                'anggaran' => 50000000,
                'keterangan_detail' => 'Bantuan dari CSR perusahaan dan lembaga lainnya',
                'file_apbdes' => 'assets/files/apbdes-2024.pdf'
            ],

            // TAHUN 2024 - BELANJA
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Belanja Penyelenggaraan Pemerintahan Desa',
                'anggaran' => 400000000,
                'keterangan_detail' => 'Gaji perangkat, operasional kantor, dan administrasi pemerintahan',
                'file_apbdes' => 'assets/files/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Belanja Pelaksanaan Pembangunan Desa',
                'anggaran' => 600000000,
                'keterangan_detail' => 'Infrastruktur jalan, drainase, dan fasilitas umum',
                'file_apbdes' => 'assets/files/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Belanja Pembinaan Kemasyarakatan',
                'anggaran' => 200000000,
                'keterangan_detail' => 'Kegiatan PKK, karang taruna, dan organisasi masyarakat',
                'file_apbdes' => 'assets/files/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Belanja Pemberdayaan Masyarakat',
                'anggaran' => 300000000,
                'keterangan_detail' => 'Program pelatihan, UMKM, dan pemberdayaan ekonomi masyarakat',
                'file_apbdes' => 'assets/files/apbdes-2024.pdf'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Belanja Tak Terduga',
                'anggaran' => 150000000,
                'keterangan_detail' => 'Cadangan untuk keadaan darurat dan bencana alam',
                'file_apbdes' => 'assets/files/apbdes-2024.pdf'
            ],

            // TAHUN 2025 - PENDAPATAN  
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Dana Desa dari APBN',
                'anggaran' => 850000000,
                'keterangan_detail' => 'Dana transfer dari pemerintah pusat sesuai alokasi dana desa tahun 2025 (naik 6.25%)',
                'file_apbdes' => 'assets/files/apbdes-2025.pdf'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Alokasi Dana Desa (ADD)',
                'anggaran' => 480000000,
                'keterangan_detail' => 'Dana transfer dari pemerintah kabupaten berdasarkan perda (naik 6.67%)',
                'file_apbdes' => 'assets/files/apbdes-2025.pdf'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Dana Bagi Hasil Pajak dan Retribusi',
                'anggaran' => 80000000,
                'keterangan_detail' => 'Bagian desa dari pajak bumi dan bangunan serta retribusi daerah (naik 6.67%)',
                'file_apbdes' => 'assets/files/apbdes-2025.pdf'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Pendapatan Asli Desa',
                'anggaran' => 140000000,
                'keterangan_detail' => 'Hasil usaha desa, hasil aset, swadaya, partisipasi dan gotong royong (naik 12%)',
                'file_apbdes' => 'assets/files/apbdes-2025.pdf'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Bantuan Keuangan Provinsi',
                'anggaran' => 175000000,
                'keterangan_detail' => 'Bantuan langsung dari pemerintah provinsi untuk pembangunan desa (naik 16.67%)',
                'file_apbdes' => 'assets/files/apbdes-2025.pdf'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Hibah dan Bantuan Pihak Ketiga',
                'anggaran' => 60000000,
                'keterangan_detail' => 'Bantuan dari CSR perusahaan dan lembaga lainnya (naik 20%)',
                'file_apbdes' => 'assets/files/apbdes-2025.pdf'
            ],

            // TAHUN 2025 - BELANJA
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Belanja Penyelenggaraan Pemerintahan Desa',
                'anggaran' => 450000000,
                'keterangan_detail' => 'Gaji perangkat, operasional kantor, dan administrasi pemerintahan (naik 12.5%)',
                'file_apbdes' => 'assets/files/apbdes-2025.pdf'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Belanja Pelaksanaan Pembangunan Desa',
                'anggaran' => 700000000,
                'keterangan_detail' => 'Infrastruktur jalan, drainase, dan fasilitas umum (naik 16.67%)',
                'file_apbdes' => 'assets/files/apbdes-2025.pdf'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Belanja Pembinaan Kemasyarakatan',
                'anggaran' => 220000000,
                'keterangan_detail' => 'Kegiatan PKK, karang taruna, dan organisasi masyarakat (naik 10%)',
                'file_apbdes' => 'assets/files/apbdes-2025.pdf'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Belanja Pemberdayaan Masyarakat',
                'anggaran' => 350000000,
                'keterangan_detail' => 'Program pelatihan, UMKM, dan pemberdayaan ekonomi masyarakat (naik 16.67%)',
                'file_apbdes' => 'assets/files/apbdes-2025.pdf'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Belanja Tak Terduga',
                'anggaran' => 165000000,
                'keterangan_detail' => 'Cadangan untuk keadaan darurat dan bencana alam (naik 10%)',
                'file_apbdes' => 'assets/files/apbdes-2025.pdf'
            ]
        ];

        foreach ($apbdesData as $data) {
            APBDes::create($data);
        }
    }
}
