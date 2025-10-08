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
        // Remove is_active from visi-misi related tables
        Schema::table('visi_desa', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        Schema::table('misi_desa', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        Schema::table('pendekatan_desa', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        Schema::table('tahapan_desa', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        Schema::table('penjelasan_visi', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        // Remove is_active from other tables
        Schema::table('iklim_desa', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        Schema::table('fasilitas_desa', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        Schema::table('batas_wilayah', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        Schema::table('peruntukan_lahan', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add back is_active to visi-misi related tables
        Schema::table('visi_desa', function (Blueprint $table) {
            $table->boolean('is_active')->default(true);
        });

        Schema::table('misi_desa', function (Blueprint $table) {
            $table->boolean('is_active')->default(true);
        });

        Schema::table('pendekatan_desa', function (Blueprint $table) {
            $table->boolean('is_active')->default(true);
        });

        Schema::table('tahapan_desa', function (Blueprint $table) {
            $table->boolean('is_active')->default(true);
        });

        Schema::table('penjelasan_visi', function (Blueprint $table) {
            $table->boolean('is_active')->default(true);
        });

        // Add back is_active to other tables
        Schema::table('iklim_desa', function (Blueprint $table) {
            $table->boolean('is_active')->default(true);
        });

        Schema::table('fasilitas_desa', function (Blueprint $table) {
            $table->boolean('is_active')->default(true);
        });

        Schema::table('batas_wilayah', function (Blueprint $table) {
            $table->boolean('is_active')->default(true);
        });

        Schema::table('peruntukan_lahan', function (Blueprint $table) {
            $table->boolean('is_active')->default(true);
        });
    }
};
