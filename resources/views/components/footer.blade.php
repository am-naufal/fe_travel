<footer class="bg-slate-900 text-slate-300">
    <x-container class="grid gap-10 py-16 md:grid-cols-2 lg:grid-cols-4">
        <div>
            <p class="text-lg font-bold text-white">Garuda Praya <span class="text-accent">Tour</span></p>
            <p class="mt-4 text-sm leading-relaxed text-slate-400">
                Local tour operator yang berfokus pada wisata Banyuwangi dan Jawa Timur — open trip, private trip, dan perjalanan korporat dengan pelayanan yang aman, nyaman, dan berkesan.
            </p>
            <div class="mt-6 flex items-center gap-3">
                <a href="#" aria-label="Instagram Garuda Praya Tour" class="flex size-9 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-primary">
                    <svg class="size-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.2c3.2 0 3.6 0 4.85.07 3.25.15 4.77 1.69 4.92 4.92.06 1.25.07 1.63.07 4.81s-.01 3.56-.07 4.81c-.15 3.22-1.66 4.77-4.92 4.92-1.25.06-1.62.07-4.85.07s-3.6 0-4.85-.07c-3.26-.15-4.77-1.7-4.92-4.92-.06-1.25-.07-1.63-.07-4.81s.02-3.56.07-4.81c.15-3.23 1.66-4.77 4.92-4.92C8.4 2.2 8.8 2.2 12 2.2Zm0 3.15a6.65 6.65 0 1 0 0 13.3 6.65 6.65 0 0 0 0-13.3Zm0 10.97a4.33 4.33 0 1 1 0-8.65 4.33 4.33 0 0 1 0 8.65Zm6.9-11.22a1.55 1.55 0 1 1-3.1 0 1.55 1.55 0 0 1 3.1 0Z"/></svg>
                </a>
                <a href="#" aria-label="Facebook Garuda Praya Tour" class="flex size-9 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-primary">
                    <svg class="size-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M13.5 21v-7.9h2.65l.4-3.08H13.5V8.05c0-.89.25-1.5 1.53-1.5h1.63V3.86A21.8 21.8 0 0 0 14.3 3.7c-2.35 0-3.96 1.43-3.96 4.06v2.26H7.68v3.08h2.66V21h3.16Z"/></svg>
                </a>
                <a href="https://wa.me/{{ config('site.whatsapp_number') }}" target="_blank" rel="noopener" aria-label="WhatsApp Garuda Praya Tour" class="flex size-9 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-primary">
                    <svg class="size-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.1a9.9 9.9 0 0 0-8.5 15l-1.1 4 4.1-1.1a9.9 9.9 0 1 0 5.5-17.9Zm0 18a8.1 8.1 0 0 1-4.13-1.13l-.3-.17-2.44.64.65-2.38-.19-.31A8.1 8.1 0 1 1 12 20.1Zm4.44-6.07c-.24-.12-1.43-.7-1.65-.79-.22-.08-.38-.12-.54.12-.16.24-.62.79-.76.95-.14.16-.28.18-.52.06-.24-.12-1.02-.38-1.94-1.2-.72-.64-1.2-1.43-1.34-1.67-.14-.24-.02-.37.1-.49.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.74-1.78-.2-.47-.4-.4-.54-.41h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.32.98 2.48c.12.16 1.7 2.6 4.12 3.64.58.25 1.03.4 1.38.51.58.18 1.11.16 1.53.1.47-.07 1.43-.58 1.63-1.15.2-.57.2-1.05.14-1.15-.06-.1-.22-.16-.46-.28Z"/></svg>
                </a>
                {{-- NOTE: WhatsApp number is configurable via SITE_WHATSAPP_NUMBER in .env (config/site.php). --}}
            </div>
        </div>

        <div>
            <h3 class="text-sm font-semibold tracking-wide text-white uppercase">Jelajahi</h3>
            <ul class="mt-4 space-y-3 text-sm">
                <li><a href="{{ route('packages') }}" class="transition hover:text-white">Paket Wisata</a></li>
                <li><a href="{{ route('gallery') }}" class="transition hover:text-white">Galeri</a></li>
                <li><a href="{{ route('blog') }}" class="transition hover:text-white">Blog</a></li>
                <li><a href="{{ route('faq') }}" class="transition hover:text-white">FAQ</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-sm font-semibold tracking-wide text-white uppercase">Perusahaan</h3>
            <ul class="mt-4 space-y-3 text-sm">
                <li><a href="{{ route('about') }}" class="transition hover:text-white">Tentang Kami</a></li>
                <li><a href="{{ route('contact') }}" class="transition hover:text-white">Kontak</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-sm font-semibold tracking-wide text-white uppercase">Kontak</h3>
            <ul class="mt-4 space-y-3 text-sm">
                <li>{{ config('site.address') }}</li>
                <li><a href="mailto:{{ config('site.email') }}" class="transition hover:text-white">{{ config('site.email') }}</a></li>
                <li><a href="tel:+{{ config('site.whatsapp_number') }}" class="transition hover:text-white">{{ config('site.phone_display') }}</a></li>
            </ul>
        </div>
    </x-container>

    <div class="border-t border-white/10 py-6">
        <x-container class="flex flex-col items-center justify-between gap-2 text-xs text-slate-500 md:flex-row">
            <p>&copy; {{ now()->year }} Garuda Praya Tour. Seluruh hak cipta dilindungi.</p>
            <p>Dibuat untuk pariwisata Banyuwangi &amp; Jawa Timur.</p>
        </x-container>
    </div>
</footer>
