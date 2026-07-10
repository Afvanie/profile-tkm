@php
    $accreditations = \App\Models\Accreditation::where('is_active', true)
        ->orderBy('sort_order')
        ->orderByDesc('created_at')
        ->get();

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
@endphp

@if ($accreditations->count())

<section class="relative py-20 overflow-hidden bg-white">

    {{-- Background Decoration --}}
    <div class="absolute inset-0 -z-10">

        <div class="absolute -top-40 -right-40 w-[420px] h-[420px] rounded-full bg-blue-200/20 blur-[120px]"></div>

        <div class="absolute -bottom-40 -left-40 w-[420px] h-[420px] rounded-full bg-yellow-200/20 blur-[120px]"></div>

        <div
            class="absolute inset-0 opacity-[0.025]"
            style="background-image: linear-gradient(#0f172a 1px, transparent 1px),
            linear-gradient(to right,#0f172a 1px,transparent 1px);
            background-size:70px 70px;">
        </div>

    </div>

    <div class="max-w-7xl mx-auto px-6">

        {{-- Heading --}}
        <div class="max-w-3xl mx-auto text-center mb-14" data-aos="fade-up">

            <span class="uppercase tracking-[5px] text-blue-700 font-semibold">
                Akreditasi
            </span>

            <h2 class="mt-4 text-4xl md:text-5xl font-bold text-slate-800 leading-tight">
                Pengakuan Mutu Program Studi
            </h2>

            <div class="w-24 h-1 bg-yellow-400 rounded-full mt-6 mb-8 mx-auto"></div>

            <p class="text-slate-600 leading-8">
                Informasi akreditasi nasional dan internasional Program Studi
                D-III Teknik Mesin Politeknik Negeri Malang.
            </p>

        </div>


        {{-- Accreditation Cards --}}
        <div class="grid lg:grid-cols-2 gap-8">

            @foreach ($accreditations as $accreditation)

                @php
                    $fileUrl = $accreditation->file_path
                        ? asset('storage/' . $accreditation->file_path)
                        : null;

                    $extension = $accreditation->file_path
                        ? strtolower(pathinfo($accreditation->file_path, PATHINFO_EXTENSION))
                        : null;

                    $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'webp']);
                    $isPdf = $extension === 'pdf';
                    $isInternational = $accreditation->type === 'internasional';
                @endphp

                <article
                    class="group rounded-[2rem] bg-white border border-slate-100 shadow-xl overflow-hidden hover:-translate-y-1 hover:shadow-2xl transition duration-300"
                    data-aos="fade-up"
                    data-aos-delay="{{ $loop->index * 100 }}">

                    {{-- Preview --}}
                    <div class="relative bg-gradient-to-br from-blue-50 via-white to-yellow-50 p-4">

                        <div class="absolute top-0 left-0 w-full h-1 {{ $isInternational ? 'bg-gradient-to-r from-yellow-400 via-blue-600 to-yellow-400' : 'bg-gradient-to-r from-blue-700 via-yellow-400 to-blue-700' }}"></div>

                        <div class="rounded-2xl overflow-hidden bg-white border border-slate-100 shadow-md">

                            @if ($fileUrl && $isImage)

                                <a href="{{ $fileUrl }}" target="_blank">
                                    <img
                                        src="{{ $fileUrl }}"
                                        alt="{{ $accreditation->title }}"
                                        class="w-full h-56 md:h-64 object-contain bg-white p-3">
                                </a>

                            @elseif ($fileUrl && $isPdf)

                                <div class="h-56 md:h-64 bg-white flex flex-col items-center justify-center text-center p-6">

                                    <div class="w-16 h-16 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center text-xl font-bold">
                                        PDF
                                    </div>

                                    <p class="mt-4 text-lg font-bold text-slate-800">
                                        File Sertifikat PDF
                                    </p>

                                    <p class="mt-2 text-sm text-slate-500">
                                        Klik tombol lihat sertifikat untuk membuka file.
                                    </p>

                                </div>

                            @else

                                <div class="h-56 md:h-64 bg-white flex flex-col items-center justify-center text-center p-6">

                                    <div class="w-16 h-16 rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center text-xl font-bold">
                                        A
                                    </div>

                                    <p class="mt-4 text-lg font-bold text-slate-800">
                                        Sertifikat belum diunggah
                                    </p>

                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- Content --}}
                    <div class="p-6 md:p-7">

                        <div class="flex flex-wrap gap-2 mb-4">

                            <span class="inline-flex items-center px-4 py-2 rounded-full text-xs font-bold
                                {{ $isInternational ? 'bg-yellow-100 text-yellow-700' : 'bg-blue-100 text-blue-700' }}">
                                {{ $accreditation->type_label }}
                            </span>

                            @if ($accreditation->rank)
                                <span class="inline-flex items-center px-4 py-2 rounded-full bg-slate-100 text-slate-700 text-xs font-bold">
                                    {{ $accreditation->rank }}
                                </span>
                            @endif

                        </div>

                        <h3 class="text-2xl font-bold text-slate-800 leading-snug">
                            {{ $accreditation->title }}
                        </h3>

                        @if ($accreditation->institution)
                            <p class="mt-2 text-sm font-semibold text-blue-700">
                                {{ $accreditation->institution }}
                            </p>
                        @endif

                        @if ($accreditation->description)
                            <p class="mt-4 text-slate-600 leading-7 text-justify">
                                {{ \Illuminate\Support\Str::limit($accreditation->description, 220) }}
                            </p>
                        @endif


                        {{-- Info Ringkas --}}
                        <div class="grid grid-cols-2 gap-4 mt-6">

                            <div class="rounded-2xl bg-slate-50 border border-slate-100 p-4">

                                <p class="text-xs text-slate-500">
                                    Predikat
                                </p>

                                <h4 class="mt-1 text-base md:text-lg font-bold text-blue-700">
                                    {{ $accreditation->rank ?? '-' }}
                                </h4>

                            </div>

                            <div class="rounded-2xl bg-slate-50 border border-slate-100 p-4">

                                <p class="text-xs text-slate-500">
                                    Lembaga
                                </p>

                                <h4 class="mt-1 text-base md:text-lg font-bold text-yellow-500">
                                    {{ $accreditation->institution ?? '-' }}
                                </h4>

                            </div>

                            <div class="rounded-2xl bg-slate-50 border border-slate-100 p-4 col-span-2">

                                <p class="text-xs text-slate-500">
                                    Masa Berlaku
                                </p>

                                <h4 class="mt-1 text-base md:text-lg font-bold text-slate-800">
                                    @if ($accreditation->valid_from || $accreditation->valid_until)
                                        {{ $formatTanggalIndonesia($accreditation->valid_from) }}
                                        -
                                        {{ $formatTanggalIndonesia($accreditation->valid_until) }}
                                    @else
                                        -
                                    @endif
                                </h4>

                            </div>

                            @if ($accreditation->certificate_number)

                                <div class="rounded-2xl bg-slate-50 border border-slate-100 p-4 col-span-2">

                                    <p class="text-xs text-slate-500">
                                        Nomor Sertifikat / SK
                                    </p>

                                    <h4 class="mt-1 text-sm md:text-base font-bold text-slate-800 break-words">
                                        {{ $accreditation->certificate_number }}
                                    </h4>

                                </div>

                            @endif

                        </div>


                        {{-- Buttons --}}
                        @if ($fileUrl)

                            <div class="mt-6 flex flex-col sm:flex-row gap-3">

                                <a href="{{ $fileUrl }}"
                                    target="_blank"
                                    class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-blue-700 text-white text-sm font-bold hover:bg-blue-800 transition">
                                    Lihat Sertifikat
                                </a>

                                <a href="{{ $fileUrl }}"
                                    download
                                    class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-slate-100 text-slate-700 text-sm font-bold hover:bg-slate-200 transition">
                                    Download
                                </a>

                            </div>

                        @endif

                    </div>

                </article>

            @endforeach

        </div>

    </div>

</section>

@endif