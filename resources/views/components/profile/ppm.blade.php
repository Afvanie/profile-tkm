<section class="relative py-24 overflow-hidden bg-white">

    {{-- Background Decoration --}}
    {{-- Background Decoration Polinema --}}
<div class="absolute inset-0 pointer-events-none overflow-hidden">

    {{-- Soft Gradient Blur --}}
    <div class="absolute -top-40 -right-40 w-[520px] h-[520px] rounded-full bg-blue-200/25 blur-[140px]"></div>

    <div class="absolute -bottom-40 -left-40 w-[520px] h-[520px] rounded-full bg-yellow-200/25 blur-[140px]"></div>

    {{-- Grid Blueprint --}}
    <div
        class="absolute inset-0 opacity-[0.025]"
        style="background-image: linear-gradient(#0f172a 1px, transparent 1px),
        linear-gradient(to right,#0f172a 1px,transparent 1px);
        background-size:70px 70px;">
    </div>

    {{-- Watermark Logo Polinema --}}
    <img
        src="{{ asset('assets/images/logo-polinema.png') }}"
        alt=""
        class="absolute right-[-120px] top-1/2 -translate-y-1/2 w-[560px] opacity-[0.035] grayscale">

    {{-- Big Text Watermark --}}
    <div
        class="absolute left-6 top-16 text-[120px] md:text-[180px] font-black tracking-tight text-slate-900/5 leading-none select-none">
        POLINEMA
    </div>

    {{-- Simple Building Sketch --}}
    <svg
        class="absolute bottom-0 left-0 w-[620px] opacity-[0.06]"
        viewBox="0 0 700 280"
        fill="none"
        xmlns="http://www.w3.org/2000/svg">

        <path
            d="M40 240H660"
            stroke="#0F172A"
            stroke-width="3"
            stroke-linecap="round" />

        <path
            d="M120 240V100L350 35L580 100V240"
            stroke="#0F172A"
            stroke-width="3"
            stroke-linejoin="round" />

        <path
            d="M170 240V125H245V240"
            stroke="#0F172A"
            stroke-width="2" />

        <path
            d="M310 240V125H390V240"
            stroke="#0F172A"
            stroke-width="2" />

        <path
            d="M455 240V125H530V240"
            stroke="#0F172A"
            stroke-width="2" />

        <path
            d="M210 85H490"
            stroke="#0F172A"
            stroke-width="2"
            stroke-linecap="round" />

        <path
            d="M350 35V240"
            stroke="#0F172A"
            stroke-width="2"
            stroke-dasharray="8 10" />

    </svg>

</div>

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-12 gap-14 items-start">

            {{-- LEFT INTRO --}}
            <div class="lg:col-span-4" data-aos="fade-right">

                <span class="uppercase tracking-[5px] text-blue-700 font-semibold">
                    Profil Lulusan
                </span>

                <h2 class="mt-4 text-4xl md:text-5xl font-bold text-slate-800 leading-tight">
                    Profil Profesional Mandiri
                </h2>

                <div class="w-24 h-1 bg-yellow-400 rounded-full mt-6 mb-8"></div>

                <p class="text-slate-600 leading-8 text-justify">
                    Profil Profesional Mandiri menggambarkan karakter utama lulusan
                    Program Studi Teknik Otomotif Elektronik dalam menjalankan peran
                    profesional di masyarakat, dunia kerja, dan perkembangan teknologi.
                </p>

                <div class="mt-10 hidden lg:block">

                    <div class="h-[2px] w-full bg-gradient-to-r from-blue-700 via-yellow-400 to-transparent"></div>

                    <p class="mt-5 text-sm text-slate-500 leading-7">
                        PPM menjadi dasar pembentukan lulusan yang tidak hanya unggul
                        secara teknis, tetapi juga memiliki etika, kreativitas,
                        kemampuan berkontribusi, dan kesiapan berkembang secara berkelanjutan.
                    </p>

                </div>

            </div>

            {{-- RIGHT CONTENT --}}
            <div class="lg:col-span-8" data-aos="fade-left">

                <div class="space-y-0">

                    {{-- ITEM 1 --}}
                    <div class="group border-b border-slate-200 pb-10">

                        <div class="grid md:grid-cols-12 gap-6">

                            <div class="md:col-span-2">

                                <span class="text-5xl font-black text-blue-100 group-hover:text-blue-200 transition">
                                    01
                                </span>

                            </div>

                            <div class="md:col-span-10">

                                <div class="flex items-center gap-4 mb-4">

                                    <div class="w-3 h-3 rounded-full bg-blue-700"></div>

                                    <span class="text-sm uppercase tracking-[3px] text-blue-700 font-semibold">
                                        Etika & Karakter
                                    </span>

                                </div>

                                <h3 class="text-2xl md:text-3xl font-bold text-slate-800">
                                    Profesional Beretika
                                </h3>

                                <p class="mt-5 text-slate-600 leading-8 text-justify">
                                    Profesional yang memiliki sikap dan etika yang baik
                                    serta menjunjung tinggi nilai kemanusiaan berdasarkan
                                    agama, moral, dan Pancasila.
                                </p>

                            </div>

                        </div>

                    </div>

                    {{-- ITEM 2 --}}
                    <div class="group border-b border-slate-200 py-10">

                        <div class="grid md:grid-cols-12 gap-6">

                            <div class="md:col-span-2">

                                <span class="text-5xl font-black text-yellow-100 group-hover:text-yellow-200 transition">
                                    02
                                </span>

                            </div>

                            <div class="md:col-span-10">

                                <div class="flex items-center gap-4 mb-4">

                                    <div class="w-3 h-3 rounded-full bg-yellow-400"></div>

                                    <span class="text-sm uppercase tracking-[3px] text-yellow-600 font-semibold">
                                        Kontribusi & Inovasi
                                    </span>

                                </div>

                                <h3 class="text-2xl md:text-3xl font-bold text-slate-800">
                                    Profesional Aktif dan Inovatif
                                </h3>

                                <p class="mt-5 text-slate-600 leading-8 text-justify">
                                    Profesional yang mampu berkontribusi secara aktif
                                    dan inovatif dalam kancah nasional dan internasional
                                    sebagai sarjana terapan yang profesional di bidang
                                    Teknik Otomotif Elektronik.
                                </p>

                            </div>

                        </div>

                    </div>

                    {{-- ITEM 3 --}}
                    <div class="group pt-10">

                        <div class="grid md:grid-cols-12 gap-6">

                            <div class="md:col-span-2">

                                <span class="text-5xl font-black text-blue-100 group-hover:text-blue-200 transition">
                                    03
                                </span>

                            </div>

                            <div class="md:col-span-10">

                                <div class="flex items-center gap-4 mb-4">

                                    <div class="w-3 h-3 rounded-full bg-blue-700"></div>

                                    <span class="text-sm uppercase tracking-[3px] text-blue-700 font-semibold">
                                        Kreatif & Adaptif
                                    </span>

                                </div>

                                <h3 class="text-2xl md:text-3xl font-bold text-slate-800">
                                    Profesional Kreatif dan Adaptif
                                </h3>

                                <p class="mt-5 text-slate-600 leading-8 text-justify">
                                    Profesional yang mampu berpikir kreatif, mampu
                                    memecahkan masalah dan mengembangkan solusi unik,
                                    beradaptasi dengan perkembangan teknologi, serta
                                    mengembangkan diri secara berkelanjutan di bidang
                                    Teknik Otomotif Elektronik.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>