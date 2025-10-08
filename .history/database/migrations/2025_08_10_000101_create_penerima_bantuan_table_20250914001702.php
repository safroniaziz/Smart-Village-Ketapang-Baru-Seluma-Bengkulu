<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penerima_bantuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('program')->index();
            $table->year('tahun')->index();
            $table->decimal('nominal', 15, 2)->nullable();
            $table->enum('status', ['Aktif', 'Tidak Aktif', 'Selesai'])->default('Aktif');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penerima_bantuan');
    }
};


