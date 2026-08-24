@props(['heroImage'])

<section class="relative overflow-hidden bg-white">
    <x-container class="grid items-center gap-10 py-16 md:py-20 lg:grid-cols-2 lg:py-28">
        <div class="animate-fade-up">
            <span class="inline-flex items-center rounded-full bg-primary/10 px-4 py-1.5 text-xs font-semibold text-primary">
                Local Tour Operator Sejak 2015
            </span>

            <h1 class="mt-6 text-4xl leading-tight font-bold text-slate-900 md:text-5xl">
                Jelajahi Keindahan <span class="text-primary">Banyuwangi</span> &amp; Jawa Timur
            </h1>

            <p class="mt-6 text-base leading-relaxed text-slate-600 md:text-lg">
                Open trip dan private trip ke Kawah Ijen, Baluran, Pulau Merah, dan destinasi terbaik Jawa Timur lainnya — dipandu oleh pemandu lokal berpengalaman.
            </p>

            <div class="mt-8 flex flex-wrap items-center gap-6">
                <x-button-primary text="Lihat Paket Wisata" href="#featured-packages" />
                <x-button-secondary text="Jelajahi Destinasi" href="{{ route('gallery') }}" />
            </div>

            <dl class="mt-10 grid grid-cols-3 gap-6 border-t border-slate-900/5 pt-8">
                <div>
                    <dt class="text-2xl font-bold text-slate-900">5rb+</dt>
                    <dd class="text-sm text-slate-500">Wisatawan</dd>
                </div>
                <div>
                    <dt class="text-2xl font-bold text-slate-900">15+</dt>
                    <dd class="text-sm text-slate-500">Destinasi</dd>
                </div>
                <div>
                    <dt class="text-2xl font-bold text-slate-900">4.9</dt>
                    <dd class="text-sm text-slate-500">Rating</dd>
                </div>
            </dl>
        </div>

        <div class="animate-fade-up">
            <img
                src="{{ $heroImage }}"
                alt="Blue fire di Kawah Ijen, Banyuwangi"
                loading="eager"
                fetchpriority="high"
                width="600"
                height="600"
                class="aspect-square w-full rounded-3xl object-cover shadow-xl"
            >
        </div>
    </x-container>
</section>
