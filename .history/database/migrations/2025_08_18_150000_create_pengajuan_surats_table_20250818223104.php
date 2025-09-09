<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pengajuan_surats', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_tracking')->unique();
            $table->string('nama_lengkap');
            $table->string('nik', 20)->nullable();
            $table->string('no_hp', 20);
            $table->text('alamat')->nullable();
            $table->string('jenis_surat');
            $table->text('keperluan');
            $table->string('lampiran')->nullable();
            $table->enum('status', ['Diajukan','Valid','Ditolak','Selesai'])->default('Diajukan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_surats');
    }
};


