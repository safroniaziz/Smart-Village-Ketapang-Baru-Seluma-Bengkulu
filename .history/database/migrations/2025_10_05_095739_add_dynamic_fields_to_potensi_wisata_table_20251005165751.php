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
        Schema::table('potensi_wisata', function (Blueprint $table) {
            // Aktivitas Wisata
            $table->text('aktivitas_wisata')->nullable()->after('lokasi');
            
            // Kontak & Informasi
            $table->string('nomor_telepon')->nullable()->after('aktivitas_wisata');
            $table->string('whatsapp')->nullable()->after('nomor_telepon');
            $table->text('info_guide')->nullable()->after('whatsapp');
            
            // Info Praktis
            $table->string('jam_buka')->nullable()->after('info_guide');
            $table->string('harga_tiket')->nullable()->after('jam_buka');
            $table->string('fasilitas_parkir')->nullable()->after('harga_tiket');
            $table->string('warung_makan')->nullable()->after('fasilitas_parkir');
            
            // Key Features (JSON untuk fleksibilitas)
            $table->json('fitur_unggulan')->nullable()->after('warung_makan'); // [{"icon":"fas fa-leaf", "judul":"Alam Asri", "deskripsi":"..."}]
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('potensi_wisata', function (Blueprint $table) {
            $table->dropColumn([
                'aktivitas_wisata',
                'nomor_telepon', 
                'whatsapp',
                'info_guide',
                'jam_buka',
                'harga_tiket',
                'fasilitas_parkir',
                'warung_makan',
                'fitur_unggulan'
            ]);
        });
    }
};
