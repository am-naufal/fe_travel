@extends('layouts.app')

@section('title', 'Kontak — Garuda Praya Tour')
@section('meta_description', 'Hubungi Garuda Praya Tour di Banyuwangi melalui WhatsApp, email, atau formulir kontak untuk konsultasi paket wisata Banyuwangi dan Jawa Timur.')

@section('content')
    <section class="bg-white py-16 md:py-20 lg:py-24">
        <x-container>
            <x-section-title
                title="Hubungi Kami"
                subtitle="Kami siap membantu merencanakan perjalanan Anda — pilih cara yang paling nyaman untuk Anda."
            />

            <div class="grid grid-cols-1 gap-10 lg:grid-cols-2">
                {{-- Contact Information + WhatsApp CTA --}}
                <div class="space-y-8">
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900">Informasi Kontak</h3>
                        <ul class="mt-4 space-y-3 text-sm text-slate-600">
                            <li class="flex items-start gap-3">
                                <svg class="mt-0.5 size-5 shrink-0 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                                <span>{{ config('site.address') }}</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="mt-0.5 size-5 shrink-0 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0a2.25 2.25 0 0 0-2.25-2.25h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" /></svg>
                                <a href="mailto:{{ config('site.email') }}" class="hover:text-primary">{{ config('site.email') }}</a>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="mt-0.5 size-5 shrink-0 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 6.75c0 8.284 6.716 15 15 15h1.5a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106a1.125 1.125 0 0 0-1.173.417l-.97 1.293a11.25 11.25 0 0 1-5.135-5.135l1.293-.97a1.125 1.125 0 0 0 .417-1.173L8.963 3.102a1.125 1.125 0 0 0-1.091-.852H6.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" /></svg>
                                <a href="tel:+{{ config('site.whatsapp_number') }}" class="hover:text-primary">{{ config('site.phone_display') }}</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold text-slate-900">Chat Langsung via WhatsApp</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-600">Untuk respons tercepat, hubungi tim kami langsung melalui WhatsApp.</p>
                        <div class="mt-4">
                            <x-button-primary text="Chat via WhatsApp" href="https://wa.me/{{ config('site.whatsapp_number') }}?text={{ urlencode('Halo, saya ingin bertanya tentang paket wisata Banyuwangi.') }}" />
                        </div>
                        {{-- NOTE: WhatsApp number is configurable via SITE_WHATSAPP_NUMBER in .env (config/site.php). --}}
                    </div>

                    {{-- Google Maps --}}
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900">Lokasi Kami</h3>
                        <div class="mt-4 overflow-hidden rounded-2xl shadow-sm ring-1 ring-slate-900/5">
                            <iframe
                                src="https://www.google.com/maps?q=Banyuwangi,+Jawa+Timur&output=embed"
                                title="Peta lokasi Garuda Praya Tour"
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                class="aspect-video w-full"
                            ></iframe>
                        </div>
                    </div>
                </div>

                {{-- Contact Form --}}
                <div class="rounded-2xl bg-white p-8 shadow-sm ring-1 ring-slate-900/5">
                    <h3 class="text-lg font-semibold text-slate-900">Kirim Pesan</h3>

                    @if (session('status'))
                        <p class="mt-4 rounded-lg bg-primary/10 px-4 py-3 text-sm font-medium text-primary" role="status">
                            {{ session('status') }}
                        </p>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}" class="mt-6 space-y-5">
                        @csrf

                        <div>
                            <label for="name" class="mb-1.5 block text-sm font-medium text-slate-700">Nama Lengkap</label>
                            <input
                                type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-primary focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                            >
                            @error('name')
                                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="mb-1.5 block text-sm font-medium text-slate-700">Email</label>
                            <input
                                type="email" id="email" name="email" value="{{ old('email') }}" required
                                class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-primary focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                            >
                            @error('email')
                                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="mb-1.5 block text-sm font-medium text-slate-700">Nomor Telepon <span class="font-normal text-slate-400">(opsional)</span></label>
                            <input
                                type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-primary focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                            >
                            @error('phone')
                                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="message" class="mb-1.5 block text-sm font-medium text-slate-700">Pesan</label>
                            <textarea
                                id="message" name="message" rows="4" required
                                class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:border-primary focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                            >{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{--
                            A plain <button type="submit"> here, not <x-button-primary> —
                            ButtonPrimary renders an <a>, which would navigate instead of
                            submitting the form. Classes below are copied 1:1 from
                            button-base.blade.php's primary variant so the visual result
                            is identical — no new style introduced.
                        --}}
                        <button
                            type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-primary px-6 py-3 text-sm font-semibold text-white transition hover:bg-primary/90 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2"
                        >
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </x-container>
    </section>
@endsection
