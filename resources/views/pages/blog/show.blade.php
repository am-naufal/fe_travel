@extends('layouts.app')

@section('title', $post['title'].' — Garuda Praya Tour')
@section('meta_description', \Illuminate\Support\Str::limit($post['excerpt'], 155))
@section('og_image', $post['thumbnail'])

@push('schema')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => $post['title'],
            'description' => $post['excerpt'],
            'image' => $post['thumbnail'],
            'datePublished' => $post['publishedAt'],
            'url' => url()->current(),
            'author' => [
                '@type' => 'Person',
                'name' => $post['author']['name'],
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Garuda Praya Tour',
                'url' => url('/'),
            ],
        ], JSON_UNESCAPED_SLASHES) !!}
    </script>
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => collect($breadcrumbs)->map(fn ($crumb, $index) => [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $crumb['label'],
                'item' => $crumb['url'] ?? url()->current(),
            ])->values()->all(),
        ], JSON_UNESCAPED_SLASHES) !!}
    </script>
@endpush

@section('content')
    <x-breadcrumbs :trail="$breadcrumbs" />

    {{-- Hero --}}
    <section class="bg-white pb-16 md:pb-20">
        <x-container class="mx-auto max-w-3xl">
            <span class="inline-flex items-center rounded-full bg-primary/10 px-4 py-1.5 text-xs font-semibold text-primary">
                {{ $post['category'] }}
            </span>
            <h1 class="mt-4 text-3xl leading-tight font-bold text-slate-900 md:text-4xl">{{ $post['title'] }}</h1>

            {{-- Author --}}
            <div class="mt-6 flex items-center gap-3">
                <img
                    src="{{ $post['author']['photo'] }}"
                    alt="Foto {{ $post['author']['name'] }}"
                    loading="lazy"
                    width="48"
                    height="48"
                    class="size-12 rounded-full object-cover"
                >
                <div>
                    <p class="text-sm font-semibold text-slate-900">{{ $post['author']['name'] }}</p>
                    <p class="text-xs text-slate-500">
                        {{ $post['author']['role'] }} &middot; {{ \Illuminate\Support\Carbon::parse($post['publishedAt'])->translatedFormat('d F Y') }}
                    </p>
                </div>
            </div>

            <img
                src="{{ $post['thumbnail'] }}"
                alt="{{ $post['title'] }}"
                loading="eager"
                fetchpriority="high"
                width="768"
                height="432"
                class="mt-8 aspect-video w-full rounded-3xl object-cover shadow-xl"
            >
        </x-container>
    </section>

    {{-- Content --}}
    <section class="bg-white pb-16 md:pb-20">
        <x-container class="mx-auto max-w-3xl">
            <div class="space-y-4 text-sm leading-relaxed text-slate-600 md:text-base">
                @foreach ($post['body'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>
        </x-container>
    </section>

    {{-- CTA --}}
    @if ($relatedPackage)
        <section class="bg-background py-16 md:py-20">
            <x-container class="mx-auto max-w-3xl">
                <div class="flex flex-col items-center gap-6 rounded-3xl bg-slate-900 px-6 py-12 text-center text-white md:px-16 md:py-16 lg:flex-row lg:justify-between lg:text-left">
                    <div>
                        <h2 class="text-xl font-bold md:text-2xl">Tertarik Mengunjungi {{ $relatedPackage['destination'] }}?</h2>
                        <p class="mt-3 text-sm text-slate-300">Lihat paket wisata {{ $relatedPackage['title'] }} yang sudah kami siapkan untuk Anda.</p>
                    </div>
                    <x-button-primary text="Lihat Paket Wisata" href="{{ route('packages.show', $relatedPackage['slug']) }}" class="shrink-0" />
                </div>
            </x-container>
        </section>
    @endif

    {{-- Related Articles --}}
    @if ($related->isNotEmpty())
        <section class="bg-white py-16 md:py-20">
            <x-container>
                <x-section-title align="left" title="Artikel Terkait" subtitle="Bacaan lain yang mungkin Anda suka." />
                <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                    @foreach ($related as $relatedPost)
                        <x-blog-card
                            :thumbnail="$relatedPost['thumbnail']"
                            :title="$relatedPost['title']"
                            :excerpt="$relatedPost['excerpt']"
                            :published-at="$relatedPost['publishedAt']"
                            :author="$relatedPost['author']"
                            :href="route('blog.show', $relatedPost['slug'])"
                        />
                    @endforeach
                </div>
            </x-container>
        </section>
    @endif
@endsection
