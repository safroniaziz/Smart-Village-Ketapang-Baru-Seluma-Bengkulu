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
            $table->foreignId('warga_id')->constrained('wargas')->cascadeOnDelete();
            $table->enum('program', ['PKH','BPNT','BLT-DD','BST','Lainnya'])->index();
            $table->year('tahun')->index();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penerima_bantuan');
    }
};


