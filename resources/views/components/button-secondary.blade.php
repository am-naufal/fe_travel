{{-- ButtonSecondary — outline/ghost variant, same prop shape as ButtonPrimary: text, href, loading --}}
@props([
    'text',
    'href' => '#',
    'loading' => false,
])

<x-button-base :text="$text" :href="$href" :loading="$loading" variant="secondary" {{ $attributes }} />
