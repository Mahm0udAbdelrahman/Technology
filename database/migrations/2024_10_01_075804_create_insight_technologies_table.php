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
        Schema::create('insight_technologies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_insight_id')->nullable()->constrained('data_insights','id')->cascadeOnDelete();     
            $table->foreignId('technology_id')->nullable()->constrained('technologies','id')->cascadeOnDelete();     
            $table->string('title')->nullable();
            $table->string('rate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insight_technologies');
    }
};
