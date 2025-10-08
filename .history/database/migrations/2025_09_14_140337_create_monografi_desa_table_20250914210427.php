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
        Schema::create('monografi_desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('kode_pos');
            $table->string('kode_area');
            $table->string('status_desa');
            $table->integer('tahun_berdiri');
            $table->decimal('luas_wilayah', 10, 2); // dalam hektar
            $table->integer('ketinggian_mdpl');
            $table->string('topografi');
            $table->string('iklim');
            $table->string('suhu_rata_rata');
            $table->decimal('jarak_ke_kecamatan', 5, 2); // dalam km
            $table->decimal('waktu_ke_kecamatan', 5, 2); // dalam jam
            $table->decimal('jarak_ke_kabupaten', 5, 2); // dalam km
            $table->decimal('waktu_ke_kabupaten', 5, 2); // dalam jam
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->string('google_street_view_url')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monografi_desa');
    }
};
