<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PenerimaBantuan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        PenerimaBantuan::truncate();

        // Don't truncate all users, just delete users that are actually warga (have nik)
        User::whereNotNull('nik')->delete();

        // Load data from JSON files
        $this->processUserData();

    }
    private function processUserData(): void
    {
        // Extract bantuan before processing main data
        $bantuan = $item['bantuan'] ?? [];
        unset($item['bantuan']);

        // Set dusun sesuai file JSON
        $item['dusun'] = $dusunNumber;

        // Set default values untuk User model
        $userData = array_merge([
            'email' => $this->generateEmail($item),
            'password' => Hash::make('password123'), // default password
            'desa' => 'Ketapang Baru',
            'kabupaten' => 'Seluma',
            'provinsi' => 'Bengkulu',
            'kewarganegaraan' => 'WNI',
            'status_aktif' => true,
        ], $item);

        try {
            // Create user record
            $user = User::create($userData);

            // Create bantuan records if exist
            if (!empty($bantuan) && is_array($bantuan)) {
                foreach ($bantuan as $jenisBantuanItem) {
                    PenerimaBantuan::create([
                        'user_id' => $user->id,
                        'program' => $jenisBantuanItem,
                        'tahun' => 2023,
                        'nominal' => 1000000,
                        'status' => 'Aktif'
                    ]);
                }
            }
        } catch (\Exception $e) {
            echo "Error creating user record: " . $e->getMessage() . "\n";
            echo "Data: " . json_encode($userData) . "\n";
        }
    }

    private function generateEmail(array $item): string
    {
        $nama = $item['nama_lengkap'] ?? 'user';
        $nik = $item['nik'] ?? rand(1000, 9999);

        // Generate email from nama and nik
        $email = strtolower(str_replace(' ', '.', $nama)) . '.' . substr($nik, -4) . '@ketapangbaru.desa.id';

        return $email;
    }

    private function loadExistingRealData(): void
    {
        $realData = [
            [
                //No.1
                'no_kk' => '1705052810210002',
                'nik' => '1705052806980002',
                'nama_lengkap' => 'BENI HARIO',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => null,
                'tanggal_lahir' => null,
                'alamat' => null,
                'rt_rw' => null,
                'dusun' => 1,
                'desa' => 'Ketapang Baru',
                'kecamatan' => null,
                'kabupaten' => 'Seluma',
                'provinsi' => 'Bengkulu',
                'agama' => 'ISLAM',
                'status_perkawinan' => null,
                'pekerjaan' => null,
                'pendidikan' => 'SLTP',
                'kewarganegaraan' => 'WNI',
                'status_aktif' => true,
                'is_kepala_keluarga' => true,
                'status_rumah' => 'MS',
                'status_sosial' => 'MISKIN',
                'kelayakan_rumah' => 'LH',
                'mata_pencaharian' => 'PETANI',
                'jumlah_jiwa_kk' => 2,
                'bantuan' => [

                ],
                'lat' => '',
                'long' => '',
            ],
            [
                'no_kk' => '1705052810210002',
                'nik' => '1703134909980003',
                'nama_lengkap' => 'WIRA RUSITA SARI',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => null,
                'tanggal_lahir' => null,
                'alamat' => null,
                'rt_rw' => null,
                'dusun' => 1,
                'desa' => 'Ketapang Baru',
                'kecamatan' => null,
                'kabupaten' => 'Seluma',
                'provinsi' => 'Bengkulu',
                'agama' => 'ISLAM',
                'status_perkawinan' => null,
                'pekerjaan' => null,
                'pendidikan' => 'SLTA',
                'kewarganegaraan' => 'WNI',
                'status_aktif' => true,
                'is_kepala_keluarga' => false,
                'status_rumah' => '',
                'status_sosial' => '',
                'kelayakan_rumah' => '',
                'mata_pencaharian' => '',
                'jumlah_jiwa_kk' => '',
                'bantuan' => [

                ],
                'lat' => '',
                'long' => '',
            ],
            // Tambahkan data lainnya di sini...
        ];

        echo "Loading existing real data...\n";

        // Insert data real
        foreach ($realData as $data) {
            $bantuan = $data['bantuan'] ?? [];
            unset($data['bantuan']);

            // Clean up empty string values
            foreach ($data as $key => $value) {
                if ($value === '') {
                    $data[$key] = null;
                }
            }

            // Add required User fields
            $data['name'] = $data['nama_lengkap'];
            $data['email'] = $this->generateEmail($data);
            $data['password'] = Hash::make('password123');

            try {
                $user = User::create($data);

                // Buat record bantuan hanya jika ada data bantuan
                if (!empty($bantuan)) {
                    foreach ($bantuan as $jenisBantuanItem) {
                        PenerimaBantuan::create([
                            'warga_id' => $user->id,
                            'program' => $jenisBantuanItem,
                            'tahun' => 2023,
                            'nominal' => 1000000,
                            'status' => 'Aktif'
                        ]);
                    }
                }
            } catch (\Exception $e) {
                echo "Error creating existing real data: " . $e->getMessage() . "\n";
            }
        }

        echo "Successfully loaded " . count($realData) . " existing records\n";
    }
}
