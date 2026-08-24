{{-- TestimonialCard — supports the Testimonials section (UI_ARCHITECTURE.md). --}}
@props([
    'avatar',
    'name',
    'role',
    'quote',
    'rating' => 5,
])

<figure class="flex h-full flex-col rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-900/5">
    <div class="flex items-center gap-1 text-accent" aria-label="Rating {{ $rating }} dari 5 bintang">
        @for ($i = 1; $i <= 5; $i++)
            <x-icon-star :filled="$i <= $rating" />
        @endfor
    </div>

    <blockquote class="mt-4 flex-1 text-sm leading-relaxed text-slate-600">
        <p>&ldquo;{{ $quote }}&rdquo;</p>
    </blockquote>

    <figcaption class="mt-6 flex items-center gap-3">
        <img
            src="{{ $avatar }}"
            alt="Foto profil {{ $name }}"
            loading="lazy"
            width="48"
            height="48"
            class="size-12 rounded-full object-cover"
        >
        <div>
            <p class="text-sm font-semibold text-slate-900">{{ $name }}</p>
            <p class="text-xs text-slate-500">{{ $role }}</p>
        </div>
    </figcaption>
</figure>
