{{-- StatisticCard — supports the Statistics section (UI_ARCHITECTURE.md). Props: value, suffix, label --}}
@props([
    'value',
    'suffix' => '',
    'label',
])

<div x-data="counter({{ (int) $value }})" class="text-center">
    <dt class="flex items-center justify-center text-4xl font-bold md:text-5xl">
        <span x-text="display">0</span>{{ $suffix }}
    </dt>
    <dd class="mt-2 text-sm font-medium text-white/80">{{ $label }}</dd>
</div>
