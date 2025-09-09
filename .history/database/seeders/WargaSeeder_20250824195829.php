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
        $realData = [
            [
                'no_kk' => '1705052511190003',
                'nik' => '1705054107560052',
                'nama_lengkap' => 'HULNA WATI',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => null,
                'tanggal_lahir' => null,
                'alamat' => null,
                'rt_rw' => null,
                'dusun' => 2,
                'desa' => 'Ketapang Baru',
                'kecamatan' => null,
                'kabupaten' => 'Seluma',
                'provinsi' => 'Bengkulu',
                'agama' => null,
                'status_perkawinan' => null,
                'pekerjaan' => 'Petani',
                'pendidikan' => 'SD',
                'kewarganegaraan' => 'WNI',
                'status_aktif' => true,
                'is_kepala_keluarga' => false, // perempuan, bukan kepala keluarga
                'status_rumah' => 'MS',
                'status_sosial' => 'ME',
                'kelayakan_rumah' => 'TLH',
                'mata_pencaharian' => 'Petani',
                'jumlah_jiwa_kk' => 1,
                'bantuan' => ['BLT COVID'],
            ],
            [
                'no_kk' => '1705050205082307',
                'nik' => '1705050107400008',
                'nama_lengkap' => 'SEKANI',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => null,
                'tanggal_lahir' => null,
                'alamat' => null,
                'rt_rw' => null,
                'dusun' => 2,
                'desa' => 'Ketapang Baru',
                'kecamatan' => null,
                'kabupaten' => 'Seluma',
                'provinsi' => 'Bengkulu',
                'agama' => null,
                'status_perkawinan' => null,
                'pekerjaan' => 'Petani',
                'pendidikan' => 'SD',
                'kewarganegaraan' => 'WNI',
                'status_aktif' => true,
                'is_kepala_keluarga' => true, // kepala keluarga KK ini
                'status_rumah' => 'MS',
                'status_sosial' => 'MISKIN',
                'kelayakan_rumah' => 'LH',
                'mata_pencaharian' => 'Petani',
                'jumlah_jiwa_kk' => 2,
                'bantuan' => [],
            ],
            [
                'no_kk' => '1705050205082307', // ikut KK Sekani
                'nik' => '1705054107450009',
                'nama_lengkap' => 'NIJA',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => null,
                'tanggal_lahir' => null,
                'alamat' => null,
                'rt_rw' => null,
                'dusun' => 2,
                'desa' => 'Ketapang Baru',
                'kecamatan' => null,
                'kabupaten' => 'Seluma',
                'provinsi' => 'Bengkulu',
                'agama' => null,
                'status_perkawinan' => null,
                'pekerjaan' => null,
                'pendidikan' => 'SD',
                'kewarganegaraan' => 'WNI',
                'status_aktif' => true,
                'is_kepala_keluarga' => false, // karena ikut KK Sekani
                'status_rumah' => null,
                'status_sosial' => null,
                'kelayakan_rumah' => null,
                'mata_pencaharian' => null,
                'jumlah_jiwa_kk' => 2, // ikut jiwa di KK Sekani
                'bantuan' => [],
            ],
            [
                'no_kk' => '1705051111150004', // ikut KK Sekani
                'nik' => '1701115607870003',
                'nama_lengkap' => 'HELESMI',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => null,
                'tanggal_lahir' => null,
                'alamat' => null,
                'rt_rw' => null,
                'dusun' => 2,
                'desa' => 'Ketapang Baru',
                'kecamatan' => null,
                'kabupaten' => 'Seluma',
                'provinsi' => 'Bengkulu',
                'agama' => null,
                'status_perkawinan' => null,
                'pekerjaan' => 'Petani',
                'pendidikan' => 'SD',
                'kewarganegaraan' => 'WNI',
                'status_aktif' => true,
                'is_kepala_keluarga' => false, // karena ikut KK Sekani
                'status_rumah' => 'MS',
                'status_sosial' => 'Miskin',
                'kelayakan_rumah' => 'LH',
                'mata_pencaharian' => 'Petani',
                'jumlah_jiwa_kk' => 2, // ikut jiwa di KK Sekani
                'bantuan' => ['BLT COVID'],
            ],
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
