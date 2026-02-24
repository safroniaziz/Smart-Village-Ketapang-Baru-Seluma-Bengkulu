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

        // Update surat_miskin to ket_miskin_dtks for consistent naming
        DB::table($table)
            ->where('jenis_surat', 'surat_miskin')
            ->update(['jenis_surat' => 'ket_miskin_dtks']);
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

        // Revert ket_miskin_dtks back to surat_miskin
        DB::table($table)
            ->where('jenis_surat', 'ket_miskin_dtks')
            ->update(['jenis_surat' => 'surat_miskin']);
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
