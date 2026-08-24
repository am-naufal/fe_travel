@extends('layouts.app')

@section('title', 'Tentang Kami — Garuda Praya Tour')
@section('meta_description', 'Garuda Praya Tour adalah local tour operator spesialis wisata Banyuwangi dan Jawa Timur — open trip, private trip, hingga perjalanan korporat.')

@section('content')
    {{-- Company Story --}}
    <section class="bg-white py-16 md:py-20 lg:py-24">
        <x-container>
            <x-section-title
                align="left"
                title="Kisah Kami"
                subtitle="Perjalanan Garuda Praya Tour dalam menghadirkan pengalaman wisata terbaik di Banyuwangi dan Jawa Timur."
            />
            <div class="max-w-3xl space-y-4 text-sm leading-relaxed text-slate-600 md:text-base">
                <p>Garuda Praya Tour adalah local tour operator yang berfokus pada wisata Banyuwangi dan Jawa Timur. Sejak 2015, kami lahir dari kecintaan terhadap kampung halaman sendiri — dari blue fire Kawah Ijen hingga savana luas Taman Nasional Baluran — dan keinginan untuk memperkenalkannya kepada lebih banyak orang.</p>
                <p>Sebagai penduduk asli Banyuwangi, kami mengenal medan, musim, dan cerita di balik setiap destinasi lebih dari sekadar rute perjalanan. Kami percaya keahlian lokal (local expertise) inilah yang membedakan perjalanan yang sekadar jalan-jalan dengan perjalanan yang benar-benar berkesan.</p>
                <p>Kini kami melayani wisatawan domestik dan mancanegara, peserta open trip, keluarga, hingga rombongan korporat — masing-masing dengan pendekatan yang disesuaikan agar setiap perjalanan terasa aman, nyaman, dan personal.</p>
            </div>
        </x-container>
    </section>

    {{-- Vision & Mission --}}
    <section class="bg-background py-16 md:py-20 lg:py-24">
        <x-container>
            <x-section-title title="Visi &amp; Misi" subtitle="Nilai yang menjadi pedoman kami dalam melayani setiap perjalanan." />
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div class="rounded-2xl bg-white p-8 shadow-sm ring-1 ring-slate-900/5">
                    <h3 class="text-lg font-semibold text-slate-900">Visi</h3>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">Menjadi local tour operator wisata Banyuwangi dan Jawa Timur paling terpercaya, yang dikenal karena keahlian lokal, keamanan, dan kualitas layanan.</p>
                </div>
                <div class="rounded-2xl bg-white p-8 shadow-sm ring-1 ring-slate-900/5">
                    <h3 class="text-lg font-semibold text-slate-900">Misi</h3>
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">Menghadirkan open trip, private tour, dan perjalanan korporat berkualitas dengan pemandu lokal berpengalaman dan harga transparan bagi setiap pelanggan.</p>
                </div>
            </div>
        </x-container>
    </section>

    {{-- Team --}}
    <section class="bg-white py-16 md:py-20 lg:py-24">
        <x-container>
            <x-section-title title="Tim Kami" subtitle="Orang-orang di balik setiap perjalanan Anda." />
            <div class="grid grid-cols-2 gap-8 md:grid-cols-4">
                @foreach ($team as $member)
                    <x-team-member-card :photo="$member['photo']" :name="$member['name']" :role="$member['role']" />
                @endforeach
            </div>
        </x-container>
    </section>

    <x-sections.why-choose-us :features="$features" />
@endsection
