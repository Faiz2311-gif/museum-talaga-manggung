<x-app-layout>
    <div class="min-h-screen bg-[#fdfbf2] py-12 font-sans">
        <div class="max-w-5xl mx-auto px-6 lg:px-8" @php
    $columns = \Schema::getColumnListing('sections');
    $sejarahData = \DB::table('sections')->get();
    $lastUpdated = $sejarahData->max('updated_at');

    $sections = [];
    if (in_array('key', $columns) && in_array('content', $columns)) {
        $sections = $sejarahData->pluck('content', 'key')->toArray();
    } else {
        $firstRow = $sejarahData->first();
        $sections = [
            'sejarah_title'    => $firstRow->title ?? $firstRow->name ?? 'Sejarah Kerajaan Talaga Manggung',
            'sejarah_subtitle' => $firstRow->subtitle ?? $firstRow->abstract ?? '-',
            'sejarah_body_1'   => $firstRow->content ?? $firstRow->body ?? $firstRow->description ?? '',
            'sejarah_body_2'   => '',
            'sejarah_image'    => $firstRow->image ?? null, // Ambil data gambar dari database
        ];
    }

    $isEdit = request()->query('action') === 'edit';
@endphp>
            
            <!-- ALERT & HEADER -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-sm font-semibold">{{ session('success') }}</div>
            @endif

            <div class="mb-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <span class="bg-amber-100/70 border border-amber-200 text-amber-800 text-[10px] md:text-xs font-bold tracking-wider px-4 py-1.5 rounded-full mb-4 uppercase inline-block">Konfigurasi Profil</span>
                    <h1 class="text-3xl md:text-4xl font-black text-amber-700 tracking-tight">{{ $isEdit ? 'Form Kelola Teks' : 'Manajemen Teks' }} Sejarah</h1>
                </div>
                <a href="{{ $isEdit ? route('admin.sejarah.index') : route('admin.sejarah.index', ['action' => 'edit']) }}" wire:navigate 
                   class="inline-flex items-center bg-{{ $isEdit ? 'stone-200 text-stone-700' : 'amber-600 text-white' }} font-bold text-xs px-5 py-3 rounded-xl transition">
                    {{ $isEdit ? 'Kembali ke Pratinjau' : 'Ubah Narasi Sejarah' }}
                </a>
            </div>

            @if(!$isEdit)
                <!-- VIEW MODE: METRICS & PREVIEW -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white border border-amber-200/60 p-6 rounded-2xl shadow-sm"><p class="text-[10px] font-bold text-stone-400 uppercase">Status</p><h3 class="text-xl font-black text-emerald-600 mt-1">● Terpublikasi</h3></div>
                    <div class="bg-white border border-amber-200/60 p-6 rounded-2xl shadow-sm"><p class="text-[10px] font-bold text-stone-400 uppercase">Pembaruan</p><h3 class="text-sm font-bold text-stone-800 mt-2">{{ $sejarahData->max('updated_at') ? \Carbon\Carbon::parse($sejarahData->max('updated_at'))->translatedFormat('d F Y, H:i') : 'Belum ada' }}</h3></div>
                    <div class="bg-white border border-amber-200/60 p-6 rounded-2xl shadow-sm"><p class="text-[10px] font-bold text-stone-400 uppercase">Karakter</p><h3 class="text-xl font-black text-amber-700 mt-1">{{ strlen($sections['sejarah_body_1'] ?? '') + strlen($sections['sejarah_body_2'] ?? '') }}</h3></div>
                </div>

                <div class="bg-white border border-amber-200/60 rounded-2xl p-8 shadow-sm space-y-6">
                    <!-- Tampilan Gambar Utama -->
                    @if(!empty($sections['sejarah_image']))
                        <div class="mb-4">
                            <h4 class="text-xs font-bold text-amber-800 uppercase mb-2">Gambar Sampul:</h4>
                            <img src="{{ asset('storage/' . $sections['sejarah_image']) }}" alt="Gambar Sejarah" class="w-full max-h-80 object-cover rounded-xl border border-stone-200">
                        </div>
                    @endif

                    <div><h4 class="text-xs font-bold text-amber-800 uppercase mb-1">Judul Utama:</h4><p class="text-lg font-bold text-stone-800">{{ $sections['sejarah_title'] ?? 'Sejarah Kerajaan Talaga Manggung' }}</p></div>
                    <div><h4 class="text-xs font-bold text-amber-800 uppercase mb-1">Abstrak:</h4><p class="text-sm text-stone-600 italic">{{ $sections['sejarah_subtitle'] ?? '-' }}</p></div>
                    <div class="pt-4 border-t border-stone-100 bg-stone-50 p-5 rounded-xl text-xs space-y-3 whitespace-pre-line text-justify">
                        @foreach(['sejarah_body_1' => 'Paragraf Utama', 'sejarah_body_2' => 'Paragraf Lanjutan'] as $key => $label)
                            @if(!empty($sections[$key])) <strong class="block text-stone-800">[{{ $label }}]</strong><p class="text-stone-700 mb-2">{{ $sections[$key] }}</p> @endif
                        @endforeach
                    </div>
                </div>
            @else
                <!-- EDIT MODE: FORM -->
                <div class="bg-white border border-amber-200/60 rounded-2xl p-8 shadow-sm">
                    <!-- Ditambahkan enctype="multipart/form-data" agar form bisa mengirim berkas/gambar -->
                    <form action="{{ route('admin.sejarah.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <!-- Input Upload Gambar -->
                        <div>
                            <label class="block text-xs font-bold text-amber-800 uppercase mb-2">Upload Gambar Sampul</label>
                            @if(!empty($sections['sejarah_image']))
                                <div class="mb-3">
                                    <p class="text-[10px] text-stone-500 mb-1 font-semibold">Gambar Saat Ini:</p>
                                    <img src="{{ asset('storage/' . $sections['sejarah_image']) }}" class="h-24 w-auto object-cover rounded-lg border border-stone-200">
                                </div>
                            @endif
                            <input type="file" name="sejarah_image" accept="image/*" class="w-full bg-stone-50 border rounded-xl px-4 py-3 text-xs file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-amber-100 file:text-amber-800 hover:file:bg-amber-200">
                            <p class="text-[10px] text-stone-400 mt-1">Format: JPG, JPEG, PNG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah gambar.</p>
                        </div>

                        <div><label class="block text-xs font-bold text-amber-800 uppercase mb-2">Judul Utama</label><input type="text" name="sejarah_title" value="{{ old('sejarah_title', $sections['sejarah_title'] ?? '') }}" class="w-full bg-stone-50 border rounded-xl px-4 py-3 text-sm" required></div>
                        <div><label class="block text-xs font-bold text-amber-800 uppercase mb-2">Sub-Judul / Abstrak</label><textarea name="sejarah_subtitle" rows="2" class="w-full bg-stone-50 border rounded-xl px-4 py-3 text-sm" required>{{ old('sejarah_subtitle', $sections['sejarah_subtitle'] ?? '') }}</textarea></div>
                        <div><label class="block text-xs font-bold text-amber-800 uppercase mb-2">Paragraf Utama</label><textarea name="sejarah_body_1" rows="5" class="w-full bg-stone-50 border rounded-xl px-4 py-3 text-xs" required>{{ old('sejarah_body_1', $sections['sejarah_body_1'] ?? '') }}</textarea></div>
                        <div><label class="block text-xs font-bold text-amber-800 uppercase mb-2">Paragraf Lanjutan (Opsional)</label><textarea name="sejarah_body_2" rows="5" class="w-full bg-stone-50 border rounded-xl px-4 py-3 text-xs">{{ old('sejarah_body_2', $sections['sejarah_body_2'] ?? '') }}</textarea></div>
                        
                        <div class="pt-4 border-t flex justify-end gap-3">
                            <a href="{{ route('admin.sejarah.index') }}" wire:navigate class="px-5 py-2.5 rounded-xl border text-xs font-bold text-stone-500">Batal</a>
                            <button type="submit" class="bg-amber-600 text-white font-bold text-xs px-6 py-2.5 rounded-xl shadow-sm">Simpan Konten</button>
                        </div>
                    </form>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
