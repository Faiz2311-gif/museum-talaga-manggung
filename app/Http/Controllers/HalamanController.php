<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function kegiatan()
    {
        return view('kegiatan'); // Mengarah ke views/profil.blade.php
    }

    public function berita()
    {
        return view('berita'); // Mengarah ke views/berita.blade.php
    }

    public function galeri()
    {
        return view('galeri'); // Mengarah ke views/galeri.blade.php
    }
}
