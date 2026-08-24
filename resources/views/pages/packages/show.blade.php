@extends('layouts.app')

@section('title', $package['title'].' — Garuda Praya Tour')
@section('meta_description', \Illuminate\Support\Str::limit($package['description'], 155))
@section('og_image', $package['image'])

@push('schema')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'TouristTrip',
            'name' => $package['title'],
            'description' => $package['description'],
            'image' => $package['image'],
            'url' => url()->current(),
            'provider' => [
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
        <x-container class="grid items-center gap-10 lg:grid-cols-2">
            <div>
                <span class="inline-flex items-center rounded-full bg-primary/10 px-4 py-1.5 text-xs font-semibold text-primary">
                    {{ $package['destination'] }}
                </span>
                <h1 class="mt-4 text-3xl leading-tight font-bold text-slate-900 md:text-4xl">{{ $package['title'] }}</h1>
                <div class="mt-4 flex items-center gap-4 text-sm text-slate-500">
                    <span class="inline-flex items-center gap-1.5">
                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        {{ $package['duration'] }}
                    </span>
                    <span class="inline-flex items-center gap-1.5">
                        <x-icon-star class="size-4 text-accent" />
                        <span aria-label="Rating {{ $package['rating'] }} dari 5">{{ number_format((float) $package['rating'], 1) }}</span>
                    </span>
                </div>
                <p class="mt-4 text-2xl font-bold text-primary">{{ $package['price'] }}</p>
                <div class="mt-6">
                    <x-button-primary
                        text="Booking via WhatsApp"
                        href="https://wa.me/{{ config('site.whatsapp_number') }}?text={{ urlencode('Halo, saya tertarik dengan paket '.$package['title'].'.') }}"
                    />
                </div>
            </div>

            <img
                src="{{ $package['image'] }}"
                alt="{{ $package['title'] }}"
                loading="eager"
                fetchpriority="high"
                width="800"
                height="600"
                class="aspect-video w-full rounded-3xl object-cover shadow-xl"
            >
        </x-container>
    </section>

    {{-- Package Information --}}
    <section class="bg-background py-16 md:py-20">
        <x-container>
            <h2 class="text-2xl font-bold text-slate-900 md:text-3xl">Tentang Paket Ini</h2>
            <p class="mt-4 max-w-3xl text-sm leading-relaxed text-slate-600 md:text-base">{{ $package['description'] }}</p>

            @if (! empty($package['highlights']))
                <ul class="mt-6 grid max-w-3xl grid-cols-1 gap-3 md:grid-cols-2">
                    @foreach ($package['highlights'] as $highlight)
                        <li class="flex items-start gap-2.5 text-sm text-slate-600">
                            <svg class="mt-0.5 size-4 shrink-0 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            {{ $highlight }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </x-container>
    </section>

    {{-- Itinerary --}}
    <section class="bg-white py-16 md:py-20">
        <x-container>
            <x-section-title align="left" title="Itinerary Perjalanan" subtitle="Rencana perjalanan hari demi hari." />
            <ol class="mx-auto max-w-2xl space-y-6">
                @foreach ($package['itinerary'] as $index => $day)
                    <li class="flex gap-4">
                        <div class="flex size-10 shrink-0 items-center justify-center rounded-full bg-primary text-sm font-bold text-white">
                            {{ $index + 1 }}
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-slate-900 md:text-base">Hari {{ $index + 1 }}: {{ $day['title'] }}</h3>
                            <p class="mt-1 text-sm leading-relaxed text-slate-600">{{ $day['description'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
        </x-container>
    </section>

    {{-- Included / Excluded Facilities --}}
    <section class="bg-background py-16 md:py-20">
        <x-container>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div class="rounded-2xl bg-white p-8 shadow-sm ring-1 ring-slate-900/5">
                    <h3 class="text-lg font-semibold text-slate-900">Termasuk</h3>
                    <ul class="mt-4 space-y-3 text-sm text-slate-600">
                        @foreach ($package['included'] as $item)
                            <li class="flex items-start gap-2.5">
                                <svg class="mt-0.5 size-4 shrink-0 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="rounded-2xl bg-white p-8 shadow-sm ring-1 ring-slate-900/5">
                    <h3 class="text-lg font-semibold text-slate-900">Tidak Termasuk</h3>
                    <ul class="mt-4 space-y-3 text-sm text-slate-600">
                        @foreach ($package['excluded'] as $item)
                            <li class="flex items-start gap-2.5">
                                <svg class="mt-0.5 size-4 shrink-0 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </x-container>
    </section>

    {{-- Gallery --}}
    <section class="bg-white py-16 md:py-20" x-data="{ open: false, activeImage: null, activeCaption: '' }">
        <x-container>
            <x-section-title align="left" title="Galeri" subtitle="Cuplikan momen dari paket {{ $package['title'] }}." />
            <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                @foreach ($package['gallery'] as $image)
                    <button
                        type="button"
                        @click="open = true; activeImage = '{{ $image }}'; activeCaption = '{{ addslashes($package['title']) }}'"
                        class="block aspect-square overflow-hidden rounded-2xl shadow-sm ring-1 ring-slate-900/5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                    >
                        <img
                            src="{{ $image }}"
                            alt="Galeri {{ $package['title'] }}"
                            loading="lazy"
                            width="400"
                            height="400"
                            class="h-full w-full object-cover transition duration-300 hover:scale-105"
                        >
                    </button>
                @endforeach
            </div>
        </x-container>

        <x-lightbox />
    </section>

    {{-- FAQ --}}
    <section class="bg-background py-16 md:py-20">
        <x-container>
            <x-section-title align="left" title="Pertanyaan Umum" subtitle="Hal-hal yang sering ditanyakan seputar pemesanan paket wisata." />
            <div class="mx-auto flex max-w-2xl flex-col gap-4">
                @foreach ($faqItems as $faqItem)
                    <x-faq-item :question="$faqItem['question']" :answer="$faqItem['answer']" />
                @endforeach
            </div>
        </x-container>
    </section>

    {{-- Booking CTA --}}
    <section class="py-16 md:py-20">
        <x-container>
            <div class="flex flex-col items-center gap-6 rounded-3xl bg-slate-900 px-6 py-12 text-center text-white md:px-16 md:py-16 lg:flex-row lg:justify-between lg:text-left">
                <div>
                    <h2 class="text-2xl font-bold md:text-3xl">Tertarik dengan Paket Ini?</h2>
                    <p class="mt-3 text-sm text-slate-300 md:text-base">Hubungi tim kami sekarang untuk memesan atau bertanya lebih lanjut.</p>
                </div>
                <x-button-primary
                    text="Booking via WhatsApp"
                    href="https://wa.me/{{ config('site.whatsapp_number') }}?text={{ urlencode('Halo, saya tertarik dengan paket '.$package['title'].'.') }}"
                    class="shrink-0"
                />
            </div>
        </x-container>
    </section>
@endsection
