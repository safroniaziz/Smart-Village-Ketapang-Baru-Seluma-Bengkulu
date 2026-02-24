<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update surat_menikah to ket_menikah for consistent naming
        DB::table('pengajuan_surat')
            ->where('jenis_surat', 'surat_menikah')
            ->update(['jenis_surat' => 'ket_menikah']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert ket_menikah back to surat_menikah
        DB::table('pengajuan_surat')
            ->where('jenis_surat', 'ket_menikah')
            ->update(['jenis_surat' => 'surat_menikah']);
    }
};
