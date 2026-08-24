{{-- Site-wide content container. Per LAYOUT_SPEC.md: max-width 1280px, centered, 24px side padding. --}}
{{-- max-w-7xl = 80rem = 1280px, px-6 = 1.5rem = 24px — both exact Tailwind scale values, not arbitrary. --}}
<div {{ $attributes->merge(['class' => 'mx-auto max-w-7xl px-6']) }}>
    {{ $slot }}
</div>
