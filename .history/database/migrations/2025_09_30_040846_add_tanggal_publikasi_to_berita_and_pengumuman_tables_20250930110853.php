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
        // Add tanggal_publikasi field to berita table
        Schema::table('berita', function (Blueprint $table) {
            if (!Schema::hasColumn('berita', 'tanggal_publikasi')) {
                $table->timestamp('tanggal_publikasi')->nullable()->after('created_at');
            }
        });

        // Add tanggal_publikasi field to pengumuman table
        Schema::table('pengumuman', function (Blueprint $table) {
            if (!Schema::hasColumn('pengumuman', 'tanggal_publikasi')) {
                $table->timestamp('tanggal_publikasi')->nullable()->after('created_at');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove tanggal_publikasi field from berita table
        Schema::table('berita', function (Blueprint $table) {
            if (Schema::hasColumn('berita', 'tanggal_publikasi')) {
                $table->dropColumn('tanggal_publikasi');
            }
        });

        // Remove tanggal_publikasi field from pengumuman table
        Schema::table('pengumuman', function (Blueprint $table) {
            if (Schema::hasColumn('pengumuman', 'tanggal_publikasi')) {
                $table->dropColumn('tanggal_publikasi');
            }
        });
    }
};