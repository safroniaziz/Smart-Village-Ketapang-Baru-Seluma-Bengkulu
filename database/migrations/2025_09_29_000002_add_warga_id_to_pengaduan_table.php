<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->unsignedBigInteger('warga_id')->nullable()->after('nik');
            $table->index('warga_id');
        });
    }

    public function down(): void
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->dropIndex(['warga_id']);
            $table->dropColumn('warga_id');
        });
    }
};


