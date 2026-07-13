@php
    $overviewSection = \App\Models\ProfileSection::with([
            'items' => function ($query) {
                $query->where('is_active', true)->orderBy('sort_order');
            }
        ])
        ->where('slug', 'overview')
        ->where('is_active', true)
        ->first();

    $labelItem = $overviewSection
        ? $overviewSection->items->firstWhere('item_group', 'label')
        : null;

    $paragraphs = $overviewSection
        ? $overviewSection->items->where('item_group', 'paragraph')->sortBy('sort_order')
        : collect();

    $infoCards = $overviewSection
        ? $overviewSection->items->where('item_group', 'info_card')->sortBy('sort_order')
        : collect();

    $icons = [
        1 => 'M9 12l2 2 4-4M12 3l7 4v5c0 5-3.5 9-7 9s-7-4-7-9V7l7-4z',
        2 => 'M9 12l2 2 4-4M12 3l7 4v5c0 5-3.5 9-7 9s-7-4-7-9V7l7-4z',
        3 => 'M16 7a4 4 0 01-8 0M12 14c-4 0-7 2-7 4v1h14v-1c0-2-3-4-7-4z',
        4 => 'M12 8v4l3 3M12 3a9 9 0 100 18 9 9 0 000-18z',
    ];
@endphp

<section class="relative py-24 bg-white overflow-hidden">

    <div class="max-w-7xl mx-auto px-6">

        {{-- Heading --}}
        <div class="text-center mb-16" data-aos="fade-up">

            <span class="uppercase tracking-[5px] text-blue-700 font-semibold">
                {{ $overviewSection?->subtitle ?? 'TENTANG KAMI' }}
            </span>

            <h2 class="mt-3 text-4xl md:text-5xl font-bold text-slate-800 leading-tight">
                {{ $overviewSection?->title ?? 'Mengenal Program Studi D-III Teknik Mesin' }}
            </h2>

            <div class="w-24 h-1 bg-yellow-400 rounded-full mx-auto mt-6"></div>

        </div>


        <div class="grid lg:grid-cols-2 gap-14 items-start">

            {{-- Left Image + Info Cards --}}
            <div data-aos="fade-right">

                <img src="{{ asset('assets/images/about.png') }}"
                     alt="Profil D-III Teknik Mesin"
                     class="w-full h-[420px] object-cover rounded-3xl shadow-2xl">

                <div class="grid sm:grid-cols-2 gap-5 mt-7">

                    @forelse ($infoCards as $card)

                        @php
                            $parts = explode('|', $card->content);
                            $mainValue = trim($parts[0] ?? $card->content);
                            $smallText = trim($parts[1] ?? '');
                        @endphp

                        <div class="rounded-3xl bg-white border border-slate-100 shadow-xl p-6">

                            <div class="w-14 h-14 rounded-full {{ $loop->iteration % 2 === 0 ? 'bg-yellow-50 text-yellow-500' : 'bg-blue-50 text-blue-700' }} flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-6 h-6"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="{{ $icons[$loop->iteration] ?? $icons[1] }}" />

                                </svg>

                            </div>

                            <h3 class="mt-5 text-3xl font-black {{ $loop->iteration % 2 === 0 ? 'text-yellow-500' : 'text-blue-700' }}">
                                {{ $mainValue }}
                            </h3>

                            <p class="mt-2 text-sm font-bold text-slate-800">
                                {{ $card->title }}
                            </p>

                            @if ($smallText)
                                <p class="mt-3 text-sm text-slate-500 leading-6">
                                    {{ $smallText }}
                                </p>
                            @endif

                        </div>

                    @empty

                        <div class="rounded-3xl bg-white border border-slate-100 shadow-xl p-6">
                            <h3 class="text-3xl font-black text-blue-700">
                                D-III
                            </h3>
                            <p class="mt-2 text-sm font-bold text-slate-800">
                                Jenjang Pendidikan
                            </p>
                        </div>

                    @endforelse

                </div>

            </div>


            {{-- Right Text --}}
            <div data-aos="fade-left">

                <span class="uppercase tracking-[5px] text-blue-700 font-semibold">
                    {{ $labelItem?->content ?? 'PROFIL SINGKAT' }}
                </span>

                <h3 class="mt-4 text-4xl font-bold text-slate-800 leading-tight">
                    {{ $overviewSection?->description ?? 'Pendidikan Vokasi Teknik Mesin yang Berorientasi pada Kebutuhan Industri' }}
                </h3>

                <div class="w-24 h-1 bg-yellow-400 rounded-full mt-6 mb-8"></div>

                <div class="space-y-6 text-slate-600 leading-8 text-justify">

                    @forelse ($paragraphs as $paragraph)

                        <p>
                            {!! nl2br(e($paragraph->content)) !!}
                        </p>

                    @empty

                        <p>
                            Program Studi D-III Teknik Mesin Politeknik Negeri Malang merupakan program pendidikan vokasi
                            yang berfokus pada kompetensi teknik mesin dan kebutuhan industri.
                        </p>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</section>