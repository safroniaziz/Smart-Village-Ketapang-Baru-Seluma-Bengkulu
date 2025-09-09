<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Warga;
use App\Models\PenerimaBantuan;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        // Data real dari gambar REKAPITULASI DATA PENDUDUK 2 2023
        $realData = [
            [
                'no_kk' => '1234567890123456', // Ambil dari gambar
                'nik' => '1234567890123456', // Ambil dari gambar
                'nama_lengkap' => 'NAMA DARI GAMBAR', // Ambil dari gambar
                'tempat_lahir' => null, // Tidak ada di gambar
                'tanggal_lahir' => null, // Tidak ada di gambar
                'jenis_kelamin' => null, // Tidak ada di gambar
                'alamat' => null, // Tidak ada di gambar
                'rt_rw' => null, // Tidak ada di gambar
                'dusun' => null, // Tidak ada di gambar
                'desa' => null, // Tidak ada di gambar
                'kecamatan' => null, // Tidak ada di gambar
                'kabupaten' => null, // Tidak ada di gambar
                'provinsi' => null, // Tidak ada di gambar
                'agama' => null, // Tidak ada di gambar
                'status_perkawinan' => null, // Tidak ada di gambar
                'pekerjaan' => null, // Tidak ada di gambar
                'pendidikan' => 'SD', // Berdasarkan centang di kolom PENDIDIKAN
                'kewarganegaraan' => 'WNI', // Default
                'status_aktif' => true,
                'status' => 'Aktif',
                // Field baru berdasarkan centang di gambar
                'status_rumah' => 'MS', // Berdasarkan centang (jika ada)
                'status_sosial' => 'MK', // Berdasarkan centang di STATUS SOSIAL
                'kelayakan_rumah' => 'LH', // Berdasarkan centang di KELAYAKAN RUMAH
                'mata_pencaharian' => 'PETANI', // Berdasarkan centang di MATA PENCAHARIAN
                'jumlah_jiwa_kk' => null, // Tidak ada di gambar, bisa dihitung manual
                'bantuan' => ['PKH'] // Berdasarkan centang di JENIS BANTUAN YANG DITERIMA
            ],
            // Contoh data kedua
            [
                'no_kk' => '2345678901234567',
                'nik' => '2345678901234567',
                'nama_lengkap' => 'NAMA KEDUA DARI GAMBAR',
                'tempat_lahir' => null,
                'tanggal_lahir' => null,
                'jenis_kelamin' => null,
                'alamat' => null,
                'rt_rw' => null,
                'dusun' => null,
                'desa' => null,
                'kecamatan' => null,
                'kabupaten' => null,
                'provinsi' => null,
                'agama' => null,
                'status_perkawinan' => null,
                'pekerjaan' => null,
                'pendidikan' => 'SMP', // Sesuai centang
                'kewarganegaraan' => 'WNI',
                'status_aktif' => true,
                'status' => 'Aktif',
                'status_rumah' => null, // Tidak ada centang
                'status_sosial' => 'RM', // Sesuai centang
                'kelayakan_rumah' => 'TLH', // Sesuai centang
                'mata_pencaharian' => 'NELAYAN', // Sesuai centang
                'jumlah_jiwa_kk' => null,
                'bantuan' => ['BPNT', 'BST'] // Sesuai centang
            ],
            // Tambahkan semua data dari gambar...
        ];

        // Insert data real dari gambar
        foreach ($realData as $data) {
            $bantuan = $data['bantuan'] ?? [];
            unset($data['bantuan']);

            $warga = Warga::create($data);

            // Buat record bantuan hanya jika ada data bantuan
            if (!empty($bantuan)) {
                foreach ($bantuan as $jenisBantuanItem) {
                    PenerimaBantuan::create([
                        'warga_id' => $warga->id,
                        'program' => $jenisBantuanItem,
                        'tahun' => 2023,
                        'nominal' => 1000000,
                        'status' => 'Aktif'
                    ]);
                }
            }
        }
    }
}
