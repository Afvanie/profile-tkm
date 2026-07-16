@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="space-y-6">

    {{-- Welcome --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-6 md:p-8">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>
                <p class="text-sm font-extrabold tracking-[0.2em] uppercase text-blue-700">
                    Admin Website
                </p>

                <h1 class="mt-3 text-2xl md:text-3xl font-black text-slate-900">
                    Dashboard Pengelolaan Website
                </h1>

                <p class="mt-3 max-w-2xl text-slate-500 leading-7">
                    Kelola konten website Program Studi D-III Teknik Mesin Politeknik Negeri Malang
                    melalui menu yang tersedia di bawah ini.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">

                <a href="{{ url('/') }}"
                   target="_blank"
                   class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition">
                    Lihat Website
                </a>

                <a href="{{ route('admin.home-content.index') }}"
                   class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                    Edit Beranda
                </a>

            </div>

        </div>

    </div>


    {{-- Ringkasan --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5">
            <p class="text-sm font-bold text-slate-500">
                Dosen
            </p>

            <p class="mt-3 text-3xl font-black text-slate-900">
                {{ $stats['lecturers'] ?? 0 }}
            </p>
        </div>

        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5">
            <p class="text-sm font-bold text-slate-500">
                Staff
            </p>

            <p class="mt-3 text-3xl font-black text-slate-900">
                {{ $stats['staff'] ?? 0 }}
            </p>
        </div>

        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5">
            <p class="text-sm font-bold text-slate-500">
                Dokumen Akademik
            </p>

            <p class="mt-3 text-3xl font-black text-slate-900">
                {{ $stats['academic_documents'] ?? 0 }}
            </p>
        </div>

        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5">
            <p class="text-sm font-bold text-slate-500">
                Foto Fasilitas
            </p>

            <p class="mt-3 text-3xl font-black text-slate-900">
                {{ $stats['facility_photos'] ?? 0 }}
            </p>
        </div>

    </div>


    {{-- Akses Cepat --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-100">

            <h2 class="text-xl font-black text-slate-900">
                Akses Cepat
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Pilih bagian website yang ingin kamu kelola.
            </p>

        </div>

        <div class="p-6">

            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-4">

                <a href="{{ route('admin.home-content.index') }}"
                   class="group rounded-2xl border border-slate-200 bg-slate-50 p-5 hover:bg-blue-700 hover:border-blue-700 transition">

                    <p class="font-black text-slate-900 group-hover:text-white">
                        Konten Beranda
                    </p>

                    <p class="mt-2 text-sm text-slate-500 group-hover:text-blue-100 leading-6">
                        Statistik, video hero, dan deskripsi beranda.
                    </p>

                </a>

                <a href="{{ route('admin.profile-contents.index') }}"
                   class="group rounded-2xl border border-slate-200 bg-slate-50 p-5 hover:bg-blue-700 hover:border-blue-700 transition">

                    <p class="font-black text-slate-900 group-hover:text-white">
                        Konten Profil
                    </p>

                    <p class="mt-2 text-sm text-slate-500 group-hover:text-blue-100 leading-6">
                        Profil, visi misi, tujuan, PPM, dan CPL.
                    </p>

                </a>

                <a href="{{ route('admin.accreditations.index') }}"
                   class="group rounded-2xl border border-slate-200 bg-slate-50 p-5 hover:bg-blue-700 hover:border-blue-700 transition">

                    <p class="font-black text-slate-900 group-hover:text-white">
                        Akreditasi
                    </p>

                    <p class="mt-2 text-sm text-slate-500 group-hover:text-blue-100 leading-6">
                        Kelola data dan sertifikat akreditasi.
                    </p>

                </a>

                <a href="{{ route('admin.lecturer-staff.index') }}"
                   class="group rounded-2xl border border-slate-200 bg-slate-50 p-5 hover:bg-blue-700 hover:border-blue-700 transition">

                    <p class="font-black text-slate-900 group-hover:text-white">
                        Dosen & Staff
                    </p>

                    <p class="mt-2 text-sm text-slate-500 group-hover:text-blue-100 leading-6">
                        Kelola data dosen dan tenaga kependidikan.
                    </p>

                </a>

                <a href="{{ route('admin.academic-documents.index') }}"
                   class="group rounded-2xl border border-slate-200 bg-slate-50 p-5 hover:bg-blue-700 hover:border-blue-700 transition">

                    <p class="font-black text-slate-900 group-hover:text-white">
                        Akademik
                    </p>

                    <p class="mt-2 text-sm text-slate-500 group-hover:text-blue-100 leading-6">
                        Pedoman, kalender, kurikulum, dan dokumen akademik.
                    </p>

                </a>

                <a href="{{ route('admin.facilities.index') }}"
                   class="group rounded-2xl border border-slate-200 bg-slate-50 p-5 hover:bg-blue-700 hover:border-blue-700 transition">

                    <p class="font-black text-slate-900 group-hover:text-white">
                        Dokumentasi Fasilitas
                    </p>

                    <p class="mt-2 text-sm text-slate-500 group-hover:text-blue-100 leading-6">
                        Kelola foto fasilitas dan aktivitas mahasiswa.
                    </p>

                </a>

            </div>

        </div>

    </div>


    {{-- Info Sederhana --}}
    <div class="rounded-3xl bg-blue-50 border border-blue-100 p-6">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <div>
                <h3 class="font-black text-blue-900">
                    Tips Pengelolaan
                </h3>

                <p class="mt-2 text-sm text-blue-700 leading-6">
                    Pastikan setiap perubahan konten dicek kembali melalui tombol
                    <span class="font-bold">Lihat Website</span>
                    agar tampilan publik tetap rapi.
                </p>
            </div>

            <a href="{{ url('/') }}"
               target="_blank"
               class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-white text-blue-700 font-bold hover:bg-blue-700 hover:text-white transition">
                Preview Website
            </a>

        </div>

    </div>

</div>

@endsection