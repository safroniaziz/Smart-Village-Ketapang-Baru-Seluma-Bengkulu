<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Unify surat_usaha to ket_usaha for consistent naming
     */
    public function up(): void
    {
        // Update all records with jenis_surat = 'surat_usaha' to 'ket_usaha'
        DB::table('pengajuan_surats')
            ->where('jenis_surat', 'surat_usaha')
            ->update(['jenis_surat' => 'ket_usaha']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back if needed
        DB::table('pengajuan_surats')
            ->where('jenis_surat', 'ket_usaha')
            ->update(['jenis_surat' => 'surat_usaha']);
    }
};
