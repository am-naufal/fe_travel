{{-- DestinationCard — supports the Top Destinations section (UI_ARCHITECTURE.md). --}}
@props([
    'image',
    'name',
    'packageCount',
])

<article class="group relative overflow-hidden rounded-2xl shadow-sm ring-1 ring-slate-900/5">
    <img
        src="{{ $image }}"
        alt="Pemandangan {{ $name }}"
        loading="lazy"
        width="400"
        height="400"
        class="aspect-square w-full object-cover transition duration-300 group-hover:scale-105"
    >

    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/10 to-transparent" aria-hidden="true"></div>

    <div class="absolute inset-x-0 bottom-0 p-5">
        <h3 class="text-lg font-semibold text-white">{{ $name }}</h3>
        <p class="text-sm text-white/80">{{ $packageCount }} paket wisata</p>
    </div>
</article>
