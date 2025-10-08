<?php

namespace Database\Seeders;

use App\Models\Kontak;
use Illuminate\Database\Seeder;

class KontakSeeder extends Seeder
{
    public function run(): void
    {
        Kontak::create([
            'nama_desa' => 'Desa Ketapang Baru',
            'alamat' => 'Desa Ketapang Baru, Kecamatan Semidang Alas Maras',
            'alamat_lengkap' => 'Desa Ketapang Baru, Kecamatan Semidang Alas Maras, Kabupaten Seluma, Provinsi Bengkulu',
            'kode_pos' => '38874',
            'telepon' => '(0736) 123456',
            'fax' => '(0736) 123457',
            'email' => 'desa.ketapangbaru@selumakab.go.id',
            'website' => 'https://ketapangbaru.selumakab.go.id',
            'kepala_desa' => 'Ahmad Suryadi, S.Pd.',
            'sekretaris_desa' => 'Ratna Sari, S.E.',
            'bendahara_desa' => 'Bambang Wijaya, S.Pd.',
            'jam_operasional' => [
                'senin' => '08:00 - 16:00',
                'selasa' => '08:00 - 16:00',
                'rabu' => '08:00 - 16:00',
                'kamis' => '08:00 - 16:00',
                'jumat' => '08:00 - 16:00',
                'sabtu' => '08:00 - 12:00',
                'minggu' => 'Tutup'
            ],
            'latitude' => '-4.3221828',
            'longitude' => '102.7635049',
            'koordinat' => '-4.3221828, 102.7635049',
            'deskripsi' => 'Kantor Desa Ketapang Baru melayani seluruh keperluan administrasi dan pelayanan publik untuk masyarakat desa. Kami berkomitmen untuk memberikan pelayanan yang cepat, tepat, dan transparan.',
            'aktif' => true,
            'is_utama' => true,
        ]);
    }
}