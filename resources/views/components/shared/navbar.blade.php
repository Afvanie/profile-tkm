<nav id="navbar"
    class="fixed top-0 left-0 w-full z-50 transition-all duration-300 text-white">

    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="flex items-center justify-between h-20">

            {{-- LOGO --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3">

                <img src="{{ asset('assets/images/logo.png') }}"
                    class="h-12"
                    alt="">

                <div class="hidden lg:block">
                    <h2 class="font-bold text-xl">PROGRAM STUDI TEKNIK OTOMOTIF ELEKTRONIK</h2>
                    <p class="text-sm text-x1/80">POLINEMA</p>
                </div>

            </a>

            {{-- DESKTOP MENU --}}
            <ul class="hidden lg:flex items-center gap-8 font-medium">

                <li>
                    <a href="{{ route('home') }}"
                       class="{{ request()->routeIs('home') ? 'text-[#D4AF37]' : '' }}">
                        Beranda
                    </a>
                </li>

                <li>
                    <a href="{{ route('profile') }}"
                       class="{{ request()->routeIs('profile') ? 'text-[#D4AF37]' : '' }}">
                        Profil TOE
                    </a>
                </li>

                <li>
                    <a href="{{ route('lecturers') }}"
                       class="{{ request()->routeIs('lecturers') ? 'text-[#D4AF37]' : '' }}">
                        Dosen & Staff
                    </a>
                </li>

                {{-- DROPDOWN AKADEMIK --}}
                <li class="relative group cursor-pointer">

                    <span class="hover:text-[#D4AF37]">
                        Akademik ▾
                    </span>

                    <div
                        class="absolute left-0 top-full mt-4 w-56 bg-white text-black rounded-lg shadow-lg
                        opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">

                            <a href="{{ route('academic.page', 'pedoman-akademik') }}"
                            class="block px-4 py-3 text-slate-700 hover:bg-blue-50 hover:text-blue-700">
                                Pedoman Akademik
                            </a>

                            <a href="{{ route('academic.page', 'kalender-akademik') }}"
                            class="block px-4 py-3 text-slate-700 hover:bg-blue-50 hover:text-blue-700">
                                Kalender Akademik
                            </a>

                            <a href="{{ route('academic.page', 'kurikulum') }}"
                            class="block px-4 py-3 text-slate-700 hover:bg-blue-50 hover:text-blue-700">
                                Kurikulum
                            </a>

                            <a href="{{ route('academic.page', 'jadwal-kuliah') }}"
                            class="block px-4 py-3 text-slate-700 hover:bg-blue-50 hover:text-blue-700">
                                Jadwal Kuliah
                            </a>

                            <a href="{{ route('academic.page', 'laporan-ketercapaian') }}"
                            class="block px-4 py-3 text-slate-700 hover:bg-blue-50 hover:text-blue-700">
                                Laporan Ketercapaian
                            </a>

                    </div>

                </li>

                {{-- DROPDOWN FASILITAS --}}
                <li class="relative group cursor-pointer">

                    <span class="hover:text-[#D4AF37]">
                        Fasilitas ▾
                    </span>

                    <div
                        class="absolute left-0 top-full mt-4 w-56 bg-white text-black rounded-lg shadow-lg
                        opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">

                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Laboratorium</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Workshop</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Ruang Kelas</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Galeri</a>

                    </div>

                </li>

                <li>
                    <a href="{{ route('contact') }}"
                       class="{{ request()->routeIs('contact') ? 'text-[#D4AF37]' : '' }}">
                        Kontak
                    </a>
                </li>

            </ul>

            {{-- MOBILE BUTTON --}}
            <button id="mobileButton" class="lg:hidden text-2xl">
                ☰
            </button>

        </div>

    </div>
</nav>

{{-- MOBILE MENU --}}
<div id="mobileMenu"
     class="fixed top-0 right-0 translate-x-full transition-transform duration-300 w-80 h-screen bg-white shadow-xl z-[60]">

    <div class="p-8">

        <button id="closeMenu" class="text-3xl">×</button>

        <ul class="mt-10 space-y-6 text-black">

            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('profile') }}">Profil TOE</a></li>
            <li><a href="{{ route('lecturers') }}">Dosen & Staff</a></li>

            {{-- MOBILE ACCORDION AKADEMIK --}}
            <li>
                <details>
                    <summary class="cursor-pointer font-medium">Akademik</summary>
                    <div class="ml-4 mt-2 space-y-2">
                        <a href="#">Pedoman Akademik</a>
                        <a href="#">Kalender Akademik</a>
                        <a href="#">Kurikulum</a>
                        <a href="#">Jadwal Kuliah</a>
                        <a href="#">Laporan Ketercapaian</a>
                    </div>
                </details>
            </li>

            {{-- MOBILE ACCORDION FASILITAS --}}
            <li>
                <details>
                    <summary class="cursor-pointer font-medium">Fasilitas</summary>
                    <div class="ml-4 mt-2 space-y-2">
                        <a href="#">Laboratorium</a>
                        <a href="#">Workshop</a>
                        <a href="#">Ruang Kelas</a>
                        <a href="#">Galeri</a>
                    </div>
                </details>
            </li>

            <li><a href="{{ route('contact') }}">Kontak</a></li>

        </ul>

    </div>
</div>