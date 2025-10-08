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
        Schema::create('blt_dds', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_anggaran');
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('nik', 16);
            $table->text('alamat');
            $table->string('no_rekening', 50)->nullable();
            $table->decimal('nominal_bantuan', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blt_dds');
    }
};
