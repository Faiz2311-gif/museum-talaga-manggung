<div class="space-y-6">
    <div class="flex flex-col gap-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-xl font-semibold text-slate-900">Struktur Organisasi</h2>
            <p class="text-sm text-slate-600">Kelola posisi jabatan secara hirarkis tanpa drag-and-drop.</p>
        </div>

        <button
            type="button"
            wire:click="openCreateModal"
            class="inline-flex items-center justify-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-800"
        >
            Tambah Posisi Utama
        </button>
    </div>

    @if (session()->has('message'))
        <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
            {{ session('message') }}
        </div>
    @endif

    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6 shadow-sm">
        <div class="mb-4">
            <h3 class="text-lg font-semibold text-slate-900">Edit Struktur Organisasi</h3>
            <p class="text-sm text-slate-600">Bagian ini digunakan untuk mengelola hirarki jabatan.</p>
        </div>

        @if ($positions->isEmpty())
            <div class="rounded-xl border border-dashed border-slate-300 bg-white p-6 text-center text-sm text-slate-600">
                Belum ada posisi organisasi. Tambahkan posisi utama untuk memulai.
            </div>
        @else
            <div class="space-y-6">
                @foreach ($positions as $position)
                    @include('livewire.partials.org-node', ['position' => $position])
                @endforeach
            </div>
        @endif
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="mb-5">
            <h3 class="text-lg font-semibold text-slate-900">Deskripsi Struktur Organisasi</h3>
            <p class="text-sm text-slate-600">Penjelasan singkat mengenai jabatan yang memegang posisi tertentu.</p>
        </div>

        @if ($positions->isEmpty())
            <div class="rounded-xl border border-dashed border-slate-300 bg-slate-50 p-6 text-center text-sm text-slate-600">
                Belum ada deskripsi jabatan yang bisa ditampilkan.
            </div>
        @else
            <div class="grid gap-4 md:grid-cols-2">
                @foreach ($positions as $position)
                    @include('partials.position-description-card', ['position' => $position])
                @endforeach
            </div>
        @endif
    </div>

    @if ($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 px-4 py-8">
            <div class="w-full max-w-xl rounded-2xl bg-white p-6 shadow-xl">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900">
                            {{ $isEditing ? 'Edit Posisi' : 'Tambah Posisi' }}
                        </h3>
                        <p class="text-sm text-slate-600">
                            {{ $isEditing ? 'Perbarui data jabatan dan atasan.' : 'Tambahkan jabatan baru ke struktur organisasi.' }}
                        </p>
                    </div>

                    <button type="button" wire:click="closeModal" class="text-sm text-slate-500 hover:text-slate-700">
                        Tutup
                    </button>
                </div>

                <form wire:submit.prevent="save" class="mt-6 space-y-4">
                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">Nama Staf</label>
                        <input
                            type="text"
                            wire:model.defer="name"
                            class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none"
                            placeholder="Contoh: Budi Santoso"
                        >
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">Nama Jabatan</label>
                        <input
                            type="text"
                            wire:model.defer="role"
                            class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none"
                            placeholder="Contoh: Kepala Museum"
                        >
                        @error('role')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">Deskripsi Jabatan</label>
                        <textarea
                            wire:model.defer="description"
                            rows="4"
                            class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none"
                            placeholder="Jelaskan tugas, tanggung jawab, atau peran jabatan ini..."
                        ></textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-slate-700">Atasan Langsung</label>
                        <select
                            wire:model.defer="parent_id"
                            class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm focus:border-slate-500 focus:outline-none"
                        >
                            <option value="">Tidak ada atasan (posisi utama)</option>
                            @foreach ($allPositions as $item)
                                @if (! $isEditing || $item->id !== $editingId)
                                    <option value="{{ $item->id }}">{{ $item->name }} — {{ $item->role }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('parent_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-3 pt-2">
                        <button
                            type="button"
                            wire:click="closeModal"
                            class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100"
                        >
                            Batal
                        </button>
                        <button
                            type="submit"
                            class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800"
                        >
                            {{ $isEditing ? 'Simpan Perubahan' : 'Simpan Posisi' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
