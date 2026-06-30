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
    Schema::create('visimisis', function (Blueprint $table) {
        $table->id();
        $table->string('title')->default('Visi & Misi Museum Talaga Manggung');
        $table->string('subtitle')->nullable();
        $table->text('visi');
        $table->text('misi');
        $table->string('image')->nullable(); // Untuk menyimpan path berkas gambar sampul
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visimisis');
    }
};
