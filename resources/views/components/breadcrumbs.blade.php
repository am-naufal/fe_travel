{{--
    Visible breadcrumb trail. `$trail` is an ordered array of
    ['label' => ..., 'url' => ... or null for the current page].
    The BreadcrumbList JSON-LD is built from this same array at the
    call site so the visible trail and the schema never drift apart.
--}}
@props(['trail'])

<nav aria-label="Breadcrumb" class="py-4">
    <x-container>
        <ol class="flex flex-wrap items-center gap-1.5 text-xs text-slate-500 md:text-sm">
            @foreach ($trail as $index => $crumb)
                <li class="flex items-center gap-1.5">
                    @if ($index > 0)
                        <svg class="size-3.5 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    @endif

                    @if ($crumb['url'])
                        <a href="{{ $crumb['url'] }}" class="hover:text-primary">{{ $crumb['label'] }}</a>
                    @else
                        <span class="text-slate-700" aria-current="page">{{ $crumb['label'] }}</span>
                    @endif
                </li>
            @endforeach
        </ol>
    </x-container>
</nav>
