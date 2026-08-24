@props(['destinations'])

<section id="top-destinations" class="bg-background py-16 md:py-20 lg:py-24">
    <x-container>
        <x-section-title
            title="Destinasi Terpopuler"
            subtitle="Destinasi favorit wisatawan yang wajib masuk ke dalam daftar perjalanan Anda berikutnya."
        />

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($destinations as $destination)
                <x-destination-card
                    :image="$destination['image']"
                    :name="$destination['name']"
                    :packageCount="$destination['packageCount']"
                />
            @endforeach
        </div>
    </x-container>
</section>
