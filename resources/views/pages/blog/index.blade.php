@extends('layouts.app')

@section('title', 'Blog Wisata Banyuwangi & Jawa Timur — Garuda Praya Tour')
@section('meta_description', 'Tips, panduan destinasi, dan itinerary wisata Banyuwangi dan Jawa Timur — Kawah Ijen, Baluran, Bromo, dan lainnya — dari Garuda Praya Tour.')

@section('content')
    <section class="bg-white py-16 md:py-20 lg:py-24">
        <x-container>
            <x-section-title
                title="Blog"
                subtitle="Tips, panduan destinasi, dan inspirasi perjalanan dari tim Garuda Praya Tour."
            />

            <form method="GET" action="{{ route('blog') }}" class="mx-auto mb-8 max-w-xl">
                <label for="blog-search" class="sr-only">Cari artikel</label>
                <div class="relative">
                    <svg class="pointer-events-none absolute top-1/2 left-4 size-5 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.35-4.35M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                    <input
                        id="blog-search"
                        type="search"
                        name="q"
                        value="{{ $search }}"
                        placeholder="Cari artikel…"
                        class="w-full rounded-full border border-slate-200 bg-white py-3 pr-4 pl-11 text-sm text-slate-700 focus:border-primary focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                    >
                    @if ($selectedCategory)
                        <input type="hidden" name="category" value="{{ $selectedCategory }}">
                    @endif
                </div>
            </form>

            <div class="mb-10">
                <x-filter-links :options="$categories" param-name="category" :current="$selectedCategory" all-label="Semua Kategori" />
            </div>

            @if ($featured)
                <a
                    href="{{ route('blog.show', $featured['slug']) }}"
                    class="mb-10 grid grid-cols-1 overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-900/5 transition hover:shadow-lg lg:grid-cols-2"
                >
                    <img
                        src="{{ $featured['thumbnail'] }}"
                        alt="{{ $featured['title'] }}"
                        loading="eager"
                        width="640"
                        height="400"
                        class="aspect-video w-full object-cover lg:aspect-auto lg:h-full"
                    >
                    <div class="flex flex-col justify-center p-8">
                        <span class="inline-flex w-fit items-center rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold text-primary">Artikel Terbaru</span>
                        <h2 class="mt-4 text-2xl font-bold text-slate-900 md:text-3xl">{{ $featured['title'] }}</h2>
                        <p class="mt-3 text-sm leading-relaxed text-slate-600">{{ $featured['excerpt'] }}</p>
                        <p class="mt-4 text-xs font-medium text-slate-500">
                            {{ \Illuminate\Support\Carbon::parse($featured['publishedAt'])->translatedFormat('d F Y') }} &middot; {{ $featured['author']['name'] }}
                        </p>
                    </div>
                </a>
            @endif

            @if ($posts->isEmpty())
                <p class="text-center text-sm text-slate-500">Tidak ada artikel yang cocok dengan pencarian Anda. Coba kata kunci atau kategori lain.</p>
            @else
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($posts as $post)
                        <x-blog-card
                            :thumbnail="$post['thumbnail']"
                            :title="$post['title']"
                            :excerpt="$post['excerpt']"
                            :published-at="$post['publishedAt']"
                            :author="$post['author']"
                            :href="route('blog.show', $post['slug'])"
                        />
                    @endforeach
                </div>

                <x-pagination :paginator="$posts" />
            @endif
        </x-container>
    </section>
@endsection
