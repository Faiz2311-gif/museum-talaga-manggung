<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // Halaman Galeri Publik (Untuk Pengunjung Website) + Filter Kategori & Cari
    public function index(Request $request)
    {
        $kataKunci = $request->input('search');
        $kategoriTerpilih = $request->input('kategori');

        $galeri = Galeri::query()
            ->when($kataKunci, function ($query, $search) {
                return $query->where('judul', 'like', '%' . $search . '%');
            })
            ->when($kategoriTerpilih, function ($query, $kategori) {
                return $query->where('kategori', $kategori);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        // Mengambil konfigurasi gambar banner dari database
        $setting = Setting::first(); 

        return view('galeri', compact('galeri', 'kataKunci', 'kategoriTerpilih', 'setting'));
    }

    public function show(Galeri $galeri)
    {
        $related = Galeri::query()
            ->where('kategori', $galeri->kategori)
            ->where('id', '!=', $galeri->id)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        return view('galeri.show', compact('galeri', 'related'));
    }

    // =====================================================
    // ADMIN METHODS
    // =====================================================

    // Menampilkan Dashboard Tabel Galeri Admin
    public function adminIndex()
    {
        $galeris = Galeri::orderBy('created_at', 'desc')->paginate(12);
        
        // Mengambil konfigurasi banner agar tampil di Editor Header Admin
        $setting = Setting::first();

        return view('admin.galeri.index', compact('galeris', 'setting'));
    }

    // Form Tambah Foto Galeri
    public function create()
    {
        return view('admin.galeri.create');
    }

    // Simpan Foto Galeri Baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
            'kategori' => 'required|string|max:100',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:3048',
            'link_3d' => 'nullable|url',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('galeri', 'public');
            $validated['foto'] = $path;
        }

        Galeri::create($validated);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri baru berhasil diunggah!');
    }

    // Form Edit Foto Galeri
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    // Perbarui Data Foto Galeri
    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:1000',
            'kategori' => 'required|string|max:100',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:3048',
            'link_3d' => 'nullable|url',
        ]);

        if ($request->hasFile('foto')) {
            if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
                Storage::disk('public')->delete($galeri->foto);
            }
            $path = $request->file('foto')->store('galeri', 'public');
            $validated['foto'] = $path;
        }

        $galeri->update($validated);

        return redirect()->route('admin.galeri.index')->with('success', 'Data galeri berhasil diperbarui!');
    }

    // Hapus Foto Galeri
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
            Storage::disk('public')->delete($galeri->foto);
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil dihapus!');
    }

    // Pemrosesan Pengunggahan Gambar Banner / Header
    public function updateHeader(Request $request)
{
    $request->validate([
        'halaman' => 'required|string', // Menangkap info halaman mana yang di-update
        'banner_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    // Cari data berdasarkan nama halaman (misal: 'galeri'), jika belum ada buat baru
    $setting = Setting::where('halaman', $request->halaman)->first() ?? new Setting();
    $setting->halaman = $request->halaman;

    if ($request->hasFile('banner_image')) {
        // Hapus banner lama khusus untuk halaman ini saja
        if ($setting->banner_image && Storage::disk('public')->exists($setting->banner_image)) {
            Storage::disk('public')->delete($setting->banner_image);
        }

        $path = $request->file('banner_image')->store('headers', 'public');
        $setting->banner_image = $path;
    }

    $setting->save();

    return redirect()->back()->with('success_header', 'Banner halaman ' . $request->halaman . ' berhasil diperbarui!');
}
}