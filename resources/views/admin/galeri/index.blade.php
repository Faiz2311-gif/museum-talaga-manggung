<x-app-layout>
    <div class="min-h-screen bg-[#fdfbf2] py-12 font-sans">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <!-- Bagian Judul Dashboard -->
            <div data-aos="fade-down" data-aos-duration="800" class="mb-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <span class="bg-amber-100/70 border border-amber-200 text-amber-800 text-[10px] md:text-xs font-bold tracking-wider px-4 py-1.5 rounded-full mb-4 uppercase inline-block">
                        Panel Galeri & Artefak
                    </span>
                    <h1 class="text-3xl md:text-4xl font-black text-amber-700 tracking-tight leading-tight">
                        {{ __('Kelola Katalog & Galeri 3D') }}
                    </h1>
                    <p class="text-sm text-stone-500 mt-2">
                        Unggah foto dokumentasi, kelola kategori, dan sematkan tautan objek interaktif 3D.
                    </p>
                </div>
                <div>
                    <a href="{{ route('admin.galeri.create') }}" class="inline-flex items-center space-x-2 bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs px-5 py-3 rounded-xl shadow-sm transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span>Unggah Aset Baru</span>
                    </a>
                </div>
            </div>

            <!-- Pesan Sukses Berhasil Akses -->
            @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-sm font-medium">
                {{ session('success') }}
            </div>
            @endif

            <!-- Kotak Utama Tabel -->
            <div data-aos="fade-up" data-aos-duration="1000" class="bg-white border border-amber-200/60 rounded-2xl overflow-hidden shadow-sm">
                
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-amber-50 border-b border-amber-200">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-amber-900 uppercase tracking-wider">Media</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-amber-900 uppercase tracking-wider">Informasi Aset / Artefak</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-amber-900 uppercase tracking-wider hidden md:table-cell">Kategori</th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-amber-900 uppercase tracking-wider hidden md:table-cell">Fitur 3D</th>
                                <th class="px-6 py-4 text-right text-xs font-bold text-amber-900 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-stone-200 text-sm text-stone-700">
                            @forelse($galeris as $item)
                            <tr class="hover:bg-stone-50/50 transition">
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" class="w-16 h-16 object-cover rounded-lg border border-amber-100">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-stone-800 line-clamp-1">{{ $item->judul }}</div>
                                    <div class="text-xs text-stone-500 mt-1 line-clamp-1">{{ $item->deskripsi ?? 'Tidak ada deskripsi.' }}</div>
                                </td>
                                <td class="px-6 py-4 hidden md:table-cell">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                        {{ $item->kategori }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 hidden md:table-cell text-center">
                                    @if($item->link_3d)
                                        <span class="bg-amber-100 text-amber-800 text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider border border-amber-200">
                                            Aktif 3D
                                        </span>
                                    @else
                                        <span class="text-stone-400 text-xs">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <div class="inline-flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.galeri.edit', $item->id) }}" class="inline-flex items-center justify-center h-8 w-8 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-600 transition" title="Edit">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus aset visual ini dari katalog museum?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center justify-center h-8 w-8 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 transition" title="Hapus">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center text-stone-400 text-xs italic">
                                    Katalog galeri masih kosong. Silakan unggah berkas foto artefak pertama Anda.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                @if(method_exists($galeris, 'links'))
                <div class="mt-6">
                    {{ $galeris->links() }}
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
