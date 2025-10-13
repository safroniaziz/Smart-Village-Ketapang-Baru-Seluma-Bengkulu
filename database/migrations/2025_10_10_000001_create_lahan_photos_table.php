<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lahan_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lahan_point_id')->constrained()->cascadeOnDelete();
            $table->string('path');
            $table->unsignedInteger('order_index')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lahan_photos');
    }
};


