<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $table = $this->getPengajuanSuratTable();
        if (!$table) {
            return;
        }

        // Update surat_penghasilan_ortu to ket_penghasilan_ortu
        DB::table($table)
            ->where('jenis_surat', 'surat_penghasilan_ortu')
            ->update(['jenis_surat' => 'ket_penghasilan_ortu']);

        // Update surat_perdamaian to perjanjian_perdamaian
        DB::table($table)
            ->where('jenis_surat', 'surat_perdamaian')
            ->update(['jenis_surat' => 'perjanjian_perdamaian']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table = $this->getPengajuanSuratTable();
        if (!$table) {
            return;
        }

        // Revert ket_penghasilan_ortu to surat_penghasilan_ortu
        DB::table($table)
            ->where('jenis_surat', 'ket_penghasilan_ortu')
            ->update(['jenis_surat' => 'surat_penghasilan_ortu']);

        // Revert perjanjian_perdamaian to surat_perdamaian
        DB::table($table)
            ->where('jenis_surat', 'perjanjian_perdamaian')
            ->update(['jenis_surat' => 'surat_perdamaian']);
    }

    private function getPengajuanSuratTable(): ?string
    {
        if (Schema::hasTable('pengajuan_surats')) {
            return 'pengajuan_surats';
        }

        if (Schema::hasTable('pengajuan_surat')) {
            return 'pengajuan_surat';
        }

        return null;
    }
};
