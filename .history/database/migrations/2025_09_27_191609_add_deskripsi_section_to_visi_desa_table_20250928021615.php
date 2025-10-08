<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('visi_desa', function (Blueprint $table) {
            $table->text('deskripsi_section')->nullable()->after('deskripsi');
            $table->text('pendekatan_deskripsi')->nullable()->after('deskripsi_section');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visi_desa', function (Blueprint $table) {
            $table->dropColumn(['deskripsi_section', 'pendekatan_deskripsi']);
        });
    }
};