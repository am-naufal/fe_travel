{{--
    Internal shared partial — the star glyph used by PackageCard's rating
    badge and TestimonialCard's 5-star row, kept in one place instead of
    two copies of the same SVG path.
--}}
@props(['filled' => true])

<svg {{ $attributes->merge(['class' => 'size-4']) }} fill="{{ $filled ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="1.5" viewBox="0 0 20 20" aria-hidden="true">
    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.958a1 1 0 0 0 .95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.368 2.447a1 1 0 0 0-.363 1.118l1.287 3.959c.299.921-.755 1.688-1.54 1.118l-3.367-2.447a1 1 0 0 0-1.176 0l-3.367 2.447c-.784.57-1.838-.197-1.539-1.118l1.286-3.959a1 1 0 0 0-.363-1.118L2.063 9.385c-.783-.57-.38-1.81.588-1.81h4.163a1 1 0 0 0 .95-.69l1.285-3.958Z" />
</svg>
