<section class="relative h-[60vh] flex items-center overflow-hidden">

    {{-- Background Image --}}
    <div class="absolute inset-0 bg-[#003B73]">

        <div
            class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('{{ asset('assets/images/fasilitas-banner.jpg') }}');">
        </div>

        {{-- Overlay gradasi seperti screenshot --}}
        <div
            class="absolute inset-0"
            style="background: linear-gradient(
                90deg,
                rgba(0, 59, 115, 0.28) 0%,
                rgba(0, 91, 172, 0.58) 42%,
                rgba(0, 59, 115, 0.90) 100%
            );">
        </div>

        {{-- Layer biru lembut agar menyatu --}}
        <div
            class="absolute inset-0"
            style="background: linear-gradient(
                180deg,
                rgba(0, 43, 85, 0.08) 0%,
                rgba(0, 43, 85, 0.20) 100%
            );">
        </div>

    </div>

    {{-- Grid Decoration --}}
    <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(255,255,255,.08)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,.08)_1px,transparent_1px)] bg-[size:70px_70px]"></div>

    {{-- Soft Blur --}}
    <div class="absolute -left-32 bottom-0 w-96 h-96 rounded-full bg-yellow-400/20 blur-[120px]"></div>

    {{-- Content --}}
    <div class="relative z-10 max-w-7xl mx-auto px-6 w-full">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-white/80 text-sm mb-6">

            <a href="{{ route('home') }}" class="hover:text-yellow-300 transition">
                Beranda
            </a>

            <span>/</span>

            <span class="text-yellow-300 font-semibold">
                Fasilitas
            </span>

        </nav>

        <span class="inline-block px-5 py-2 rounded-full bg-yellow-400/20 border border-yellow-400/40 text-yellow-300 text-sm font-semibold">
            FASILITAS PROGRAM STUDI
        </span>

        <h1 class="mt-6 text-4xl sm:text-5xl md:text-6xl font-extrabold text-white leading-tight drop-shadow-lg">
            Fasilitas D-III Teknik Mesin
        </h1>

        <p class="mt-6 max-w-2xl text-base md:text-lg text-white/90 leading-8 drop-shadow">
            Fasilitas pembelajaran Program Studi D-III Teknik Mesin dirancang untuk
            mendukung pendidikan vokasi berbasis praktik, penguasaan teknologi,
            dan pengembangan kompetensi mahasiswa sesuai kebutuhan industri.
        </p>

    </div>

</section>