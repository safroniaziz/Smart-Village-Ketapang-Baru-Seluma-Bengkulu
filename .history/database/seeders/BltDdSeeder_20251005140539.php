<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BltDd;
use Faker\Factory as Faker;

class BltDdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Data BLT-DD 2024
        $bltData2024 = [
            ['nama' => 'Siti Aminah', 'jenis_kelamin' => 'P', 'alamat' => 'RT 01/RW 01', 'no_rekening' => '1234567890'],
            ['nama' => 'Ahmad Yusuf', 'jenis_kelamin' => 'L', 'alamat' => 'RT 01/RW 01', 'no_rekening' => '1234567891'],
            ['nama' => 'Fatimah Sari', 'jenis_kelamin' => 'P', 'alamat' => 'RT 02/RW 01', 'no_rekening' => '1234567892'],
            ['nama' => 'Muhammad Ali', 'jenis_kelamin' => 'L', 'alamat' => 'RT 02/RW 01', 'no_rekening' => '1234567893'],
            ['nama' => 'Khadijah', 'jenis_kelamin' => 'P', 'alamat' => 'RT 03/RW 01', 'no_rekening' => '1234567894'],
            ['nama' => 'Abdul Rahman', 'jenis_kelamin' => 'L', 'alamat' => 'RT 03/RW 01', 'no_rekening' => '1234567895'],
            ['nama' => 'Aisyah Putri', 'jenis_kelamin' => 'P', 'alamat' => 'RT 04/RW 02', 'no_rekening' => '1234567896'],
            ['nama' => 'Umar Bin Khattab', 'jenis_kelamin' => 'L', 'alamat' => 'RT 04/RW 02', 'no_rekening' => '1234567897'],
            ['nama' => 'Zainab', 'jenis_kelamin' => 'P', 'alamat' => 'RT 05/RW 02', 'no_rekening' => '1234567898'],
            ['nama' => 'Ibrahim', 'jenis_kelamin' => 'L', 'alamat' => 'RT 05/RW 02', 'no_rekening' => '1234567899'],
        ];

        // Generate data 2024 (120 penerima)
        for ($i = 0; $i < 120; $i++) {
            if ($i < count($bltData2024)) {
                $baseData = $bltData2024[$i];
            } else {
                $baseData = [
                    'nama' => $faker->name,
                    'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                    'alamat' => 'RT ' . sprintf('%02d', $faker->numberBetween(1, 8)) . '/RW ' . sprintf('%02d', $faker->numberBetween(1, 3)),
                    'no_rekening' => $faker->numerify('##########')
                ];
            }

            BltDd::create([
                'tahun_anggaran' => 2024,
                'nama' => $baseData['nama'],
                'jenis_kelamin' => $baseData['jenis_kelamin'],
                'nik' => $faker->numerify('################'), // 16 digit NIK
                'alamat' => $baseData['alamat'],
                'no_rekening' => $baseData['no_rekening'],
                'nominal_bantuan' => 1500000 // Rp 1.500.000 per KK
            ]);
        }

        // Generate data 2025 (150 penerima) - termasuk penerima lama + baru
        $existingRecipients = collect($bltData2024)->take(100); // 100 penerima lama

        // Tambahkan 100 penerima lama
        foreach ($existingRecipients as $index => $recipient) {
            BltDd::create([
                'tahun_anggaran' => 2025,
                'nama' => $recipient['nama'],
                'jenis_kelamin' => $recipient['jenis_kelamin'],
                'nik' => $faker->numerify('################'),
                'alamat' => $recipient['alamat'],
                'no_rekening' => $recipient['no_rekening'],
                'nominal_bantuan' => 1500000
            ]);
        }

        // Tambahkan 50 penerima baru untuk 2025
        $newRecipients = [
            ['nama' => 'Hafsah Binti Omar', 'jenis_kelamin' => 'P', 'alamat' => 'RT 06/RW 03'],
            ['nama' => 'Khalid Al Walid', 'jenis_kelamin' => 'L', 'alamat' => 'RT 06/RW 03'],
            ['nama' => 'Ummu Salamah', 'jenis_kelamin' => 'P', 'alamat' => 'RT 07/RW 03'],
            ['nama' => 'Sa\'ad Bin Waqqas', 'jenis_kelamin' => 'L', 'alamat' => 'RT 07/RW 03'],
            ['nama' => 'Ruqayyah', 'jenis_kelamin' => 'P', 'alamat' => 'RT 08/RW 03'],
        ];

        for ($i = 0; $i < 50; $i++) {
            if ($i < count($newRecipients)) {
                $baseData = $newRecipients[$i];
                $baseData['no_rekening'] = $faker->numerify('##########');
            } else {
                $baseData = [
                    'nama' => $faker->name,
                    'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                    'alamat' => 'RT ' . sprintf('%02d', $faker->numberBetween(1, 10)) . '/RW ' . sprintf('%02d', $faker->numberBetween(1, 4)),
                    'no_rekening' => $faker->numerify('##########')
                ];
            }

            BltDd::create([
                'tahun_anggaran' => 2025,
                'nama' => $baseData['nama'],
                'jenis_kelamin' => $baseData['jenis_kelamin'],
                'nik' => $faker->numerify('################'),
                'alamat' => $baseData['alamat'],
                'no_rekening' => $baseData['no_rekening'],
                'nominal_bantuan' => 1500000
            ]);
        }
    }
}
