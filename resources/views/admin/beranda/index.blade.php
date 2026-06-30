<x-app-layout>
    <div class="min-h-screen bg-[#fdfbf2] py-12 font-sans">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="text-3xl font-black text-amber-700">Kelola Konten Beranda</h1>
                <p class="text-sm text-stone-500 mt-2">Ubah teks hero, bagian tentang, dan judul/desk kartu pada halaman depan website.</p>
            </div>

            @if(session('success'))
                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.beranda.update') }}" method="POST" class="space-y-6">
                @csrf

                <div class="rounded-2xl border border-amber-200 bg-white p-6 shadow-sm">
                    <h2 class="text-lg font-bold text-stone-800">Hero Section</h2>
                    <div class="mt-4 grid gap-4 md:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-stone-700">Badge</label>
                            <input type="text" name="hero_badge" value="{{ old('hero_badge', $sections['hero_badge']->content ?? 'Sistem Profil Museum V1.0') }}" class="w-full rounded-xl border border-stone-200 px-3 py-2 text-sm">
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-stone-700">Judul</label>
                            <input type="text" name="hero_title" value="{{ old('hero_title', $sections['hero_title']->content ?? 'Melestarikan Sejarah Lewat Arsip Digital') }}" class="w-full rounded-xl border border-stone-200 px-3 py-2 text-sm">
                        </div>
                        <div class="md:col-span-2">
                            <label class="mb-1 block text-sm font-semibold text-stone-700">Deskripsi</label>
                            <textarea name="hero_description" rows="3" class="w-full rounded-xl border border-stone-200 px-3 py-2 text-sm">{{ old('hero_description', $sections['hero_description']->content ?? 'Selamat datang di konsep portal digital museum kami.') }}</textarea>
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-stone-700">Teks Tombol Utama</label>
                            <input type="text" name="hero_primary_button" value="{{ old('hero_primary_button', $sections['hero_primary_button']->content ?? 'Jelajahi Galeri') }}" class="w-full rounded-xl border border-stone-200 px-3 py-2 text-sm">
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-stone-700">Teks Tombol Sekunder</label>
                            <input type="text" name="hero_secondary_button" value="{{ old('hero_secondary_button', $sections['hero_secondary_button']->content ?? 'Latar Belakang Instansi') }}" class="w-full rounded-xl border border-stone-200 px-3 py-2 text-sm">
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-amber-200 bg-white p-6 shadow-sm">
                    <h2 class="text-lg font-bold text-stone-800">Tentang Museum</h2>
                    <div class="mt-4 space-y-4">
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-stone-700">Judul</label>
                            <input type="text" name="about_title" value="{{ old('about_title', $sections['about_title']->content ?? 'Tentang Lembaga Kami') }}" class="w-full rounded-xl border border-stone-200 px-3 py-2 text-sm">
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-stone-700">Deskripsi</label>
                            <textarea name="about_description" rows="5" class="w-full rounded-xl border border-stone-200 px-3 py-2 text-sm">{{ old('about_description', $sections['about_description']->content ?? 'Portal web ini berfungsi sebagai wadah visual untuk menyajikan koleksi pameran.') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-amber-200 bg-white p-6 shadow-sm mb-6">
    <h2 class="text-lg font-bold text-stone-800">Section Kartu</h2>
    <div class="mt-4 space-y-4">
        <div>
            <label class="mb-1 block text-sm font-semibold text-stone-700">Judul Section</label>
            <input type="text" name="cards_section_title" value="{{ old('cards_section_title', $sections['cards_section_title']->content ?? 'Koleksi Unggulan') }}" class="w-full rounded-xl border border-stone-200 px-3 py-2 text-sm">
        </div>
        <div>
            <label class="mb-1 block text-sm font-semibold text-stone-700">Deskripsi Section</label>
            <textarea name="cards_section_description" rows="3" class="w-full rounded-xl border border-stone-200 px-3 py-2 text-sm">{{ old('cards_section_description', $sections['cards_section_description']->content ?? 'Pilih bagian yang ingin Anda jelajahi dari halaman beranda ini.') }}</textarea>
        </div>
    </div>
</div>

<!-- BARU: Blok CRUD Item List Kartu -->
<div class="rounded-2xl border border-amber-200 bg-white p-6 shadow-sm">
    <div class="flex items-center justify-between border-b border-stone-100 pb-4 mb-4">
        <div>
            <h3 class="text-base font-bold text-stone-800">Daftar Item Kartu Tampilan Depan</h3>
            <p class="text-xs text-stone-500">Kelola item kartu navigasi beranda yang muncul di bawah teks deskripsi section.</p>
        </div>
        <a href="{{ route('admin.home-cards.create') }}" wire:navigate class="bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs px-4 py-2 rounded-xl shadow-sm transition">
    + Tambah Kartu Baru
</a>

    </div>

    <!-- Tabel Isian Data Kartu -->
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-stone-700">
            <thead>
                <tr class="border-b border-stone-100 text-stone-400 text-xs font-bold uppercase tracking-wider">
                    <th class="pb-2 w-16">Media</th>
                    <th class="pb-2">Detail Kartu</th>
                    <th class="pb-2">URL Tujuan</th>
                    <th class="pb-2 text-center w-16">Urutan</th>
                    <th class="pb-2 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-50">
                {{-- Ambil data dari data share view atau panggil langsung melalui service component --}}
                @forelse(\App\Models\HomeCard::orderBy('order_weight', 'asc')->get() as $hCard)
                <tr class="hover:bg-stone-50/50 transition">
                    <td class="py-3">
                        @if($hCard->icon_or_image)
                            <img src="{{ asset('storage/' . $hCard->icon_or_image) }}" class="w-10 h-10 object-cover rounded-lg border border-amber-100">
                        @else
                            <div class="w-10 h-10 bg-stone-100 rounded-lg flex items-center justify-center text-stone-400 text-xs">No Img</div>
                        @endif
                    </td>
                    <td class="py-3 pr-4">
                        <div class="font-bold text-stone-800">{{ $hCard->title }}</div>
                        <div class="text-xs text-stone-400 line-clamp-1">{{ $hCard->description }}</div>
                    </td>
                    <td class="py-3 font-mono text-xs text-amber-700">{{ $hCard->target_url }}</td>
                    <td class="py-3 text-center font-bold text-stone-600">{{ $hCard->order_weight }}</td>
                    <td class="py-3 text-right whitespace-nowrap">
                        <div class="inline-flex items-center gap-1.5">
                            <a href="{{ route('admin.home-cards.edit', $hCard->id) }}" class="text-xs font-bold text-amber-700 border border-amber-200 bg-amber-50 hover:bg-amber-100 px-2.5 py-1 rounded-lg transition">
                                Edit
                            </a>
                            <button type="submit" 
        form="delete-form-{{ $hCard->id }}" 
        onclick="return confirm('Hapus item kartu navigasi depan ini?')" 
        class="text-xs font-bold text-red-700 border border-red-200 bg-red-50 hover:bg-red-100 px-2.5 py-1 rounded-lg transition">
    Hapus
</button>

                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-6 text-center text-stone-400 text-xs italic">
                        Belum ada item kartu navigasi beranda yang ditambahkan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

                <div class="flex justify-end">
                    <button type="submit" class="rounded-xl bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white">Simpan Perubahan</button>
                </div>
            </form>
        </div>
         {{-- Taruh blok kode ini di bagian paling bawah file Blade Anda (Sebelum </x-app-layout>) --}}
        @foreach(\App\Models\HomeCard::all() as $hCard)
            <form id="delete-form-{{ $hCard->id }}" action="{{ route('admin.home-cards.destroy', $hCard->id) }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>
        @endforeach
    </div>
</x-app-layout>
