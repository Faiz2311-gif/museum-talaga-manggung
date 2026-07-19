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
        Schema::create('walang_suji_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('duration')->nullable();
            $table->integer('sort_order')->default(0);
            $table->string('video_url');
            $table->text('description')->nullable();
            $table->string('guide_pdf_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('walang_suji_videos');
    }
};
