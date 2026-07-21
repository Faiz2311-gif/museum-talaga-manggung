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
    // Jika tabel settings sudah ada, kita modifikasi kolomnya
    Schema::table('settings', function (Blueprint $table) {
        // Kolom untuk mengidentifikasi halaman (misal: 'galeri', 'berita', 'kontak')
        $table->string('halaman')->nullable()->unique()->after('id');
        // Ubah nama kolom agar lebih umum dari 'header_galeri' menjadi 'banner_image'
        $table->string('banner_image')->nullable()->after('halaman');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
};
