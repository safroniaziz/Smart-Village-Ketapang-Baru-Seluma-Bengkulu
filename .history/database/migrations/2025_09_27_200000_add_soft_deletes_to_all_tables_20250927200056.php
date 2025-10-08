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
        // Add soft deletes to users table
        if (!Schema::hasColumn('users', 'deleted_at')) {
            Schema::table('users', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        // Add soft deletes to pengaduan table
        if (!Schema::hasColumn('pengaduan', 'deleted_at')) {
            Schema::table('pengaduan', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        // Add soft deletes to penerima_bantuan table
        if (!Schema::hasColumn('penerima_bantuan', 'deleted_at')) {
            Schema::table('penerima_bantuan', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        // Add soft deletes to pengajuan_surats table
        if (!Schema::hasColumn('pengajuan_surats', 'deleted_at')) {
            Schema::table('pengajuan_surats', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        // Add soft deletes to surats table
        if (!Schema::hasColumn('surats', 'deleted_at')) {
            Schema::table('surats', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        // Add soft deletes to profil desa tables
        if (!Schema::hasColumn('batas_wilayah', 'deleted_at')) {
            Schema::table('batas_wilayah', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        if (!Schema::hasColumn('fasilitas_desa', 'deleted_at')) {
            Schema::table('fasilitas_desa', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        if (!Schema::hasColumn('iklim_desa', 'deleted_at')) {
            Schema::table('iklim_desa', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        if (!Schema::hasColumn('monografi_desa', 'deleted_at')) {
            Schema::table('monografi_desa', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        if (!Schema::hasColumn('peruntukan_lahan', 'deleted_at')) {
            Schema::table('peruntukan_lahan', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        if (!Schema::hasColumn('potensi_desa', 'deleted_at')) {
            Schema::table('potensi_desa', function (Blueprint $table) {
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove soft deletes from all tables
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('pengaduan', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('penerima_bantuan', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('pengajuan_surats', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('surats', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('batas_wilayah', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('fasilitas_desa', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('iklim_desa', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('monografi_desa', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('peruntukan_lahan', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('potensi_desa', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
