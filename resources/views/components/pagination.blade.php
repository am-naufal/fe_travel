{{--
    Hand-built pagination in the existing token language — Laravel's
    stock pagination view ships its own unrelated styling, which would
    violate "do not redesign" if pulled in directly.
--}}
@props(['paginator'])

@if ($paginator->hasPages())
    <nav aria-label="Navigasi halaman" class="mt-10 flex items-center justify-center gap-2">
        <a
            href="{{ $paginator->previousPageUrl() ?? '#' }}"
            @if (! $paginator->onFirstPage()) rel="prev" @else aria-disabled="true" tabindex="-1" @endif
            class="inline-flex size-10 items-center justify-center rounded-lg text-sm font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary {{ $paginator->onFirstPage() ? 'pointer-events-none text-slate-300' : 'text-slate-700 hover:bg-slate-100' }}"
            aria-label="Halaman sebelumnya"
        >
            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </a>

        @for ($page = 1; $page <= $paginator->lastPage(); $page++)
            <a
                href="{{ $paginator->url($page) }}"
                @if ($page === $paginator->currentPage()) aria-current="page" @endif
                class="inline-flex size-10 items-center justify-center rounded-lg text-sm font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary {{ $page === $paginator->currentPage() ? 'bg-primary text-white' : 'text-slate-700 hover:bg-slate-100' }}"
            >
                {{ $page }}
            </a>
        @endfor

        <a
            href="{{ $paginator->nextPageUrl() ?? '#' }}"
            @if ($paginator->hasMorePages()) rel="next" @else aria-disabled="true" tabindex="-1" @endif
            class="inline-flex size-10 items-center justify-center rounded-lg text-sm font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary {{ ! $paginator->hasMorePages() ? 'pointer-events-none text-slate-300' : 'text-slate-700 hover:bg-slate-100' }}"
            aria-label="Halaman berikutnya"
        >
            <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </a>
    </nav>
@endif
