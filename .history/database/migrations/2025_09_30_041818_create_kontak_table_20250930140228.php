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
        Schema::create('kontak', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->text('alamat');
            $table->string('kode_pos')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('kepala_desa')->nullable();
            $table->string('sekretaris_desa')->nullable();
            $table->string('bendahara_desa')->nullable();
            $table->json('jam_operasional')->nullable(); // {senin: "08:00-16:00", selasa: "08:00-16:00", ...}
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('deskripsi')->nullable();
            $table->boolean('aktif')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontak');
    }
};
