@props([
    'title',
    'subtitle' => null,
    'align' => 'center',
])

<div @class([
    'mb-12 max-w-2xl',
    'text-center mx-auto' => $align === 'center',
    'text-left' => $align !== 'center',
])>
    <h2 class="text-3xl font-bold text-slate-900 md:text-4xl">{{ $title }}</h2>

    @if ($subtitle)
        <p class="mt-4 text-base text-slate-600">{{ $subtitle }}</p>
    @endif
</div>
