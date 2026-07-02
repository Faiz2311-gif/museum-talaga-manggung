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
    Schema::create('sections', function (Blueprint $table) {
        $table->id();
        $table->string('page');    // Untuk memisahkan konten (contoh: 'sejarah', 'beranda')
        $table->string('key');     // Kata kunci field teks (contoh: 'sejarah_title')
        $table->text('content');   // Isi narasi artikel/tulisan
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
