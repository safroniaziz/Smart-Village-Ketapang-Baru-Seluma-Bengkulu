<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->longText('konten');
            $table->text('excerpt')->nullable();
            $table->string('gambar')->nullable();
            $table->string('penulis')->default('Admin Desa');
            $table->timestamp('tanggal_publikasi')->useCurrent();
            $table->unsignedInteger('views')->default(0);
            $table->boolean('featured')->default(false);
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['tanggal_publikasi', 'deleted_at']);
            $table->index(['featured', 'tanggal_publikasi']);
            $table->index('slug');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
