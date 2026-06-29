<x-app-layout>
    <!-- Pembungkus Konten Utama dengan Latar Belakang Krem Khas Museum -->
    <div class="min-h-screen bg-[#fdfbf2] py-12 font-sans">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <!-- Bagian Judul & Tombol Aksi -->
            <div data-aos="fade-down" data-aos-duration="800" class="mb-10 flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <span class="bg-amber-100/70 border border-amber-200 text-amber-800 text-[10px] md:text-xs font-bold tracking-wider px-4 py-1.5 rounded-full mb-4 uppercase inline-block">
                        Manajemen Berita
                    </span>
                    <h1 class="text-3xl md:text-4xl font-black text-amber-700 tracking-tight leading-tight mt-2">
                        {{ __('Kelola Berita Museum') }}
                    </h1>
                    <p class="text-sm text-stone-500 mt-2">
                        Total berita: <span class="font-bold text-amber-700">{{ $beritas->count() }}</span>
                    </p>
                </div>

                <div class="mt-6 md:mt-0">
                    <a href="{{ route('berita.create') }}" class="inline-flex items-center space-x-2 bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-sm transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span>Tulis Berita Baru</span>
                    </a>
                </div>
            </div>

            <!-- Alert Messages -->
            @if ($message = Session::get('success'))
                <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-lg flex items-center space-x-3">
                    <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm font-medium">{{ $message }}</span>
                </div>
            @endif

            <!-- Tabel Berita -->
            <div data-aos="fade-up" data-aos-duration="1000" class="bg-white border border-amber-200/60 rounded-2xl overflow-hidden shadow-sm">
                
                @if ($beritas->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-amber-50 border-b border-amber-200">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-amber-900 uppercase tracking-wider">Judul</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-amber-900 uppercase tracking-wider">Kategori</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-amber-900 uppercase tracking-wider">Tanggal Publikasi</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-amber-900 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-stone-200">
                                @foreach ($beritas as $item)
                                    <tr class="hover:bg-stone-50/50 transition">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center space-x-3">
                                                @if($item->foto)
                                                    <img src="{{ asset('storage/' . $item->foto) }}" 
                                                         alt="{{ $item->judul }}" 
                                                         class="h-10 w-10 object-cover rounded">
                                                @else
                                                    <div class="h-10 w-10 bg-stone-200 rounded flex items-center justify-center text-xs text-stone-400">—</div>
                                                @endif
                                                <div class="flex-1 min-w-0">
                                                    <p class="text-sm font-semibold text-stone-900 truncate">{{ $item->judul }}</p>
                                                    <p class="text-xs text-stone-500 truncate">{{ Str::limit($item->ringkasan, 50) }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                                {{ $item->kategori }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-stone-600">
                                            {{ \Carbon\Carbon::parse($item->tanggal_publikasi)->translatedFormat('d M Y') }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex items-center justify-center space-x-2">
                                                <!-- Tombol Preview -->
                                                <a href="{{ route('berita.show', $item->id) }}" 
                                                   target="_blank"
                                                   class="inline-flex items-center justify-center h-8 w-8 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-600 transition"
                                                   title="Lihat">
                                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>

                                                <!-- Tombol Edit -->
                                                <a href="{{ route('berita.edit', $item->id) }}" 
                                                   class="inline-flex items-center justify-center h-8 w-8 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-600 transition"
                                                   title="Edit">
                                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>

                                                <!-- Tombol Delete -->
                                                <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="inline-flex items-center justify-center h-8 w-8 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 transition"
                                                            title="Hapus">
                                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <!-- State Kosong -->
                    <div class="p-12 text-center">
                        <div class="h-20 w-20 mx-auto flex items-center justify-center rounded-2xl bg-stone-50 border border-stone-200 mb-4">
                            <svg class="h-10 w-10 text-stone-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-stone-800 mb-2">Belum Ada Berita</h3>
                        <p class="text-sm text-stone-500 mb-6">Mulai dengan membuat berita pertama Anda.</p>
                        <a href="{{ route('berita.create') }}" class="inline-flex items-center space-x-2 bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-sm transition">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <span>Tulis Berita Baru</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
