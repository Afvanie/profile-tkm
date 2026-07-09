@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="space-y-8">

    {{-- Welcome Hero --}}
    <div class="relative overflow-hidden rounded-[2.5rem] bg-[#06172E] text-white shadow-2xl">

        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -right-32 -top-32 w-[420px] h-[420px] rounded-full bg-blue-500/30 blur-3xl"></div>
            <div class="absolute -left-32 -bottom-32 w-[420px] h-[420px] rounded-full bg-yellow-400/20 blur-3xl"></div>

            <div class="absolute inset-0 opacity-[0.08]"
                style="background-image: linear-gradient(#ffffff 1px, transparent 1px),
                linear-gradient(to right,#ffffff 1px,transparent 1px);
                background-size:70px 70px;">
            </div>
        </div>

        <div class="relative z-10 grid lg:grid-cols-12 gap-8 items-center p-7 md:p-10">

            <div class="lg:col-span-8">

                <span class="inline-flex px-5 py-2 rounded-full bg-yellow-400/20 border border-yellow-400/40 text-yellow-300 text-sm font-bold">
                    ADMIN WEBSITE
                </span>

                <h1 class="mt-6 text-3xl md:text-5xl font-black leading-tight">
                    Dashboard Pengelolaan Website
                </h1>

                <p class="mt-5 max-w-3xl text-white/80 leading-8">
                    Kelola konten website Program Studi D-III Teknik Mesin Politeknik Negeri Malang,
                    mulai dari profil, dosen dan staff, dokumen akademik, dokumentasi fasilitas,
                    hingga akun pengelola admin.
                </p>

                <div class="mt-8 flex flex-wrap gap-3">

                    <a href="{{ url('/') }}"
                        target="_blank"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-yellow-400 text-slate-900 font-bold hover:bg-yellow-300 transition">
                        Lihat Website
                    </a>

                    <a href="{{ route('admin.profile-contents.index') }}"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-white/10 border border-white/15 text-white font-bold hover:bg-white/20 transition">
                        Kelola Konten
                    </a>

                </div>

            </div>

            <div class="lg:col-span-4">

                <div class="rounded-[2rem] bg-white/10 border border-white/15 backdrop-blur p-6">

                    <div class="flex items-center gap-4">

                        <div class="w-16 h-16 rounded-3xl bg-white flex items-center justify-center shadow-xl">
                            <img
                                src="{{ asset('assets/images/logo.png') }}"
                                alt="Logo Polinema"
                                class="w-12 h-12 object-contain">
                        </div>

                        <div>
                            <p class="text-sm text-white/60">
                                Program Studi
                            </p>

                            <h3 class="text-xl font-black">
                                D-III Teknik Mesin
                            </h3>
                        </div>

                    </div>

                    <div class="mt-6 h-px bg-white/15"></div>

                    <div class="mt-6 grid grid-cols-2 gap-4">

                        <div>
                            <p class="text-3xl font-black text-yellow-300">
                                {{ $stats['profile_sections'] ?? 0 }}
                            </p>

                            <p class="mt-1 text-xs text-white/60">
                                Konten Profil
                            </p>
                        </div>

                        <div>
                            <p class="text-3xl font-black text-yellow-300">
                                {{ $stats['admins'] ?? 0 }}
                            </p>

                            <p class="mt-1 text-xs text-white/60">
                                Admin Aktif
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Statistic Cards --}}
    <div class="grid sm:grid-cols-2 xl:grid-cols-5 gap-6">

        @php
            $statCards = [
                [
                    'title' => 'Total Dosen',
                    'value' => $stats['lecturers'] ?? 0,
                    'route' => route('admin.lecturer-staff.index'),
                    'link' => 'Kelola Dosen',
                    'theme' => 'blue',
                    'icon' => 'lecturer',
                ],
                [
                    'title' => 'Total Staff',
                    'value' => $stats['staff'] ?? 0,
                    'route' => route('admin.lecturer-staff.index'),
                    'link' => 'Kelola Staff',
                    'theme' => 'yellow',
                    'icon' => 'staff',
                ],
                [
                    'title' => 'Dokumen Akademik',
                    'value' => $stats['academic_documents'] ?? 0,
                    'route' => route('admin.academic-documents.index'),
                    'link' => 'Kelola Akademik',
                    'theme' => 'blue',
                    'icon' => 'document',
                ],
                [
                    'title' => 'Foto Fasilitas',
                    'value' => $stats['facility_photos'] ?? 0,
                    'route' => route('admin.facilities.index'),
                    'link' => 'Kelola Foto',
                    'theme' => 'yellow',
                    'icon' => 'image',
                ],
                [
                    'title' => 'Admin Pengelola',
                    'value' => $stats['admins'] ?? 0,
                    'route' => route('admin.admin-users.index'),
                    'link' => 'Kelola Admin',
                    'theme' => 'blue',
                    'icon' => 'admin',
                ],
            ];
        @endphp

        @foreach ($statCards as $card)

            <div class="group rounded-[2rem] bg-white/95 backdrop-blur border border-slate-100 shadow-xl p-6 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">

                <div class="flex items-start justify-between gap-4">

                    <div>
                        <p class="text-sm font-bold text-slate-500">
                            {{ $card['title'] }}
                        </p>

                        <h2 class="mt-3 text-4xl font-black text-slate-800">
                            {{ $card['value'] }}
                        </h2>
                    </div>

                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center shadow-lg
                        {{ $card['theme'] === 'blue' ? 'bg-blue-700 text-white' : 'bg-yellow-400 text-slate-900' }}">

                        @if ($card['icon'] === 'lecturer')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0112 21.5a12.083 12.083 0 01-6.16-10.922L12 14z" />
                            </svg>
                        @elseif ($card['icon'] === 'staff')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H4v-2a4 4 0 015-3.87M12 12a4 4 0 100-8 4 4 0 000 8z" />
                            </svg>
                        @elseif ($card['icon'] === 'document')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6M5 4h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z" />
                            </svg>
                        @elseif ($card['icon'] === 'image')
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M4 20h16a2 2 0 002-2V6a2 2 0 00-2-2H4a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.5 21a6.5 6.5 0 0113 0M19 8h2m-1-1v2" />
                            </svg>
                        @endif

                    </div>

                </div>

                <a href="{{ $card['route'] }}"
                    class="mt-6 inline-flex text-sm font-bold text-blue-700 hover:underline">
                    {{ $card['link'] }} →
                </a>

            </div>

        @endforeach

    </div>


    {{-- Shortcut + Recent --}}
    <div class="grid xl:grid-cols-12 gap-8">

        {{-- Shortcut --}}
        <div class="xl:col-span-5">

            <div class="rounded-[2rem] bg-white/95 backdrop-blur border border-slate-100 shadow-xl overflow-hidden">

                <div class="h-2 bg-gradient-to-r from-blue-700 via-yellow-400 to-blue-700"></div>

                <div class="p-7 md:p-8">

                    <h2 class="text-2xl font-black text-slate-800">
                        Akses Cepat
                    </h2>

                    <p class="mt-2 text-slate-500">
                        Pilih menu pengelolaan yang ingin diperbarui.
                    </p>

                    <div class="mt-7 grid sm:grid-cols-2 gap-4">

                        <a href="{{ route('admin.profile-contents.index') }}"
                            class="group rounded-3xl bg-slate-50 border border-slate-100 p-5 hover:bg-blue-700 hover:text-white transition">

                            <div class="w-12 h-12 rounded-2xl bg-blue-700 text-white flex items-center justify-center group-hover:bg-white/20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6M5 4h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                </svg>
                            </div>

                            <h3 class="mt-4 font-bold">
                                Konten Profil
                            </h3>

                            <p class="mt-2 text-sm text-slate-500 group-hover:text-white/75">
                                Visi, misi, tujuan, PPM, dan CPL.
                            </p>
                        </a>

                        <a href="{{ route('admin.lecturer-staff.index') }}"
                            class="group rounded-3xl bg-slate-50 border border-slate-100 p-5 hover:bg-blue-700 hover:text-white transition">

                            <div class="w-12 h-12 rounded-2xl bg-yellow-400 text-slate-900 flex items-center justify-center group-hover:bg-white/20 group-hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H4v-2a4 4 0 015-3.87M12 12a4 4 0 100-8 4 4 0 000 8z" />
                                </svg>
                            </div>

                            <h3 class="mt-4 font-bold">
                                Dosen & Staff
                            </h3>

                            <p class="mt-2 text-sm text-slate-500 group-hover:text-white/75">
                                Data tenaga pendidik dan kependidikan.
                            </p>
                        </a>

                        <a href="{{ route('admin.academic-documents.index') }}"
                            class="group rounded-3xl bg-slate-50 border border-slate-100 p-5 hover:bg-blue-700 hover:text-white transition">

                            <div class="w-12 h-12 rounded-2xl bg-blue-700 text-white flex items-center justify-center group-hover:bg-white/20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13M12 6.253C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13" />
                                </svg>
                            </div>

                            <h3 class="mt-4 font-bold">
                                Akademik
                            </h3>

                            <p class="mt-2 text-sm text-slate-500 group-hover:text-white/75">
                                Pedoman, kalender, kurikulum, dan dokumen.
                            </p>
                        </a>

                        <a href="{{ route('admin.facilities.index') }}"
                            class="group rounded-3xl bg-slate-50 border border-slate-100 p-5 hover:bg-blue-700 hover:text-white transition">

                            <div class="w-12 h-12 rounded-2xl bg-yellow-400 text-slate-900 flex items-center justify-center group-hover:bg-white/20 group-hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16M4 20h16a2 2 0 002-2V6a2 2 0 00-2-2H4a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>

                            <h3 class="mt-4 font-bold">
                                Dokumentasi
                            </h3>

                            <p class="mt-2 text-sm text-slate-500 group-hover:text-white/75">
                                Foto fasilitas dan aktivitas mahasiswa.
                            </p>
                        </a>

                    </div>

                </div>

            </div>

        </div>


        {{-- Recent Documents --}}
        <div class="xl:col-span-7">

            <div class="rounded-[2rem] bg-white/95 backdrop-blur border border-slate-100 shadow-xl overflow-hidden">

                <div class="p-7 md:p-8 border-b border-slate-100">

                    <div class="flex items-center justify-between gap-4">

                        <div>
                            <h2 class="text-2xl font-black text-slate-800">
                                Dokumen Akademik Terbaru
                            </h2>

                            <p class="mt-2 text-slate-500">
                                Ringkasan dokumen akademik yang terakhir ditambahkan.
                            </p>
                        </div>

                        <a href="{{ route('admin.academic-documents.index') }}"
                            class="text-sm font-bold text-blue-700 hover:underline">
                            Lihat Semua
                        </a>

                    </div>

                </div>

                <div class="divide-y divide-slate-100">

                    @forelse ($latestDocuments ?? [] as $document)

                        <div class="p-6 flex items-start gap-4 hover:bg-slate-50/70 transition">

                            <div class="w-12 h-12 rounded-2xl bg-blue-700 text-white flex items-center justify-center shrink-0 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6M5 4h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                </svg>
                            </div>

                            <div class="min-w-0 flex-1">

                                <h3 class="font-bold text-slate-800 truncate">
                                    {{ $document->title }}
                                </h3>

                                <p class="mt-1 text-sm text-slate-500">
                                    {{ $document->category_label ?? $document->category }}

                                    @if ($document->academic_year)
                                        • {{ $document->academic_year }}
                                    @endif
                                </p>

                            </div>

                            <span class="hidden sm:inline-flex px-3 py-1 rounded-full text-xs font-bold
                                {{ $document->is_active ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
                                {{ $document->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>

                        </div>

                    @empty

                        <div class="p-10 text-center">
                            <h3 class="text-xl font-bold text-slate-800">
                                Belum ada dokumen
                            </h3>

                            <p class="mt-2 text-slate-500">
                                Dokumen akademik yang ditambahkan akan tampil di sini.
                            </p>
                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>


    {{-- Recent Photos --}}
    <div class="rounded-[2rem] bg-white/95 backdrop-blur border border-slate-100 shadow-xl overflow-hidden">

        <div class="p-7 md:p-8 border-b border-slate-100">

            <div class="flex items-center justify-between gap-4">

                <div>
                    <h2 class="text-2xl font-black text-slate-800">
                        Foto Dokumentasi Terbaru
                    </h2>

                    <p class="mt-2 text-slate-500">
                        Foto fasilitas dan aktivitas mahasiswa yang terakhir diunggah.
                    </p>
                </div>

                <a href="{{ route('admin.facilities.index') }}"
                    class="text-sm font-bold text-blue-700 hover:underline">
                    Kelola Foto
                </a>

            </div>

        </div>

        <div class="p-6 md:p-8">

            <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-5">

                @forelse ($latestPhotos ?? [] as $photo)

                    <div class="group rounded-3xl bg-slate-50 border border-slate-100 overflow-hidden hover:-translate-y-1 hover:shadow-xl transition-all duration-300">

                        <div class="h-40 bg-slate-100 overflow-hidden">

                            <img
                                src="{{ asset('storage/' . $photo->photo) }}"
                                alt="{{ $photo->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700">

                        </div>

                        <div class="p-4">

                            <h3 class="font-bold text-slate-800 truncate">
                                {{ $photo->title ?: 'Foto Dokumentasi' }}
                            </h3>

                            <p class="mt-1 text-sm text-slate-500 truncate">
                                {{ $photo->facility->title ?? 'Dokumentasi' }}
                            </p>

                            <span class="mt-3 inline-flex px-3 py-1 rounded-full text-xs font-bold
                                {{ $photo->is_active ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
                                {{ $photo->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>

                        </div>

                    </div>

                @empty

                    <div class="sm:col-span-2 lg:col-span-5 rounded-3xl bg-slate-50 border border-slate-100 p-10 text-center">

                        <h3 class="text-xl font-bold text-slate-800">
                            Belum ada foto dokumentasi
                        </h3>

                        <p class="mt-2 text-slate-500">
                            Foto yang diunggah melalui menu dokumentasi fasilitas akan tampil di sini.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

@endsection