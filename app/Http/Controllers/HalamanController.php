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

    public function sejarah()
    {
        return view('sejarah');
    }

    public function visimisi()
    {
        return view('visimisi');
    }

    public function strukturorg()
    {
        return view('strukturorg');
    }

    public function walangsuji()
    {
        return view('walangsuji');
    }

    public function gosali()
    {
        return view('gosali');
    }
}
