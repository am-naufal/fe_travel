{{-- ButtonPrimary — per COMPONENT_SPEC.md. Props: text, href, loading --}}
@props([
    'text',
    'href' => '#',
    'loading' => false,
])

<x-button-base :text="$text" :href="$href" :loading="$loading" variant="primary" {{ $attributes }} />
