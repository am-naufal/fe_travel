@props(['packages'])

<section id="featured-packages" class="py-16 md:py-20 lg:py-24">
    <x-container>
        <x-section-title
            title="Paket Wisata Unggulan"
            subtitle="Pilihan paket wisata terbaik dengan itinerary lengkap dan harga terbaik untuk liburan Anda."
        />

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($packages as $package)
                <x-package-card
                    :image="$package['image']"
                    :title="$package['title']"
                    :duration="$package['duration']"
                    :price="$package['price']"
                    :rating="$package['rating']"
                    :href="$package['href']"
                />
            @endforeach
        </div>

        <div class="mt-10 text-center">
            <x-button-primary text="Lihat Semua Paket" href="{{ route('packages') }}" />
        </div>
    </x-container>
</section>
