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
        // Update surat_miskin to ket_miskin_dtks for consistent naming
        DB::table('pengajuan_surat')
            ->where('jenis_surat', 'surat_miskin')
            ->update(['jenis_surat' => 'ket_miskin_dtks']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert ket_miskin_dtks back to surat_miskin
        DB::table('pengajuan_surat')
            ->where('jenis_surat', 'ket_miskin_dtks')
            ->update(['jenis_surat' => 'surat_miskin']);
    }
};
