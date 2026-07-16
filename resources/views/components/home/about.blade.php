@php
    /*
    |--------------------------------------------------------------------------
    | Konten Deskripsi Program Studi
    |--------------------------------------------------------------------------
    */

    $programDescription = $homeContent
        ?? \App\Models\HomeContent::where('section_key', 'program_description')
            ->where('is_active', true)
            ->first();

    $descriptionImageUrl = $programDescription && $programDescription->image
        ? asset('storage/' . $programDescription->image)
        : asset('assets/images/about.png');


    /*
    |--------------------------------------------------------------------------
    | Konten Akreditasi
    |--------------------------------------------------------------------------
    */

    $homeAccreditations = \App\Models\Accreditation::where('is_active', true)
        ->orderBy('sort_order')
        ->orderByDesc('created_at')
        ->get();

    $nationalAccreditation = $homeAccreditations->firstWhere('type', 'nasional');
    $internationalAccreditation = $homeAccreditations->firstWhere('type', 'internasional');

    $defaultType = $nationalAccreditation ? 'nasional' : 'internasional';
    $hasAccreditationTabs = $nationalAccreditation || $internationalAccreditation;

    $bulanIndonesia = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    $formatTanggalIndonesia = function ($date) use ($bulanIndonesia) {
        if (!$date) {
            return '-';
        }

        return (int) $date->format('d') . ' ' .
            $bulanIndonesia[(int) $date->format('m')] . ' ' .
            $date->format('Y');
    };

    $getFileData = function ($accreditation) {
        if (!$accreditation || !$accreditation->file_path) {
            return [
                'url' => null,
                'extension' => null,
                'is_image' => false,
                'is_pdf' => false,
            ];
        }

        $extension = strtolower(pathinfo($accreditation->file_path, PATHINFO_EXTENSION));

        return [
            'url' => asset('storage/' . $accreditation->file_path),
            'extension' => $extension,
            'is_image' => in_array($extension, ['jpg', 'jpeg', 'png', 'webp']),
            'is_pdf' => $extension === 'pdf',
        ];
    };
@endphp

<section class="relative py-24 overflow-hidden bg-slate-50">

    {{-- Background Decoration --}}
    <div class="absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-blue-100/60 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] rounded-full bg-yellow-100/40 blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6">

        {{-- ========================================================= --}}
        {{-- DESKRIPSI PROGRAM STUDI --}}
        {{-- ========================================================= --}}

        <div class="grid md:grid-cols-2 gap-14 items-center">

            {{-- TEXT --}}
            <div data-aos="fade-up" data-aos-duration="1000">

                @if ($programDescription?->badge)
                    <span class="inline-flex items-center px-4 py-1 rounded-full bg-blue-100 text-blue-700 font-semibold text-sm">
                        {{ $programDescription->badge }}
                    </span>
                @endif

                <h2 class="mt-5 text-4xl font-bold text-gray-800 leading-tight">
                    {{ $programDescription?->title ?? 'Deskripsi Program Studi' }}
                </h2>

                <div class="w-24 h-1 bg-yellow-400 rounded-full mt-5 mb-8"
                    data-aos="fade-right"
                    data-aos-delay="200">
                </div>

                <p class="text-gray-600 leading-8 text-justify"
                    data-aos="fade-up"
                    data-aos-delay="300">
                    {{ $programDescription?->description ?? 'Deskripsi program studi belum tersedia.' }}
                </p>

                @if ($programDescription?->button_text && $programDescription?->button_url)
                    <a href="{{ url($programDescription->button_url) }}"
                        data-aos="fade-up"
                        data-aos-delay="700"
                        class="inline-flex items-center gap-2 mt-8 px-6 py-3 rounded-xl bg-blue-700 text-white font-semibold transition-all duration-300 hover:bg-blue-800 hover:-translate-y-1 hover:shadow-xl">
                        {{ $programDescription->button_text }}
                        <span>→</span>
                    </a>
                @endif

            </div>

            {{-- IMAGE --}}
            <div data-aos="fade-left" data-aos-duration="1200">
                <div class="overflow-hidden rounded-3xl shadow-xl bg-white border border-slate-100">
                    <img
                        src="{{ $descriptionImageUrl }}"
                        class="w-full h-[360px] object-cover transition duration-700 hover:scale-105"
                        alt="Deskripsi Program Studi">
                </div>
            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- AKREDITASI DENGAN BUTTON PILIHAN - MINIMALIS --}}
        {{-- ========================================================= --}}

        @if ($hasAccreditationTabs)

            <div class="mt-28" data-accreditation-tabs>

                {{-- Heading --}}
                <div class="max-w-3xl mx-auto text-center mb-10" data-aos="fade-up">

                    <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-white border border-slate-200 text-blue-700 font-bold text-xs shadow-sm">
                        Akreditasi Program Studi
                    </span>

                    <h2 class="mt-5 text-3xl md:text-4xl font-black text-slate-900 leading-tight">
                        Pengakuan Mutu Program Studi
                    </h2>

                    <div class="w-16 h-1 bg-yellow-400 rounded-full mt-5 mb-6 mx-auto"></div>

                    <p class="text-slate-600 leading-8">
                        Informasi akreditasi Program Studi D-III Teknik Mesin sebagai bentuk pengakuan mutu
                        penyelenggaraan pendidikan vokasi.
                    </p>

                </div>


                {{-- Button Pilihan --}}
                <div class="flex justify-center mb-10" data-aos="fade-up">
                    <div class="inline-flex items-center gap-1 rounded-full bg-white border border-slate-200 p-1.5 shadow-sm">

                        @if ($nationalAccreditation)
                            <button type="button"
                                data-accreditation-tab="nasional"
                                class="accreditation-tab-btn px-5 py-2.5 rounded-full text-sm font-bold transition-all duration-300
                                {{ $defaultType === 'nasional'
                                    ? 'bg-blue-700 text-white shadow-md shadow-blue-700/20'
                                    : 'text-slate-600 hover:text-blue-700 hover:bg-blue-50' }}">
                                Nasional
                            </button>
                        @endif

                        @if ($internationalAccreditation)
                            <button type="button"
                                data-accreditation-tab="internasional"
                                class="accreditation-tab-btn px-5 py-2.5 rounded-full text-sm font-bold transition-all duration-300
                                {{ $defaultType === 'internasional'
                                    ? 'bg-blue-700 text-white shadow-md shadow-blue-700/20'
                                    : 'text-slate-600 hover:text-blue-700 hover:bg-blue-50' }}">
                                Internasional
                            </button>
                        @endif

                    </div>
                </div>


                {{-- CONTENT NASIONAL --}}
                @if ($nationalAccreditation)

                    @php
                        $nationalFile = $getFileData($nationalAccreditation);
                    @endphp

                    <div data-accreditation-panel="nasional"
                        class="{{ $defaultType === 'nasional' ? 'block' : 'hidden' }}">

                        <div class="max-w-5xl mx-auto rounded-3xl bg-white border border-slate-200 shadow-xl shadow-slate-200/60 overflow-hidden"
                            data-aos="fade-up">

                            <div class="grid lg:grid-cols-[0.9fr_1.1fr] gap-0">

                                {{-- Preview --}}
                                <div class="bg-slate-50 p-6 md:p-8 flex items-center justify-center border-b lg:border-b-0 lg:border-r border-slate-100">

                                    <div class="w-full max-w-md">
                                        <div class="rounded-2xl bg-white border border-slate-200 shadow-sm overflow-hidden min-h-[420px] md:min-h-[480px] flex items-center justify-center p-4">

                                            @if ($nationalFile['url'] && $nationalFile['is_image'])

                                                <img src="{{ $nationalFile['url'] }}"
                                                    alt="{{ $nationalAccreditation->title }}"
                                                    class="block max-w-full max-h-[380px] md:max-h-[440px] object-contain mx-auto">

                                            @elseif ($nationalFile['url'] && $nationalFile['is_pdf'])

                                                <div class="w-full h-[380px] md:h-[440px] bg-white flex flex-col items-center justify-center text-center p-8">

                                                    <div class="w-16 h-16 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center text-xl font-black">
                                                        PDF
                                                    </div>

                                                    <h3 class="mt-4 text-xl font-bold text-slate-800">
                                                        Sertifikat PDF
                                                    </h3>

                                                    <p class="mt-2 text-sm text-slate-500">
                                                        File sertifikat tersedia dalam format PDF.
                                                    </p>

                                                </div>

                                            @else

                                                <img src="{{ asset('assets/images/akreditasi.jpg') }}"
                                                    alt="Sertifikat Akreditasi Nasional"
                                                    class="block max-w-full max-h-[380px] md:max-h-[440px] object-contain mx-auto">

                                            @endif

                                        </div>
                                    </div>

                                </div>


                                {{-- Text --}}
                                <div class="p-6 md:p-8 lg:p-10 flex items-center">

                                    <div class="w-full">

                                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-100 text-xs font-bold">
                                            Akreditasi Nasional
                                        </span>

                                        <h3 class="mt-4 text-2xl md:text-3xl font-black text-slate-900 leading-tight">
                                            {{ $nationalAccreditation->title }}
                                        </h3>

                                        <p class="mt-2 text-sm font-bold text-blue-700">
                                            {{ $nationalAccreditation->institution ?? '-' }}
                                        </p>

                                        <p class="mt-5 text-slate-600 leading-8 text-justify">
                                            @if ($nationalAccreditation->description)
                                                {{ \Illuminate\Support\Str::limit($nationalAccreditation->description, 260) }}
                                            @else
                                                Program Studi D-III Teknik Mesin telah memperoleh akreditasi
                                                {{ $nationalAccreditation->rank ?? '-' }}
                                                dari {{ $nationalAccreditation->institution ?? '-' }}.
                                            @endif
                                        </p>

                                        <div class="grid sm:grid-cols-2 gap-4 mt-6">

                                            <div class="rounded-2xl bg-slate-50 border border-slate-200 p-5">
                                                <p class="text-xs font-semibold text-slate-500">
                                                    Peringkat
                                                </p>

                                                <h4 class="mt-1 text-2xl font-black text-blue-700">
                                                    {{ $nationalAccreditation->rank ?? '-' }}
                                                </h4>
                                            </div>

                                            <div class="rounded-2xl bg-slate-50 border border-slate-200 p-5">
                                                <p class="text-xs font-semibold text-slate-500">
                                                    Masa Berlaku
                                                </p>

                                                <h4 class="mt-1 text-sm font-black text-slate-800 leading-6">
                                                    @if ($nationalAccreditation->valid_from || $nationalAccreditation->valid_until)
                                                        {{ $formatTanggalIndonesia($nationalAccreditation->valid_from) }}
                                                        -
                                                        {{ $formatTanggalIndonesia($nationalAccreditation->valid_until) }}
                                                    @else
                                                        -
                                                    @endif
                                                </h4>
                                            </div>

                                        </div>

                                        <div class="mt-7 flex flex-col sm:flex-row gap-3">

                                            <a href="{{ url('/profile#akreditasi') }}"
                                                class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-blue-700 text-white text-sm font-bold hover:bg-blue-800 transition">
                                                Lihat Detail
                                                <span>→</span>
                                            </a>

                                            @if ($nationalFile['url'])
                                                <a href="{{ $nationalFile['url'] }}"
                                                    target="_blank"
                                                    class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-200 text-slate-700 text-sm font-bold hover:bg-slate-50 transition">
                                                    Lihat Sertifikat
                                                </a>
                                            @endif

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                @endif


                {{-- CONTENT INTERNASIONAL --}}
                @if ($internationalAccreditation)

                    @php
                        $internationalFile = $getFileData($internationalAccreditation);
                    @endphp

                    <div data-accreditation-panel="internasional"
                        class="{{ $defaultType === 'internasional' ? 'block' : 'hidden' }}">

                        <div class="max-w-5xl mx-auto rounded-3xl bg-white border border-slate-200 shadow-xl shadow-slate-200/60 overflow-hidden"
                            data-aos="fade-up">

                            <div class="grid lg:grid-cols-[0.9fr_1.1fr] gap-0">

                                {{-- Preview --}}
                                <div class="bg-slate-50 p-6 md:p-8 flex items-center justify-center border-b lg:border-b-0 lg:border-r border-slate-100">

                                    <div class="w-full max-w-md">
                                        <div class="rounded-2xl bg-white border border-slate-200 shadow-sm overflow-hidden min-h-[420px] md:min-h-[480px] flex items-center justify-center p-4">

                                            @if ($internationalFile['url'] && $internationalFile['is_image'])

                                                <img src="{{ $internationalFile['url'] }}"
                                                    alt="{{ $internationalAccreditation->title }}"
                                                    class="block max-w-full max-h-[380px] md:max-h-[440px] object-contain mx-auto">

                                            @elseif ($internationalFile['url'] && $internationalFile['is_pdf'])

                                                <div class="w-full h-[380px] md:h-[440px] bg-white flex flex-col items-center justify-center text-center p-8">

                                                    <div class="w-16 h-16 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center text-xl font-black">
                                                        PDF
                                                    </div>

                                                    <h3 class="mt-4 text-xl font-bold text-slate-800">
                                                        Sertifikat PDF
                                                    </h3>

                                                    <p class="mt-2 text-sm text-slate-500">
                                                        File sertifikat tersedia dalam format PDF.
                                                    </p>

                                                </div>

                                            @else

                                                <div class="w-full h-[380px] md:h-[440px] bg-white flex flex-col items-center justify-center text-center p-8">

                                                    <div class="w-16 h-16 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center text-2xl font-black">
                                                        A
                                                    </div>

                                                    <h3 class="mt-4 text-xl font-bold text-slate-800">
                                                        Sertifikat Internasional
                                                    </h3>

                                                    <p class="mt-2 text-sm text-slate-500">
                                                        File sertifikat dapat ditambahkan melalui admin.
                                                    </p>

                                                </div>

                                            @endif

                                        </div>
                                    </div>

                                </div>


                                {{-- Text --}}
                                <div class="p-6 md:p-8 lg:p-10 flex items-center">

                                    <div class="w-full">

                                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-100 text-xs font-bold">
                                            Akreditasi Internasional
                                        </span>

                                        <h3 class="mt-4 text-2xl md:text-3xl font-black text-slate-900 leading-tight">
                                            {{ $internationalAccreditation->title }}
                                        </h3>

                                        <p class="mt-2 text-sm font-bold text-blue-700">
                                            {{ $internationalAccreditation->institution ?? '-' }}
                                        </p>

                                        <p class="mt-5 text-slate-600 leading-8 text-justify">
                                            @if ($internationalAccreditation->description)
                                                {{ \Illuminate\Support\Str::limit($internationalAccreditation->description, 260) }}
                                            @else
                                                Program Studi D-III Teknik Mesin memperoleh pengakuan internasional
                                                dari {{ $internationalAccreditation->institution ?? '-' }}.
                                            @endif
                                        </p>

                                        <div class="grid sm:grid-cols-2 gap-4 mt-6">

                                            <div class="rounded-2xl bg-slate-50 border border-slate-200 p-5">
                                                <p class="text-xs font-semibold text-slate-500">
                                                    Status
                                                </p>

                                                <h4 class="mt-1 text-2xl font-black text-blue-700">
                                                    {{ $internationalAccreditation->rank ?? '-' }}
                                                </h4>
                                            </div>

                                            <div class="rounded-2xl bg-slate-50 border border-slate-200 p-5">
                                                <p class="text-xs font-semibold text-slate-500">
                                                    Masa Berlaku
                                                </p>

                                                <h4 class="mt-1 text-sm font-black text-slate-800 leading-6">
                                                    @if ($internationalAccreditation->valid_from || $internationalAccreditation->valid_until)
                                                        {{ $formatTanggalIndonesia($internationalAccreditation->valid_from) }}
                                                        -
                                                        {{ $formatTanggalIndonesia($internationalAccreditation->valid_until) }}
                                                    @else
                                                        -
                                                    @endif
                                                </h4>
                                            </div>

                                        </div>

                                        <div class="mt-7 flex flex-col sm:flex-row gap-3">

                                            <a href="{{ url('/profile#akreditasi') }}"
                                                class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-blue-700 text-white text-sm font-bold hover:bg-blue-800 transition">
                                                Lihat Detail
                                                <span>→</span>
                                            </a>

                                            @if ($internationalFile['url'])
                                                <a href="{{ $internationalFile['url'] }}"
                                                    target="_blank"
                                                    class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-200 text-slate-700 text-sm font-bold hover:bg-slate-50 transition">
                                                    Lihat Sertifikat
                                                </a>
                                            @endif

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                @endif

            </div>

        @endif

    </div>

</section>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const wrapper = document.querySelector('[data-accreditation-tabs]');

        if (!wrapper) {
            return;
        }

        const buttons = wrapper.querySelectorAll('[data-accreditation-tab]');
        const panels = wrapper.querySelectorAll('[data-accreditation-panel]');

        function resetButtons() {
            buttons.forEach(function (button) {
                button.classList.remove(
                    'bg-blue-700',
                    'text-white',
                    'shadow-md',
                    'shadow-blue-700/20'
                );

                button.classList.add(
                    'text-slate-600',
                    'hover:text-blue-700',
                    'hover:bg-blue-50'
                );
            });
        }

        function activateButton(button) {
            button.classList.remove(
                'text-slate-600',
                'hover:text-blue-700',
                'hover:bg-blue-50'
            );

            button.classList.add(
                'bg-blue-700',
                'text-white',
                'shadow-md',
                'shadow-blue-700/20'
            );
        }

        buttons.forEach(function (button) {
            button.addEventListener('click', function () {
                const target = button.getAttribute('data-accreditation-tab');

                resetButtons();
                activateButton(button);

                panels.forEach(function (panel) {
                    if (panel.getAttribute('data-accreditation-panel') === target) {
                        panel.classList.remove('hidden');
                        panel.classList.add('block');
                    } else {
                        panel.classList.remove('block');
                        panel.classList.add('hidden');
                    }
                });
            });
        });
    });
</script>