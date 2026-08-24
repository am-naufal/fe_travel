{{--
    Shared pill-style filter control — used by Gallery's destination
    filter and FAQ's category filter. Relies on an ancestor element
    declaring `x-data="{ {{ $stateKey }}: '{{ $allValue }}' }"` (Alpine
    scope is DOM-based, so it reaches across this component's boundary);
    this component only reads/writes that variable, it doesn't own it.
--}}
@props([
    'options',
    'stateKey' => 'active',
    'allLabel' => 'Semua',
    'allValue' => 'all',
])

<div class="flex flex-wrap justify-center gap-2" role="group" aria-label="Filter">
    <button
        type="button"
        @click="{{ $stateKey }} = '{{ $allValue }}'"
        :aria-pressed="({{ $stateKey }} === '{{ $allValue }}').toString()"
        :class="{{ $stateKey }} === '{{ $allValue }}' ? 'bg-primary text-white' : 'bg-white text-slate-700 ring-1 ring-slate-900/10 hover:text-primary'"
        class="rounded-full px-4 py-2 text-sm font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary"
    >
        {{ $allLabel }}
    </button>

    @foreach ($options as $option)
        <button
            type="button"
            @click="{{ $stateKey }} = '{{ $option }}'"
            :aria-pressed="({{ $stateKey }} === '{{ $option }}').toString()"
            :class="{{ $stateKey }} === '{{ $option }}' ? 'bg-primary text-white' : 'bg-white text-slate-700 ring-1 ring-slate-900/10 hover:text-primary'"
            class="rounded-full px-4 py-2 text-sm font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary"
        >
            {{ $option }}
        </button>
    @endforeach
</div>
