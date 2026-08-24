@props(['features'])

<section id="why-choose-us" class="bg-white py-16 md:py-20 lg:py-24">
    <x-container>
        <x-section-title
            title="Mengapa Memilih Kami"
            subtitle="Kami berkomitmen memberikan pengalaman wisata yang aman, nyaman, dan berkesan bagi setiap pelanggan."
        />

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($features as $feature)
                <div class="text-center md:text-left">
                    <div class="mx-auto flex size-12 items-center justify-center rounded-xl bg-primary/10 text-primary md:mx-0">
                        @switch($feature['icon'])
                            @case('guide')
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.964 0a9 9 0 1 0-11.964 0m11.964 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                @break
                            @case('price')
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182.553-.44 1.278-.659 2.003-.659.725 0 1.45.22 2.003.659L14.5 8.5" />
                                </svg>
                                @break
                            @case('flexible')
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0V11.25a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-3 2.25 2.25 4.5-4.5" />
                                </svg>
                                @break
                            @case('support')
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.25 15.75h.008v.008H8.25v-.008Zm.375-.375a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm.375.375h.008v.008h-.008v-.008ZM12 18.75a6.75 6.75 0 1 0 0-13.5 6.75 6.75 0 0 0 0 13.5Zm-8.25-6.75a8.25 8.25 0 1 1 16.5 0 8.25 8.25 0 0 1-16.5 0Z" />
                                </svg>
                                @break
                        @endswitch
                    </div>

                    <h3 class="mt-4 text-lg font-semibold text-slate-900">{{ $feature['title'] }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ $feature['description'] }}</p>
                </div>
            @endforeach
        </div>
    </x-container>
</section>
