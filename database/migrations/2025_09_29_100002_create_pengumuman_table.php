<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->longText('konten');
            $table->text('excerpt')->nullable();
            $table->string('penulis')->default('Admin Desa');
            $table->timestamp('tanggal_publikasi')->useCurrent();
            $table->timestamp('tanggal_berakhir')->nullable();
            $table->enum('prioritas', ['Tinggi', 'Sedang', 'Rendah'])->default('Sedang');
            $table->unsignedInteger('views')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['tanggal_publikasi', 'deleted_at']);
            $table->index(['prioritas', 'tanggal_publikasi']);
            $table->index(['tanggal_berakhir', 'deleted_at']);
            $table->index('slug');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};
