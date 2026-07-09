<section class="relative py-24 bg-slate-50 overflow-hidden">

    {{-- Background Decoration --}}
    <div class="absolute inset-0 pointer-events-none">

        <div class="absolute -left-40 top-20 w-[520px] h-[520px] rounded-full bg-blue-200/30 blur-[150px]"></div>

        <div class="absolute -right-40 bottom-20 w-[520px] h-[520px] rounded-full bg-yellow-200/30 blur-[150px]"></div>

        <div class="absolute inset-0 opacity-[0.035]"
            style="background-image: linear-gradient(#0f172a 1px, transparent 1px),
            linear-gradient(to right,#0f172a 1px,transparent 1px);
            background-size:70px 70px;">
        </div>

    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-14 items-center">

            {{-- Text --}}
            <div data-aos="fade-right">

                <span class="uppercase tracking-[5px] text-blue-700 font-semibold">
                    Video Profil
                </span>

                <h2 class="mt-4 text-4xl md:text-5xl font-bold text-slate-800 leading-tight">
                    Sambutan Kepala Program Studi D-III Teknik Mesin
                </h2>

                <div class="w-24 h-1 bg-yellow-400 rounded-full mt-6 mb-8"></div>

                <p class="text-slate-600 leading-8 text-justify">
                    Video profil ini disampaikan oleh Kepala Program Studi D-III Teknik Mesin,
                    Ibu Lisa Agustriyana, S.T., M.T., sebagai pengenalan mengenai Program Studi
                    D-III Teknik Mesin Politeknik Negeri Malang.
                </p>

                <p class="mt-6 text-slate-600 leading-8 text-justify">
                    Melalui video ini, pengunjung dapat mengenal lebih dekat arah pengembangan
                    program studi, proses pembelajaran vokasi, fasilitas pendukung, serta komitmen
                    Program Studi D-III Teknik Mesin dalam menghasilkan lulusan yang kompeten,
                    profesional, dan siap menghadapi kebutuhan dunia industri.
                </p>

                <div class="mt-8 flex flex-wrap gap-3">

                    <span class="px-4 py-2 rounded-xl bg-blue-700 text-white text-sm font-semibold shadow">
                        Kepala Program Studi
                    </span>

                    <span class="px-4 py-2 rounded-xl bg-white border border-slate-200 text-slate-700 text-sm font-semibold shadow-sm">
                        D-III Teknik Mesin
                    </span>

                    <span class="px-4 py-2 rounded-xl bg-yellow-400 text-slate-900 text-sm font-semibold shadow">
                        Polinema
                    </span>

                </div>

            </div>

            {{-- Video --}}
            {{-- Video --}}
            <div class="relative" data-aos="fade-left">

                {{-- Decorative Background --}}
                <div class="absolute -top-10 -right-10 w-44 h-44 rounded-full bg-blue-300/30 blur-3xl"></div>
                <div class="absolute -bottom-10 -left-10 w-44 h-44 rounded-full bg-yellow-300/40 blur-3xl"></div>

                {{-- Main Video Card --}}
                <div class="relative max-w-md mx-auto">

                    {{-- Floating Label --}}
                    <div class="absolute -top-5 left-6 z-20 px-5 py-3 rounded-2xl bg-white shadow-xl border border-slate-100">
                        <p class="text-xs font-bold text-blue-700 uppercase tracking-wider">
                            Video Profil
                        </p>
                        <p class="text-sm font-semibold text-slate-700">
                            Kepala Program Studi
                        </p>
                    </div>

                    {{-- Video Frame --}}
                    <div class="relative rounded-[2rem] bg-white/80 backdrop-blur-xl border border-white shadow-2xl p-4 overflow-hidden">

                        {{-- Top Accent --}}
                        <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-blue-700 via-yellow-400 to-blue-700"></div>

                        {{-- Video --}}
                        <div class="relative mt-3 rounded-[1.5rem] overflow-hidden bg-slate-100 shadow-inner">

                            <video
                                class="w-full h-[620px] object-cover"
                                controls
                                playsinline
                                preload="metadata">

                                <source src="{{ asset('assets/videos/profile-d3-teknik-mesin.mp4') }}" type="video/mp4">

                                Browser Anda tidak mendukung pemutar video.

                            </video>

                        </div>

                        {{-- Bottom Info --}}
                        <div class="mt-5 flex items-center gap-4">

                            <div class="w-12 h-12 rounded-2xl bg-blue-700 text-white flex items-center justify-center shadow-lg">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M14.752 11.168l-5.197-3.027A1 1 0 008 9.027v5.946a1 1 0 001.555.832l5.197-2.973a1 1 0 000-1.664z" />

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                            </div>

                            <div>
                                <h3 class="font-bold text-slate-800">
                                    Sambutan Kaprodi
                                </h3>

                                <p class="text-sm text-slate-500">
                                    Ibu Lisa Agustriyana, S.T., M.T.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>