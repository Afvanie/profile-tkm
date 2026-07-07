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

    </div>

    <div class="max-w-7xl mx-auto px-6">

        {{-- Heading --}}
        <div class="text-center max-w-3xl mx-auto mb-14" data-aos="fade-up">

            <span class="uppercase tracking-[5px] text-blue-700 font-semibold">
                Perjalanan Program Studi
            </span>

            <h2 class="mt-3 text-4xl md:text-5xl font-bold text-slate-800 leading-tight">
                Sejarah Perkembangan TOE
            </h2>

            <div class="w-24 h-1 bg-yellow-400 rounded-full mx-auto mt-6"></div>

            <p class="mt-7 text-slate-600 leading-8">
                Perkembangan Program Studi Teknik Otomotif Elektronik Politeknik Negeri Malang
                dari awal pengembangan hingga menjadi program studi terakreditasi unggul.
            </p>

        </div>

        @php
            $histories = [
                [
                    'year' => '2004/2005',
                    'title' => 'Awal Pengembangan',
                    'description' => 'TOE mulai dikembangkan sebagai bagian dari pendidikan vokasi bidang otomotif di Polinema.',
                    'color' => 'blue',
                ],
                [
                    'year' => '2005',
                    'title' => 'Izin Resmi',
                    'description' => 'Mendapat izin penyelenggaraan melalui SK Dirjen DIKTI Nomor 2964/D/T/2005.',
                    'color' => 'yellow',
                ],
                [
                    'year' => '2007',
                    'title' => 'Mahasiswa Reguler',
                    'description' => 'Mulai menerima mahasiswa baru program reguler sebanyak satu kelas.',
                    'color' => 'blue',
                ],
                [
                    'year' => '2008',
                    'title' => 'Pengembangan Kelas',
                    'description' => 'Jumlah kelas reguler bertambah menjadi dua kelas.',
                    'color' => 'yellow',
                ],
                [
                    'year' => '2010',
                    'title' => 'Perluasan Kapasitas',
                    'description' => 'Program studi berkembang dengan membuka tiga kelas reguler.',
                    'color' => 'blue',
                ],
                [
                    'year' => '2019',
                    'title' => 'Empat Kelas',
                    'description' => 'TOE berkembang menjadi empat kelas reguler untuk meningkatkan daya tampung.',
                    'color' => 'yellow',
                ],
                [
                    'year' => '2023',
                    'title' => 'Akreditasi Unggul',
                    'description' => 'Memperoleh predikat Akreditasi Unggul sebagai pengakuan mutu pendidikan.',
                    'color' => 'blue',
                ],
                [
                    'year' => 'Sekarang',
                    'title' => 'Smart Mobility',
                    'description' => 'Beradaptasi dengan kendaraan listrik, IoT, autonomous vehicle, dan teknologi otomotif modern.',
                    'color' => 'yellow',
                ],
            ];
        @endphp

        {{-- Compact Timeline Grid --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

            @foreach ($histories as $index => $history)

                <div
                    data-aos="fade-up"
                    data-aos-delay="{{ $index * 80 }}"
                    class="group relative overflow-hidden rounded-3xl bg-white/90 backdrop-blur-xl border border-slate-100 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-500">

                    {{-- Top Accent --}}
                    <div
                        class="absolute top-0 left-0 w-full h-1
                        {{ $history['color'] === 'blue'
                            ? 'bg-gradient-to-r from-blue-700 to-blue-400'
                            : 'bg-gradient-to-r from-yellow-400 to-yellow-300' }}">
                    </div>

                    <div class="p-6">

                        {{-- Year Badge --}}
                        <div
                            class="inline-flex items-center px-4 py-2 rounded-full font-bold text-sm
                            {{ $history['color'] === 'blue'
                                ? 'bg-blue-100 text-blue-700'
                                : 'bg-yellow-100 text-yellow-700' }}">

                            {{ $history['year'] }}

                        </div>

                        {{-- Dot --}}
                        <div class="flex items-center gap-3 mt-6 mb-5">

                            <div
                                class="w-4 h-4 rounded-full
                                {{ $history['color'] === 'blue'
                                    ? 'bg-blue-700'
                                    : 'bg-yellow-400' }}">
                            </div>

                            <div class="flex-1 h-[2px] bg-slate-100"></div>

                        </div>

                        <h3 class="text-xl font-bold text-slate-800">
                            {{ $history['title'] }}
                        </h3>

                        <p class="mt-4 text-slate-600 leading-7 text-sm">
                            {{ $history['description'] }}
                        </p>

                    </div>

                    {{-- Hover Glow --}}
                    <div
                        class="absolute -right-16 -bottom-16 w-40 h-40 rounded-full opacity-0 group-hover:opacity-100 blur-3xl transition duration-700
                        {{ $history['color'] === 'blue'
                            ? 'bg-blue-300/30'
                            : 'bg-yellow-300/30' }}">
                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>