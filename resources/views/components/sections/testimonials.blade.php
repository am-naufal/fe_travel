@props(['testimonials'])

<section id="testimonials" class="bg-background py-16 md:py-20 lg:py-24">
    <x-container>
        <x-section-title
            title="Apa Kata Wisatawan Kami"
            subtitle="Pengalaman nyata dari para pelanggan yang telah menjelajah bersama Garuda Praya Tour."
        />

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($testimonials as $testimonial)
                <x-testimonial-card
                    :avatar="$testimonial['avatar']"
                    :name="$testimonial['name']"
                    :role="$testimonial['role']"
                    :quote="$testimonial['quote']"
                    :rating="$testimonial['rating']"
                />
            @endforeach
        </div>
    </x-container>
</section>
