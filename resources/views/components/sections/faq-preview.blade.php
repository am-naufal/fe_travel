@props(['faqItems'])

<section id="faq-preview" class="bg-white py-16 md:py-20 lg:py-24">
    <x-container>
        <x-section-title
            title="Pertanyaan yang Sering Diajukan"
            subtitle="Beberapa hal yang paling sering ditanyakan sebelum memesan paket wisata."
        />

        <div class="mx-auto flex max-w-2xl flex-col gap-4">
            @foreach ($faqItems as $faqItem)
                <x-faq-item :question="$faqItem['question']" :answer="$faqItem['answer']" />
            @endforeach
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('faq') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-primary hover:text-primary/80">
                Lihat Semua FAQ
                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
    </x-container>
</section>
