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
          Schema::table('testimonials_contents', function (Blueprint $table) {
            $table->text('testimonials_message')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('testimonials_contents', function (Blueprint $table) {
            $table->string('testimonials_message', 255)->change();
        });
    }
};
