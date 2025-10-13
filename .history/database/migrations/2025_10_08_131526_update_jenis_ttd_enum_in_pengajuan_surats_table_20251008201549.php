<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First update existing 'biasa' values to 'gambar'
        DB::table('pengajuan_surats')
            ->where('jenis_ttd', 'biasa')
            ->update(['jenis_ttd' => 'gambar']);

        // Then alter the enum column to new values
        DB::statement("ALTER TABLE pengajuan_surats MODIFY COLUMN jenis_ttd ENUM('manual', 'gambar', 'qrcode') DEFAULT 'gambar'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to original enum
        DB::statement("ALTER TABLE pengajuan_surats MODIFY COLUMN jenis_ttd ENUM('biasa', 'qrcode') DEFAULT 'biasa'");
        
        // Update 'gambar' values back to 'biasa'
        DB::table('pengajuan_surats')
            ->where('jenis_ttd', 'gambar')
            ->update(['jenis_ttd' => 'biasa']);
    }
};
