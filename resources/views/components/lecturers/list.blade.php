<section class="relative py-20 overflow-hidden bg-gradient-to-br from-slate-50 via-white to-blue-50">

    {{-- Background Decoration --}}
    <div class="absolute inset-0 -z-10">

        <div class="absolute -top-40 -left-40 w-[500px] h-[500px] rounded-full bg-blue-200/30 blur-[140px]"></div>

        <div class="absolute bottom-0 -right-40 w-[500px] h-[500px] rounded-full bg-yellow-200/30 blur-[140px]"></div>

        <div
            class="absolute inset-0 opacity-[0.03]"
            style="background-image: linear-gradient(#0f172a 1px, transparent 1px),
            linear-gradient(to right,#0f172a 1px,transparent 1px);
            background-size:70px 70px;">
        </div>

        <img
            src="{{ asset('assets/images/logo.png') }}"
            alt=""
            class="absolute -right-20 top-24 w-[360px] md:w-[520px] opacity-[0.035] grayscale select-none pointer-events-none">

    </div>

    <div class="max-w-7xl mx-auto px-6">

        {{-- Heading --}}
        <div class="text-center max-w-3xl mx-auto mb-14" data-aos="fade-up">

            <span class="uppercase tracking-[5px] text-blue-700 font-semibold">
                Tim Pengajar & Kependidikan
            </span>

            <h2 class="mt-4 text-4xl md:text-5xl font-bold text-slate-800 leading-tight">
                Dosen & Staff Program Studi
            </h2>

            <div class="w-24 h-1 bg-yellow-400 rounded-full mx-auto mt-6"></div>

            <p class="mt-6 text-slate-600 leading-8">
                Tenaga pendidik dan kependidikan yang mendukung proses pembelajaran,
                pelayanan akademik, dan pengembangan Program Studi D-III Teknik Mesin.
            </p>

        </div>


        {{-- Summary Card --}}
        <div class="grid md:grid-cols-3 gap-6 mb-10">

            <div class="rounded-3xl bg-white/90 backdrop-blur border border-slate-100 shadow-lg p-7" data-aos="fade-up">

                <p class="uppercase tracking-[4px] text-slate-500 text-sm font-semibold">
                    Total Data
                </p>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-slate-800">
                            Semua
                        </h3>

                        <p class="mt-2 text-slate-500">
                            Dosen dan staff terdata.
                        </p>
                    </div>

                    <span class="text-5xl font-black text-slate-100">
                        {{ $totalAll ?? 0 }}
                    </span>
                </div>

            </div>

            <div class="rounded-3xl bg-white/90 backdrop-blur border border-slate-100 shadow-lg p-7" data-aos="fade-up" data-aos-delay="100">

                <p class="uppercase tracking-[4px] text-blue-700 text-sm font-semibold">
                    Tenaga Pendidik
                </p>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-slate-800">
                            Dosen
                        </h3>

                        <p class="mt-2 text-slate-500">
                            Pengajar dan pembimbing akademik.
                        </p>
                    </div>

                    <span class="text-5xl font-black text-blue-100">
                        {{ $totalDosen ?? 0 }}
                    </span>
                </div>

            </div>

            <div class="rounded-3xl bg-white/90 backdrop-blur border border-slate-100 shadow-lg p-7" data-aos="fade-up" data-aos-delay="200">

                <p class="uppercase tracking-[4px] text-yellow-600 text-sm font-semibold">
                    Tenaga Kependidikan
                </p>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-slate-800">
                            Staff
                        </h3>

                        <p class="mt-2 text-slate-500">
                            Pendukung administrasi akademik.
                        </p>
                    </div>

                    <span class="text-5xl font-black text-yellow-100">
                        {{ $totalStaff ?? 0 }}
                    </span>
                </div>

            </div>

        </div>


        {{-- Search & Filter --}}
        <div
            class="mb-14 rounded-3xl bg-white/90 backdrop-blur border border-slate-100 shadow-lg p-5 md:p-6"
            data-aos="fade-up"
            data-aos-delay="150">

            <form action="{{ url('/lecturers') }}" method="GET">

                <div class="grid lg:grid-cols-12 gap-4 items-end">

                    <div class="lg:col-span-6">

                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Cari Nama
                        </label>

                        <input type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Masukkan nama dosen atau staff..."
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                    </div>

                    <div class="lg:col-span-3">

                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Filter Kategori
                        </label>

                        <select name="type"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                            <option value="all" {{ request('type', 'all') === 'all' ? 'selected' : '' }}>
                                Semua
                            </option>

                            <option value="dosen" {{ request('type') === 'dosen' ? 'selected' : '' }}>
                                Dosen
                            </option>

                            <option value="staff" {{ request('type') === 'staff' ? 'selected' : '' }}>
                                Staff
                            </option>

                        </select>

                    </div>

                    <div class="lg:col-span-3 flex gap-3">

                        <button type="submit"
                            class="flex-1 inline-flex items-center justify-center px-5 py-4 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                            Cari
                        </button>

                        <a href="{{ url('/lecturers') }}"
                            class="inline-flex items-center justify-center px-5 py-4 rounded-2xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition">
                            Reset
                        </a>

                    </div>

                </div>

            </form>

        </div>


        {{-- List Title --}}
        <div class="mb-8" data-aos="fade-up">

            <span class="uppercase tracking-[4px] text-blue-700 font-semibold">
                Daftar Personel
            </span>

            <h3 class="mt-3 text-3xl md:text-4xl font-bold text-slate-800">
                @if (request('type') === 'dosen')
                    Dosen Program Studi
                @elseif (request('type') === 'staff')
                    Staff Program Studi
                @else
                    Dosen & Staff Program Studi
                @endif
            </h3>

            <div class="w-20 h-1 bg-yellow-400 rounded-full mt-5"></div>

        </div>


        {{-- Cards --}}
        @if ($lecturerStaff->count() > 0)

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-7">

                @foreach ($lecturerStaff as $person)

                    @php
                        $nameParts = collect(explode(' ', trim($person->name)))
                            ->filter()
                            ->take(2);

                        $initials = $nameParts
                            ->map(fn ($word) => mb_substr($word, 0, 1))
                            ->implode('');

                        if (!$initials) {
                            $initials = 'TM';
                        }

                        $isDosen = $person->type === 'dosen';
                    @endphp

                    <div
                        data-aos="fade-up"
                        data-aos-delay="{{ ($loop->index % 4) * 70 }}"
                        class="group rounded-3xl bg-white border border-slate-100 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 overflow-hidden">

                        <div class="relative h-80 bg-slate-100 overflow-hidden">

                            @if ($person->photo)

                                <img
                                    src="{{ asset('storage/' . $person->photo) }}"
                                    alt="{{ $person->name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-700">

                            @else

                                <div class="w-full h-full flex flex-col items-center justify-center {{ $isDosen ? 'bg-gradient-to-br from-blue-700 via-blue-800 to-slate-900' : 'bg-gradient-to-br from-yellow-400 via-yellow-500 to-blue-800' }}">

                                    <div class="w-28 h-28 rounded-full bg-white/15 border border-white/25 backdrop-blur flex items-center justify-center shadow-2xl">

                                        <span class="text-5xl font-black text-white tracking-wider">
                                            {{ strtoupper($initials) }}
                                        </span>

                                    </div>

                                    <div class="mt-5 px-5 py-2 rounded-full bg-white/10 border border-white/15 backdrop-blur">

                                        <p class="text-sm font-semibold text-white/85">
                                            D-III Teknik Mesin
                                        </p>

                                    </div>

                                </div>

                            @endif

                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/10 to-transparent"></div>

                            <div class="absolute top-4 left-4">

                                @if ($isDosen)
                                    <span class="px-4 py-2 rounded-full bg-blue-700 text-white text-sm font-semibold shadow-lg">
                                        Dosen
                                    </span>
                                @else
                                    <span class="px-4 py-2 rounded-full bg-yellow-400 text-slate-900 text-sm font-semibold shadow-lg">
                                        Staff
                                    </span>
                                @endif

                            </div>

                            <div class="absolute bottom-5 left-5 right-5">
                                <h3 class="text-xl font-bold text-white leading-snug">
                                    {{ $person->name }}
                                </h3>
                            </div>

                        </div>

                        <div class="p-6">
                            <p class="text-sm text-slate-500">
                                {{ $isDosen ? 'Tenaga Pendidik' : 'Tenaga Kependidikan' }}
                            </p>

                            <p class="mt-1 font-semibold text-slate-800">
                                Program Studi D-III Teknik Mesin
                            </p>
                        </div>

                    </div>

                @endforeach

            </div>

            {{-- Pagination --}}
            @if ($lecturerStaff->hasPages())
                <div class="mt-12">
                    {{ $lecturerStaff->links() }}
                </div>
            @endif

        @else

            <div class="rounded-3xl bg-white/90 backdrop-blur border border-slate-100 p-10 shadow-lg text-center" data-aos="fade-up">

                <h4 class="text-2xl font-bold text-slate-800">
                    Data tidak ditemukan
                </h4>

                <p class="mt-3 text-slate-500">
                    Coba gunakan kata kunci atau filter kategori lain.
                </p>

                <a href="{{ url('/lecturers') }}"
                    class="mt-6 inline-flex items-center justify-center px-6 py-3 rounded-xl bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
                    Tampilkan Semua
                </a>

            </div>

        @endif

    </div>

</section>