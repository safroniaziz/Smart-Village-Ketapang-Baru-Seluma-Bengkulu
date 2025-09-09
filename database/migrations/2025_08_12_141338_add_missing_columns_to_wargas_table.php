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
        Schema::table('wargas', function (Blueprint $table) {
            if (!Schema::hasColumn('wargas', 'no_kk')) {
                $table->string('no_kk', 20)->nullable()->index()->after('nama_lengkap');
            }
            if (!Schema::hasColumn('wargas', 'status')) {
                $table->enum('status', ['aktif', 'nonaktif', 'meninggal', 'pindah'])->default('aktif')->index()->after('status_aktif');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wargas', function (Blueprint $table) {
            $table->dropColumn(['no_kk', 'status']);
        });
    }
};
