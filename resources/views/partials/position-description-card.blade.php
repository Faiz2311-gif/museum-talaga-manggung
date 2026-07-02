@php
    $description = $position->description && trim($position->description) !== ''
        ? trim($position->description)
        : trim($position->name . ' memegang jabatan ' . $position->role . '.');

    if ($position->parent) {
        $description .= ' Ia bertanggung jawab secara langsung kepada ' . $position->parent->name . '.';
    } else {
        $description .= ' Posisi ini berada di level utama dalam struktur organisasi.';
    }
@endphp

<div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
    <div class="flex items-start justify-between gap-3">
        <div>
            <h3 class="text-base font-semibold text-slate-900">{{ $position->name }}</h3>
            <p class="text-sm font-medium text-amber-700">{{ $position->role }}</p>
        </div>
        <span class="rounded-full bg-slate-100 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.2em] text-slate-600">
            {{ $position->parent ? 'Bawahan' : 'Utama' }}
        </span>
    </div>

    <p class="mt-3 text-sm leading-6 text-slate-600">
        {{ $description }}
    </p>
</div>
