<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Garuda Praya Tour | Paket Wisata Banyuwangi & Jawa Timur')</title>
    <meta name="description" content="@yield('meta_description', 'Penyedia paket wisata Banyuwangi dan Jawa Timur terpercaya. Open trip, private trip, wisata Kawah Ijen, Baluran, Pulau Merah, dan destinasi terbaik lainnya.')">
    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'Garuda Praya Tour | Paket Wisata Banyuwangi & Jawa Timur')">
    <meta property="og:description" content="@yield('meta_description', 'Penyedia paket wisata Banyuwangi dan Jawa Timur terpercaya. Open trip, private trip, wisata Kawah Ijen, Baluran, Pulau Merah, dan destinasi terbaik lainnya.')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.svg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'Garuda Praya Tour',
            'description' => 'Local tour operator spesialis wisata Banyuwangi dan Jawa Timur — open trip, private trip, dan perjalanan korporat.',
            'url' => url('/'),
            'logo' => asset('images/og-image.svg'),
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Banyuwangi',
                'addressRegion' => 'Jawa Timur',
                'addressCountry' => 'ID',
            ],
            'areaServed' => ['Banyuwangi', 'Jawa Timur'],
        ], JSON_UNESCAPED_SLASHES) !!}
    </script>

    {{-- Per-page structured data (e.g. TouristTrip + BreadcrumbList on
         Package Detail) is pushed here via @push('schema'); the sitewide
         Organization schema above always stays. --}}
    @stack('schema')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans">
    <a href="#main-content" class="sr-only z-50 rounded-lg bg-primary px-4 py-2 text-sm font-semibold text-white focus:not-sr-only focus:fixed focus:top-4 focus:left-4">
        Lewati ke konten utama
    </a>

    <x-navbar />

    <main id="main-content">
        @yield('content')
    </main>

    <x-footer />
</body>
</html>
