<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PengajuanSurat;
use Carbon\Carbon;

class PengajuanSuratTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
        
        foreach ($jenisSurat as $jenis) {
            foreach ($ttdOptions as $ttdOption) {
                $data = array_merge($sampleData, [
                    'jenis_surat' => $jenis,
                    'jenis_ttd' => $ttdOption,
                    'nama_lengkap' => 'Test User ' . $counter,
                    'nik' => '1234567890123' . str_pad($counter, 3, '0', STR_PAD_LEFT),
                    'no_surat' => 'TEST/' . str_pad($counter, 3, '0', STR_PAD_LEFT) . '/' . date('m') . '/' . date('Y'),
                    'tracking_number' => 'TRK' . str_pad($counter, 6, '0', STR_PAD_LEFT) . date('Ymd'),
                    'data_surat' => [
                        'nama_lengkap' => 'Test User ' . $counter,
                        'nik' => '1234567890123' . str_pad($counter, 3, '0', STR_PAD_LEFT),
                        'tempat_lahir' => 'Jakarta',
                        'tanggal_lahir' => '1990-01-01',
                        'jenis_kelamin' => 'Laki-laki',
                        'agama' => 'Islam',
                        'status_perkawinan' => 'Belum Menikah',
                        'pekerjaan' => 'Karyawan Swasta',
                        'alamat' => 'Jl. Contoh No. 123, RT 01/RW 01, Kelurahan Contoh, Kecamatan Contoh, Kota Jakarta',
                        'no_telepon' => '081234567890',
                        'kewarganegaraan' => 'Indonesia',
                        'nama_ayah' => 'Ayah Test ' . $counter,
                        'nama_ibu' => 'Ibu Test ' . $counter,
                        'pekerjaan_ayah' => 'Wiraswasta',
                        'pekerjaan_ibu' => 'Ibu Rumah Tangga',
                        'alamat_ortu' => 'Jl. Orang Tua No. 456, RT 02/RW 02, Kelurahan Orang Tua, Kecamatan Orang Tua, Kota Jakarta',
                        'penghasilan_ortu' => '5000000',
                        'alasan_pengajuan' => 'Untuk keperluan administrasi - Test ' . $ttdOption,
                        'tanggal_pengajuan' => Carbon::now()->format('Y-m-d'),
                        'verification_url' => url('/verify/' . 'TRK' . str_pad($counter, 6, '0', STR_PAD_LEFT) . date('Ymd'))
                    ]
                ]);

                PengajuanSurat::create($data);
                $counter++;
            }
        }

        $this->command->info('Created ' . ($counter - 1) . ' test pengajuan surat records');
        $this->command->info('Each jenis surat has 3 pengajuan with different TTD options: gambar, qrcode, manual');
    }
}
