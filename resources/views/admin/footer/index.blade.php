<x-app-layout>
    <div class="min-h-screen bg-[#fdfbf2] py-12 font-sans">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-3xl font-black text-amber-700">Kelola Footer Tiga Kolom</h1>
                <p class="text-sm text-stone-500 mt-2">Ubah isi footer yang tampil di bagian bawah website dari panel admin.</p>
            </div>

            @if(session('success'))
                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.footer.update') }}" method="POST" class="space-y-6">
                @csrf

                <div class="rounded-2xl border border-amber-200 bg-white p-6 shadow-sm">
                    <h2 class="text-lg font-bold text-stone-800">Kolom 1 - Informasi Instansi</h2>
                    <div class="mt-4 grid gap-4 md:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-stone-700">Judul</label>
                            <input type="text" name="footer_col1_title" value="{{ old('footer_col1_title', $sections['footer_col1_title']->content ?? 'Museum Talaga Manggung') }}" class="w-full rounded-xl border border-stone-200 px-3 py-2 text-sm">
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-stone-700">Hak Cipta</label>
                            <input type="text" name="footer_col1_copyright" value="{{ old('footer_col1_copyright', $sections['footer_col1_copyright']->content ?? '© 2026 Hak Cipta Dilindungi.') }}" class="w-full rounded-xl border border-stone-200 px-3 py-2 text-sm">
                        </div>
                        <div class="md:col-span-2">
                            <label class="mb-1 block text-sm font-semibold text-stone-700">Deskripsi</label>
                            <textarea name="footer_col1_text" rows="3" class="w-full rounded-xl border border-stone-200 px-3 py-2 text-sm">{{ old('footer_col1_text', $sections['footer_col1_text']->content ?? 'Wadah pelestarian benda pusaka, manuskrip kuno, dan rekam jejak sejarah peradaban institusi.') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-amber-200 bg-white p-6 shadow-sm">
                    <h2 class="text-lg font-bold text-stone-800">Kolom 2 - Akses Pintasan</h2>
                    <div class="mt-4 space-y-4">
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-stone-700">Judul</label>
                            <input type="text" name="footer_col2_title" value="{{ old('footer_col2_title', $sections['footer_col2_title']->content ?? 'Akses Pintasan') }}" class="w-full rounded-xl border border-stone-200 px-3 py-2 text-sm">
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-stone-700">Tautan</label>
                            <textarea name="footer_col2_links" rows="4" class="w-full rounded-xl border border-stone-200 px-3 py-2 text-sm" placeholder="Format: Nama Tautan|/url&#10;Nama Tautan 2|/url-2">{{ old('footer_col2_links', $sections['footer_col2_links']->content ?? "Beranda|/\nBerita|/berita\nGaleri|/galeri") }}</textarea>
                            <p class="mt-2 text-xs text-stone-500">Gunakan format Nama Tautan|/url per baris.</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-amber-200 bg-white p-6 shadow-sm">
                    <h2 class="text-lg font-bold text-stone-800">Kolom 3 - Informasi Hukum</h2>
                    <div class="mt-4 space-y-4">
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-stone-700">Judul</label>
                            <input type="text" name="footer_col3_title" value="{{ old('footer_col3_title', $sections['footer_col3_title']->content ?? 'Informasi Hukum') }}" class="w-full rounded-xl border border-stone-200 px-3 py-2 text-sm">
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-stone-700">Tautan</label>
                            <textarea name="footer_col3_links" rows="4" class="w-full rounded-xl border border-stone-200 px-3 py-2 text-sm" placeholder="Format: Nama Tautan|/url&#10;Nama Tautan 2|/url-2">{{ old('footer_col3_links', $sections['footer_col3_links']->content ?? "Kebijakan Privasi|#\nSyarat & Ketentuan Penggunaan|#\nBantuan & Kontak Resmi|#") }}</textarea>
                            <p class="mt-2 text-xs text-stone-500">Gunakan format Nama Tautan|/url per baris.</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="rounded-xl bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
