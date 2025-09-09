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
            $table->enum('pendidikan', ['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3'])->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wargas', function (Blueprint $table) {
            $table->dropColumn('pendidikan');
        });
    }
};
