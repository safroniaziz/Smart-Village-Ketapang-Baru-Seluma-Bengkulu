<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduan_followups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengaduan_id');
            $table->enum('status', ['Diterima', 'Dalam Proses', 'Selesai', 'Ditolak']);
            $table->text('catatan')->nullable();
            $table->unsignedBigInteger('petugas_id')->nullable();
            $table->timestamps();

            $table->index('pengaduan_id');
            $table->index('petugas_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduan_followups');
    }
};


