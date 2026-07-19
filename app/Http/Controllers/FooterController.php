<?php

namespace App\Http\Controllers;

use App\Models\HomeSection;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $sections = HomeSection::all()->keyBy('slug');

        return view('admin.footer.index', compact('sections'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'footer_col1_title' => 'nullable|string|max:255',
            'footer_col1_text' => 'nullable|string|max:1000',
            'footer_col1_copyright' => 'nullable|string|max:255',
            'footer_col2_title' => 'nullable|string|max:255',
            'footer_col2_links' => 'nullable|string|max:2000',
            'footer_col3_title' => 'nullable|string|max:255',
            'footer_col3_links' => 'nullable|string|max:2000',
        ]);

        foreach ($data as $slug => $content) {
            HomeSection::updateOrCreate(
                ['slug' => $slug],
                ['content' => $content]
            );
        }

        return redirect()->route('admin.footer.index')->with('success', 'Konten footer berhasil diperbarui.');
    }
}
