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
        Schema::create('batas_wilayah', function (Blueprint $table) {
            $table->id();
            $table->enum('arah', ['utara', 'selatan', 'timur', 'barat']);
            $table->string('berbatasan_dengan'); // nama desa/kelurahan/kota
            $table->string('jenis_wilayah'); // desa, kelurahan, kecamatan, kabupaten
            $table->decimal('jarak_km', 8, 2)->nullable(); // jarak dalam kilometer
            $table->text('landmark')->nullable(); // patokan geografis seperti sungai, gunung
            $table->string('koordinat')->nullable(); // koordinat GPS batas
            $table->text('keterangan')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batas_wilayah');
    }
};
