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
        Schema::create('study_abroad', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('header_image');
        $table->string('img1');
        $table->string('img2');
        $table->longText('text1');
        $table->longText('text2');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_abroad');
    }
};
