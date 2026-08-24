@extends('layouts.app')

@section('title', 'Galeri — Garuda Praya Tour')
@section('meta_description', 'Jelajahi galeri foto Kawah Ijen, Baluran, Pulau Merah, De Djawatan, dan destinasi Banyuwangi & Jawa Timur lainnya bersama Garuda Praya Tour.')

@section('content')
    <section class="bg-white py-16 md:py-20 lg:py-24" x-data="{ active: 'all', open: false, activeImage: null, activeCaption: '' }">
        <x-container>
            <x-section-title
                title="Galeri Perjalanan"
                subtitle="Momen nyata dari wisatawan yang telah menjelajah Banyuwangi dan Jawa Timur bersama Garuda Praya Tour."
            />

            <div class="mb-10">
                <x-filter-pills :options="$destinations" all-label="Semua Destinasi" />
            </div>

            <div class="columns-2 gap-4 md:columns-3 lg:columns-4">
                @foreach ($media as $item)
                    <div x-show="active === 'all' || active === '{{ $item['destination'] }}'" class="mb-4 break-inside-avoid">
                        <button
                            type="button"
                            @click="open = true; activeImage = '{{ $item['image'] }}'; activeCaption = '{{ addslashes($item['caption']) }}'"
                            class="block w-full overflow-hidden rounded-2xl shadow-sm ring-1 ring-slate-900/5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                        >
                            <img
                                src="{{ $item['image'] }}"
                                alt="{{ $item['caption'] }}"
                                loading="lazy"
                                width="400"
                                class="w-full object-cover transition duration-300 hover:scale-105"
                            >
                        </button>
                    </div>
                @endforeach
            </div>
        </x-container>

        <x-lightbox />
    </section>
@endsection
