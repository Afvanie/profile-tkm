@php
    /*
    |--------------------------------------------------------------------------
    | Video Hero Dinamis
    |--------------------------------------------------------------------------
    | Jika admin sudah upload video hero, pakai video dari storage.
    | Jika belum ada, fallback ke video default public/assets/videos/hero.mp4
    */

    $heroContent = $homeContent
        ?? \App\Models\HomeContent::where('section_key', 'program_description')
            ->where('is_active', true)
            ->first();

    $heroVideoUrl = $heroContent && $heroContent->hero_video_path
        ? asset('storage/' . $heroContent->hero_video_path)
        : asset('assets/videos/hero.mp4');
@endphp

<section class="relative h-screen flex items-center justify-center overflow-hidden">

    {{-- BACKGROUND VIDEO --}}
    <div class="absolute inset-0">
        <video
            class="w-full h-full object-cover"
            autoplay
            muted
            loop
            playsinline>

            <source src="{{ $heroVideoUrl }}" type="video/mp4">

        </video>

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-r from-black/75 via-black/55 to-black/75"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-black/35 via-transparent to-black/45"></div>
    </div>


    {{-- CONTENT --}}
    <div class="relative z-10 text-center text-white px-6 max-w-4xl">

        <span
            data-aos="fade-up"
            class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 border border-white/20 backdrop-blur text-sm font-semibold text-yellow-300 mb-6">
            Program Studi
        </span>

        <h1
            data-aos="fade-up"
            data-aos-delay="100"
            class="text-4xl md:text-6xl font-extrabold leading-tight">
            D-III Teknik Mesin
        </h1>

        <p
            data-aos="fade-up"
            data-aos-delay="200"
            class="mt-5 text-lg md:text-xl text-white/85 leading-8">
            Program Studi D-III Teknik Mesin merupakan salah satu program studi di Jurusan Teknik Mesin
            yang dirancang untuk menghasilkan tenaga ahli madya yang kompeten, profesional,
            dan siap beradaptasi dengan kebutuhan industri.
        </p>

        {{-- CTA --}}
        <div
            data-aos="fade-up"
            data-aos-delay="300"
            class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">

            <a href="{{ route('profile') }}"
               class="inline-flex items-center justify-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-slate-900 font-bold px-7 py-3.5 rounded-xl transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-yellow-400/25">
                Tentang Kami
                <span>→</span>
            </a>

            <a href="{{ route('academic') }}"
               class="inline-flex items-center justify-center gap-2 border border-white/40 bg-white/10 backdrop-blur px-7 py-3.5 rounded-xl text-white font-bold hover:bg-white hover:text-slate-900 transition-all duration-300 hover:-translate-y-1">
                Lihat Akademik
            </a>

        </div>

    </div>


    {{-- SCROLL INDICATOR --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 text-white/70 animate-bounce text-sm font-semibold">
        ↓ Scroll
    </div>

</section>