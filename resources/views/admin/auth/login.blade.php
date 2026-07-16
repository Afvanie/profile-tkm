<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | D-III Teknik Mesin Polinema</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#07111F] text-slate-800">

    <main class="relative min-h-screen flex items-center justify-center px-4 py-8 overflow-hidden">

        {{-- Background --}}
        <div class="absolute inset-0">

            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,#113B73_0%,transparent_34%),radial-gradient(circle_at_bottom_right,#173B5F_0%,transparent_32%),linear-gradient(135deg,#07111F_0%,#0B1728_48%,#07111F_100%)]"></div>

            <div class="absolute inset-0 opacity-[0.05]"
                 style="background-image: linear-gradient(rgba(255,255,255,.7) 1px, transparent 1px), linear-gradient(to right, rgba(255,255,255,.7) 1px, transparent 1px); background-size: 42px 42px;">
            </div>

            <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-[9rem] lg:text-[15rem] font-black tracking-tight text-white/[0.025] whitespace-nowrap select-none">
                ADMIN
            </div>

            <div class="absolute -top-40 right-10 w-96 h-96 rounded-full bg-blue-500/10 blur-3xl"></div>
            <div class="absolute -bottom-40 left-10 w-96 h-96 rounded-full bg-yellow-400/10 blur-3xl"></div>

        </div>


        {{-- Login Container --}}
        <div class="relative z-10 w-full max-w-5xl">

            <div class="grid lg:grid-cols-[0.95fr_1.05fr] rounded-[2rem] overflow-hidden bg-white shadow-2xl shadow-black/30 border border-white/10">

                {{-- Left Panel --}}
                <div class="relative hidden lg:flex flex-col justify-between p-10 bg-[#0B1F3A] text-white overflow-hidden">

                    <div class="absolute inset-0">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#0B1F3A] via-[#0E2A4D] to-[#07111F]"></div>

                        <div class="absolute -top-28 -right-28 w-80 h-80 rounded-full bg-blue-400/15 blur-3xl"></div>
                        <div class="absolute -bottom-28 -left-28 w-80 h-80 rounded-full bg-yellow-400/10 blur-3xl"></div>

                        <div class="absolute inset-0 opacity-[0.06]"
                             style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 26px 26px;">
                        </div>
                    </div>

                    <div class="relative z-10">

                        <div class="inline-flex items-center gap-3 rounded-full border border-white/10 bg-white/10 px-4 py-2 backdrop-blur">
                            <span class="h-2 w-2 rounded-full bg-yellow-300"></span>
                            <span class="text-sm font-semibold text-blue-50">
                                Admin CMS
                            </span>
                        </div>

                        <div class="mt-10">

                            <div class="w-20 h-20 rounded-3xl bg-white p-3 shadow-xl flex items-center justify-center">
                                <img src="{{ asset('assets/images/logo.png') }}"
                                     alt="Logo Polinema"
                                     class="w-full h-full object-contain">
                            </div>

                            <h1 class="mt-8 text-4xl font-extrabold leading-tight tracking-tight">
                                D-III Teknik Mesin
                            </h1>

                            <p class="mt-3 text-lg font-semibold text-yellow-300">
                                Politeknik Negeri Malang
                            </p>

                            <p class="mt-6 max-w-md text-sm leading-7 text-blue-100">
                                Panel pengelolaan konten website program studi untuk menjaga informasi profil,
                                akademik, dosen, fasilitas, dan akreditasi tetap rapi dan terbarui.
                            </p>

                        </div>

                    </div>

                    <div class="relative z-10">

                        <div class="rounded-3xl border border-white/10 bg-white/10 p-5 backdrop-blur">
                            <p class="text-xs font-bold uppercase tracking-[0.25em] text-blue-200">
                                Website Prodi
                            </p>

                            <p class="mt-3 text-2xl font-extrabold">
                                Content Management System
                            </p>
                        </div>

                    </div>

                </div>


                {{-- Right Form --}}
                <div class="relative bg-white px-6 py-10 sm:px-10 lg:px-14 flex items-center">

                    <div class="w-full max-w-md mx-auto">

                        {{-- Mobile Brand --}}
                        <div class="lg:hidden mb-8 text-center">

                            <div class="mx-auto w-20 h-20 rounded-3xl bg-slate-50 border border-slate-200 p-3 shadow-sm flex items-center justify-center">
                                <img src="{{ asset('assets/images/logo.png') }}"
                                     alt="Logo Polinema"
                                     class="w-full h-full object-contain">
                            </div>

                            <h1 class="mt-5 text-2xl font-extrabold text-slate-900">
                                Admin Website
                            </h1>

                            <p class="mt-2 text-sm text-slate-500">
                                D-III Teknik Mesin Polinema
                            </p>

                        </div>


                        {{-- Title --}}
                        <div class="mb-8">

                            <span class="inline-flex rounded-full bg-blue-50 px-4 py-1.5 text-xs font-extrabold tracking-[0.18em] uppercase text-blue-700">
                                Login Admin
                            </span>

                            <h2 class="mt-5 text-3xl md:text-4xl font-extrabold tracking-tight text-slate-950">
                                Masuk ke Dashboard
                            </h2>

                            <p class="mt-3 text-sm leading-7 text-slate-500">
                                Gunakan akun admin yang sudah terdaftar untuk mengelola konten website.
                            </p>

                        </div>


                        {{-- Alert --}}
                        @if (session('error'))
                            <div class="mb-5 rounded-2xl border border-red-100 bg-red-50 px-4 py-3 text-sm font-semibold text-red-700">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="mb-5 rounded-2xl border border-red-100 bg-red-50 px-4 py-3 text-sm font-semibold text-red-700">
                                Email atau password salah.
                            </div>
                        @endif


                        {{-- Form --}}
                        <form id="adminLoginForm"
                              action="{{ route('admin.login.post') }}"
                              method="POST"
                              class="space-y-5">

                            @csrf

                            <div>
                                <label class="block mb-2 text-sm font-bold text-slate-700">
                                    Email
                                </label>

                                <div class="relative">
                                    <input type="email"
                                           name="email"
                                           value="{{ old('email') }}"
                                           placeholder="Masukkan email admin"
                                           autocomplete="email"
                                           class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4 pl-12 text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-700 focus:bg-white focus:ring-4 focus:ring-blue-100"
                                           required>

                                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-5 h-5"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="2">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M16 12H8m8 0l-8-5v10l8-5z" />
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M4 6h16v12H4z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>


                            <div>
                                <label class="block mb-2 text-sm font-bold text-slate-700">
                                    Password
                                </label>

                                <div class="relative">
                                    <input id="passwordInput"
                                           type="password"
                                           name="password"
                                           placeholder="Masukkan password"
                                           autocomplete="current-password"
                                           class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4 pl-12 pr-20 text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-700 focus:bg-white focus:ring-4 focus:ring-blue-100"
                                           required>

                                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-5 h-5"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="2">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>

                                    <button type="button"
                                            id="togglePassword"
                                            class="absolute right-3 top-1/2 -translate-y-1/2 rounded-xl px-3 py-1.5 text-xs font-bold text-slate-500 hover:bg-slate-100 hover:text-blue-700 transition">
                                        Lihat
                                    </button>
                                </div>
                            </div>


                            <button type="submit"
                                    id="loginButton"
                                    class="group w-full inline-flex items-center justify-center gap-3 rounded-2xl bg-[#0B376C] px-5 py-4 font-extrabold text-white shadow-lg shadow-blue-900/20 transition hover:-translate-y-0.5 hover:bg-[#082A52] focus:outline-none focus:ring-4 focus:ring-blue-100 disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:translate-y-0">

                                <span id="loginButtonText">
                                    Masuk
                                </span>

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 transition group-hover:translate-x-1"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>

                            </button>

                        </form>


                        {{-- Back --}}
                        <div class="mt-8 flex items-center gap-4">

                            <div class="h-px flex-1 bg-slate-200"></div>

                            <a href="{{ route('home') }}"
                               class="shrink-0 text-sm font-bold text-slate-500 transition hover:text-blue-700">
                                Kembali ke Website
                            </a>

                            <div class="h-px flex-1 bg-slate-200"></div>

                        </div>


                        <p class="mt-8 text-center text-xs text-slate-400">
                            © {{ date('Y') }} Program Studi D-III Teknik Mesin Polinema
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </main>


    {{-- Loading Overlay --}}
    <div id="loginLoadingOverlay"
         class="fixed inset-0 z-[99999] hidden items-center justify-center bg-slate-950/50 backdrop-blur-sm">

        <div class="w-[90%] max-w-xs rounded-3xl bg-white p-6 text-center shadow-2xl">

            <div class="mx-auto w-12 h-12 rounded-full border-4 border-slate-200 border-t-[#0B376C] animate-spin"></div>

            <h3 class="mt-5 text-base font-extrabold text-slate-900">
                Memproses Login
            </h3>

            <p class="mt-2 text-sm text-slate-500">
                Mohon tunggu sebentar.
            </p>

        </div>

    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.getElementById('passwordInput');
            const togglePassword = document.getElementById('togglePassword');
            const form = document.getElementById('adminLoginForm');
            const button = document.getElementById('loginButton');
            const buttonText = document.getElementById('loginButtonText');
            const overlay = document.getElementById('loginLoadingOverlay');

            if (togglePassword && passwordInput) {
                togglePassword.addEventListener('click', function () {
                    const isPassword = passwordInput.getAttribute('type') === 'password';

                    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                    togglePassword.textContent = isPassword ? 'Tutup' : 'Lihat';
                });
            }

            if (form && button && overlay) {
                form.addEventListener('submit', function () {
                    button.disabled = true;

                    if (buttonText) {
                        buttonText.textContent = 'Memproses...';
                    }

                    overlay.classList.remove('hidden');
                    overlay.classList.add('flex');
                });
            }
        });
    </script>

</body>
</html>