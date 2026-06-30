<x-app-layout>
    <div class="min-h-screen bg-[#fdfbf2] py-12 font-sans">
        <div class="max-w-2xl mx-auto px-6 lg:px-8">
            
            <!-- Header Halaman -->
            <div class="mb-8">
                <a href="{{ route('admin.home-cards.index') }}" wire:navigate class="text-xs font-bold text-stone-600 hover:text-amber-700 inline-flex items-center gap-1 transition">
                    ← Kembali ke Dashboard Beranda
                </a>
                <h1 class="text-2xl font-black text-amber-700 tracking-tight mt-3">
                    Tambah Item Kartu Beranda Baru
                </h1>
                <p class="text-xs text-stone-500 mt-1">Buat kartu navigasi interaktif baru untuk dipajang di halaman depan pameran.</p>
            </div>

            <!-- Formulir Input -->
            <div class="bg-white border border-amber-200/60 rounded-2xl p-8 shadow-sm">
                <form action="{{ route('admin.home-cards.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Judul Kartu -->
                    <div>
                        <label for="title" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2">Judul Kartu (Pameran)</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full border border-stone-200 rounded-xl px-4 py-2.5 text-sm focus:border-amber-500 focus:ring-amber-500 bg-stone-50/40" placeholder="Contoh: Koleksi Senjata Tradisional...">
                        @error('title') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- URL / Link Tujuan -->
                    <div>
                        <label for="target_url" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2">URL / Link Alamat Tujuan</label>
                        <input type="text" name="target_url" id="target_url" value="{{ old('target_url') }}" class="w-full border border-stone-200 rounded-xl px-4 py-2.5 text-sm font-mono text-amber-800 focus:border-amber-500 focus:ring-amber-500 bg-stone-50/40" placeholder="Contoh: /galeri">
                        <p class="text-[11px] text-stone-400 mt-1">Masukkan path lokal (diawali tanda /) ke halaman tujuan ketika kartu ini diklik.</p>
                        @error('target_url') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Urutan Muncul & Gambar -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Urutan Muncul -->
                        <div class="md:col-span-1">
                            <label for="order_weight" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2">Urutan Tampil</label>
                            <input type="number" name="order_weight" id="order_weight" value="{{ old('order_weight', 0) }}" class="w-full border border-stone-200 rounded-xl px-4 py-2.5 text-sm focus:border-amber-500 focus:ring-amber-500 bg-stone-50/40 font-bold text-center">
                            @error('order_weight') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Upload Gambar Cover -->
                        <div class="md:col-span-2">
                            <label whitespace-nowrap for="icon_or_image" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2">Foto Banner Kartu</label>
                            <input type="file" name="icon_or_image" id="icon_or_image" class="w-full text-xs text-stone-500 border border-stone-200 rounded-xl bg-stone-50/40 file:mr-4 file:py-2.5 file:px-4 file:rounded-l-xl file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-800 hover:file:bg-amber-200">
                            @error('icon_or_image') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Deskripsi Singkat -->
                    <div>
                        <label for="description" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2">Deskripsi Keterangan Kartu</label>
                        <textarea name="description" id="description" rows="3" class="w-full border border-stone-200 rounded-xl px-4 py-2.5 text-sm focus:border-amber-500 focus:ring-amber-500 bg-stone-50/40" placeholder="Tuliskan 1-2 kalimat ringkas untuk menjelaskan isi destinasi kartu navigasi ini...">{{ old('description') }}</textarea>
                        @error('description') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="pt-4 border-t border-stone-100 flex gap-3">
                        <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs px-6 py-2.5 rounded-xl shadow-sm transition">
                            Simpan Kartu
                        </button>
                        <a href="{{ route('admin.home-cards.index') }}" wire:navigate class="bg-stone-100 hover:bg-stone-200 text-stone-600 font-bold text-xs px-6 py-2.5 rounded-xl transition">
                            Batal
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
