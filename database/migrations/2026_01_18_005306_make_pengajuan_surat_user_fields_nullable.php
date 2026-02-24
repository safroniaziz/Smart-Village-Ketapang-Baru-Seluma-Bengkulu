<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Make user data fields nullable since this data already exists in users table
     * and can be accessed via user_id relation. No need to duplicate.
     */
    public function up(): void
    {
        Schema::table('pengajuan_surats', function (Blueprint $table) {
            $table->string('nama_lengkap')->nullable()->change();
            $table->string('nik')->nullable()->change();
            $table->string('no_hp')->nullable()->change();
            $table->text('alamat')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengajuan_surats', function (Blueprint $table) {
            $table->string('nama_lengkap')->nullable(false)->change();
            $table->string('nik')->nullable(false)->change();
            $table->string('no_hp')->nullable(false)->change();
            $table->text('alamat')->nullable(false)->change();
        });
    }
};
