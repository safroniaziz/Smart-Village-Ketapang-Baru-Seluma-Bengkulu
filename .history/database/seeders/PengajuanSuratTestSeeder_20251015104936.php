<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PengajuanSurat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class PengajuanSuratTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create test users first
        $this->createTestUsers();
        $jenisSurat = [
            'surat_bersih_diri',
            'surat_keterangan_domisili',
            'surat_keterangan_usaha',
            'surat_keterangan_belum_menikah',
            'suras_keterangan_berkelakuan_baik',
            'surat_keterangan_kematian',
            'surat_keterangan_menikah',
            'surat_keterangan_miskin',
            'surat_keterangan_penghasilan_ortu',
            'surat_keterangan_tidak_mampu',
            'surat_hibah',
            'surat_izin_keramaian',
            'surat_kehilangan',
            'surat_pengantar_akta_kelahiran',
            'surat_pengantar_kk',
            'surat_pengantar_nikah',
            'surat_perjanjian_perdamaian',
            'surat_pindah',
            'surat_rekomendasi',
            'surat_undangan'
        ];

        $ttdOptions = ['gambar', 'qrcode', 'manual'];

        $sampleData = [
            'nama_lengkap' => 'John Doe',
            'nik' => '1234567890123456',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Contoh No. 123, RT 01/RW 01, Kelurahan Contoh, Kecamatan Contoh, Kota Jakarta',
            'keperluan' => 'Untuk keperluan administrasi',
            'status' => 'Selesai',
            'is_public' => true,
            'submitted_at' => Carbon::now(),
            'approved_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        $counter = 1;
        $userCounter = 1;
        
        foreach ($jenisSurat as $jenis) {
            // Get user for this jenis surat
            $user = User::where('email', "testuser{$userCounter}@example.com")->first();
            
            foreach ($ttdOptions as $ttdOption) {
                $data = array_merge($sampleData, [
                    'user_id' => $user->id,
                    'jenis_surat' => $jenis,
                    'jenis_ttd' => $ttdOption,
                    'nama_lengkap' => $user->name,
                    'nik' => '1234567890123' . str_pad($counter, 3, '0', STR_PAD_LEFT),
                    'no_surat' => 'TEST/' . str_pad($counter, 3, '0', STR_PAD_LEFT) . '/' . date('m') . '/' . date('Y'),
                    'data_surat' => [
                        'nama_lengkap' => $user->name,
                        'nik' => '1234567890123' . str_pad($counter, 3, '0', STR_PAD_LEFT),
                        'tempat_lahir' => 'Jakarta',
                        'tanggal_lahir' => '1990-01-01',
                        'jenis_kelamin' => 'Laki-laki',
                        'agama' => 'Islam',
                        'status_perkawinan' => 'Belum Menikah',
                        'pekerjaan' => 'Karyawan Swasta',
                        'alamat' => 'Jl. Contoh No. 123, RT 01/RW 01, Kelurahan Contoh, Kecamatan Contoh, Kota Jakarta',
                        'no_telepon' => $user->no_hp,
                        'kewarganegaraan' => 'Indonesia',
                        'nama_ayah' => 'Ayah ' . $user->name,
                        'nama_ibu' => 'Ibu ' . $user->name,
                        'pekerjaan_ayah' => 'Wiraswasta',
                        'pekerjaan_ibu' => 'Ibu Rumah Tangga',
                        'alamat_ortu' => 'Jl. Orang Tua No. 456, RT 02/RW 02, Kelurahan Orang Tua, Kecamatan Orang Tua, Kota Jakarta',
                        'penghasilan_ortu' => '5000000',
                        'alasan_pengajuan' => 'Untuk keperluan administrasi - Test ' . $ttdOption,
                        'tanggal_pengajuan' => Carbon::now()->format('Y-m-d'),
                        'verification_url' => url('/verify/TRK' . str_pad($counter, 6, '0', STR_PAD_LEFT) . date('Ymd'))
                    ]
                ]);

                PengajuanSurat::create($data);
                $counter++;
            }
            
            $userCounter++;
        }

        $this->command->info('Created ' . ($counter - 1) . ' test pengajuan surat records');
        $this->command->info('Each jenis surat has 3 pengajuan with different TTD options: gambar, qrcode, manual');
    }

    /**
     * Create test users for pengajuan surat
     */
    private function createTestUsers(): void
    {
        $this->command->info('Creating test users...');
        
        // Create 20 test users (one for each jenis surat)
        for ($i = 1; $i <= 20; $i++) {
            User::updateOrCreate(
                ['email' => "testuser{$i}@example.com"],
                [
                    'name' => "Test User {$i}",
                    'email' => "testuser{$i}@example.com",
                    'password' => Hash::make('password123'),
                    'no_hp' => '0812345678' . str_pad($i, 2, '0', STR_PAD_LEFT),
                    'email_verified_at' => Carbon::now(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            );
        }
        
        $this->command->info('Created 20 test users');
    }
