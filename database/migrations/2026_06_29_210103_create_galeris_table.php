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
    Schema::create('galeris', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->text('deskripsi')->nullable();
        $table->string('kategori'); // Contoh: Senjata, Prasasti, Alat Musik
        $table->string('foto');     // Thumbnail gambar 2D
        $table->string('link_3d')->nullable(); // <-- Kolom Baru untuk URL Objek 3D
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};