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
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">

            <span class="uppercase tracking-[5px] text-blue-700 font-semibold">
                Kompetensi Lulusan
            </span>

            <h2 class="mt-4 text-4xl md:text-5xl font-bold text-slate-800 leading-tight">
                CP Lulusan
            </h2>

            <div class="w-24 h-1 bg-yellow-400 rounded-full mx-auto mt-6"></div>

        </div>

        @php
            $cpls = [
                'Lulusan yang mampu ngidentifikasi dan menerapkan pengetahuan dalam bidang matematika, ilmu pengetahuan alam, komputasi, dasar-dasar teknik yang relevan dengan bidang otomotif dan elektronik.',
                'Lulusan yang mampu menggunakan alat ukur dan alat uji  yang relevan dalam mengidentifikasi masalah di bidang otomotif elektronik.',
                'Lulusan yang mampu berpikir kritis dalam merancang komponen atau sistem dengan tujuan memecahkan masalah di bidang otomotif elektronik, yang terdefinisi secara luas (broadly-defined) dengan mempertimbangkan kesehatan dan keselamatan publik, lingkungan (net zero carbon), dan berorientasi kewirausahaan',
                'Lulusan mampu memilah literatur dan mengatur data yang relevan dalam merancang dan melakukan eksperimen dalam bidang otomotif elektronik',
                'Lulusan mampu menerapkan pendekatan prediktif dan pemodelan berbasis teknologi untuk mengatasi keterbatasan dari sumber daya di bidang otomotif dan elektronik',
                'Lulusan mampu mengevaluasi dampak keberlanjutan (sosial, ekonomi, lingkungan, K3, hukum) dari solusi rekayasa otomotif elektronik, didukung oleh pembelajaran mandiri dan sepanjang hayat.',
                'Lulusan mampu mematuhi etika profesi dan norma mengacu pada kultur sosial sesuai dengan profesionalisme di lingkungan kerja',
                'Lulusan mampu memanajemen dan bekerjasama dalam tim baik sebagai anggota atau pemimpin dalam berbagai pengaturan kerja.',
                'Lulusan mampu berkomunikasi secara lisan maupun tulisan baik dalam Bahasa Indonesia maupun Bahasa internasional yang sesuai dengan kaidah tata Bahasa yang baik.',
                'Lulusan mampu menjunjung tinggi nilai kemanusiaan dalam menjalankan tugas berdasarkan agama, moral, etika dan Pancasila',
                'Lulusan mampu melakukan prosedur oprasional di bengkel kerja/studio dan laboratorium serta melakukan prinsip pelaksanaan keselamatan dan Kesehatan kerja dan dengan mengacu kepada metode dan standar industri',
            ];
        @endphp

        {{-- CP List --}}
        <div class="relative">

            {{-- Vertical Accent Line Desktop --}}
            <div class="hidden lg:block absolute left-1/2 top-0 bottom-0 w-[2px] bg-gradient-to-b from-blue-700 via-yellow-400 to-blue-700 opacity-30"></div>

            <div class="grid lg:grid-cols-2 gap-x-16 gap-y-8">

                @foreach ($cpls as $index => $cpl)

                    <div
                        data-aos="fade-up"
                        data-aos-delay="{{ $index * 60 }}"
                        class="group relative">

                        <div class="flex gap-5">

                            {{-- Number --}}
                            <div class="shrink-0">

                                <div
                                    class="w-14 h-14 rounded-2xl flex items-center justify-center font-bold shadow-md transition-all duration-500 group-hover:-translate-y-1 group-hover:shadow-xl
                                    {{ $index % 2 === 0
                                        ? 'bg-blue-700 text-white'
                                        : 'bg-yellow-400 text-slate-900' }}">

                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}

                                </div>

                            </div>

                            {{-- Text --}}
                            <div class="flex-1 pb-8 border-b border-slate-200">

                                <p class="text-slate-700 leading-8 text-justify">
                                    {{ $cpl }}
                                </p>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</section>