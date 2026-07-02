@php
    $children = $position->allChildren()->orderBy('name')->get();
@endphp

<div class="relative">
    <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
            <div>
                <p class="text-base font-semibold text-slate-900">{{ $position->name }}</p>
                <p class="text-sm text-slate-600">{{ $position->role }}</p>
                @if ($position->parent)
                    <p class="mt-2 text-xs font-medium uppercase tracking-wide text-slate-500">
                        Atasan: {{ $position->parent->name }}
                    </p>
                @endif
            </div>

            <div class="flex flex-wrap gap-2">
                <button
                    type="button"
                    wire:click="openCreateModal({{ $position->id }})"
                    class="rounded-lg border border-slate-300 px-3 py-1.5 text-sm font-medium text-slate-700 hover:bg-slate-100"
                >
                    Tambah Bawahan
                </button>
                <button
                    type="button"
                    wire:click="openEditModal({{ $position->id }})"
                    class="rounded-lg border border-sky-300 px-3 py-1.5 text-sm font-medium text-sky-700 hover:bg-sky-50"
                >
                    Edit
                </button>
                <button
                    type="button"
                    wire:click="delete({{ $position->id }})"
                    class="rounded-lg border border-rose-300 px-3 py-1.5 text-sm font-medium text-rose-700 hover:bg-rose-50"
                >
                    Hapus
                </button>
            </div>
        </div>
    </div>

    @if ($children->isNotEmpty())
        <div class="mt-4 ml-6 border-l-2 border-slate-200 pl-6">
            <div class="space-y-4">
                @foreach ($children as $child)
                    @include('livewire.partials.org-node', ['position' => $child])
                @endforeach
            </div>
        </div>
    @endif
</div>
