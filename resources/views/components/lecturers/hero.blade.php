<section class="relative h-[55vh] flex items-center overflow-hidden">

    {{-- Background --}}
    <div class="absolute inset-0">

        <img
            src="{{ asset('assets/images/lecturers-banner.jpg') }}"
            class="w-full h-full object-cover"
            alt="Dosen dan Staff Teknik Mesin">

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

    {{-- Content --}}
    <div class="relative max-w-7xl mx-auto px-6 w-full">

        <nav class="flex items-center gap-2 text-white/80 text-sm mb-6">

            <a href="{{ route('home') }}" class="hover:text-yellow-400 transition">
                Beranda
            </a>

            <span>/</span>

            <span class="text-yellow-400">
                Dosen & Staff
            </span>

        </nav>

        <span class="inline-block px-5 py-2 rounded-full bg-yellow-400/20 border border-yellow-400/30 text-yellow-300 text-sm font-semibold">
            SUMBER DAYA MANUSIA
        </span>

        <h1 class="mt-6 text-5xl md:text-6xl font-extrabold text-white leading-tight">
            Dosen & Staff
        </h1>

        <p class="mt-6 max-w-2xl text-lg text-white/90 leading-8">
            Tenaga pendidik dan kependidikan Program Studi D-III Teknik Mesin Politeknik Negeri Malang yang mendukung proses
            pendidikan vokasi secara profesional.
        </p>

    </div>

</section>