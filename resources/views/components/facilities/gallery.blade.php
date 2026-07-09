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

        {{-- Heading --}}
        <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">

            <span class="uppercase tracking-[5px] text-blue-700 font-semibold">
                Dokumentasi Fasilitas
            </span>

            <h2 class="mt-4 text-4xl md:text-5xl font-bold text-slate-800 leading-tight">
                Fasilitas dan Aktivitas Mahasiswa
            </h2>

            <div class="w-24 h-1 bg-yellow-400 rounded-full mx-auto mt-6"></div>

            <p class="mt-7 text-slate-600 leading-8">
                Dokumentasi ditampilkan dalam bentuk slide agar foto ruang laboratorium,
                ruang workshop, ruang kelas, dan aktivitas mahasiswa terlihat lebih rapi.
            </p>

        </div>

        {{-- Slider Groups --}}
        <div class="space-y-14">

            @forelse ($facilities as $facility)

                @php
                    $labels = [
                        'laboratorium' => 'Laboratorium',
                        'workshop' => 'Workshop',
                        'ruang_kelas' => 'Ruang Kelas',
                        'galeri' => 'Aktivitas Mahasiswa',
                    ];

                    $label = $labels[$facility->category] ?? 'Dokumentasi';

                    $photos = $facility->photos->count()
                        ? $facility->photos->map(function ($photo) use ($facility) {
                            return [
                                'title' => $photo->title ?: $facility->title,
                                'image' => $photo->photo,
                                'uploaded' => true,
                            ];
                        })
                        : collect([
                            [
                                'title' => $facility->title . ' 1',
                                'image' => null,
                                'uploaded' => false,
                            ],
                            [
                                'title' => $facility->title . ' 2',
                                'image' => null,
                                'uploaded' => false,
                            ],
                            [
                                'title' => $facility->title . ' 3',
                                'image' => null,
                                'uploaded' => false,
                            ],
                        ]);
                @endphp

                <div
                    class="relative rounded-[2.5rem] bg-white/95 backdrop-blur border border-slate-100 shadow-2xl overflow-hidden"
                    data-aos="fade-up"
                    data-facility-slider>

                    {{-- Accent --}}
                    <div class="h-2 bg-gradient-to-r from-blue-700 via-yellow-400 to-blue-700"></div>

                    <div class="grid lg:grid-cols-12 gap-0">

                        {{-- Left Info --}}
                        <div class="lg:col-span-4 p-8 lg:p-10 flex flex-col justify-between bg-white">

                            <div>

                                <div class="flex items-center gap-4 mb-6">

                                    <span class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-blue-700 text-white text-xl font-black shadow-lg">
                                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                    </span>

                                    <span class="inline-block px-4 py-2 rounded-full bg-yellow-400/20 border border-yellow-400/40 text-yellow-700 text-xs font-bold uppercase tracking-wider">
                                        {{ $label }}
                                    </span>

                                </div>

                                <h3 class="text-3xl md:text-4xl font-bold text-slate-800 leading-tight">
                                    {{ $facility->title }}
                                </h3>

                                <p class="mt-5 text-slate-600 leading-8 text-justify">
                                    {{ $facility->description }}
                                </p>

                            </div>

                            <div class="mt-8">

                                <div class="inline-flex items-center gap-3 px-5 py-3 rounded-2xl bg-slate-50 border border-slate-100">

                                    <span class="text-3xl font-black text-blue-700">
                                        {{ $facility->photos->count() }}
                                    </span>

                                    <span class="text-sm font-semibold text-slate-500">
                                        Foto Tersedia
                                    </span>

                                </div>

                            </div>

                        </div>

                        {{-- Right Slider --}}
                        <div class="lg:col-span-8 relative bg-slate-100">

                            <div class="relative overflow-hidden h-[380px] md:h-[500px]">

                                <div class="facility-track flex h-full transition-transform duration-500 ease-out">

                                    @foreach ($photos as $photo)

                                        <div class="min-w-full h-full relative">

                                            @if ($photo['uploaded'] && $photo['image'])

                                                {{-- Blurred Background dari gambar yang sama --}}
                                                <img
                                                    src="{{ asset('storage/' . $photo['image']) }}"
                                                    alt=""
                                                    class="absolute inset-0 w-full h-full object-cover scale-110 blur-xl opacity-45">

                                                {{-- Overlay lembut --}}
                                                <div class="absolute inset-0 bg-gradient-to-br from-[#003B73]/50 via-white/10 to-[#003B73]/70"></div>

                                                {{-- Gambar utama --}}
                                                <div class="absolute inset-0 flex items-center justify-center p-6 md:p-10">

                                                    <img
                                                        src="{{ asset('storage/' . $photo['image']) }}"
                                                        alt="{{ $photo['title'] }}"
                                                        class="max-w-full max-h-full object-contain rounded-[1.5rem] shadow-2xl ring-4 ring-white/80 bg-white/20 backdrop-blur">

                                                </div>

                                            @else

                                                {{-- Placeholder --}}
                                                <div class="absolute inset-0 bg-gradient-to-br from-blue-100 via-white to-yellow-100"></div>

                                                <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(15,23,42,.06)_1px,transparent_1px),linear-gradient(to_bottom,rgba(15,23,42,.06)_1px,transparent_1px)] bg-[size:42px_42px]"></div>

                                                <div class="absolute -right-20 -top-20 w-72 h-72 rounded-full bg-blue-300/30 blur-2xl"></div>

                                                <div class="absolute -left-20 -bottom-20 w-72 h-72 rounded-full bg-yellow-300/40 blur-2xl"></div>

                                                <div class="absolute inset-0 flex items-center justify-center text-center p-8">

                                                    <div>

                                                        <div class="w-24 h-24 rounded-3xl bg-white shadow-xl flex items-center justify-center mx-auto mb-7">

                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="w-12 h-12 text-blue-700"
                                                                fill="none"
                                                                viewBox="0 0 24 24"
                                                                stroke="currentColor">

                                                                <path stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M4 20h16a2 2 0 002-2V6a2 2 0 00-2-2H4a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                            </svg>

                                                        </div>

                                                        <p class="text-sm font-bold text-blue-700 uppercase tracking-[4px]">
                                                            Dokumentasi
                                                        </p>

                                                        <h4 class="mt-3 text-3xl font-bold text-slate-800">
                                                            {{ $photo['title'] }}
                                                        </h4>

                                                        <p class="mt-4 text-slate-500 leading-7">
                                                            Foto dokumentasi akan segera tersedia.
                                                        </p>

                                                    </div>

                                                </div>

                                            @endif

                                            {{-- Image Overlay --}}
                                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/55 via-slate-950/5 to-transparent"></div>

                                            {{-- Caption --}}
                                            <div class="absolute left-6 right-6 bottom-6">

                                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/90 backdrop-blur text-slate-800 text-sm font-bold shadow">
                                                    <span class="w-2 h-2 rounded-full bg-yellow-400"></span>
                                                    {{ $photo['title'] }}
                                                </span>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                                {{-- Navigation Buttons --}}
                                <button
                                    type="button"
                                    class="facility-prev absolute left-5 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/90 backdrop-blur shadow-lg flex items-center justify-center text-slate-800 hover:bg-yellow-400 transition"
                                    aria-label="Slide sebelumnya">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 19l-7-7 7-7" />
                                    </svg>

                                </button>

                                <button
                                    type="button"
                                    class="facility-next absolute right-5 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-white/90 backdrop-blur shadow-lg flex items-center justify-center text-slate-800 hover:bg-yellow-400 transition"
                                    aria-label="Slide berikutnya">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>

                                </button>

                            </div>

                            {{-- Dots --}}
                            <div class="facility-dots flex items-center justify-center gap-2 py-5 bg-white">

                                @foreach ($photos as $photo)

                                    <button
                                        type="button"
                                        class="facility-dot w-3 h-3 rounded-full bg-slate-300 transition"
                                        aria-label="Pilih slide">
                                    </button>

                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="rounded-[2rem] bg-white border border-slate-100 shadow-lg p-10 text-center">

                    <h3 class="text-2xl font-bold text-slate-800">
                        Data dokumentasi belum tersedia
                    </h3>

                    <p class="mt-3 text-slate-500">
                        Silakan tambahkan kategori dokumentasi melalui seeder fasilitas.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sliders = document.querySelectorAll('[data-facility-slider]');

        sliders.forEach(function (slider) {
            const track = slider.querySelector('.facility-track');
            const slides = slider.querySelectorAll('.facility-track > div');
            const prevButton = slider.querySelector('.facility-prev');
            const nextButton = slider.querySelector('.facility-next');
            const dots = slider.querySelectorAll('.facility-dot');

            let currentIndex = 0;

            function updateSlider() {
                if (!track || slides.length === 0) {
                    return;
                }

                track.style.transform = `translateX(-${currentIndex * 100}%)`;

                dots.forEach(function (dot, index) {
                    dot.classList.toggle('bg-blue-700', index === currentIndex);
                    dot.classList.toggle('w-8', index === currentIndex);
                    dot.classList.toggle('bg-slate-300', index !== currentIndex);
                });
            }

            if (nextButton) {
                nextButton.addEventListener('click', function () {
                    currentIndex = (currentIndex + 1) % slides.length;
                    updateSlider();
                });
            }

            if (prevButton) {
                prevButton.addEventListener('click', function () {
                    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                    updateSlider();
                });
            }

            dots.forEach(function (dot, index) {
                dot.addEventListener('click', function () {
                    currentIndex = index;
                    updateSlider();
                });
            });

            updateSlider();
        });
    });
</script>