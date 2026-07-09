<section class="relative py-24 bg-white overflow-hidden">

    {{-- Background Decoration --}}
    <div class="absolute inset-0 pointer-events-none">

        <div class="absolute -left-40 top-20 w-[500px] h-[500px] rounded-full bg-blue-200/20 blur-[140px]"></div>

        <div class="absolute -right-40 bottom-20 w-[500px] h-[500px] rounded-full bg-yellow-200/20 blur-[140px]"></div>

        <div class="absolute inset-0 opacity-[0.03]"
            style="background-image: linear-gradient(#0f172a 1px, transparent 1px),
            linear-gradient(to right,#0f172a 1px,transparent 1px);
            background-size:70px 70px;">
        </div>

    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6">

        {{-- Heading --}}
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">

            <span class="uppercase tracking-[5px] text-blue-700 font-semibold">
                Fasilitas Pembelajaran
            </span>

            <h2 class="mt-4 text-4xl md:text-5xl font-bold text-slate-800 leading-tight">
                Penunjang Pendidikan Vokasi
            </h2>

            <div class="w-24 h-1 bg-yellow-400 rounded-full mx-auto mt-6"></div>

            <p class="mt-7 text-slate-600 leading-8">
                Program Studi D-III Teknik Mesin memiliki fasilitas pembelajaran yang
                mendukung kegiatan teori, praktik, pengujian, perawatan, produksi,
                serta pengembangan keterampilan teknis mahasiswa.
            </p>

        </div>

        {{-- Facility Cards --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-7">

            {{-- Workshop --}}
            <div class="group relative rounded-3xl bg-white border border-slate-100 shadow-lg p-7 overflow-hidden hover:-translate-y-2 hover:shadow-2xl transition-all duration-500"
                data-aos="fade-up">

                <div class="absolute -right-12 -top-12 w-36 h-36 rounded-full bg-blue-100 group-hover:bg-yellow-100 transition"></div>

                <div class="relative">

                    <div class="w-16 h-16 rounded-2xl bg-blue-700 text-white flex items-center justify-center mb-6 shadow-lg group-hover:bg-yellow-400 group-hover:text-slate-900 transition">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-8 h-8"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.83-5.83M11.42 15.17l2.12-2.12M11.42 15.17l-4.95 4.95a2.652 2.652 0 01-3.75-3.75l4.95-4.95m5.87 1.63l-2.12-2.12m2.12 2.12l4.95-4.95a2.652 2.652 0 00-3.75-3.75l-4.95 4.95m1.63 1.63L5.59 5.1" />
                        </svg>

                    </div>

                    <span class="inline-block px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold mb-4">
                        Praktik Utama
                    </span>

                    <h3 class="text-2xl font-bold text-slate-800">
                        Workshop
                    </h3>

                    <p class="mt-4 text-slate-600 leading-8 text-justify">
                        Workshop digunakan sebagai ruang praktik utama mahasiswa dalam
                        mengembangkan keterampilan teknis di bidang produksi, manufaktur,
                        perawatan, perakitan, dan penggunaan peralatan kerja teknik mesin.
                    </p>

                </div>

            </div>

            {{-- Laboratorium --}}
            <div class="group relative rounded-3xl bg-white border border-slate-100 shadow-lg p-7 overflow-hidden hover:-translate-y-2 hover:shadow-2xl transition-all duration-500"
                data-aos="fade-up"
                data-aos-delay="100">

                <div class="absolute -right-12 -top-12 w-36 h-36 rounded-full bg-yellow-100 group-hover:bg-blue-100 transition"></div>

                <div class="relative">

                    <div class="w-16 h-16 rounded-2xl bg-yellow-400 text-slate-900 flex items-center justify-center mb-6 shadow-lg group-hover:bg-blue-700 group-hover:text-white transition">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-8 h-8"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 3v6l-5 8a3 3 0 002.6 4.5h10.8A3 3 0 0020 17l-5-8V3M9 3h6M9 9h6" />
                        </svg>

                    </div>

                    <span class="inline-block px-3 py-1 rounded-full bg-yellow-50 text-yellow-700 text-xs font-semibold mb-4">
                        Praktikum & Pengujian
                    </span>

                    <h3 class="text-2xl font-bold text-slate-800">
                        Laboratorium
                    </h3>

                    <p class="mt-4 text-slate-600 leading-8 text-justify">
                        Laboratorium mendukung kegiatan praktikum, pengujian,
                        pengukuran, desain, simulasi, serta penerapan teknologi
                        teknik mesin yang relevan dengan kebutuhan industri.
                    </p>

                </div>

            </div>

            {{-- Ruang Kelas --}}
            <div class="group relative rounded-3xl bg-white border border-slate-100 shadow-lg p-7 overflow-hidden hover:-translate-y-2 hover:shadow-2xl transition-all duration-500"
                data-aos="fade-up"
                data-aos-delay="200">

                <div class="absolute -right-12 -top-12 w-36 h-36 rounded-full bg-blue-100 group-hover:bg-yellow-100 transition"></div>

                <div class="relative">

                    <div class="w-16 h-16 rounded-2xl bg-blue-700 text-white flex items-center justify-center mb-6 shadow-lg group-hover:bg-yellow-400 group-hover:text-slate-900 transition">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-8 h-8"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 6.253v13M12 6.253C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253M12 6.253C13.168 5.477 14.754 5 16.5 5S19.832 5.477 21 6.253v13C19.832 18.477 18.246 18 16.5 18s-3.332.477-4.5 1.253" />
                        </svg>

                    </div>

                    <span class="inline-block px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold mb-4">
                        Pembelajaran Teori
                    </span>

                    <h3 class="text-2xl font-bold text-slate-800">
                        Ruang Kelas
                    </h3>

                    <p class="mt-4 text-slate-600 leading-8 text-justify">
                        Ruang kelas digunakan untuk mendukung pembelajaran teori,
                        diskusi, presentasi, dan penguatan konsep dasar maupun
                        terapan di bidang teknik mesin.
                    </p>

                </div>

            </div>

            {{-- Galeri --}}
            <div class="group relative rounded-3xl bg-white border border-slate-100 shadow-lg p-7 overflow-hidden hover:-translate-y-2 hover:shadow-2xl transition-all duration-500"
                data-aos="fade-up"
                data-aos-delay="300">

                <div class="absolute -right-12 -top-12 w-36 h-36 rounded-full bg-yellow-100 group-hover:bg-blue-100 transition"></div>

                <div class="relative">

                    <div class="w-16 h-16 rounded-2xl bg-yellow-400 text-slate-900 flex items-center justify-center mb-6 shadow-lg group-hover:bg-blue-700 group-hover:text-white transition">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-8 h-8"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H4v-2a4 4 0 015-3.87M12 12a4 4 0 100-8 4 4 0 000 8zm6 8a6 6 0 00-12 0" />
                        </svg>

                    </div>

                    <span class="inline-block px-3 py-1 rounded-full bg-yellow-50 text-yellow-700 text-xs font-semibold mb-4">
                        Aktivitas Mahasiswa
                    </span>

                    <h3 class="text-2xl font-bold text-slate-800">
                        Galeri
                    </h3>

                    <p class="mt-4 text-slate-600 leading-8 text-justify">
                        Galeri menampilkan dokumentasi aktivitas mahasiswa di lingkungan kampus,
                        kegiatan praktikum, proyek mahasiswa, kunjungan industri, organisasi,
                        serta kegiatan akademik dan non-akademik Program Studi D-III Teknik Mesin.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>