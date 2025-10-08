<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->enum('asal_pelapor', ['Warga Desa', 'Eksternal'])->default('Eksternal')->after('anonim');
            $table->boolean('is_warga')->default(false)->after('asal_pelapor');
        });
    }

    public function down(): void
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->dropColumn(['asal_pelapor', 'is_warga']);
        });
    }
};


