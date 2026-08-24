@extends('layouts.app')

@section('title', 'FAQ — Garuda Praya Tour')
@section('meta_description', 'Temukan jawaban seputar booking, open trip, private trip, pembayaran, dan trekking Kawah Ijen bersama Garuda Praya Tour.')

@section('content')
    <section class="bg-white py-16 md:py-20 lg:py-24" x-data="{ active: 'all', search: '' }">
        <x-container>
            <x-section-title
                title="Pertanyaan yang Sering Diajukan"
                subtitle="Cari jawaban cepat, atau saring berdasarkan kategori di bawah ini."
            />

            <div class="mx-auto mb-8 max-w-xl">
                <label for="faq-search" class="sr-only">Cari pertanyaan</label>
                <div class="relative">
                    <svg class="pointer-events-none absolute top-1/2 left-4 size-5 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.35-4.35M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                    <input
                        id="faq-search"
                        type="search"
                        x-model="search"
                        placeholder="Cari pertanyaan…"
                        class="w-full rounded-full border border-slate-200 bg-white py-3 pr-4 pl-11 text-sm text-slate-700 focus:border-primary focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                    >
                </div>
            </div>

            <div class="mb-10">
                <x-filter-pills :options="$categories" />
            </div>

            <div class="mx-auto flex max-w-2xl flex-col gap-4">
                @foreach ($faqItems as $faqItem)
                    <div
                        data-category="{{ $faqItem['category'] }}"
                        data-question="{{ strtolower($faqItem['question']) }}"
                        x-show="(active === 'all' || active === $el.dataset.category) && (search === '' || $el.dataset.question.includes(search.toLowerCase()))"
                    >
                        <x-faq-item :question="$faqItem['question']" :answer="$faqItem['answer']" />
                    </div>
                @endforeach
            </div>
        </x-container>
    </section>
@endsection
