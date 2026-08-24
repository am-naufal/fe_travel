@extends('layouts.app')

@section('title', 'Garuda Praya Tour | Paket Wisata Banyuwangi & Jawa Timur')
@section('meta_description', 'Penyedia paket wisata Banyuwangi dan Jawa Timur terpercaya. Open trip, private trip, wisata Kawah Ijen, Baluran, Pulau Merah, dan destinasi terbaik lainnya.')

@section('content')
    <x-sections.hero :hero-image="$heroImage" />
    <x-sections.featured-packages :packages="$packages" />
    <x-sections.why-choose-us :features="$features" />
    <x-sections.testimonials :testimonials="$testimonials" />
    <x-sections.faq-preview :faq-items="$faqPreview" />

    {{--
        Not a new required section — just the two remaining homepage CTAs
        the spec asks for (View Gallery, Read All Articles) that don't
        belong to any of the six required sections above.
    --}}
    <div class="pb-16 text-center md:pb-20">
        <div class="flex flex-wrap items-center justify-center gap-4">
            <x-button-secondary text="Lihat Galeri" href="{{ route('gallery') }}" />
            <x-button-secondary text="Baca Semua Artikel" href="{{ route('blog') }}" />
        </div>
    </div>

    <x-sections.cta-banner />
@endsection
