<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class FixFutureBirthDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:fix-future-birth-dates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix users with future birth dates by re-extracting from NIK';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Memulai perbaikan tanggal lahir di masa depan...');

        $users = User::whereNotNull('tanggal_lahir')
            ->where('tanggal_lahir', '>', '2025-01-01')
            ->get();

        $this->info('Ditemukan ' . $users->count() . ' users dengan tanggal lahir di masa depan');

        $updated = 0;
        $failed = 0;

        foreach ($users as $user) {
            $tanggalLahir = $this->extractTanggalLahirFromNik($user->nik);

            if ($tanggalLahir) {
                $user->update(['tanggal_lahir' => $tanggalLahir]);
                $updated++;
                $this->line("Updated: {$user->nama_lengkap} - {$user->nik} -> {$tanggalLahir}");
            } else {
                $failed++;
                $this->error("Failed: {$user->nama_lengkap} - {$user->nik} (invalid NIK format)");
            }
        }

        $this->info("Selesai! Updated: {$updated}, Failed: {$failed}");
    }

    /**
     * Extract tanggal lahir dari NIK dengan logika yang diperbaiki
     */
    private function extractTanggalLahirFromNik($nik)
    {
        if (strlen($nik) < 10) {
            return null;
        }

        // Normalisasi karakter yang sering salah ketik
        $nik = str_replace(['I', 'O'], ['1', '0'], $nik);

        // Cek apakah NIK hanya berisi angka setelah normalisasi
        if (!ctype_digit($nik)) {
            return null;
        }

        // Ambil 6 digit pertama setelah kode wilayah (2 digit)
        $bulan = substr($nik, 2, 2);
        $tanggal = substr($nik, 4, 2);
        $tahunKode = substr($nik, 6, 2);

        // Validasi bulan dan tanggal
        if ($bulan < 1 || $bulan > 12 || $tanggal < 1 || $tanggal > 31) {
            return null;
        }

        // Logika yang lebih tepat untuk menentukan abad
        $currentYear = (int)date('Y');
        $currentYearCode = (int)substr($currentYear, 2, 2);
        
        // Jika kode tahun <= tahun sekarang, maka 2000-an
        // Jika kode tahun > tahun sekarang, maka 1900-an
        if ($tahunKode <= $currentYearCode) {
            $tahun = '20' . str_pad($tahunKode, 2, '0', STR_PAD_LEFT);
        } else {
            $tahun = '19' . str_pad($tahunKode, 2, '0', STR_PAD_LEFT);
        }

        // Validasi tambahan: pastikan tahun tidak lebih dari tahun sekarang + 1
        if ((int)$tahun > $currentYear + 1) {
            // Jika tahun terlalu besar, coba dengan abad 19
            $tahun = '19' . str_pad($tahunKode, 2, '0', STR_PAD_LEFT);
        }

        // Cek apakah tanggal valid untuk bulan tersebut
        if (!checkdate((int)$bulan, (int)$tanggal, (int)$tahun)) {
            return null;
        }

        return $tahun . '-' . $bulan . '-' . $tanggal;
    }
}
