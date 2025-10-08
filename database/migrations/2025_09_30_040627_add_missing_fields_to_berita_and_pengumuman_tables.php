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
        // Add missing fields to berita table
        Schema::table('berita', function (Blueprint $table) {
            if (!Schema::hasColumn('berita', 'published')) {
                $table->boolean('published')->default(false)->after('featured');
            }
            if (!Schema::hasColumn('berita', 'kategori')) {
                $table->string('kategori')->nullable()->after('excerpt');
            }
            if (!Schema::hasColumn('berita', 'read_time')) {
                $table->integer('read_time')->nullable()->after('views');
            }
        });

        // Add missing fields to pengumuman table
        Schema::table('pengumuman', function (Blueprint $table) {
            if (!Schema::hasColumn('pengumuman', 'published')) {
                $table->boolean('published')->default(false)->after('views');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove added fields from berita table
        Schema::table('berita', function (Blueprint $table) {
            if (Schema::hasColumn('berita', 'published')) {
                $table->dropColumn('published');
            }
            if (Schema::hasColumn('berita', 'kategori')) {
                $table->dropColumn('kategori');
            }
            if (Schema::hasColumn('berita', 'read_time')) {
                $table->dropColumn('read_time');
            }
        });

        // Remove added fields from pengumuman table
        Schema::table('pengumuman', function (Blueprint $table) {
            if (Schema::hasColumn('pengumuman', 'published')) {
                $table->dropColumn('published');
            }
        });
    }
};