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
        Schema::table('sections', function (Blueprint $table) {
            if (!Schema::hasColumn('sections', 'key')) {
                $table->string('key')->nullable()->after('page');
            }
            if (!Schema::hasColumn('sections', 'content')) {
                $table->text('content')->nullable()->after('key');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sections', function (Blueprint $table) {
            if (Schema::hasColumn('sections', 'content')) {
                $table->dropColumn('content');
            }
            if (Schema::hasColumn('sections', 'key')) {
                $table->dropColumn('key');
            }
        });
    }
};
