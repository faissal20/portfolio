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
        Schema::create('our_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('heart_storage')->default('0%');
            $table->string('knowledge')->default('0%');
            $table->string('missing')->default('0%');
            $table->string('happiness')->default('unknown');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_statistics');
    }
};
