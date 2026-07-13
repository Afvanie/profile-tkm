@php
    $historySection = \App\Models\ProfileSection::with([
            'items' => function ($query) {
                $query->where('is_active', true)->orderBy('sort_order');
            }
        ])
        ->where('slug', 'history')
        ->where('is_active', true)
        ->first();

    $paragraphs = $historySection
        ? $historySection->items->where('item_group', 'paragraph')->sortBy('sort_order')
        : collect();

    $timelines = $historySection
        ? $historySection->items->where('item_group', 'timeline')->sortBy('sort_order')
        : collect();
@endphp

{{-- ===================================================== --}}
{{-- PERJALANAN PROGRAM STUDI --}}
{{-- ===================================================== --}}

<section class="relative py-24 bg-slate-50 overflow-hidden">

    <div class="absolute inset-0 -z-10">
        <div class="absolute -left-40 top-10 w-[450px] h-[450px] rounded-full bg-blue-200/30 blur-[140px]"></div>
        <div class="absolute -right-40 bottom-10 w-[450px] h-[450px] rounded-full bg-yellow-200/30 blur-[140px]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6">

        {{-- Heading --}}
        <div class="text-center mb-16" data-aos="fade-up">

            <span class="uppercase tracking-[5px] text-blue-700 font-semibold">
                {{ $historySection?->subtitle ?? 'Perjalanan Program Studi' }}
            </span>

            <h2 class="mt-3 text-4xl md:text-5xl font-bold text-slate-800 leading-tight">
                {{ $historySection?->title ?? 'Tumbuh Bersama Kebutuhan Industri' }}
            </h2>

            <div class="w-24 h-1 bg-yellow-400 rounded-full mx-auto mt-6"></div>

            <p class="mt-6 max-w-3xl mx-auto text-slate-600 leading-8">
                {{ $historySection?->description ?? 'Program Studi D-III Teknik Mesin terus berkembang sebagai penyelenggara pendidikan vokasi yang berorientasi pada kompetensi, praktik, dan kebutuhan dunia industri.' }}
            </p>

        </div>

        {{-- Content --}}
        <div class="grid lg:grid-cols-2 gap-14 items-center">

            {{-- Left Text --}}
            <div class="space-y-7 text-slate-600 leading-9 text-justify" data-aos="fade-right">

                @forelse ($paragraphs as $paragraph)

                    <p>
                        {!! nl2br(e($paragraph->content)) !!}
                    </p>

                @empty

                    <p>
                        Program Studi D-III Teknik Mesin merupakan bagian dari Jurusan Teknik Mesin
                        Politeknik Negeri Malang yang berperan dalam menyelenggarakan pendidikan
                        vokasi di bidang teknik mesin.
                    </p>

                    <p>
                        Program studi ini terus menyesuaikan proses pembelajaran dengan kebutuhan dunia kerja
                        melalui penguatan praktik laboratorium, bengkel, pembelajaran berbasis kompetensi,
                        serta penerapan teknologi pendukung seperti CAD/CAM dan sistem manufaktur.
                    </p>

                @endforelse

            </div>

            {{-- Right Timeline --}}
            <div class="relative" data-aos="fade-left">

                <div class="absolute left-6 top-0 bottom-0 w-1 bg-blue-100 rounded-full"></div>

                <div class="space-y-8">

                    @forelse ($timelines as $timeline)

                        <div class="relative pl-20">

                            <div class="absolute left-0 top-1 w-12 h-12 rounded-full
                                {{ $loop->iteration % 2 === 0 ? 'bg-yellow-400' : 'bg-blue-700' }}
                                text-white flex items-center justify-center font-bold shadow-lg">

                                {{ $loop->iteration }}

                            </div>

                            <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">

                                <h3 class="text-xl font-bold text-slate-800">
                                    {{ $timeline->title }}
                                </h3>

                                <p class="mt-3 text-slate-600 leading-7">
                                    {!! nl2br(e($timeline->content)) !!}
                                </p>

                            </div>

                        </div>

                    @empty

                        <div class="relative pl-20">

                            <div class="absolute left-0 top-1 w-12 h-12 rounded-full bg-blue-700 text-white flex items-center justify-center font-bold shadow-lg">
                                1
                            </div>

                            <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100">
                                <h3 class="text-xl font-bold text-slate-800">
                                    Konten belum tersedia
                                </h3>

                                <p class="mt-3 text-slate-600 leading-7">
                                    Silakan tambahkan konten perjalanan program studi melalui halaman admin.
                                </p>
                            </div>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</section>