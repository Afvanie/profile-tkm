@php
    $homeStatistics = $statistics
        ?? \App\Models\HomeStatistic::orderBy('sort_order')->get();
@endphp

@if($homeStatistics->count())
<section class="bg-white py-16">
    <div class="max-w-5xl mx-auto px-6">

        {{-- Header --}}
        <div class="text-center mb-10" data-aos="fade-up">
            <span class="inline-block text-xs font-bold tracking-[0.25em] uppercase text-blue-700 mb-3">
                Data Program Studi
            </span>

            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">
                Statistik Program Studi
            </h2>

            <div class="w-16 h-1 bg-yellow-400 mx-auto mt-5 rounded-full"></div>

            <p class="mt-5 text-slate-500 text-sm md:text-base leading-7 max-w-2xl mx-auto">
                Informasi singkat mengenai Program Studi D-III Teknik Mesin Politeknik Negeri Malang.
            </p>
        </div>

        {{-- Statistik --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            @foreach($homeStatistics as $statistic)
                <div class="bg-white border border-slate-200 rounded-2xl px-8 py-7 text-center shadow-sm hover:shadow-md transition duration-300">
                    <div class="text-4xl md:text-5xl font-extrabold text-blue-700 leading-none">
                        {{ $statistic->value }}
                    </div>

                    <div class="mt-3 text-sm md:text-base font-semibold text-slate-700">
                        {{ $statistic->label }}
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
@endif