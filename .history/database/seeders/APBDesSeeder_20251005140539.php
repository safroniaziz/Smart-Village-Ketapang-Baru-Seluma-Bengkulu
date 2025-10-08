<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\APBDes;

class APBDesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apbdesData = [
            // TAHUN 2024 - PENDAPATAN
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Dana Desa dari APBN',
                'anggaran' => 800000000,
                'keterangan_detail' => 'Dana transfer dari pemerintah pusat sesuai alokasi dana desa tahun 2024'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Alokasi Dana Desa (ADD)',
                'anggaran' => 450000000,
                'keterangan_detail' => 'Dana transfer dari pemerintah kabupaten berdasarkan perda'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Dana Bagi Hasil Pajak dan Retribusi',
                'anggaran' => 75000000,
                'keterangan_detail' => 'Bagian desa dari pajak bumi dan bangunan serta retribusi daerah'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Pendapatan Asli Desa',
                'anggaran' => 125000000,
                'keterangan_detail' => 'Hasil usaha desa, hasil aset, swadaya, partisipasi dan gotong royong'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Bantuan Keuangan Provinsi',
                'anggaran' => 150000000,
                'keterangan_detail' => 'Bantuan keuangan dari pemerintah provinsi untuk pembangunan desa'
            ],

            // TAHUN 2024 - BELANJA
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Belanja Pegawai',
                'anggaran' => 320000000,
                'keterangan_detail' => 'Honorarium kepala desa, perangkat desa, dan BPD'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Belanja Barang dan Jasa',
                'anggaran' => 180000000,
                'keterangan_detail' => 'ATK, listrik, air, telepon, bahan bakar, dan jasa lainnya'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Belanja Modal',
                'anggaran' => 450000000,
                'keterangan_detail' => 'Pembangunan infrastruktur desa, pengadaan aset tetap'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Belanja Tak Terduga',
                'anggaran' => 50000000,
                'keterangan_detail' => 'Belanja untuk kejadian luar biasa dan mendesak'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Bantuan Sosial',
                'anggaran' => 200000000,
                'keterangan_detail' => 'BLT-DD, bantuan sosial untuk masyarakat miskin dan rentan'
            ],
            [
                'tahun_anggaran' => 2024,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Pemberdayaan Masyarakat',
                'anggaran' => 300000000,
                'keterangan_detail' => 'Program pelatihan, UMKM, dan pemberdayaan ekonomi masyarakat'
            ],

            // TAHUN 2025 - PENDAPATAN
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Dana Desa dari APBN',
                'anggaran' => 850000000,
                'keterangan_detail' => 'Dana transfer dari pemerintah pusat sesuai alokasi dana desa tahun 2025'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Alokasi Dana Desa (ADD)',
                'anggaran' => 480000000,
                'keterangan_detail' => 'Dana transfer dari pemerintah kabupaten berdasarkan perda'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Dana Bagi Hasil Pajak dan Retribusi',
                'anggaran' => 85000000,
                'keterangan_detail' => 'Bagian desa dari pajak bumi dan bangunan serta retribusi daerah'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Pendapatan Asli Desa',
                'anggaran' => 140000000,
                'keterangan_detail' => 'Hasil usaha desa, hasil aset, swadaya, partisipasi dan gotong royong'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'pendapatan',
                'keterangan' => 'Bantuan Keuangan Provinsi',
                'anggaran' => 175000000,
                'keterangan_detail' => 'Bantuan keuangan dari pemerintah provinsi untuk pembangunan desa'
            ],

            // TAHUN 2025 - BELANJA
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Belanja Pegawai',
                'anggaran' => 350000000,
                'keterangan_detail' => 'Honorarium kepala desa, perangkat desa, dan BPD'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Belanja Barang dan Jasa',
                'anggaran' => 200000000,
                'keterangan_detail' => 'ATK, listrik, air, telepon, bahan bakar, dan jasa lainnya'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Belanja Modal',
                'anggaran' => 520000000,
                'keterangan_detail' => 'Pembangunan infrastruktur desa, pengadaan aset tetap'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Belanja Tak Terduga',
                'anggaran' => 60000000,
                'keterangan_detail' => 'Belanja untuk kejadian luar biasa dan mendesak'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Bantuan Sosial',
                'anggaran' => 250000000,
                'keterangan_detail' => 'BLT-DD, bantuan sosial untuk masyarakat miskin dan rentan'
            ],
            [
                'tahun_anggaran' => 2025,
                'jenis_anggaran' => 'belanja',
                'keterangan' => 'Pemberdayaan Masyarakat',
                'anggaran' => 350000000,
                'keterangan_detail' => 'Program pelatihan, UMKM, dan pemberdayaan ekonomi masyarakat'
            ]
        ];

        foreach ($apbdesData as $data) {
            APBDes::create($data);
        }
    }
}
