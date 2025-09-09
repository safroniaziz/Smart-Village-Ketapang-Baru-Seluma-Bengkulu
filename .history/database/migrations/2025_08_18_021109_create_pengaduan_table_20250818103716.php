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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_tracking')->unique();
            $table->string('nama_lengkap');
            $table->string('nik')->nullable();
            $table->string('email');
            $table->string('telepon')->nullable();
            $table->text('alamat')->nullable();
            $table->string('jenis_pengaduan');
            $table->enum('prioritas', ['rendah', 'sedang', 'tinggi', 'sangat_tinggi']);
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->date('tanggal_kejadian');
            $table->string('lampiran')->nullable();
            $table->boolean('anonim')->default(false);
            $table->enum('status', ['Diterima', 'Dalam Proses', 'Selesai', 'Ditolak'])->default('Diterima');
            $table->text('catatan_petugas')->nullable();
            $table->string('petugas')->nullable();
            $table->timestamp('tanggal_selesai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
