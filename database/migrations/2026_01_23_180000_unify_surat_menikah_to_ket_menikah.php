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

        // Update surat_menikah to ket_menikah for consistent naming
        DB::table($table)
            ->where('jenis_surat', 'surat_menikah')
            ->update(['jenis_surat' => 'ket_menikah']);
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

        // Revert ket_menikah back to surat_menikah
        DB::table($table)
            ->where('jenis_surat', 'ket_menikah')
            ->update(['jenis_surat' => 'surat_menikah']);
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
