@php
    $homeAccreditations = \App\Models\Accreditation::where('is_active', true)
        ->orderBy('sort_order')
        ->orderByDesc('created_at')
        ->get();

    $mainAccreditation = $homeAccreditations->firstWhere('type', 'nasional');

    if (!$mainAccreditation) {
        $mainAccreditation = $homeAccreditations->first();
    }

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

    $fileUrl = null;
    $extension = null;
    $isImage = false;
    $isPdf = false;

    if ($mainAccreditation && $mainAccreditation->file_path) {
        $fileUrl = asset('storage/' . $mainAccreditation->file_path);
        $extension = strtolower(pathinfo($mainAccreditation->file_path, PATHINFO_EXTENSION));
        $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'webp']);
        $isPdf = $extension === 'pdf';
    }
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
            <div
                data-aos="fade-up"
                data-aos-duration="1000">

                <span class="inline-flex items-center px-4 py-1 rounded-full bg-blue-100 text-blue-700 font-semibold text-sm">
                    Program Studi
                </span>

                <h2 class="mt-5 text-4xl font-bold text-gray-800">
                    Deskripsi Program Studi
                </h2>

                <div
                    class="w-24 h-1 bg-yellow-400 rounded-full mt-5 mb-8"
                    data-aos="fade-right"
                    data-aos-delay="200">
                </div>

                <p
                    class="text-gray-600 leading-8 text-justify"
                    data-aos="fade-up"
                    data-aos-delay="300">

                    Program studi D-III Teknik Mesin merupakan salah satu dari program studi
                    di Jurusan Teknik Mesin yang dirancang secara khusus guna menghasilkan
                    tenaga ahli madya yang memiliki kemampuan dalam merancang jig and fixture,
                    press tool, dan plastic mould menggunakan CAD/CAM/CAE.

                    Tidak hanya itu, mahasiswa juga dibekali kemampuan untuk merancang mesin
                    dan komponen mekanik di industri manufaktur, merancang proses otomasi di
                    industri manufaktur, serta menguasai kemampuan praktis dan teoritis untuk
                    proses manufaktur logam dan non-logam. Lulusan juga diarahkan memiliki
                    jiwa kepemimpinan yang jujur, bertanggung jawab, berjiwa technopreneur,
                    serta memiliki etika kerja profesional.

                </p>

                <a href="{{ url('/profile') }}"
                    data-aos="fade-up"
                    data-aos-delay="700"
                    class="inline-flex items-center gap-2 mt-8 px-6 py-3 rounded-xl bg-blue-700 text-white font-semibold transition-all duration-300 hover:bg-blue-800 hover:-translate-y-1 hover:shadow-xl">

                    Selengkapnya

                    <span>→</span>

                </a>

            </div>

            {{-- IMAGE --}}
            <div
                data-aos="fade-left"
                data-aos-duration="1200">

                <div class="overflow-hidden rounded-3xl shadow-2xl">

                    <img
                        src="{{ asset('assets/images/about.png') }}"
                        class="w-full transition duration-700 hover:scale-105"
                        alt="About Teknik Mesin">

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- AKREDITASI DINAMIS --}}
        {{-- ========================================================= --}}

        @if ($mainAccreditation)

            <div class="mt-32 grid md:grid-cols-2 gap-14 items-center">

                {{-- IMAGE --}}
                <div
                    data-aos="fade-right"
                    data-aos-duration="1200">

                    <div class="relative">

                        {{-- Decoration --}}
                        <div class="absolute -bottom-10 -left-10 w-64 h-64 rounded-full bg-blue-200 blur-3xl opacity-50"></div>

                        <div class="absolute -top-10 right-0 w-40 h-40 rounded-full bg-yellow-200 blur-3xl opacity-60"></div>

                        <div class="overflow-hidden rounded-3xl shadow-2xl bg-white">

                            @if ($fileUrl && $isImage)

                                <img
                                    src="{{ $fileUrl }}"
                                    class="relative w-full h-[360px] object-contain bg-white p-4 transition duration-700 hover:scale-105"
                                    alt="{{ $mainAccreditation->title }}">

                            @elseif ($fileUrl && $isPdf)

                                <div class="relative w-full h-[360px] bg-white flex flex-col items-center justify-center text-center p-8">

                                    <div class="w-20 h-20 rounded-3xl bg-red-100 text-red-600 flex items-center justify-center text-2xl font-black">
                                        PDF
                                    </div>

                                    <h3 class="mt-5 text-2xl font-bold text-slate-800">
                                        File Sertifikat Akreditasi
                                    </h3>

                                    <p class="mt-3 text-slate-500 leading-7">
                                        Sertifikat tersedia dalam format PDF dan dapat dibuka melalui halaman detail.
                                    </p>

                                </div>

                            @else

                                <img
                                    src="{{ asset('assets/images/akreditasi.jpg') }}"
                                    class="relative w-full h-[360px] object-contain bg-white p-4 transition duration-700 hover:scale-105"
                                    alt="Sertifikat Akreditasi Program Studi D-III Teknik Mesin">

                            @endif

                        </div>

                    </div>

                </div>


                {{-- TEXT --}}
                <div
                    data-aos="fade-up"
                    data-aos-delay="200">

                    <span class="inline-flex items-center px-4 py-1 rounded-full bg-yellow-100 text-yellow-700 font-semibold text-sm">
                        Akreditasi Program Studi
                    </span>

                    <h2 class="mt-5 text-4xl font-bold text-gray-800 leading-tight">

                        {{ $mainAccreditation->title }}

                    </h2>

                    <div
                        class="w-24 h-1 bg-blue-700 rounded-full mt-5 mb-8"
                        data-aos="fade-left"
                        data-aos-delay="300">
                    </div>

                    <p
                        class="mt-6 text-gray-600 leading-8 text-justify"
                        data-aos="fade-up"
                        data-aos-delay="600">

                        @if ($mainAccreditation->description)
                            {{ $mainAccreditation->description }}
                        @else
                            Program Studi D-III Teknik Mesin Politeknik Negeri Malang telah memperoleh
                            akreditasi dengan peringkat
                            <strong>{{ $mainAccreditation->rank ?? '-' }}</strong>
                            dari
                            <strong>{{ $mainAccreditation->institution ?? '-' }}</strong>.
                            Capaian ini menjadi bukti komitmen program studi dalam menjaga mutu pendidikan
                            vokasi, pengembangan kurikulum, sumber daya manusia, sarana prasarana,
                            serta relevansi lulusan dengan kebutuhan dunia industri.
                        @endif

                    </p>

                    @if ($mainAccreditation->valid_from || $mainAccreditation->valid_until)

                        <p
                            class="mt-6 text-gray-600 leading-8 text-justify"
                            data-aos="fade-up"
                            data-aos-delay="700">

                            Sertifikat akreditasi ini berlaku mulai tanggal
                            <strong>{{ $formatTanggalIndonesia($mainAccreditation->valid_from) }}</strong>
                            sampai dengan
                            <strong>{{ $formatTanggalIndonesia($mainAccreditation->valid_until) }}</strong>.

                            @if ($mainAccreditation->certificate_number)
                                Akreditasi ini ditetapkan berdasarkan nomor
                                <strong>{{ $mainAccreditation->certificate_number }}</strong>.
                            @endif

                        </p>

                    @endif


                    {{-- INFO AKREDITASI --}}
                    <div
                        class="grid sm:grid-cols-2 gap-4 mt-8"
                        data-aos="fade-up"
                        data-aos-delay="800">

                        <div class="p-5 rounded-2xl bg-blue-50 border border-blue-100">

                            <p class="text-sm text-gray-500 mb-1">
                                Peringkat
                            </p>

                            <p class="text-xl font-bold text-blue-700">
                                {{ $mainAccreditation->rank ?? '-' }}
                            </p>

                        </div>

                        <div class="p-5 rounded-2xl bg-yellow-50 border border-yellow-100">

                            <p class="text-sm text-gray-500 mb-1">
                                Lembaga
                            </p>

                            <p class="text-xl font-bold text-yellow-700">
                                {{ $mainAccreditation->institution ?? '-' }}
                            </p>

                        </div>

                    </div>

                    <a href="{{ url('/profile') }}"
                        data-aos="zoom-in"
                        data-aos-delay="900"
                        class="inline-flex items-center gap-2 mt-8 px-6 py-3 rounded-xl bg-blue-700 text-white font-semibold transition-all duration-300 hover:bg-blue-800 hover:-translate-y-1 hover:shadow-xl">

                        Lihat Detail

                        <span>→</span>

                    </a>

                </div>

            </div>

        @endif

    </div>

</section>