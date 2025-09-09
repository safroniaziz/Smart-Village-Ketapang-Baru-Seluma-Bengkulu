<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Warga;
use App\Models\PenerimaBantuan;
use Carbon\Carbon;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dusun = ['Dusun 1', 'Dusun 2', 'Dusun 3'];
        $jenisKelamin = ['L', 'P'];
        $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
        $statusPerkawinan = ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'];
        $pekerjaan = ['Petani', 'Nelayan', 'Pedagang', 'PNS', 'Buruh', 'Pelajar', 'Wiraswasta', 'Guru', 'Dokter', 'Perawat', 'Supir', 'Tukang Kayu', 'Tukang Batu', 'Peternak'];
        $pendidikan = ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3'];

        // Data untuk 200 warga
        for ($i = 1; $i <= 200; $i++) {
            $tanggalLahir = Carbon::now()->subYears(rand(1, 80))->subDays(rand(0, 365));
            $umur = $tanggalLahir->diffInYears(Carbon::now());

            // Tentukan kelompok umur
            $kelompokUmur = '';
            if ($umur < 5) $kelompokUmur = 'Balita';
            elseif ($umur < 12) $kelompokUmur = 'Anak';
            elseif ($umur < 18) $kelompokUmur = 'Remaja';
            elseif ($umur < 60) $kelompokUmur = 'Dewasa';
            else $kelompokUmur = 'Lansia';

            $warga = Warga::create([
                'nik' => '123456789' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'nama_lengkap' => 'Warga ' . $i,
                'no_kk' => '123456789' . str_pad(rand(1, 50), 6, '0', STR_PAD_LEFT),
                'tempat_lahir' => 'Desa Seluma',
                'tanggal_lahir' => $tanggalLahir,
                'jenis_kelamin' => $jenisKelamin[array_rand($jenisKelamin)],
                'alamat' => 'Jl. Desa No. ' . $i,
                'rt_rw' => '00' . rand(1, 9) . '/00' . rand(1, 9),
                'dusun' => $dusun[array_rand($dusun)],
                'desa' => 'Seluma',
                'kecamatan' => 'Seluma',
                'kabupaten' => 'Seluma',
                'provinsi' => 'Bengkulu',
                'agama' => $agama[array_rand($agama)],
                'status_perkawinan' => $statusPerkawinan[array_rand($statusPerkawinan)],
                'pekerjaan' => $pekerjaan[array_rand($pekerjaan)],
                'kewarganegaraan' => 'WNI',
                'foto' => null,
                'status_aktif' => 1,
                'status' => 'aktif',
            ]);
        }

        // Data penerima bantuan
        $programBantuan = ['PKH', 'BPNT', 'BLT-DD', 'BST', 'Lainnya'];

        // Ambil semua ID warga yang sudah dibuat
        $wargaIds = Warga::pluck('id')->toArray();

        for ($i = 1; $i <= 50; $i++) {
            PenerimaBantuan::create([
                'warga_id' => $wargaIds[array_rand($wargaIds)],
                'program' => $programBantuan[array_rand($programBantuan)],
                'tahun' => rand(2020, 2025),
                'keterangan' => 'Penerima bantuan ' . $programBantuan[array_rand($programBantuan)],
            ]);
        }

        $this->command->info('Seeder Warga berhasil dijalankan!');
    }
}
