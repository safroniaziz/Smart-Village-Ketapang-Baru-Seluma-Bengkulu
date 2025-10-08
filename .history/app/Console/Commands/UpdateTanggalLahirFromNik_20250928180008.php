<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class UpdateTanggalLahirFromNik extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:update-tanggal-lahir';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update tanggal lahir dari NIK untuk users yang tanggal lahirnya null';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Memulai update tanggal lahir dari NIK...');

        $users = User::whereNull('tanggal_lahir')
            ->whereNotNull('nik')
            ->where('nik', '!=', '')
            ->get();

        $this->info('Ditemukan ' . $users->count() . ' users dengan tanggal lahir null');

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
     * Extract tanggal lahir dari NIK
     * Format NIK: 1705052806980002
     * - 17: kode wilayah
     * - 05: bulan (05)
     * - 05: tanggal (05)
     * - 280698: kode lainnya (06 = tahun 1998)
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

        // Tentukan tahun berdasarkan kode tahun
        // Jika kode tahun <= 30, maka tahun 2000-an
        // Jika kode tahun > 30, maka tahun 1900-an
        if ($tahunKode <= 30) {
            $tahun = '20' . str_pad($tahunKode, 2, '0', STR_PAD_LEFT);
        } else {
            $tahun = '19' . str_pad($tahunKode, 2, '0', STR_PAD_LEFT);
        }

        // Cek apakah tanggal valid untuk bulan tersebut
        if (!checkdate((int)$bulan, (int)$tanggal, (int)$tahun)) {
            return null;
        }

        return $tahun . '-' . $bulan . '-' . $tanggal;
    }
}
