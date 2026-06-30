<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SejarahAdminController extends Controller
{
    /**
     * Menampilkan halaman utama (Index) Manajemen Sejarah Admin.
     * Berfungsi untuk melihat pratinjau teks dan status publikasi saat ini.
     */
    public function index()
    {
        return view('admin.sejarah.index');
    }

    /**
     * Menampilkan form tunggal (Edit) untuk mengubah narasi teks sejarah.
     */
    public function edit()
    {
        // Mengambil semua data teks yang memiliki label page 'sejarah'
        $rawSections = Section::where('page', 'sejarah')->get();
        
        // Mengubah baris koleksi menjadi array ber-key agar mudah dipanggil di Blade
        $sections = $rawSections->pluck('content', 'key')->toArray();

        return view('admin.sejarah.edit', compact('sections'));
    }

    /**
     * Memproses penyimpanan atau pembaruan narasi teks sejarah ke database.
     */
    public function update(Request $request)
    {
        // Validasi input form termasuk file gambar
        $validated = $request->validate([
            'sejarah_title' => 'required|string|max:255',
            'sejarah_subtitle' => 'required|string|max:500',
            'sejarah_body_1' => 'required|string',
            'sejarah_body_2' => 'nullable|string',
            'sejarah_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Aturan validasi gambar
        ]);

        // Proses unggah gambar jika ada file baru yang dikirim
        if ($request->hasFile('sejarah_image')) {
            // 1. Ambil data gambar lama dari database (jika ada) untuk dihapus dari server
            $oldImageSection = Section::where('page', 'sejarah')->where('key', 'sejarah_image')->first();
            if ($oldImageSection && !empty($oldImageSection->content)) {
                Storage::disk('public')->delete($oldImageSection->content);
            }

            // 2. Simpan file gambar baru ke direktori 'storage/app/public/sejarah'
            $imagePath = $request->file('sejarah_image')->store('sejarah', 'public');
            
            // 3. Masukkan path gambar ke dalam array data divalidasi agar ikut tersimpan di loop
            $validated['sejarah_image'] = $imagePath;
        } else {
            // Hapus dari array validated agar tidak menimpa path gambar lama dengan nilai null
            unset($validated['sejarah_image']);
        }

        // Looping data input untuk disimpan atau diperbarui secara otomatis
        foreach ($validated as $key => $value) {
            Section::updateOrCreate(
                [
                    'page' => 'sejarah', 
                    'key' => $key
                ],
                [
                    'content' => $value
                ]
            );
        }

        // Kembali ke halaman index manajemen dengan membawa pesan sukses
        return redirect()->route('admin.sejarah.index')->with('success', 'Narasi konten sejarah dan gambar museum berhasil diperbarui!');
    }
}
