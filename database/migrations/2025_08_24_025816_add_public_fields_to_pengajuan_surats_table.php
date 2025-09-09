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
        Schema::table('pengajuan_surats', function (Blueprint $table) {
            // Add new fields for public submission
            $table->json('data_surat')->nullable()->after('jenis_surat');
            $table->timestamp('submitted_at')->nullable()->after('status');
            $table->timestamp('approved_at')->nullable()->after('submitted_at');
            $table->unsignedBigInteger('approved_by')->nullable()->after('approved_at');
            $table->timestamp('rejected_at')->nullable()->after('approved_by');
            $table->unsignedBigInteger('rejected_by')->nullable()->after('rejected_at');
            $table->text('alasan_reject')->nullable()->after('rejected_by');
            $table->boolean('is_public')->default(false)->after('alasan_reject');

            // Add foreign key constraints
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('rejected_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengajuan_surats', function (Blueprint $table) {
            // Drop foreign keys first
            $table->dropForeign(['approved_by']);
            $table->dropForeign(['rejected_by']);

            // Drop columns
            $table->dropColumn([
                'data_surat',
                'submitted_at',
                'approved_at',
                'approved_by',
                'rejected_at',
                'rejected_by',
                'alasan_reject',
                'is_public'
            ]);
        });
    }
};
