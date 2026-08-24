@php
    // Single source for the desktop + mobile nav lists — per NAVIGATION_SPEC.md
    // — so the six links aren't hand-duplicated between the two <nav> blocks.
    $navLinks = [
        ['label' => 'Home', 'route' => 'home'],
        ['label' => 'Packages', 'route' => 'packages'],
        ['label' => 'Gallery', 'route' => 'gallery'],
        ['label' => 'Blog', 'route' => 'blog'],
        ['label' => 'About', 'route' => 'about'],
        ['label' => 'Contact', 'route' => 'contact'],
    ];
@endphp

<header x-data="{ open: false }" @keydown.escape.window="open = false" class="sticky top-0 z-50 border-b border-slate-900/5 bg-white/90 backdrop-blur">
    <x-container class="flex h-16 items-center justify-between md:h-20">
        <a href="{{ route('home') }}" class="text-lg font-bold text-primary md:text-xl">
            Garuda Praya <span class="text-accent">Tour</span>
        </a>

        <nav aria-label="Navigasi utama" class="hidden md:flex md:items-center md:gap-8">
            @foreach ($navLinks as $link)
                <a
                    href="{{ route($link['route']) }}"
                    @if (request()->routeIs($link['route'])) aria-current="page" @endif
                    class="rounded text-sm font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary {{ request()->routeIs($link['route']) ? 'text-primary' : 'text-slate-700 hover:text-primary' }}"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="hidden md:block">
            <x-button-primary text="Book Now" href="{{ route('packages') }}" />
        </div>

        <button
            type="button"
            @click="open = !open"
            :aria-expanded="open.toString()"
            aria-controls="mobile-menu"
            aria-label="Buka menu navigasi"
            class="inline-flex items-center justify-center rounded-lg p-2 text-slate-700 hover:bg-slate-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary md:hidden"
        >
            <svg x-show="!open" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="open" x-cloak class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
    </x-container>

    <nav
        id="mobile-menu"
        x-show="open"
        x-cloak
        x-transition
        aria-label="Navigasi mobile"
        class="border-t border-slate-900/5 bg-white md:hidden"
    >
        <x-container class="flex flex-col gap-1 py-4">
            @foreach ($navLinks as $link)
                <a
                    href="{{ route($link['route']) }}"
                    @click="open = false"
                    @if (request()->routeIs($link['route'])) aria-current="page" @endif
                    class="rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs($link['route']) ? 'bg-primary/10 text-primary' : 'text-slate-700 hover:bg-slate-50 hover:text-primary' }}"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
            <x-button-primary text="Book Now" href="{{ route('packages') }}" class="mt-2 w-full justify-center" />
        </x-container>
    </nav>
</header>
