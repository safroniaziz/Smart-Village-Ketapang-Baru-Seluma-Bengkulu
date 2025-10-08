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
        Schema::create('peruntukan_lahan', function (Blueprint $table) {
            $table->id();
            $table->string('kategori'); // sawah, kering, basah, perkebunan, hutan, fasilitas_umum
            $table->string('sub_kategori'); // tadah_hujan, pekarangan, tambak, kelapa_sawit, dll
            $table->decimal('luas_hektar', 10, 2);
            $table->string('icon')->nullable(); // untuk icon FontAwesome
            $table->string('warna')->nullable(); // untuk color scheme
            $table->text('deskripsi')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('urutan')->default(0); // untuk sorting
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peruntukan_lahan');
    }
};
