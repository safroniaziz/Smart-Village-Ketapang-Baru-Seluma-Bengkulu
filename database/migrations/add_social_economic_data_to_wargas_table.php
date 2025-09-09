<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('wargas', function (Blueprint $table) {
            // Status Rumah - HANYA 2 pilihan
            $table->enum('status_rumah', ['MS', 'SW'])->nullable()->index();
            
            // Status Sosial Ekonomi - ME dipindah ke sini
            $table->enum('status_sosial', ['ME', 'MSK', 'RM', 'MK'])->nullable()->index();
            
            // Kelayakan Rumah
            $table->enum('kelayakan_rumah', ['TLH', 'LH', 'SP', 'P', 'M'])->nullable()->index();
            
            // Mata Pencaharian
            $table->enum('mata_pencaharian', ['PTN', 'SWT', 'PNS', 'NLY', 'LN'])->nullable()->index();
            
            // Jumlah Jiwa per KK
            $table->integer('jumlah_jiwa_kk')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('wargas', function (Blueprint $table) {
            $table->dropColumn([
                'status_rumah',
                'status_sosial', 
                'kelayakan_rumah',
                'mata_pencaharian',
                'jumlah_jiwa_kk'
            ]);
        });
    }
};