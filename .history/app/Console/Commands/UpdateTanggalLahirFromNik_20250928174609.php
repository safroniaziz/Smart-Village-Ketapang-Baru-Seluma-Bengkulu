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
     * - 17: tahun (2017)
     * - 05: bulan (05)
     * - 05: tanggal (05)
     */
    private function extractTanggalLahirFromNik($nik)
    {
        if (strlen($nik) < 6) {
            return null;
        }
        
        $tahun = '20' . substr($nik, 0, 2);
        $bulan = substr($nik, 2, 2);
        $tanggal = substr($nik, 4, 2);
        
        // Validasi tanggal
        if ($bulan < 1 || $bulan > 12 || $tanggal < 1 || $tanggal > 31) {
            return null;
        }
        
        // Cek apakah tanggal valid untuk bulan tersebut
        if (!checkdate($bulan, $tanggal, $tahun)) {
            return null;
        }
        
        return $tahun . '-' . $bulan . '-' . $tanggal;
    }
}