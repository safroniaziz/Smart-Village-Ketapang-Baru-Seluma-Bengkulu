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
        Schema::create('potensi_desa', function (Blueprint $table) {
            $table->id();
            $table->string('kategori'); // pertanian, peternakan, kerajinan, wisata, perdagangan, dll
            $table->string('nama_potensi');
            $table->text('deskripsi');
            $table->decimal('nilai_ekonomi', 15, 2)->nullable(); // dalam rupiah
            $table->integer('jumlah_unit')->nullable(); // jumlah usaha/ternak/wisata
            $table->string('satuan')->nullable(); // ekor, unit, hektar, dll
            $table->string('lokasi')->nullable();
            $table->string('pengelola')->nullable(); // individu, kelompok, koperasi
            $table->enum('status', ['aktif', 'berkembang', 'menurun', 'tidak_aktif'])->default('aktif');
            $table->string('icon')->nullable(); // FontAwesome icon
            $table->string('foto')->nullable(); // path ke foto
            $table->text('peluang_pengembangan')->nullable();
            $table->text('kendala')->nullable();
            $table->boolean('is_unggulan')->default(false); // potensi unggulan
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potensi_desa');
    }
};
