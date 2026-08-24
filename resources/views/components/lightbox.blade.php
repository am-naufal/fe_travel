{{--
    Shared lightbox modal. Relies on an ancestor element declaring
    `x-data="{ open: false, activeImage: null, activeCaption: '' }"` —
    same DOM-scoped-Alpine pattern as filter-pills.blade.php. The grid
    of clickable images that sets those variables lives at each usage
    site (Gallery page, Package Detail's Gallery section) since the
    grid layout genuinely differs per context; only this modal itself
    is identical between them.
--}}
<div
    x-show="open"
    x-cloak
    @keydown.escape.window="open = false"
    class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/90 p-6"
    role="dialog"
    aria-modal="true"
    aria-label="Pratinjau gambar"
>
    <button
        type="button"
        @click="open = false"
        aria-label="Tutup pratinjau"
        class="absolute top-6 right-6 flex size-10 items-center justify-center rounded-full bg-white/10 text-white hover:bg-white/20 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white"
    >
        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>

    <figure class="max-h-full max-w-3xl" @click.outside="open = false">
        <img :src="activeImage" :alt="activeCaption" class="max-h-full w-full rounded-2xl object-contain">
        <figcaption class="mt-3 text-center text-sm text-white/80" x-text="activeCaption"></figcaption>
    </figure>
</div>
