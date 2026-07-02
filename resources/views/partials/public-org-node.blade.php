@php
    $children = $position->children()->orderBy('name')->get();
@endphp

<div class="relative">
    <div class="rounded-2xl border border-amber-200 bg-amber-50/70 p-4 shadow-sm">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-base font-semibold text-stone-900">{{ $position->name }}</p>
                <p class="text-sm text-stone-600">{{ $position->role }}</p>
                @if ($position->parent)
                    <p class="mt-2 text-xs font-medium uppercase tracking-[0.2em] text-stone-500">
                        Atasan: {{ $position->parent->name }}
                    </p>
                @endif
            </div>
        </div>
    </div>

    @if ($children->isNotEmpty())
        <div class="mt-4 ml-6 border-l-2 border-amber-200 pl-6">
            <div class="space-y-4">
                @foreach ($children as $child)
                    @include('partials.public-org-node', ['position' => $child])
                @endforeach
            </div>
        </div>
    @endif
</div>
