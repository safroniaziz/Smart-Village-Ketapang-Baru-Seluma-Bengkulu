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
                'pekerjaan'      // Using mata_pencaharian instead
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add back the field in case we need to rollback
            $table->string('pekerjaan')->nullable()->after('kewarganegaraan');
        });
    }
};
