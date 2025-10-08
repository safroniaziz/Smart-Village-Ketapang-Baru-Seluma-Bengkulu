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
        Schema::create('struktur_organisasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('foto')->nullable();
            $table->text('tugas')->nullable();
            $table->text('wewenang')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('urutan')->default(0);
            $table->enum('kategori', ['pemerintahan', 'bpd'])->default('pemerintahan');
            $table->enum('level', ['kepala', 'wakil', 'sekretaris', 'kasi_kaur', 'kadus', 'anggota'])->default('anggota');
            $table->boolean('aktif')->default(true);
            $table->timestamps();
            $table->softDeletes();

            // Foreign key constraint
            $table->foreign('parent_id')->references('id')->on('struktur_organisasi')->onDelete('set null');
            
            // Indexes for better performance
            $table->index(['aktif', 'kategori']);
            $table->index(['parent_id']);
            $table->index(['urutan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('struktur_organisasi');
    }
};
