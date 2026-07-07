<section class="relative py-24 overflow-hidden bg-gradient-to-br from-slate-50 via-white to-blue-50">

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

            <p class="mt-7 text-slate-600 leading-8">
                Tenaga pendidik dan kependidikan yang mendukung proses pembelajaran,
                pelayanan akademik, dan pengembangan Program Studi Teknik Otomotif Elektronik.
            </p>

        </div>

        @php
            $people = $lecturers->concat($staff)->sortBy('name')->values();
        @endphp

        {{-- Filter & Search --}}
        <div
            class="mb-12 rounded-3xl bg-white border border-slate-100 shadow-lg p-5 md:p-6"
            data-aos="fade-up"
            data-aos-delay="100">

            <div class="flex flex-col lg:flex-row gap-5 lg:items-center lg:justify-between">

                {{-- Tabs --}}
                <div class="flex flex-wrap gap-3">

                    <button
                        type="button"
                        data-filter="all"
                        class="filter-btn active px-5 py-3 rounded-xl bg-blue-700 text-white font-semibold transition">
                        Semua
                    </button>

                    <button
                        type="button"
                        data-filter="dosen"
                        class="filter-btn px-5 py-3 rounded-xl bg-slate-100 text-slate-700 font-semibold hover:bg-blue-50 hover:text-blue-700 transition">
                        Dosen
                    </button>

                    <button
                        type="button"
                        data-filter="staff"
                        class="filter-btn px-5 py-3 rounded-xl bg-slate-100 text-slate-700 font-semibold hover:bg-yellow-50 hover:text-yellow-700 transition">
                        Staff
                    </button>

                </div>

                {{-- Search --}}
                <div class="relative w-full lg:w-96">

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
                            d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z" />

                    </svg>

                </div>

            </div>

        </div>

        {{-- Grid --}}
        @if ($people->count() > 0)

            <div id="peopleGrid" class="grid sm:grid-cols-2 lg:grid-cols-4 gap-7">

                @foreach ($people as $person)

                    <div
                        data-aos="fade-up"
                        data-aos-delay="{{ $loop->index * 70 }}"
                        data-card="person"
                        data-type="{{ $person->type }}"
                        data-name="{{ strtolower($person->name) }}"
                        data-nip="{{ strtolower($person->nip ?? '') }}"
                        class="person-card group rounded-3xl bg-white border border-slate-100 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 overflow-hidden">

                        {{-- Photo --}}
                        <div class="relative h-80 bg-slate-100 overflow-hidden">

                            @if ($person->photo)

                                <img
                                    src="{{ asset('storage/' . $person->photo) }}"
                                    alt="{{ $person->name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-700">

                            @else

                                <div
                                    class="w-full h-full flex items-center justify-center
                                    {{ $person->type === 'dosen'
                                        ? 'bg-gradient-to-br from-blue-100 to-blue-50'
                                        : 'bg-gradient-to-br from-yellow-100 to-blue-50' }}">

                                    <span
                                        class="text-7xl font-black
                                        {{ $person->type === 'dosen'
                                            ? 'text-blue-200'
                                            : 'text-yellow-300' }}">
                                        {{ strtoupper(substr($person->name, 0, 1)) }}
                                    </span>

                                </div>

                            @endif

                            {{-- Overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-950/10 to-transparent opacity-80"></div>

                            {{-- Badge --}}
                            <div class="absolute top-4 left-4">

                                @if ($person->type === 'dosen')

                                    <span class="px-4 py-2 rounded-full bg-blue-700 text-white text-sm font-semibold shadow-lg">
                                        Dosen
                                    </span>

                                @else

                                    <span class="px-4 py-2 rounded-full bg-yellow-400 text-slate-900 text-sm font-semibold shadow-lg">
                                        Staff
                                    </span>

                                @endif

                            </div>

                            {{-- Name on image --}}
                            <div class="absolute bottom-5 left-5 right-5">

                                <h3 class="text-xl font-bold text-white leading-snug">
                                    {{ $person->name }}
                                </h3>

                                <p class="mt-2 text-white/80 text-sm">
                                    NIP. {{ $person->nip ?? '-' }}
                                </p>

                            </div>

                        </div>

                        {{-- Body --}}
                        <div class="p-6">

                            <div class="flex items-center justify-between gap-4">

                                <div>

                                    <p class="text-sm text-slate-500">
                                        {{ $person->type === 'dosen' ? 'Tenaga Pendidik' : 'Tenaga Kependidikan' }}
                                    </p>

                                    <p class="mt-1 font-semibold text-slate-800">
                                        Program Studi TOE
                                    </p>

                                </div>

                                <div
                                    class="w-11 h-11 rounded-xl flex items-center justify-center
                                    {{ $person->type === 'dosen'
                                        ? 'bg-blue-100 text-blue-700'
                                        : 'bg-yellow-100 text-yellow-700' }}">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-5 h-5"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5.121 17.804A9 9 0 1118.88 17.8M15 11a3 3 0 11-6 0 3 3 0 016 0z" />

                                    </svg>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

            {{-- Empty Result --}}
            <div
                id="emptyPeople"
                class="hidden mt-10 rounded-3xl bg-white border border-slate-100 shadow-lg p-10 text-center">

                <h3 class="text-2xl font-bold text-slate-800">
                    Data tidak ditemukan
                </h3>

                <p class="mt-3 text-slate-500">
                    Coba gunakan kata kunci lain atau ubah filter kategori.
                </p>

            </div>

        @else

            <div class="rounded-3xl bg-white border border-slate-100 p-12 text-center shadow-lg">

                <h3 class="text-2xl font-bold text-slate-800">
                    Data belum tersedia
                </h3>

                <p class="mt-3 text-slate-500">
                    Data dosen dan staff belum ditambahkan melalui halaman admin.
                </p>

            </div>

        @endif

    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const searchInput = document.getElementById('peopleSearch');
        const cards = document.querySelectorAll('[data-card="person"]');
        const emptyState = document.getElementById('emptyPeople');

        let activeFilter = 'all';

        function updateCards() {
            const keyword = searchInput ? searchInput.value.toLowerCase().trim() : '';
            let visibleCount = 0;

            cards.forEach(card => {
                const type = card.dataset.type;
                const name = card.dataset.name;
                const nip = card.dataset.nip;

                const matchFilter = activeFilter === 'all' || type === activeFilter;
                const matchSearch = name.includes(keyword) || nip.includes(keyword);

                if (matchFilter && matchSearch) {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });

            if (emptyState) {
                emptyState.classList.toggle('hidden', visibleCount !== 0);
            }
        }

        filterButtons.forEach(button => {
            button.addEventListener('click', function () {
                activeFilter = this.dataset.filter;

                filterButtons.forEach(btn => {
                    btn.classList.remove('active', 'bg-blue-700', 'text-white');
                    btn.classList.add('bg-slate-100', 'text-slate-700');
                });

                this.classList.add('active', 'bg-blue-700', 'text-white');
                this.classList.remove('bg-slate-100', 'text-slate-700');

                updateCards();
            });
        });

        if (searchInput) {
            searchInput.addEventListener('input', updateCards);
        }
    });
</script>