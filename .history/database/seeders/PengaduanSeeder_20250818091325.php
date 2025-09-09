<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pengaduan;
use Carbon\Carbon;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisPengaduan = [
            'Infrastruktur' => ['Jalan rusak', 'Jembatan retak', 'Drainase tersumbat', 'Lampu jalan mati', 'Taman kumuh'],
            'Pelayanan' => ['Pelayanan lambat', 'Petugas tidak ramah', 'Prosedur berbelit', 'Informasi tidak jelas'],
            'Keamanan' => ['Pencurian', 'Tawuran', 'Narkoba', 'Geng motor', 'Vandalisme'],
            'Kesehatan' => ['Sampah menumpuk', 'Air kotor', 'WC umum rusak', 'Tidak ada tempat sampah'],
            'Pendidikan' => ['Gedung sekolah rusak', 'Guru kurang', 'Fasilitas belajar kurang', 'Transportasi sekolah'],
            'Ekonomi' => ['UMKM tidak berkembang', 'Lapangan kerja kurang', 'Modal usaha sulit', 'Pemasaran produk'],
            'Lingkungan' => ['Pohon tumbang', 'Banjir', 'Longsor', 'Kebakaran hutan', 'Polusi udara']
        ];

        $prioritas = ['Rendah', 'Sedang', 'Tinggi', 'Sangat Tinggi'];
        $status = ['Diterima', 'Dalam Proses', 'Selesai', 'Ditolak'];
        $petugas = ['Ahmad Supriadi', 'Budi Santoso', 'Citra Dewi', 'Dedi Kurniawan', 'Eka Putri'];

        // Buat 50 pengaduan dengan data yang realistis
        for ($i = 1; $i <= 50; $i++) {
            $jenis = array_rand($jenisPengaduan);
            $deskripsi = $jenisPengaduan[$jenis][array_rand($jenisPengaduan[$jenis])];
            
            $pengaduan = Pengaduan::create([
                'nomor_tracking' => 'PGD' . date('Y') . date('m') . str_pad($i, 4, '0', STR_PAD_LEFT),
                'nama_lengkap' => 'Warga ' . $i,
                'nik' => '123456789' . str_pad($i, 6, '0', STR_PAD_LEFT),
                'email' => 'warga' . $i . '@example.com',
                'telepon' => '08' . rand(100000000, 999999999),
                'alamat' => 'Jl. Desa No. ' . $i . ', Dusun ' . rand(1, 3),
                'jenis_pengaduan' => $jenis,
                'prioritas' => $prioritas[array_rand($prioritas)],
                'deskripsi' => $deskripsi . ' di wilayah ' . rand(1, 3),
                'lampiran' => null,
                'anonim' => rand(0, 1),
                'status' => $status[array_rand($status)],
                'catatan_petugas' => rand(0, 1) ? 'Sedang ditindaklanjuti sesuai prosedur' : null,
                'petugas' => rand(0, 1) ? $petugas[array_rand($petugas)] : null,
                'tanggal_selesai' => rand(0, 1) ? Carbon::now()->subDays(rand(1, 30)) : null,
                'created_at' => Carbon::now()->subDays(rand(0, 90)),
                'updated_at' => Carbon::now()->subDays(rand(0, 90))
            ]);
        }

        $this->command->info('Seeder Pengaduan berhasil dijalankan!');
    }
}
