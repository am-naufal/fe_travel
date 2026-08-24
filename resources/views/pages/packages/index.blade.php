@extends('layouts.app')

@section('title', 'Paket Wisata Banyuwangi & Jawa Timur — Garuda Praya Tour')
@section('meta_description', 'Jelajahi katalog lengkap paket wisata Banyuwangi dan Jawa Timur — open trip Kawah Ijen, Baluran, Pulau Merah, dan destinasi terbaik lainnya.')

@section('content')
    <section class="bg-white py-16 md:py-20 lg:py-24">
        <x-container>
            <x-section-title
                title="Paket Wisata"
                subtitle="Temukan paket wisata terbaik ke Banyuwangi dan Jawa Timur untuk perjalanan Anda berikutnya."
            />

            <form method="GET" action="{{ route('packages') }}" class="mx-auto mb-8 max-w-xl">
                <label for="package-search" class="sr-only">Cari paket wisata</label>
                <div class="relative">
                    <svg class="pointer-events-none absolute top-1/2 left-4 size-5 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.35-4.35M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                    <input
                        id="package-search"
                        type="search"
                        name="q"
                        value="{{ $search }}"
                        placeholder="Cari nama paket atau destinasi…"
                        class="w-full rounded-full border border-slate-200 bg-white py-3 pr-4 pl-11 text-sm text-slate-700 focus:border-primary focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                    >
                    @if ($selectedDestination)
                        <input type="hidden" name="destination" value="{{ $selectedDestination }}">
                    @endif
                </div>
            </form>

            <div class="mb-10">
                <x-filter-links :options="$destinations" param-name="destination" :current="$selectedDestination" all-label="Semua Destinasi" />
            </div>

            @if ($packages->isEmpty())
                <p class="text-center text-sm text-slate-500">Tidak ada paket yang cocok dengan pencarian Anda. Coba kata kunci atau filter lain.</p>
            @else
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($packages as $package)
                        <x-package-card
                            :image="$package['image']"
                            :title="$package['title']"
                            :duration="$package['duration']"
                            :price="$package['price']"
                            :rating="$package['rating']"
                            :href="route('packages.show', $package['slug'])"
                        />
                    @endforeach
                </div>

                <x-pagination :paginator="$packages" />
            @endif
        </x-container>
    </section>
@endsection
