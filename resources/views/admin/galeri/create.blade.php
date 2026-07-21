<x-app-layout>
    <div class="min-h-screen bg-[#fdfbf2] py-12 font-sans">
        <div class="max-w-3xl mx-auto px-6 lg:px-8">
            
            <div class="mb-8">
                <a href="{{ route('admin.galeri.index') }}" class="text-xs font-bold text-stone-600 hover:text-amber-700 inline-flex items-center gap-1 transition">
                    ← Kembali ke Manajemen Katalog
                </a>
                <h1 class="text-2xl font-black text-amber-700 tracking-tight mt-3">
                    Unggah Katalog Baru
                </h1>
            </div>

            <div class="bg-white border border-amber-200/60 rounded-2xl p-8 shadow-sm">
                <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Nama Objek / Judul -->
                    <div>
                        <label for="judul" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2">Nama Katalog</label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul') }}" class="w-full border border-stone-200 rounded-xl px-4 py-2.5 text-sm focus:border-amber-500 focus:ring-amber-500 bg-stone-50/40" placeholder="Contoh: Keris Pusaka Sanghyang Lutung...">
                        @error('judul') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Kategori Klasifikasi -->
                    {{-- <div>
                        <label for="kategori" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2">Klasifikasi Kategori</label>
                        <select name="kategori" id="kategori" class="w-full border border-stone-200 rounded-xl px-4 py-2.5 text-sm focus:border-amber-500 focus:ring-amber-500 bg-stone-50/40">
                            <option value="" disabled selected>Pilih Klasifikasi...</option>
                            <option value="Arca Perunggu" {{ old('kategori') == 'Arca Perunggu' ? 'selected' : '' }}>Arca Perunggu</option>
                            <option value="Terracotta" {{ old('kategori') == 'Terracotta' ? 'selected' : '' }}>Terracotta</option>
                            <option value="Perlengkapan Ritual" {{ old('kategori') == 'Perlengkapan Ritual' ? 'selected' : '' }}>Perlengkapan Ritual</option>
                            <option value="Senjata Tradisional" {{ old('kategori') == 'Senjata Tradisional' ? 'selected' : '' }}>Senjata Tradisional</option>
                            <option value="Senjata Berpeledak" {{ old('kategori') == 'Senjata Berpeledak' ? 'selected' : '' }}>Senjata Berpeledak</option>
                            <option value="Pakaian Perlengkapan Perang" {{ old('kategori') == 'Pakaian Perlengkapan Perang' ? 'selected' : '' }}>Pakaian Perlengkapan Perang</option>
                            <option value="Etnografika" {{ old('kategori') == 'Etnografika' ? 'selected' : '' }}>Etnografika</option>
                            <option value="Keramokologika" {{ old('kategori') == 'Keramokologika' ? 'selected' : '' }}>Keramokologika</option>
                            <option value="Numismatika" {{ old('kategori') == 'Numismatika' ? 'selected' : '' }}>Numismatika</option>
                        </select>
                        @error('kategori') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div> --}}

                    <!-- Link Katalog -->
                    <div>
                        <label for="link_3d" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2">Tautan Integasi Katalog</label>
                        <input type="url" name="link_3d" id="link_3d" value="{{ old('link_3d') }}" class="w-full border border-stone-200 rounded-xl px-4 py-2.5 text-sm focus:border-amber-500 focus:ring-amber-500 bg-stone-50/40" placeholder="https://sketchfab.com">
                        <p class="text-[11px] text-stone-400 mt-1">Masukkan URL sematan eksternal</p>
                        @error('link_3d') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Keterangan / Deskripsi -->
                    {{-- <div>
                        <label for="deskripsi" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2">Konteks Sejarah / Deskripsi Ringkas</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" class="w-full border border-stone-200 rounded-xl px-4 py-2.5 text-sm focus:border-amber-500 focus:ring-amber-500 bg-stone-50/40" placeholder="Tuliskan latar belakang sejarah, tahun penemuan, atau keterangan dokumentasi acara...">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div> --}}

                    <!-- Upload Foto Pendukung -->
                    <div>
                        <label for="foto" class="block text-xs font-bold uppercase tracking-wider text-stone-700 mb-2">Berkas Gambar Utama (Thumbnail)</label>
                        <input type="file" name="foto" id="foto" class="w-full text-xs text-stone-500 border border-stone-200 rounded-xl bg-stone-50/40 file:mr-4 file:py-2.5 file:px-4 file:rounded-l-xl file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-800 hover:file:bg-amber-200">
                        <p class="text-[11px] text-stone-400 mt-1">Maksimum ukuran dokumen foto: 3MB (Format gambar: JPG, JPEG, PNG).</p>
                        @error('foto') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Tombol Form -->
                    <div class="pt-4 border-t border-stone-100 flex gap-3">
                        <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs px-6 py-2.5 rounded-xl shadow-sm transition">
                            Simpan ke Katalog
                        </button>
                        <a href="{{ route('admin.galeri.index') }}" class="bg-stone-100 hover:bg-stone-200 text-stone-600 font-bold text-xs px-6 py-2.5 rounded-xl transition">
                            Batal
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
