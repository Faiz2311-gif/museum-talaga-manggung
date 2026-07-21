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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('title');                 // Nama Jabatan (misal: Direktur Utama)
            $table->string('role');                  // Nama Pejabat (misal: Ahmad Subarjo)
            $table->string('image')->nullable();     // Foto Pejabat (1 gambar)
            $table->text('description')->nullable(); // Deskripsi Singkat Tugas/Tanggung Jawab
            
            // Tambahan: Kolom urutan untuk mengatur posisi tampilan kiri/kanan/atas/bawah di tingkat yang sama
            $table->integer('sort_order')->default(0); 

            // Koreksi keamanan: Pastikan tipe kolom sama dan mendukung null sebelum foreign key dipasang
            $table->unsignedBigInteger('parent_id')->nullable();
            
            $table->timestamps();

            // Deklarasi Foreign Key untuk self-referencing (Atasan Langsung)
            $table->foreign('parent_id')
                  ->references('id')
                  ->on('positions')
                  ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
