<section class="relative py-24 bg-white overflow-hidden">

    {{-- ===================================================== --}}
    {{-- Background Decoration --}}
    {{-- ===================================================== --}}
    <div class="absolute inset-0 -z-10">

        {{-- Blur Biru --}}
        <div class="absolute -left-40 top-0 w-[500px] h-[500px] rounded-full bg-blue-200/20 blur-[140px]"></div>

        {{-- Blur Kuning --}}
        <div class="absolute -right-40 bottom-0 w-[500px] h-[500px] rounded-full bg-yellow-200/20 blur-[140px]"></div>

        {{-- Grid --}}
        <div class="absolute inset-0 opacity-[0.03]"
            style="background-image: linear-gradient(#0f172a 1px, transparent 1px),
            linear-gradient(to right,#0f172a 1px,transparent 1px);
            background-size:60px 60px;">
        </div>

    </div>

    <div class="max-w-7xl mx-auto px-6">

        {{-- ===================================================== --}}
        {{-- Heading --}}
        {{-- ===================================================== --}}

        <div class="text-center mb-20" data-aos="fade-up">

            <span class="uppercase tracking-[5px] text-blue-700 font-semibold">

                Tentang Kami

            </span>

            <h2 class="mt-3 text-5xl font-bold text-slate-800">

                Mengenal Program Studi TOE

            </h2>

            <div class="w-24 h-1 bg-yellow-400 rounded-full mx-auto mt-6"></div>

        </div>

        {{-- ===================================================== --}}
        {{-- Content --}}
        {{-- ===================================================== --}}

        <div class="grid lg:grid-cols-2 gap-14 items-start">

            {{-- ===================================================== --}}
            {{-- LEFT SIDE --}}
            {{-- ===================================================== --}}

            <div data-aos="fade-right">

                {{-- IMAGE --}}
                <div class="overflow-hidden rounded-3xl shadow-2xl">

                    <img
                        src="{{ asset('assets/images/about.png') }}"
                        alt="Program Studi TOE"
                        class="w-full h-[470px] object-cover hover:scale-105 duration-700">

                </div>

                {{-- ===================================================== --}}
                {{-- STATISTIC CARD --}}
                {{-- Part 2 dimulai dari sini --}}
                                <div class="grid grid-cols-2 gap-5 mt-8">

                    {{-- Tahun Berdiri --}}
                    <div
                        class="group bg-white rounded-2xl p-6 shadow-lg border border-slate-100 hover:-translate-y-2 hover:shadow-2xl transition-all duration-500">

                        <div
                            class="w-16 h-16 rounded-full bg-blue-50 flex items-center justify-center mb-5 group-hover:bg-blue-600 transition">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-8 h-8 text-blue-600 group-hover:text-white transition"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>

                            </svg>

                        </div>

                        <h3 class="text-4xl font-bold text-blue-700">

                            2004

                        </h3>

                        <h4 class="mt-2 font-semibold text-slate-800">

                            Tahun Berdiri

                        </h4>

                        <p class="mt-2 text-sm text-slate-500 leading-6">

                            Mulai dikembangkan pada
                            tahun akademik 2004/2005.

                        </p>

                    </div>

                    {{-- Akreditasi --}}
                    <div
                        class="group bg-white rounded-2xl p-6 shadow-lg border border-slate-100 hover:-translate-y-2 hover:shadow-2xl transition-all duration-500">

                        <div
                            class="w-16 h-16 rounded-full bg-yellow-50 flex items-center justify-center mb-5 group-hover:bg-yellow-400 transition">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-8 h-8 text-yellow-500 group-hover:text-white transition"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 8c-1.657 0-3 1.343-3 3a3 3 0 006 0c0-1.657-1.343-3-3-3zm0 0V4m0 8l4 8m-4-8l-4 8"/>

                            </svg>

                        </div>

                        <h3 class="text-4xl font-bold text-yellow-500">

                            UNGGUL

                        </h3>

                        <h4 class="mt-2 font-semibold text-slate-800">

                            Akreditasi

                        </h4>

                        <p class="mt-2 text-sm text-slate-500 leading-6">

                            Telah memperoleh
                            Akreditasi Unggul dari
                            lembaga akreditasi nasional.

                        </p>

                    </div>

                    {{-- Gelar --}}
                    <div
                        class="group bg-white rounded-2xl p-6 shadow-lg border border-slate-100 hover:-translate-y-2 hover:shadow-2xl transition-all duration-500">

                        <div
                            class="w-16 h-16 rounded-full bg-blue-50 flex items-center justify-center mb-5 group-hover:bg-blue-600 transition">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-8 h-8 text-blue-600 group-hover:text-white transition"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m0-6l6-3"/>

                            </svg>

                        </div>

                        <h3 class="text-4xl font-bold text-blue-700">

                            S.Tr.T

                        </h3>

                        <h4 class="mt-2 font-semibold text-slate-800">

                            Gelar Lulusan

                        </h4>

                        <p class="mt-2 text-sm text-slate-500 leading-6">

                            Sarjana Terapan Teknik
                            (S.Tr.T.)

                        </p>

                    </div>

                    {{-- Masa Studi --}}
                    <div
                        class="group bg-white rounded-2xl p-6 shadow-lg border border-slate-100 hover:-translate-y-2 hover:shadow-2xl transition-all duration-500">

                        <div
                            class="w-16 h-16 rounded-full bg-blue-50 flex items-center justify-center mb-5 group-hover:bg-blue-600 transition">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-8 h-8 text-blue-600 group-hover:text-white transition"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>

                            </svg>

                        </div>

                        <h3 class="text-4xl font-bold text-blue-700">

                            4 Tahun

                        </h3>

                        <h4 class="mt-2 font-semibold text-slate-800">

                            Masa Studi

                        </h4>

                        <p class="mt-2 text-sm text-slate-500 leading-6">

                            Waktu tempuh pendidikan
                            selama 4 tahun
                            (8 semester).

                        </p>

                    </div>

                </div>

            </div>

            {{-- ===================================================== --}}
            {{-- RIGHT SIDE --}}
            {{-- Part 3 dimulai dari sini --}}
                        <div data-aos="fade-left">

                {{-- Title --}}
                <span class="uppercase tracking-[4px] text-blue-700 font-semibold">

                    Profile Singkat

                </span>

                <!-- <h3 class="mt-3 text-4xl font-bold text-slate-800 leading-tight">

                    Membangun Engineer Otomotif
                    yang Siap Menghadapi
                    Transformasi Industri

                </h3> -->

                <div class="w-24 h-1 bg-yellow-400 rounded-full mt-6 mb-10"></div>

                {{-- Content --}}
                <div class="space-y-7 text-slate-600 leading-9 text-justify">

                    <p>

                        Program Studi <strong>Teknik Otomotif Elektronik (TOE)</strong>
                        Politeknik Negeri Malang merupakan salah satu program studi
                        unggulan yang mulai dikembangkan pada tahun akademik
                        <strong>2004/2005</strong>. Program ini lahir sebagai jawaban atas
                        kebutuhan industri akan tenaga profesional di bidang otomotif
                        yang mampu mengikuti perkembangan teknologi digital,
                        elektrifikasi kendaraan, dan sistem otomotif modern.

                    </p>

                    <p>

                        Pada awal penyelenggaraannya, TOE dibuka sebagai bagian dari
                        pengembangan program alih jenjang dari <strong>D-III ke D-IV</strong>
                        dan secara resmi memperoleh izin penyelenggaraan melalui
                        <strong>Surat Keputusan Dirjen DIKTI Nomor 2964/D/T/2005</strong>
                        tanggal 29 Agustus 2005. Sejak saat itu, program studi terus
                        berkembang baik dari sisi akademik maupun fasilitas
                        pendukung pembelajaran.

                    </p>

                    <p>

                        Kurikulum TOE dirancang mengikuti perkembangan dunia
                        industri otomotif. Materi pembelajaran tidak hanya mencakup
                        sistem mekanik kendaraan, tetapi juga teknologi
                        <strong>Electronic Control Unit (ECU)</strong>, sensor dan aktuator,
                        kendaraan listrik (<strong>Electric Vehicle</strong>), autonomous
                        vehicle, hingga penerapan <strong>Internet of Things (IoT)</strong>
                        pada kendaraan cerdas.

                    </p>

                    <p>

                        Dalam mendukung proses pembelajaran, TOE Polinema menjalin
                        kolaborasi dengan berbagai industri otomotif serta lembaga
                        penelitian. Dukungan laboratorium modern, ruang praktik yang
                        representatif, serta fasilitas pembelajaran berbasis teknologi
                        menjadi bagian penting dalam menciptakan pengalaman belajar
                        yang aplikatif dan sesuai kebutuhan dunia kerja.

                    </p>

                    <p>

                        Hingga tahun <strong>2025</strong>, Program Studi Teknik Otomotif
                        Elektronik telah memperoleh <strong>Akreditasi Unggul</strong>
                        sebagai bentuk pengakuan atas kualitas pendidikan yang
                        diberikan. Dengan semangat inovasi yang berkelanjutan,
                        TOE Polinema berkomitmen mencetak lulusan yang kompeten,
                        profesional, adaptif terhadap perkembangan teknologi,
                        serta mampu bersaing pada era transformasi otomotif menuju
                        elektrifikasi, digitalisasi, dan <strong>smart mobility</strong>.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>