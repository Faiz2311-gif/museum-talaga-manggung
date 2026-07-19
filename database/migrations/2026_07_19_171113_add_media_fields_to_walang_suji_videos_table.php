<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('walang_suji_videos', function (Blueprint $table) {
            $table->string('video_file_path')->nullable()->after('video_url');
            $table->string('thumbnail_path')->nullable()->after('video_file_path');
        });
    }

    public function down(): void
    {
        Schema::table('walang_suji_videos', function (Blueprint $table) {
            $table->dropColumn(['video_file_path', 'thumbnail_path']);
        });
    }
};
