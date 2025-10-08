<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaguEarmark;

class PaguEarmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paguEarmarkData = [
            // TAHUN 2024
            [
                'tahun_anggaran' => 2024,
                'kegiatan' => 'Pembangunan Jalan Desa',
                'satuan' => 'Meter',
                'jumlah_pagu' => 150000000,
                'keterangan' => 'Pembangunan jalan beton sepanjang 500 meter dari balai desa ke masjid'
            ],
            [
                'tahun_anggaran' => 2024,
                'kegiatan' => 'Rehab Balai Desa',
                'satuan' => 'Unit',
                'jumlah_pagu' => 85000000,
                'keterangan' => 'Rehabilitasi gedung balai desa meliputi atap, lantai, dan cat'
            ],
            [
                'tahun_anggaran' => 2024,
                'kegiatan' => 'Pembangunan Posyandu',
                'satuan' => 'Unit',
                'jumlah_pagu' => 45000000,
                'keterangan' => 'Pembangunan 2 unit posyandu di RT 03 dan RT 07'
            ],
            [
                'tahun_anggaran' => 2024,
                'kegiatan' => 'Pengadaan CCTV Desa',
                'satuan' => 'Titik',
                'jumlah_pagu' => 25000000,
                'keterangan' => 'Pemasangan 8 titik CCTV di lokasi strategis desa'
            ],
            [
                'tahun_anggaran' => 2024,
                'kegiatan' => 'Program BLT-DD',
                'satuan' => 'KK',
                'jumlah_pagu' => 180000000,
                'keterangan' => 'Bantuan Langsung Tunai untuk 120 KK @ Rp 1.500.000'
            ],
            [
                'tahun_anggaran' => 2024,
                'kegiatan' => 'Saluran Drainase',
                'satuan' => 'Meter',
                'jumlah_pagu' => 95000000,
                'keterangan' => 'Pembangunan saluran drainase sepanjang 300 meter'
            ],
            [
                'tahun_anggaran' => 2024,
                'kegiatan' => 'Lampu Penerangan Jalan',
                'satuan' => 'Titik',
                'jumlah_pagu' => 40000000,
                'keterangan' => 'Pemasangan 20 titik lampu LED tenaga surya'
            ],
            [
                'tahun_anggaran' => 2024,
                'kegiatan' => 'Perbaikan Jembatan',
                'satuan' => 'Unit',
                'jumlah_pagu' => 75000000,
                'keterangan' => 'Perbaikan 3 unit jembatan di akses sawah'
            ],

            // TAHUN 2025
            [
                'tahun_anggaran' => 2025,
                'kegiatan' => 'Pembangunan Jalan Poros Desa',
                'satuan' => 'Meter',
                'jumlah_pagu' => 180000000,
                'keterangan' => 'Pembangunan jalan aspal sepanjang 600 meter jalur utama desa'
            ],
            [
                'tahun_anggaran' => 2025,
                'kegiatan' => 'Gedung Serbaguna',
                'satuan' => 'Unit',
                'jumlah_pagu' => 120000000,
                'keterangan' => 'Pembangunan gedung serbaguna untuk kegiatan masyarakat'
            ],
            [
                'tahun_anggaran' => 2025,
                'kegiatan' => 'Program BLT-DD',
                'satuan' => 'KK',
                'jumlah_pagu' => 225000000,
                'keterangan' => 'Bantuan Langsung Tunai untuk 150 KK @ Rp 1.500.000'
            ],
            [
                'tahun_anggaran' => 2025,
                'kegiatan' => 'Pembangunan MCK Umum',
                'satuan' => 'Unit',
                'jumlah_pagu' => 60000000,
                'keterangan' => 'Pembangunan 4 unit MCK umum di area publik'
            ],
            [
                'tahun_anggaran' => 2025,
                'kegiatan' => 'Digitalisasi Desa',
                'satuan' => 'Paket',
                'jumlah_pagu' => 35000000,
                'keterangan' => 'Pengadaan perangkat komputer dan jaringan internet'
            ],
            [
                'tahun_anggaran' => 2025,
                'kegiatan' => 'Taman Desa',
                'satuan' => 'Unit',
                'jumlah_pagu' => 50000000,
                'keterangan' => 'Pembangunan taman desa dengan playground anak-anak'
            ],
            [
                'tahun_anggaran' => 2025,
                'kegiatan' => 'Pelatihan UMKM',
                'satuan' => 'Batch',
                'jumlah_pagu' => 30000000,
                'keterangan' => 'Program pelatihan kewirausahaan dan pengembangan UMKM'
            ],
            [
                'tahun_anggaran' => 2025,
                'kegiatan' => 'Sumur Bor',
                'satuan' => 'Unit',
                'jumlah_pagu' => 45000000,
                'keterangan' => 'Pembuatan 3 unit sumur bor untuk kebutuhan air bersih'
            ],
            [
                'tahun_anggaran' => 2025,
                'kegiatan' => 'Gorong-gorong',
                'satuan' => 'Unit',
                'jumlah_pagu' => 55000000,
                'keterangan' => 'Pembangunan 10 unit gorong-gorong di berbagai titik'
            ],
            [
                'tahun_anggaran' => 2025,
                'kegiatan' => 'Pasar Desa',
                'satuan' => 'Unit',
                'jumlah_pagu' => 90000000,
                'keterangan' => 'Rehabilitasi dan pengembangan pasar desa tradisional'
            ]
        ];

        foreach ($paguEarmarkData as $data) {
            PaguEarmark::create($data);
        }
    }
}
