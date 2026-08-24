{{--
    Internal shared partial — not one of the required public components.
    Holds the markup ButtonPrimary and ButtonSecondary would otherwise
    duplicate (loading spinner, disabled state, base classes); each
    public button is a thin variant wrapper around this.
--}}
@props([
    'text',
    'href' => '#',
    'loading' => false,
    'variant' => 'primary',
])

@php
    $variantClasses = match ($variant) {
        'secondary' => 'border-2 border-primary bg-transparent text-primary hover:bg-primary hover:text-white focus-visible:ring-primary',
        default => 'bg-primary text-white hover:bg-primary/90 focus-visible:ring-primary',
    };
@endphp

<a
    href="{{ $loading ? '#' : $href }}"
    @if ($loading) aria-disabled="true" tabindex="-1" @endif
    {{ $attributes->merge(['class' => 'inline-flex items-center justify-center gap-2 rounded-lg px-6 py-3 text-sm font-semibold transition focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 '.$variantClasses.($loading ? ' pointer-events-none opacity-70' : '')]) }}
>
    @if ($loading)
        <svg class="size-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8v4a4 4 0 0 0-4 4H4z"></path>
        </svg>
        <span>Memuat...</span>
    @else
        <span>{{ $text }}</span>
    @endif
</a>
