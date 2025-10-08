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
        Schema::create('fasilitas_desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_fasilitas');
            $table->string('kategori'); // pemerintahan, pendidikan, kesehatan, ibadah, olahraga, umum
            $table->text('deskripsi')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kondisi')->default('baik'); // baik, rusak_ringan, rusak_berat
            $table->integer('tahun_dibangun')->nullable();
            $table->decimal('luas_bangunan', 8, 2)->nullable(); // m2
            $table->decimal('luas_tanah', 8, 2)->nullable(); // m2
            $table->string('status_kepemilikan')->nullable(); // milik_desa, pemerintah, swasta, hibah
            $table->text('fasilitas_yang_tersedia')->nullable();
            $table->integer('kapasitas')->nullable(); // orang/unit
            $table->string('pengelola')->nullable();
            $table->string('foto')->nullable();
            $table->string('koordinat')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas_desa');
    }
};
