{{--
    Server-side pill filter — visually identical to filter-pills.blade.php
    but navigates via real query-string links instead of Alpine state.
    Package Listing's filter has to produce real, indexable, canonical-
    able URLs (per the agreed SEO architecture), which client-side
    filtering can't do — that's the whole reason this is a separate,
    small component rather than a variant of filter-pills.
--}}
@props([
    'options',
    'paramName',
    'current' => null,
    'allLabel' => 'Semua',
])

<div class="flex flex-wrap justify-center gap-2" role="group" aria-label="Filter">
    <a
        href="{{ request()->fullUrlWithQuery([$paramName => null, 'page' => null]) }}"
        @if (is_null($current)) aria-current="true" @endif
        class="rounded-full px-4 py-2 text-sm font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary {{ is_null($current) ? 'bg-primary text-white' : 'bg-white text-slate-700 ring-1 ring-slate-900/10 hover:text-primary' }}"
    >
        {{ $allLabel }}
    </a>

    @foreach ($options as $option)
        <a
            href="{{ request()->fullUrlWithQuery([$paramName => $option, 'page' => null]) }}"
            @if ($current === $option) aria-current="true" @endif
            class="rounded-full px-4 py-2 text-sm font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary {{ $current === $option ? 'bg-primary text-white' : 'bg-white text-slate-700 ring-1 ring-slate-900/10 hover:text-primary' }}"
        >
            {{ $option }}
        </a>
    @endforeach
</div>
