{{--
    PackageCard — per COMPONENT_SPEC.md. Props: image, title, duration, price, rating.
    `href` is an additive, optional prop (defaults to '#', preserving every
    existing usage) added in Phase 2 so cards can link to their real
    /packages/{slug} detail page now that one exists.
--}}
@props([
    'image',
    'title',
    'duration',
    'price',
    'rating',
    'href' => '#',
])

<article class="group flex h-full flex-col overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-900/5 transition hover:shadow-lg">
    <div class="aspect-video overflow-hidden">
        <img
            src="{{ $image }}"
            alt="{{ $title }}"
            loading="lazy"
            width="400"
            height="225"
            class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
        >
    </div>

    <div class="flex flex-1 flex-col p-6">
        <h3 class="text-lg font-semibold text-slate-900">{{ $title }}</h3>

        <div class="mt-2 flex items-center gap-4 text-sm text-slate-500">
            <span class="inline-flex items-center gap-1.5">
                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                {{ $duration }}
            </span>

            <span class="inline-flex items-center gap-1.5">
                <x-icon-star class="size-4 text-accent" />
                <span aria-label="Rating {{ $rating }} dari 5">{{ number_format((float) $rating, 1) }}</span>
            </span>
        </div>

        <div class="mt-auto flex items-center justify-between gap-4 pt-6">
            <p class="text-base font-bold text-primary">{{ $price }}</p>
            <x-button-primary text="Detail" :href="$href" />
        </div>
    </div>
</article>
