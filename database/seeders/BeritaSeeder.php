<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('berita')->insert([
            [
                'kategori' => 'EDUKASI',
                'judul' => 'Kunjungan Studi Sejarah Interaktif Tingkat Nasional',
                'ringkasan' => 'Museum menerima kunjungan kehormatan dari delegasi universitas untuk meneliti keterkaitan arsip lokal dengan peta perdagangan maritim...',
                'konten_lengkap' => 'Isi konten lengkap mengenai kunjungan studi mahasiswa dari berbagai universitas...',
                'foto' => null,
                'tanggal_publikasi' => '2026-05-25',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
