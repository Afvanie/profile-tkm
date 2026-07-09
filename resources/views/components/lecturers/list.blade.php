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
        <div class="grid md:grid-cols-2 gap-6 mb-14">

            <div class="rounded-3xl bg-white/90 backdrop-blur border border-slate-100 shadow-lg p-7" data-aos="fade-up">
                <p class="uppercase tracking-[4px] text-blue-700 text-sm font-semibold">
                    Tenaga Pendidik
                </p>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-slate-800">
                            Dosen
                        </h3>

                        <p class="mt-2 text-slate-500">
                            Pengajar dan pembimbing akademik mahasiswa.
                        </p>
                    </div>

                    <span class="text-5xl font-black text-blue-100">
                        {{ $lecturers->count() }}
                    </span>
                </div>
            </div>

            <div class="rounded-3xl bg-white/90 backdrop-blur border border-slate-100 shadow-lg p-7" data-aos="fade-up" data-aos-delay="100">
                <p class="uppercase tracking-[4px] text-yellow-600 text-sm font-semibold">
                    Tenaga Kependidikan
                </p>

                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h3 class="text-3xl font-bold text-slate-800">
                            Staff
                        </h3>

                        <p class="mt-2 text-slate-500">
                            Pendukung layanan administrasi dan akademik.
                        </p>
                    </div>

                    <span class="text-5xl font-black text-yellow-100">
                        {{ $staff->count() }}
                    </span>
                </div>
            </div>

        </div>
        {{-- Search --}}
        <div
            class="mb-14 rounded-3xl bg-white/90 backdrop-blur border border-slate-100 shadow-lg p-5 md:p-6"
            data-aos="fade-up"
            data-aos-delay="150">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

                <div>
                    <h3 class="text-xl font-bold text-slate-800">
                        Cari Dosen atau Staff
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Masukkan nama atau NIP untuk menemukan data tenaga pendidik dan kependidikan.
                    </p>
                </div>

                <div class="relative w-full md:w-96">

                    <input
                        type="text"
                        id="peopleSearch"
                        placeholder="Cari nama atau NIP..."
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-5 py-3 pl-12 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 01114 0z" />

                    </svg>

                </div>

            </div>

        </div>
        {{-- ===================================================== --}}
        {{-- DOSEN --}}
        {{-- ===================================================== --}}
        <div class="mb-20">

            <div class="mb-8" data-aos="fade-up">

                <span class="uppercase tracking-[4px] text-blue-700 font-semibold">
                    Tenaga Pendidik
                </span>

                <h3 class="mt-3 text-3xl md:text-4xl font-bold text-slate-800">
                    Dosen Program Studi
                </h3>

                <div class="w-20 h-1 bg-yellow-400 rounded-full mt-5"></div>

            </div>

            @if ($lecturers->count() > 0)

                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-7">

                    @foreach ($lecturers->sortBy('name') as $person)

                        <div
                            data-aos="fade-up"
                            data-aos-delay="{{ $loop->index * 70 }}"
                            data-card="person"
                            data-name="{{ strtolower($person->name) }}"
                            data-nip="{{ strtolower($person->nip ?? '') }}"
                            class="person-card group rounded-3xl bg-white border border-slate-100 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 overflow-hidden">

                            <div class="relative h-80 bg-slate-100 overflow-hidden">

                                @if ($person->photo)

                                    <img
                                        src="{{ asset('storage/' . $person->photo) }}"
                                        alt="{{ $person->name }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition duration-700">

                                @else

                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-100 to-blue-50">
                                        <span class="text-7xl font-black text-blue-200">
                                            {{ strtoupper(substr($person->name, 0, 1)) }}
                                        </span>
                                    </div>

                                @endif

                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/75 via-slate-950/10 to-transparent"></div>

                                <div class="absolute top-4 left-4">
                                    <span class="px-4 py-2 rounded-full bg-blue-700 text-white text-sm font-semibold shadow-lg">
                                        Dosen
                                    </span>
                                </div>

                                <div class="absolute bottom-5 left-5 right-5">
                                    <h3 class="text-xl font-bold text-white leading-snug">
                                        {{ $person->name }}
                                    </h3>

                                    <p class="mt-2 text-white/80 text-sm">
                                        NIP. {{ $person->nip ?? '-' }}
                                    </p>
                                </div>

                            </div>

                            <div class="p-6">
                                <p class="text-sm text-slate-500">
                                    Tenaga Pendidik
                                </p>

                                <p class="mt-1 font-semibold text-slate-800">
                                    Program Studi D-III Teknik Mesin
                                </p>
                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="rounded-3xl bg-white/90 backdrop-blur border border-slate-100 p-8 shadow-lg" data-aos="fade-up">

                    <div class="flex flex-col md:flex-row md:items-center gap-5">

                        <div class="w-16 h-16 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center text-3xl font-bold">
                            D
                        </div>

                        <div>
                            <h4 class="text-xl font-bold text-slate-800">
                                Data dosen belum tersedia
                            </h4>

                            <p class="mt-2 text-slate-500">
                                Data dosen dapat ditambahkan melalui halaman admin Dosen & Staff.
                            </p>
                        </div>

                    </div>

                </div>

            @endif

        </div>

        {{-- ===================================================== --}}
        {{-- STAFF --}}
        {{-- ===================================================== --}}
        <div>

            <div class="mb-8" data-aos="fade-up">

                <span class="uppercase tracking-[4px] text-yellow-600 font-semibold">
                    Tenaga Kependidikan
                </span>

                <h3 class="mt-3 text-3xl md:text-4xl font-bold text-slate-800">
                    Staff Program Studi
                </h3>

                <div class="w-20 h-1 bg-blue-700 rounded-full mt-5"></div>

            </div>

            @if ($staff->count() > 0)

                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-7">

                    @foreach ($staff->sortBy('name') as $person)

                        <div
                            data-aos="fade-up"
                            data-aos-delay="{{ $loop->index * 70 }}"
                            data-card="person"
                            data-name="{{ strtolower($person->name) }}"
                            data-nip="{{ strtolower($person->nip ?? '') }}"
                            class="person-card group rounded-3xl bg-white border border-slate-100 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 overflow-hidden">

                            <div class="relative h-80 bg-slate-100 overflow-hidden">

                                @if ($person->photo)

                                    <img
                                        src="{{ asset('storage/' . $person->photo) }}"
                                        alt="{{ $person->name }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition duration-700">

                                @else

                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-yellow-100 to-blue-50">
                                        <span class="text-7xl font-black text-yellow-300">
                                            {{ strtoupper(substr($person->name, 0, 1)) }}
                                        </span>
                                    </div>

                                @endif

                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/75 via-slate-950/10 to-transparent"></div>

                                <div class="absolute top-4 left-4">
                                    <span class="px-4 py-2 rounded-full bg-yellow-400 text-slate-900 text-sm font-semibold shadow-lg">
                                        Staff
                                    </span>
                                </div>

                                <div class="absolute bottom-5 left-5 right-5">
                                    <h3 class="text-xl font-bold text-white leading-snug">
                                        {{ $person->name }}
                                    </h3>

                                    <p class="mt-2 text-white/80 text-sm">
                                        NIP. {{ $person->nip ?? '-' }}
                                    </p>
                                </div>

                            </div>

                            <div class="p-6">
                                <p class="text-sm text-slate-500">
                                    Tenaga Kependidikan
                                </p>

                                <p class="mt-1 font-semibold text-slate-800">
                                    Program Studi D-III Teknik Mesin
                                </p>
                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="rounded-3xl bg-white/90 backdrop-blur border border-slate-100 p-8 shadow-lg" data-aos="fade-up">

                    <div class="flex flex-col md:flex-row md:items-center gap-5">

                        <div class="w-16 h-16 rounded-2xl bg-yellow-50 text-yellow-600 flex items-center justify-center text-3xl font-bold">
                            S
                        </div>

                        <div>
                            <h4 class="text-xl font-bold text-slate-800">
                                Data staff belum tersedia
                            </h4>

                            <p class="mt-2 text-slate-500">
                                Data staff dapat ditambahkan melalui halaman admin Dosen & Staff.
                            </p>
                        </div>

                    </div>

                </div>

            @endif

        </div>

    </div>

    <div
    id="searchEmptyPeople"
    class="hidden mt-10 rounded-3xl bg-white/90 backdrop-blur border border-slate-100 shadow-lg p-10 text-center">

    <h3 class="text-2xl font-bold text-slate-800">
        Data tidak ditemukan
    </h3>

    <p class="mt-3 text-slate-500">
        Coba gunakan nama atau NIP lain.
    </p>

</div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('peopleSearch');
        const cards = document.querySelectorAll('[data-card="person"]');
        const emptyState = document.getElementById('searchEmptyPeople');

        if (!searchInput || cards.length === 0) {
            return;
        }

        function normalizeText(text) {
            return (text || '')
                .toString()
                .toLowerCase()
                .trim();
        }

        function updateSearch() {
            const keyword = normalizeText(searchInput.value);
            let visibleCount = 0;

            cards.forEach(function (card) {
                const name = normalizeText(card.dataset.name);
                const nip = normalizeText(card.dataset.nip);

                const isMatch =
                    keyword === '' ||
                    name.includes(keyword) ||
                    nip.includes(keyword);

                if (isMatch) {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });

            if (emptyState) {
                emptyState.classList.toggle('hidden', visibleCount > 0 || keyword === '');
            }
        }

        searchInput.addEventListener('input', updateSearch);
    });
</script>