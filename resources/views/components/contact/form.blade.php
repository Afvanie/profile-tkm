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

        <div class="grid lg:grid-cols-12 gap-12 items-start">

            {{-- Left Content --}}
            <div class="lg:col-span-5" data-aos="fade-right">

                <span class="uppercase tracking-[5px] text-blue-700 font-semibold">
                    Kirim Pesan
                </span>

                <h2 class="mt-4 text-4xl md:text-5xl font-bold text-slate-800 leading-tight">
                    Ada pertanyaan terkait Program Studi?
                </h2>

                <div class="w-24 h-1 bg-yellow-400 rounded-full mt-6 mb-8"></div>

                <p class="text-slate-600 leading-8 text-justify">
                    Silakan hubungi Program Studi D-III Teknik Mesin untuk informasi
                    mengenai akademik, administrasi, kerja sama, kegiatan mahasiswa,
                    maupun kebutuhan komunikasi lainnya.
                </p>

                <div class="mt-8 space-y-4">

                    <div class="flex items-start gap-4 rounded-2xl bg-blue-50 border border-blue-100 p-5">

                        <div class="w-11 h-11 rounded-xl bg-blue-700 text-white flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-18 8h18a2 2 0 002-2V8a2 2 0 00-2-2H3a2 2 0 00-2 2v6a2 2 0 002 2z" />
                            </svg>
                        </div>

                        <div>
                            <h3 class="font-bold text-slate-800">
                                Email Tujuan
                            </h3>

                            <p class="mt-1 text-slate-600 leading-7">
                                Pesan yang dikirim melalui form ini akan diteruskan ke email Program Studi:
                                <span class="font-bold text-blue-700">d3tm@polinema.ac.id</span>.
                            </p>
                        </div>

                    </div>

                    <div class="flex items-start gap-4 rounded-2xl bg-yellow-50 border border-yellow-100 p-5">

                        <div class="w-11 h-11 rounded-xl bg-yellow-400 text-slate-900 flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 8v4l3 3M12 22a10 10 0 100-20 10 10 0 000 20z" />
                            </svg>
                        </div>

                        <div>
                            <h3 class="font-bold text-slate-800">
                                Waktu Respon
                            </h3>

                            <p class="mt-1 text-slate-600 leading-7">
                                Pesan akan ditindaklanjuti pada jam layanan akademik.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

            {{-- Right Form --}}
            <div class="lg:col-span-7" data-aos="fade-left">

                <div class="rounded-[2rem] bg-white border border-slate-100 shadow-xl overflow-hidden">

                    <div class="h-2 bg-gradient-to-r from-blue-700 via-yellow-400 to-blue-700"></div>

                    <div class="p-7 md:p-10">

                        <h3 class="text-3xl font-bold text-slate-800">
                            Form Kontak
                        </h3>

                        <p class="mt-3 text-slate-500 leading-7">
                            Isi data berikut untuk mengirim pesan kepada Program Studi D-III Teknik Mesin.
                        </p>

                        {{-- Success --}}
                        @if (session('success'))
                            <div class="mt-6 rounded-2xl bg-green-50 border border-green-100 p-5 text-green-700 font-semibold leading-7">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Error --}}
                        @if ($errors->any())
                            <div class="mt-6 rounded-2xl bg-red-50 border border-red-100 p-5 text-red-700 leading-7">

                                <h4 class="font-bold mb-2">
                                    Ada data yang perlu diperbaiki:
                                </h4>

                                <ul class="list-disc list-inside space-y-1 text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                        @endif

                        <form id="contactForm"
                              action="{{ route('contact.send') }}"
                              method="POST"
                              class="mt-8 space-y-6">

                            @csrf

                            <div class="grid md:grid-cols-2 gap-6">

                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                                        Nama Lengkap
                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ old('name') }}"
                                        placeholder="Masukkan nama lengkap"
                                        required
                                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                                        Email
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="Masukkan email"
                                        required
                                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Subjek
                                </label>

                                <input
                                    type="text"
                                    name="subject"
                                    value="{{ old('subject') }}"
                                    placeholder="Masukkan subjek pesan"
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Pesan
                                </label>

                                <textarea
                                    name="message"
                                    rows="6"
                                    placeholder="Tulis pesan Anda"
                                    required
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('message') }}</textarea>
                            </div>

                            <button
                                type="submit"
                                id="contactSubmitButton"
                                class="inline-flex items-center justify-center gap-3 rounded-2xl bg-blue-700 px-7 py-4 text-white font-bold shadow-lg hover:bg-blue-800 hover:-translate-y-1 transition-all duration-300">

                                Kirim Pesan

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('contactForm');
        const button = document.getElementById('contactSubmitButton');

        if (!form || !button) {
            return;
        }

        form.addEventListener('submit', function () {
            button.disabled = true;
            button.classList.add('opacity-70', 'cursor-not-allowed');
            button.innerText = 'Mengirim Pesan...';
        });
    });
</script>