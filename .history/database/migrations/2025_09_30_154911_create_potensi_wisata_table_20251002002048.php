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
        Schema::create('potensi_wisata', function (Blueprint $table) {
            $table->id();

            // Basic Info
            $table->string('nama'); // Pantai Ancol Seluma
            
            // Gallery dengan judul & keterangan per gambar
            $table->json('gambar')->nullable(); // [{"url":"", "judul":"", "keterangan":""}]
            
            // Video YouTube
            $table->string('video_youtube')->nullable(); // YouTube URL/ID

            // View counter
            $table->integer('views')->default(0);

            // Timestamps
            $table->timestamps();

            // Indexes
            $table->index(['kategori_wisata', 'status_aktif']);
            $table->index(['urutan', 'created_at']);
            $table->index('status_aktif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potensi_wisata');
    }
};
