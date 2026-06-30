<x-app-layout>
    <div class="min-h-screen bg-[#fdfbf2] py-12 font-sans">
        <div class="max-w-5xl mx-auto px-6 lg:px-8">
            @php $isEdit = request()->query('action') === 'edit'; @endphp
            
            <!-- ALERT & HEADER -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-sm font-semibold">{{ session('success') }}</div>
            @endif

            <div class="mb-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <span class="bg-amber-100/70 border border-amber-200 text-amber-800 text-[10px] md:text-xs font-bold tracking-wider px-4 py-1.5 rounded-full mb-4 uppercase inline-block">Konfigurasi Profil</span>
                    <h1 class="text-3xl md:text-4xl font-black text-amber-700 tracking-tight">{{ $isEdit ? 'Form Kelola Teks' : 'Manajemen Teks' }} Visi & Misi</h1>
                </div>
                <a href="{{ $isEdit ? route('admin.visimisi.index') : route('admin.visimisi.index', ['action' => 'edit']) }}" wire:navigate 
                   class="inline-flex items-center bg-{{ $isEdit ? 'stone-200 text-stone-700' : 'amber-600 text-white' }} font-bold text-xs px-5 py-3 rounded-xl transition">
                    {{ $isEdit ? 'Kembali ke Pratinjau' : 'Ubah Visi & Misi' }}
                </a>
            </div>

            @if(!$isEdit)
                <!-- VIEW MODE -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white border border-amber-200/60 p-6 rounded-2xl shadow-sm"><p class="text-[10px] font-bold text-stone-400 uppercase">Status</p><h3 class="text-xl font-black text-emerald-600 mt-1">● Terpublikasi</h3></div>
                    <div class="bg-white border border-amber-200/60 p-6 rounded-2xl shadow-sm"><p class="text-[10px] font-bold text-stone-400 uppercase">Pembaruan</p><h3 class="text-sm font-bold text-stone-800 mt-2">{{ $visimisi->updated_at ? \Carbon\Carbon::parse($visimisi->updated_at)->translatedFormat('d F Y, H:i') : 'Belum ada' }}</h3></div>
                    <div class="bg-white border border-amber-200/60 p-6 rounded-2xl shadow-sm"><p class="text-[10px] font-bold text-stone-400 uppercase">Karakter</p><h3 class="text-xl font-black text-amber-700 mt-1">{{ strlen($visimisi->visi ?? '') + strlen($visimisi->misi ?? '') }}</h3></div>
                </div>

                <div class="bg-white border border-amber-200/60 rounded-2xl p-8 shadow-sm space-y-6">
                    @if($visimisi->image)
                        <div class="mb-4">
                            <h4 class="text-xs font-bold text-amber-800 uppercase mb-2">Gambar Sampul:</h4>
                            <img src="{{ asset('storage/' . $visimisi->image) }}" alt="Gambar Visi Misi" class="w-full max-h-80 object-cover rounded-xl border border-stone-200">
                        </div>
                    @endif

                    <div><h4 class="text-xs font-bold text-amber-800 uppercase mb-1">Judul Utama:</h4><p class="text-lg font-bold text-stone-800">{{ $visimisi->title ?? 'Visi & Misi Museum' }}</p></div>
                    <div><h4 class="text-xs font-bold text-amber-800 uppercase mb-1">Abstrak / Tagline:</h4><p class="text-sm text-stone-600 italic">{{ $visimisi->subtitle ?? '-' }}</p></div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-stone-100">
                        <div class="bg-stone-50 p-5 rounded-xl text-xs">
                            <strong class="block text-stone-800 uppercase mb-2">[ Visi ]</strong>
                            <p class="text-stone-700 whitespace-pre-line text-justify">{{ $visimisi->visi ?: 'Belum diisi.' }}</p>
                        </div>
                        <div class="bg-stone-50 p-5 rounded-xl text-xs">
                            <strong class="block text-stone-800 uppercase mb-2">[ Misi ]</strong>
                            <p class="text-stone-700 whitespace-pre-line text-justify">{{ $visimisi->misi ?: 'Belum diisi.' }}</p>
                        </div>
                    </div>
                </div>
            @else
                <!-- EDIT MODE -->
                <div class="bg-white border border-amber-200/60 rounded-2xl p-8 shadow-sm">
                    <form action="{{ route('admin.visimisi.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-xs font-bold text-amber-800 uppercase mb-2">Upload Gambar Sampul</label>
                            @if($visimisi->image)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $visimisi->image) }}" class="h-24 w-auto object-cover rounded-lg border border-stone-200">
                                </div>
                            @endif
                            <input type="file" name="image" accept="image/*" class="w-full bg-stone-50 border rounded-xl px-4 py-3 text-xs file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-amber-100 file:text-amber-800 hover:file:bg-amber-200">
                        </div>

                        <div><label class="block text-xs font-bold text-amber-800 uppercase mb-2">Judul Utama</label><input type="text" name="title" value="{{ old('title', $visimisi->title) }}" class="w-full bg-stone-50 border rounded-xl px-4 py-3 text-sm" required></div>
                        <div><label class="block text-xs font-bold text-amber-800 uppercase mb-2">Sub-Judul / Keterangan Singkat</label><textarea name="subtitle" rows="2" class="w-full bg-stone-50 border rounded-xl px-4 py-3 text-sm" required>{{ old('subtitle', $visimisi->subtitle) }}</textarea></div>
                        <div><label class="block text-xs font-bold text-amber-800 uppercase mb-2">Pernyataan Visi</label><textarea name="visi" rows="4" class="w-full bg-stone-50 border rounded-xl px-4 py-3 text-xs" required>{{ old('visi', $visimisi->visi) }}</textarea></div>
                        <div><label class="block text-xs font-bold text-amber-800 uppercase mb-2">Butir-Butir Misi</label><textarea name="misi" rows="6" class="w-full bg-stone-50 border rounded-xl px-4 py-3 text-xs" required>{{ old('misi', $visimisi->misi) }}</textarea></div>
                        
                        <div class="pt-4 border-t flex justify-end gap-3">
                            <a href="{{ route('admin.visimisi.index') }}" wire:navigate class="px-5 py-2.5 rounded-xl border text-xs font-bold text-stone-500">Batal</a>
                            <button type="submit" class="bg-amber-600 text-white font-bold text-xs px-6 py-2.5 rounded-xl shadow-sm">Simpan Visi & Misi</button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
