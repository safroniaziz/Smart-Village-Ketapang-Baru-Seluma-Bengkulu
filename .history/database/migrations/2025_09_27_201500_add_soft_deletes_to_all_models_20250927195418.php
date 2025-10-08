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
        // Add soft deletes to users table
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to pengaduan table
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to penerima_bantuan table
        Schema::table('penerima_bantuan', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to pengajuan_surats table
        Schema::table('pengajuan_surats', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to surats table
        Schema::table('surats', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to batas_wilayah table
        Schema::table('batas_wilayah', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to fasilitas_desa table
        Schema::table('fasilitas_desa', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to iklim_desa table
        Schema::table('iklim_desa', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to monografi_desa table
        Schema::table('monografi_desa', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to peruntukan_lahan table
        Schema::table('peruntukan_lahan', function (Blueprint $table) {
            $table->softDeletes();
        });

        // Add soft deletes to potensi_desa table
        Schema::table('potensi_desa', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove soft deletes from all tables
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('pengaduan', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('penerima_bantuan', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('pengajuan_surats', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('surats', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('batas_wilayah', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('fasilitas_desa', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('iklim_desa', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('monografi_desa', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('peruntukan_lahan', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('potensi_desa', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
