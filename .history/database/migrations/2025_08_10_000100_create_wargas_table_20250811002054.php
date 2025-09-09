<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 20)->unique();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->index();

            $table->text('alamat')->nullable();
            $table->string('rt_rw', 10)->nullable();
            $table->string('dusun')->nullable()->index();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();

            $table->enum('agama', ['Islam','Kristen','Katolik','Hindu','Buddha','Konghucu','Lainnya'])->nullable()->index();
            $table->enum('status_perkawinan', ['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'])->nullable()->index();
            $table->string('pekerjaan')->nullable()->index();
            $table->string('kewarganegaraan')->default('Indonesia');
            $table->string('foto')->nullable();
            $table->boolean('status_aktif')->default(true)->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wargas');
    }
};


