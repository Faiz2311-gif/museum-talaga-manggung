<?php

namespace App\Http\Controllers;

use App\Models\HomeCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeCardController extends Controller
{
    // Menampilkan halaman tabel manajemen kartu beranda admin
    public function index()
    {
        $cards = HomeCard::orderBy('order_weight', 'asc')->get();
        return view('admin.beranda.index', compact('cards'));
    }

    // Menampilkan form tambah kartu baru
    public function create()
    {
        return view('admin.beranda.create');
    }

    // Menyimpan data kartu baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'target_url' => 'required|string|max:255',
            'order_weight' => 'required|integer',
            'icon_or_image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $validated['target_url'] = $request->input('target_url');

        if ($request->hasFile('icon_or_image')) {
            $validated['icon_or_image'] = $request->file('icon_or_image')->store('home-cards', 'public');
        }

        HomeCard::create($validated);
        return redirect()->route('admin.home-cards.index')->with('success', 'Kartu beranda berhasil ditambahkan!');
    }

    // FIX: Mengembalikan fungsi form edit yang tidak sengaja hilang
    public function edit($id)
    {
        $card = HomeCard::findOrFail($id);
        return view('admin.beranda.edit', compact('card'));
    }

    // Memperbarui data kartu lama di database
    public function update(Request $request, $id)
    {
        $card = HomeCard::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'target_url' => 'required|string|max:255',
            'order_weight' => 'required|integer',
            'icon_or_image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $validated['target_url'] = $request->input('target_url');

        if ($request->hasFile('icon_or_image')) {
            if ($card->icon_or_image && Storage::disk('public')->exists($card->icon_or_image)) {
                Storage::disk('public')->delete($card->icon_or_image);
            }
            $validated['icon_or_image'] = $request->file('icon_or_image')->store('home-cards', 'public');
        }

        $card->update($validated);
        return redirect()->route('admin.home-cards.index')->with('success', 'Kartu beranda berhasil diperbarui!');
    }

    // Menghapus data kartu dari database
    public function destroy($id)
    {
        $card = HomeCard::findOrFail($id);
        if ($card->icon_or_image && Storage::disk('public')->exists($card->icon_or_image)) {
            Storage::disk('public')->delete($card->icon_or_image);
        }
        $card->delete();
        return redirect()->route('admin.home-cards.index')->with('success', 'Kartu beranda berhasil dihapus!');
    }
}
