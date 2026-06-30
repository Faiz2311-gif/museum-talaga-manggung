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
    Schema::create('home_cards', function (Blueprint $table) {
        $table->id();
        $table->string('title');       // Judul di dalam kartu
        $table->string('description'); // Deskripsi pendek kartu
        $table->string('icon_or_image')->nullable(); // Nama file gambar atau class icon Tailwind
        $table->string('target_url');  // Link tujuan ketika kartu diklik (cth: /galeri atau /berita)
        $table->integer('order_weight')->default(0); // Urutan kartu (biar bisa diurutkan)
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_cards');
    }
};
