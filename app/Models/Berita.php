<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    // Menentukan nama tabel secara manual
    protected $table = 'berita';

    // Kolom yang diizinkan untuk diisi lewat form CRUD
    protected $fillable = [
        'kategori',
        'judul',
        'ringkasan',
        'konten_lengkap',
        'foto',
        'tanggal_publikasi'
    ];
}
