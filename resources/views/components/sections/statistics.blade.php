@props(['stats'])

<section id="statistics" class="bg-primary py-16 text-white md:py-20">
    <x-container>
        <dl class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($stats as $stat)
                <x-statistic-card :value="$stat['value']" :suffix="$stat['suffix']" :label="$stat['label']" />
            @endforeach
        </dl>
    </x-container>
</section>
