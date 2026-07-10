<section class="relative py-24 bg-gradient-to-br from-slate-950 via-[#06172E] to-blue-950 overflow-hidden">

    {{-- Background Decoration --}}
    <div class="absolute inset-0 pointer-events-none">

        <div class="absolute -top-40 -right-40 w-[520px] h-[520px] rounded-full bg-blue-500/20 blur-[140px]"></div>

        <div class="absolute -bottom-40 -left-40 w-[520px] h-[520px] rounded-full bg-yellow-400/20 blur-[140px]"></div>

        <div
            class="absolute inset-0 opacity-[0.08]"
            style="background-image: linear-gradient(#ffffff 1px, transparent 1px),
            linear-gradient(to right,#ffffff 1px,transparent 1px);
            background-size:70px 70px;">
        </div>

    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6">

        {{-- Heading --}}
        <div class="grid lg:grid-cols-12 gap-10 items-center">

            {{-- Text --}}
            <div class="lg:col-span-5" data-aos="fade-right">

                <span class="uppercase tracking-[5px] text-yellow-300 font-semibold">
                    Denah Gedung
                </span>

                <h2 class="mt-4 text-4xl md:text-5xl font-bold text-white leading-tight">
                    Informasi Tata Ruang Gedung Teknik Mesin
                </h2>

                <div class="w-24 h-1 bg-yellow-400 rounded-full mt-6"></div>

                <p class="mt-7 text-white/75 leading-8 text-justify">
                    Denah gedung digunakan sebagai informasi pendukung untuk membantu
                    mahasiswa, dosen, tenaga kependidikan, dan pengunjung dalam mengenali
                    tata letak ruang pembelajaran, laboratorium, workshop, ruang dosen,
                    ruang administrasi, serta fasilitas pendukung lainnya di lingkungan
                    Teknik Mesin.
                </p>

                <div class="mt-8 grid sm:grid-cols-2 gap-4">

                    <div class="rounded-3xl bg-white/10 border border-white/15 backdrop-blur p-5">

                        <div class="w-12 h-12 rounded-2xl bg-yellow-400 text-slate-900 flex items-center justify-center shadow-lg">
                            <i class="fa-solid fa-layer-group text-xl"></i>
                        </div>

                        <h3 class="mt-4 text-xl font-bold text-white">
                            Multi Lantai
                        </h3>

                        <p class="mt-2 text-sm text-white/65 leading-6">
                            Mencakup denah basement, ground, dasar, dan lantai atas.
                        </p>

                    </div>

                    <div class="rounded-3xl bg-white/10 border border-white/15 backdrop-blur p-5">

                        <div class="w-12 h-12 rounded-2xl bg-blue-500 text-white flex items-center justify-center shadow-lg">
                            <i class="fa-solid fa-map-location-dot text-xl"></i>
                        </div>

                        <h3 class="mt-4 text-xl font-bold text-white">
                            Panduan Lokasi
                        </h3>

                        <p class="mt-2 text-sm text-white/65 leading-6">
                            Membantu mengetahui posisi ruang, laboratorium, dan fasilitas.
                        </p>

                    </div>

                </div>

                <div class="mt-9 flex flex-col sm:flex-row gap-4">

                    <a href="{{ asset('assets/documents/denah-gedung-teknik-mesin.pdf') }}"
                        target="_blank"
                        class="inline-flex items-center justify-center gap-3 px-7 py-4 rounded-2xl bg-yellow-400 text-slate-900 font-bold hover:bg-yellow-300 transition shadow-lg shadow-yellow-400/20">

                        <i class="fa-solid fa-eye"></i>
                        Lihat Denah
                    </a>

                    <a href="{{ asset('assets/documents/denah-gedung-teknik-mesin.pdf') }}"
                        download
                        class="inline-flex items-center justify-center gap-3 px-7 py-4 rounded-2xl bg-white/10 border border-white/15 text-white font-bold hover:bg-white/20 transition">

                        <i class="fa-solid fa-download"></i>
                        Download PDF
                    </a>

                </div>

            </div>


            {{-- Preview --}}
            <div class="lg:col-span-7" data-aos="fade-left">

                <div class="relative">

                    {{-- Floating Badge --}}
                    <div class="absolute -top-6 left-6 z-20 hidden md:block rounded-2xl bg-white shadow-2xl border border-slate-100 px-5 py-4">

                        <p class="text-xs font-bold text-blue-700 uppercase tracking-wider">
                            Preview Denah
                        </p>

                        <p class="text-sm font-semibold text-slate-700">
                            Gedung Teknik Mesin
                        </p>

                    </div>

                    {{-- PDF Card --}}
                    <div class="rounded-[2.5rem] bg-white/95 backdrop-blur border border-white/20 shadow-2xl overflow-hidden">

                        <div class="h-2 bg-gradient-to-r from-blue-700 via-yellow-400 to-blue-700"></div>

                        {{-- Desktop PDF Preview --}}
                        <div class="hidden md:block p-5 bg-slate-100">

                            <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-inner">

                                <iframe
                                    src="{{ asset('assets/documents/denah-gedung-teknik-mesin.pdf') }}#toolbar=1&navpanes=0&scrollbar=1"
                                    class="w-full h-[620px]"
                                    title="Denah Gedung Teknik Mesin">
                                </iframe>

                            </div>

                        </div>

                        {{-- Mobile Placeholder --}}
                        <div class="md:hidden p-7 text-center bg-white">

                            <div class="w-20 h-20 mx-auto rounded-3xl bg-blue-100 text-blue-700 flex items-center justify-center">
                                <i class="fa-solid fa-file-pdf text-4xl"></i>
                            </div>

                            <h3 class="mt-5 text-2xl font-bold text-slate-800">
                                Denah Gedung
                            </h3>

                            <p class="mt-3 text-slate-500 leading-7">
                                Preview PDF lebih nyaman dibuka melalui tombol lihat denah
                                agar tampilan mobile tetap ringan.
                            </p>

                            <a href="{{ asset('assets/documents/denah-gedung-teknik-mesin.pdf') }}"
                                target="_blank"
                                class="mt-6 inline-flex items-center justify-center gap-3 px-6 py-4 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">

                                <i class="fa-solid fa-up-right-from-square"></i>
                                Buka PDF
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>