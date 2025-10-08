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
        Schema::create('iklim_desa', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_iklim')->default('Tropis Pesisir'); // Tropis, Pesisir, dsb
            $table->decimal('suhu_min', 5, 2)->default(23.00); // Suhu minimum dalam Celsius
            $table->decimal('suhu_max', 5, 2)->default(30.00); // Suhu maksimum dalam Celsius
            $table->decimal('kelembaban_rata', 5, 2)->nullable(); // Kelembaban rata-rata (%)
            $table->integer('curah_hujan_tahunan')->nullable(); // mm per tahun
            $table->string('musim_kering')->nullable(); // bulan musim kering
            $table->string('musim_hujan')->nullable(); // bulan musim hujan
            $table->text('karakteristik_iklim')->nullable(); // deskripsi karakteristik iklim
            $table->string('angin_dominan')->nullable(); // arah angin dominan
            $table->integer('hari_hujan_pertahun')->nullable(); // jumlah hari hujan per tahun
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iklim_desa');
    }
};
