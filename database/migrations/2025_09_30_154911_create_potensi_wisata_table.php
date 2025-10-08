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
            $table->text('deskripsi')->nullable(); // Deskripsi umum tentang pantai
            $table->string('lokasi')->nullable(); // Lokasi pantai

            // Gallery dengan judul & keterangan per gambar
            $table->json('gambar')->nullable(); // [{"url":"", "judul":"", "keterangan":""}]

            // Video YouTube
            $table->string('video_youtube')->nullable(); // YouTube URL/ID
            $table->string('sumber_video')->nullable(); // Sumber video (e.g., "YT Pilot Drone")

            // File Potensi Desa (PDF)
            $table->string('file_potensi_desa')->nullable(); // Path ke file PDF di storage

            // View counter
            $table->integer('views')->default(0);

            // Timestamps
            $table->timestamps();

            // Indexes
            $table->index('views'); // For sorting by popularity
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
