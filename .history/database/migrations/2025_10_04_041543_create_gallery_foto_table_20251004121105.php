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
        Schema::create('gallery_foto', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('kategori'); // pantai, makanan_khas, seni_budaya, etc
            $table->string('url_foto'); // URL foto
            $table->string('alt_text')->nullable();
            $table->integer('urutan')->default(0);
            $table->boolean('status_aktif')->default(true);
            $table->integer('views')->default(0);
            $table->string('photographer')->nullable(); // Credit photographer
            $table->date('tanggal_foto')->nullable();
            $table->timestamps();

            // Indexes
            $table->index(['kategori', 'status_aktif']);
            $table->index(['urutan', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_foto');
    }
};
