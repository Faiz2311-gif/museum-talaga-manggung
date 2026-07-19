<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gosali_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('duration');
            $table->integer('sort_order')->default(0);
            $table->string('video_url')->nullable();
            $table->string('video_file_path')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->text('description')->nullable();
            $table->string('guide_pdf_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gosali_videos');
    }
};
