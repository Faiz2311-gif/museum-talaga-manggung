<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * Mengizinkan kolom diisi secara massal (Mass Assignment).
     * Kolom 'header_galeri' tetap dipertahankan jika Anda masih membutuhkannya.
     */
    protected $fillable = [
        'header_galeri', 
        'halaman', 
        'banner_image'
    ];
}
