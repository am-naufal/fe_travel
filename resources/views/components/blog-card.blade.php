{{-- BlogCard — per PAGE_BLOG_SPEC.md's Card section: Thumbnail, Title, Excerpt, Published Date, Author. --}}
@props([
    'thumbnail',
    'title',
    'excerpt',
    'publishedAt',
    'author',
    'href' => '#',
])

<article class="flex h-full flex-col overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-900/5 transition hover:shadow-lg">
    <a href="{{ $href }}" class="block aspect-video overflow-hidden">
        <img
            src="{{ $thumbnail }}"
            alt="{{ $title }}"
            loading="lazy"
            width="640"
            height="360"
            class="h-full w-full object-cover transition duration-300 hover:scale-105"
        >
    </a>

    <div class="flex flex-1 flex-col p-6">
        <p class="text-xs font-medium text-slate-500">
            {{ \Illuminate\Support\Carbon::parse($publishedAt)->translatedFormat('d F Y') }} &middot; {{ $author['name'] }}
        </p>
        <h3 class="mt-2 text-lg font-semibold text-slate-900">
            <a href="{{ $href }}" class="hover:text-primary">{{ $title }}</a>
        </h3>
        <p class="mt-2 flex-1 text-sm leading-relaxed text-slate-600">{{ $excerpt }}</p>
        <a href="{{ $href }}" class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:text-primary/80">
            Baca Selengkapnya
            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </a>
    </div>
</article>
