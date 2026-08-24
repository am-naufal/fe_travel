{{-- TeamMemberCard — supports the About page's Team section. --}}
@props([
    'photo',
    'name',
    'role',
])

<div class="text-center">
    <img
        src="{{ $photo }}"
        alt="Foto {{ $name }}"
        loading="lazy"
        width="200"
        height="200"
        class="mx-auto size-32 rounded-full object-cover shadow-sm ring-1 ring-slate-900/5"
    >
    <p class="mt-4 text-sm font-semibold text-slate-900">{{ $name }}</p>
    <p class="text-xs text-slate-500">{{ $role }}</p>
</div>
