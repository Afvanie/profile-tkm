@extends('layouts.admin')

@section('title', 'Akreditasi')

@section('content')

@php
    $bulanIndonesia = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    $formatTanggalIndonesia = function ($date) use ($bulanIndonesia) {
        if (!$date) {
            return '-';
        }

        return (int) $date->format('d') . ' ' .
            $bulanIndonesia[(int) $date->format('m')] . ' ' .
            $date->format('Y');
    };
@endphp

<div class="space-y-8">

    {{-- Header --}}
    <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-blue-700 via-blue-800 to-slate-900 p-8 shadow-xl">

        <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-yellow-300/20 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-72 h-72 rounded-full bg-white/10 blur-3xl"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>
                <span class="inline-flex px-4 py-2 rounded-full bg-white/10 border border-white/20 text-white/90 text-xs font-bold uppercase tracking-widest">
                    Admin Panel
                </span>

                <h1 class="mt-5 text-3xl md:text-4xl font-black text-white">
                    Akreditasi Program Studi
                </h1>

                <p class="mt-3 max-w-2xl text-white/75 leading-7">
                    Kelola data akreditasi nasional dan internasional, termasuk lembaga,
                    peringkat, masa berlaku, nomor sertifikat, dan file sertifikat.
                </p>
            </div>

            <a href="{{ route('admin.accreditations.create') }}"
                class="inline-flex items-center justify-center px-6 py-4 rounded-2xl bg-yellow-400 text-slate-900 font-black hover:bg-yellow-300 transition shadow-lg shadow-yellow-400/20">
                Tambah Akreditasi
            </a>

        </div>

    </div>


    {{-- Alert --}}
    @if (session('success'))
        <div class="rounded-2xl bg-emerald-50 border border-emerald-100 text-emerald-700 px-5 py-4 font-semibold">
            {{ session('success') }}
        </div>
    @endif


    {{-- Content --}}
    @if ($accreditations->count())

        <div class="grid xl:grid-cols-2 gap-6">

            @foreach ($accreditations as $accreditation)

                @php
                    $fileUrl = $accreditation->file_path
                        ? asset('storage/' . $accreditation->file_path)
                        : null;

                    $extension = $accreditation->file_path
                        ? strtolower(pathinfo($accreditation->file_path, PATHINFO_EXTENSION))
                        : null;

                    $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'webp']);
                    $isPdf = $extension === 'pdf';
                    $isInternational = $accreditation->type === 'internasional';
                @endphp

                <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden hover:shadow-xl transition">

                    {{-- Top Accent --}}
                    <div class="h-2 {{ $isInternational ? 'bg-gradient-to-r from-yellow-400 via-blue-600 to-yellow-400' : 'bg-gradient-to-r from-blue-700 via-yellow-400 to-blue-700' }}"></div>

                    <div class="p-5 md:p-6">

                        <div class="grid md:grid-cols-12 gap-6">

                            {{-- Preview --}}
                            <div class="md:col-span-4">

                                <div class="rounded-2xl bg-slate-50 border border-slate-100 overflow-hidden">

                                    @if ($fileUrl && $isImage)

                                        <a href="{{ $fileUrl }}" target="_blank">
                                            <img
                                                src="{{ $fileUrl }}"
                                                alt="{{ $accreditation->title }}"
                                                class="w-full h-56 md:h-48 object-contain bg-white p-3">
                                        </a>

                                    @elseif ($fileUrl && $isPdf)

                                        <div class="h-56 md:h-48 bg-white flex flex-col items-center justify-center text-center p-5">

                                            <div class="w-16 h-16 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center font-black">
                                                PDF
                                            </div>

                                            <p class="mt-4 text-sm font-bold text-slate-800">
                                                Sertifikat PDF
                                            </p>

                                            <a href="{{ $fileUrl }}"
                                                target="_blank"
                                                class="mt-2 text-xs font-bold text-blue-700 hover:underline">
                                                Buka file
                                            </a>

                                        </div>

                                    @else

                                        <div class="h-56 md:h-48 bg-white flex flex-col items-center justify-center text-center p-5">

                                            <div class="w-16 h-16 rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center font-black">
                                                A
                                            </div>

                                            <p class="mt-4 text-sm font-bold text-slate-700">
                                                Belum ada file
                                            </p>

                                        </div>

                                    @endif

                                </div>

                            </div>


                            {{-- Detail --}}
                            <div class="md:col-span-8">

                                <div class="flex flex-wrap items-center gap-2">

                                    <span class="inline-flex px-3 py-1.5 rounded-full text-xs font-black
                                        {{ $isInternational ? 'bg-yellow-100 text-yellow-700' : 'bg-blue-100 text-blue-700' }}">
                                        {{ $accreditation->type_label }}
                                    </span>

                                    @if ($accreditation->is_active)
                                        <span class="inline-flex px-3 py-1.5 rounded-full bg-emerald-100 text-emerald-700 text-xs font-black">
                                            Tampil
                                        </span>
                                    @else
                                        <span class="inline-flex px-3 py-1.5 rounded-full bg-slate-100 text-slate-500 text-xs font-black">
                                            Nonaktif
                                        </span>
                                    @endif

                                    @if ($accreditation->rank)
                                        <span class="inline-flex px-3 py-1.5 rounded-full bg-slate-100 text-slate-700 text-xs font-black">
                                            {{ $accreditation->rank }}
                                        </span>
                                    @endif

                                </div>

                                <h2 class="mt-4 text-2xl font-black text-slate-800 leading-snug">
                                    {{ $accreditation->title }}
                                </h2>

                                @if ($accreditation->institution)
                                    <p class="mt-2 text-sm font-bold text-blue-700">
                                        {{ $accreditation->institution }}
                                    </p>
                                @endif

                                @if ($accreditation->description)
                                    <p class="mt-4 text-sm text-slate-500 leading-7">
                                        {{ \Illuminate\Support\Str::limit($accreditation->description, 170) }}
                                    </p>
                                @endif


                                {{-- Info Grid --}}
                                <div class="grid sm:grid-cols-2 gap-3 mt-5">

                                    <div class="rounded-2xl bg-slate-50 border border-slate-100 p-4">

                                        <p class="text-xs text-slate-500">
                                            Nomor Sertifikat / SK
                                        </p>

                                        <p class="mt-1 text-sm font-bold text-slate-800 break-words">
                                            {{ $accreditation->certificate_number ?? '-' }}
                                        </p>

                                    </div>

                                    <div class="rounded-2xl bg-slate-50 border border-slate-100 p-4">

                                        <p class="text-xs text-slate-500">
                                            Urutan Tampil
                                        </p>

                                        <p class="mt-1 text-sm font-bold text-slate-800">
                                            {{ $accreditation->sort_order ?? 0 }}
                                        </p>

                                    </div>

                                    <div class="rounded-2xl bg-slate-50 border border-slate-100 p-4 sm:col-span-2">

                                        <p class="text-xs text-slate-500">
                                            Masa Berlaku
                                        </p>

                                        <p class="mt-1 text-sm font-bold text-slate-800">
                                            @if ($accreditation->valid_from || $accreditation->valid_until)
                                                {{ $formatTanggalIndonesia($accreditation->valid_from) }}
                                                -
                                                {{ $formatTanggalIndonesia($accreditation->valid_until) }}
                                            @else
                                                -
                                            @endif
                                        </p>

                                    </div>

                                </div>


                                {{-- Actions --}}
                                <div class="mt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

                                    <div class="flex flex-wrap gap-2">

                                        @if ($fileUrl)
                                            <a href="{{ $fileUrl }}"
                                                target="_blank"
                                                class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-slate-100 text-slate-700 text-xs font-black hover:bg-slate-200 transition">
                                                Lihat File
                                            </a>
                                        @endif

                                        <a href="{{ route('admin.accreditations.edit', $accreditation) }}"
                                            class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-yellow-100 text-yellow-700 text-xs font-black hover:bg-yellow-200 transition">
                                            Edit
                                        </a>

                                    </div>

                                    <form action="{{ route('admin.accreditations.destroy', $accreditation) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data akreditasi ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-red-100 text-red-700 text-xs font-black hover:bg-red-200 transition">
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        {{-- Empty State --}}
        <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-10 text-center">

            <div class="w-20 h-20 mx-auto rounded-3xl bg-blue-50 text-blue-700 flex items-center justify-center text-3xl font-black">
                A
            </div>

            <h2 class="mt-6 text-2xl font-black text-slate-800">
                Belum ada data akreditasi
            </h2>

            <p class="mt-3 text-slate-500 leading-7">
                Tambahkan data akreditasi nasional atau internasional agar dapat tampil
                di halaman Beranda dan Profile.
            </p>

            <a href="{{ route('admin.accreditations.create') }}"
                class="mt-6 inline-flex items-center justify-center px-6 py-4 rounded-2xl bg-blue-700 text-white font-black hover:bg-blue-800 transition">
                Tambah Akreditasi
            </a>

        </div>

    @endif

</div>

@endsection