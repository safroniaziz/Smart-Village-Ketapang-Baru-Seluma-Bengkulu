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
        Schema::table('users', function (Blueprint $table) {
            // Remove unused fields
            $table->dropColumn([
                'tanggal_lahir',  // Using NIK for age calculation instead
                'pekerjaan',      // Using mata_pencaharian instead
                'tempat_lahir'    // Not used in current implementation
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add back the fields in case we need to rollback
            $table->date('tanggal_lahir')->nullable()->after('nik');
            $table->string('pekerjaan')->nullable()->after('kewarganegaraan');
            $table->string('tempat_lahir')->nullable()->after('nik');
        });
    }
};
