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
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('lokasi');

            // Media
            $table->json('gambar')->nullable(); // Gallery dengan struktur: [{"url":"", "judul":"", "keterangan":""}]
            $table->string('video_youtube')->nullable(); // YouTube URL/ID
            $table->string('thumbnail')->nullable(); // Main thumbnail image

            // Category & Classification
            $table->enum('kategori_wisata', [
                'pantai', 'gunung', 'air_terjun', 'budaya',
                'kuliner', 'sejarah', 'religi', 'alam', 'adventure'
            ]);

            // Details
            $table->json('fasilitas')->nullable(); // Array of facilities
            $table->string('jam_operasional')->nullable();
            $table->string('tiket_masuk')->nullable(); // Price info
            $table->string('kontak')->nullable(); // Phone/WhatsApp

            // Location
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            // Management
            $table->boolean('status_aktif')->default(true);
            $table->integer('urutan')->default(0);
            $table->integer('jumlah_pengunjung')->default(0); // View counter

            // Timestamps & Soft Delete
            $table->timestamps();
            $table->softDeletes();

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
