{{--
    FAQ accordion entry. Uses native <details>/<summary> — keyboard and
    screen-reader accessible by default, no JS required, consistent with
    the Animation Rules' "avoid heavy animation" preference.
--}}
@props(['question', 'answer'])

<details class="group rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-900/5">
    <summary class="flex cursor-pointer list-none items-center justify-between gap-4 text-left text-sm font-semibold text-slate-900 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary md:text-base">
        <span>{{ $question }}</span>
        <svg class="size-5 shrink-0 text-primary transition group-open:rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
    </summary>
    <p class="mt-4 text-sm leading-relaxed text-slate-600">{{ $answer }}</p>
</details>
