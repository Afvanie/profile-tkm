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

    $totalAccreditation = $accreditations->count();
    $activeAccreditation = $accreditations->where('is_active', true)->count();
    $nationalAccreditation = $accreditations->where('type', 'nasional')->count();
    $internationalAccreditation = $accreditations->where('type', 'internasional')->count();
@endphp

<div class="space-y-6">

    {{-- Header --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-6 md:p-8">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>
                <p class="text-sm font-extrabold tracking-[0.2em] uppercase text-blue-700">
                    Akreditasi
                </p>

                <h1 class="mt-3 text-2xl md:text-3xl font-black text-slate-900">
                    Kelola Akreditasi Program Studi
                </h1>

                <p class="mt-3 max-w-3xl text-slate-500 leading-7">
                    Kelola data akreditasi nasional dan internasional, termasuk lembaga, peringkat, masa berlaku, nomor sertifikat, dan file sertifikat.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">

                <a href="{{ route('profile') }}#akreditasi"
                   target="_blank"
                   class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition">
                    Lihat di Website
                </a>

                <a href="{{ route('admin.accreditations.create') }}"
                   class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                    Tambah Akreditasi
                </a>

            </div>

        </div>

    </div>


    {{-- Alert --}}
    @if (session('success'))
        <div class="rounded-2xl border border-green-100 bg-green-50 px-5 py-4 text-green-700 font-semibold shadow-sm">
            {{ session('success') }}
        </div>
    @endif


    {{-- Summary --}}
    <div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-4">

        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5">
            <p class="text-sm font-bold text-slate-500">
                Total Data
            </p>

            <h2 class="mt-3 text-3xl font-black text-slate-900">
                {{ $totalAccreditation }}
            </h2>
        </div>

        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5">
            <p class="text-sm font-bold text-slate-500">
                Sedang Tampil
            </p>

            <h2 class="mt-3 text-3xl font-black text-green-700">
                {{ $activeAccreditation }}
            </h2>
        </div>

        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5">
            <p class="text-sm font-bold text-slate-500">
                Nasional
            </p>

            <h2 class="mt-3 text-3xl font-black text-blue-700">
                {{ $nationalAccreditation }}
            </h2>
        </div>

        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5">
            <p class="text-sm font-bold text-slate-500">
                Internasional
            </p>

            <h2 class="mt-3 text-3xl font-black text-amber-600">
                {{ $internationalAccreditation }}
            </h2>
        </div>

    </div>


    {{-- Content --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

            <div>
                <h2 class="text-xl font-black text-slate-900">
                    Daftar Akreditasi
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Data yang aktif akan ditampilkan pada website.
                </p>
            </div>

            <div class="relative w-full lg:w-80">

                <input type="text"
                       id="accreditationSearch"
                       placeholder="Cari akreditasi..."
                       class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 pl-11 text-sm focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                </svg>

            </div>

        </div>

        @if ($accreditations->count())

            <div class="p-4 md:p-6 grid xl:grid-cols-2 gap-5">

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

                        $typeLabel = $accreditation->type_label ?? ucfirst($accreditation->type);
                    @endphp

                    <div class="rounded-3xl border border-slate-200 bg-slate-50 overflow-hidden"
                         data-accreditation-card
                         data-title="{{ strtolower($accreditation->title ?? '') }}"
                         data-institution="{{ strtolower($accreditation->institution ?? '') }}"
                         data-rank="{{ strtolower($accreditation->rank ?? '') }}"
                         data-number="{{ strtolower($accreditation->certificate_number ?? '') }}">

                        <div class="h-1.5 {{ $isInternational ? 'bg-amber-500' : 'bg-blue-700' }}"></div>

                        <div class="p-4 md:p-5 grid md:grid-cols-12 gap-5">

                            {{-- Preview --}}
                            <div class="md:col-span-4">

                                <div class="rounded-2xl border border-slate-200 bg-white overflow-hidden">

                                    @if ($fileUrl && $isImage)

                                        <a href="{{ $fileUrl }}" target="_blank">
                                            <img src="{{ $fileUrl }}"
                                                 alt="{{ $accreditation->title }}"
                                                 class="w-full h-48 object-contain bg-white p-3">
                                        </a>

                                    @elseif ($fileUrl && $isPdf)

                                        <div class="h-48 bg-white flex flex-col items-center justify-center text-center p-5">

                                            <div class="w-14 h-14 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center text-sm font-black">
                                                PDF
                                            </div>

                                            <p class="mt-3 text-sm font-black text-slate-800">
                                                Sertifikat PDF
                                            </p>

                                            <a href="{{ $fileUrl }}"
                                               target="_blank"
                                               class="mt-2 text-xs font-bold text-blue-700 hover:underline">
                                                Buka file
                                            </a>

                                        </div>

                                    @else

                                        <div class="h-48 bg-white flex flex-col items-center justify-center text-center p-5">

                                            <div class="w-14 h-14 rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center text-sm font-black">
                                                A
                                            </div>

                                            <p class="mt-3 text-sm font-black text-slate-700">
                                                Belum ada file
                                            </p>

                                        </div>

                                    @endif

                                </div>

                            </div>


                            {{-- Detail --}}
                            <div class="md:col-span-8 min-w-0">

                                <div class="flex flex-wrap items-center gap-2">

                                    <span class="inline-flex px-3 py-1.5 rounded-full text-xs font-black
                                        {{ $isInternational ? 'bg-amber-100 text-amber-700' : 'bg-blue-100 text-blue-700' }}">
                                        {{ $typeLabel }}
                                    </span>

                                    @if ($accreditation->is_active)
                                        <span class="inline-flex px-3 py-1.5 rounded-full bg-green-100 text-green-700 text-xs font-black">
                                            Tampil
                                        </span>
                                    @else
                                        <span class="inline-flex px-3 py-1.5 rounded-full bg-slate-200 text-slate-600 text-xs font-black">
                                            Nonaktif
                                        </span>
                                    @endif

                                    @if ($accreditation->rank)
                                        <span class="inline-flex px-3 py-1.5 rounded-full bg-white border border-slate-200 text-slate-700 text-xs font-black">
                                            {{ $accreditation->rank }}
                                        </span>
                                    @endif

                                </div>

                                <h3 class="mt-4 text-xl font-black text-slate-900 leading-snug">
                                    {{ $accreditation->title }}
                                </h3>

                                @if ($accreditation->institution)
                                    <p class="mt-2 text-sm font-bold text-blue-700">
                                        {{ $accreditation->institution }}
                                    </p>
                                @endif

                                @if ($accreditation->description)
                                    <p class="mt-3 text-sm text-slate-500 leading-7">
                                        {{ \Illuminate\Support\Str::limit($accreditation->description, 150) }}
                                    </p>
                                @endif

                                <div class="grid sm:grid-cols-2 gap-3 mt-4">

                                    <div class="rounded-2xl bg-white border border-slate-200 p-4">
                                        <p class="text-xs font-bold text-slate-500">
                                            Nomor Sertifikat / SK
                                        </p>

                                        <p class="mt-1 text-sm font-black text-slate-800 break-words">
                                            {{ $accreditation->certificate_number ?? '-' }}
                                        </p>
                                    </div>

                                    <div class="rounded-2xl bg-white border border-slate-200 p-4">
                                        <p class="text-xs font-bold text-slate-500">
                                            Urutan
                                        </p>

                                        <p class="mt-1 text-sm font-black text-slate-800">
                                            {{ $accreditation->sort_order ?? 0 }}
                                        </p>
                                    </div>

                                    <div class="rounded-2xl bg-white border border-slate-200 p-4 sm:col-span-2">
                                        <p class="text-xs font-bold text-slate-500">
                                            Masa Berlaku
                                        </p>

                                        <p class="mt-1 text-sm font-black text-slate-800">
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

                                <div class="mt-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

                                    <div class="flex flex-wrap gap-2">

                                        @if ($fileUrl)
                                            <a href="{{ $fileUrl }}"
                                               target="_blank"
                                               class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-white border border-slate-200 text-slate-700 text-xs font-black hover:bg-slate-100 transition">
                                                Lihat File
                                            </a>
                                        @endif

                                        <a href="{{ route('admin.accreditations.edit', $accreditation) }}"
                                           class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-blue-700 text-white text-xs font-black hover:bg-blue-800 transition">
                                            Edit
                                        </a>

                                    </div>

                                    <form action="{{ route('admin.accreditations.destroy', $accreditation) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data akreditasi ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-red-50 text-red-700 text-xs font-black hover:bg-red-600 hover:text-white transition">
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

            <div id="accreditationEmptySearch"
                 class="hidden p-10 text-center">

                <h3 class="text-xl font-black text-slate-900">
                    Data tidak ditemukan
                </h3>

                <p class="mt-2 text-sm text-slate-500">
                    Coba gunakan kata kunci pencarian lain.
                </p>

            </div>

        @else

            <div class="p-10 text-center">

                <div class="w-20 h-20 mx-auto rounded-3xl bg-blue-50 text-blue-700 flex items-center justify-center text-3xl font-black">
                    A
                </div>

                <h2 class="mt-6 text-2xl font-black text-slate-900">
                    Belum ada data akreditasi
                </h2>

                <p class="mt-3 text-slate-500 leading-7">
                    Tambahkan data akreditasi nasional atau internasional agar tampil di halaman website.
                </p>

                <a href="{{ route('admin.accreditations.create') }}"
                   class="mt-6 inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                    Tambah Akreditasi
                </a>

            </div>

        @endif

    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('accreditationSearch');
        const cards = document.querySelectorAll('[data-accreditation-card]');
        const emptySearch = document.getElementById('accreditationEmptySearch');

        if (!searchInput) {
            return;
        }

        searchInput.addEventListener('input', function () {
            const keyword = this.value.toLowerCase().trim();
            let visibleCount = 0;

            cards.forEach(function (card) {
                const haystack = [
                    card.dataset.title || '',
                    card.dataset.institution || '',
                    card.dataset.rank || '',
                    card.dataset.number || '',
                ].join(' ');

                const isMatch = haystack.includes(keyword);

                card.style.display = isMatch ? '' : 'none';

                if (isMatch) {
                    visibleCount++;
                }
            });

            if (emptySearch) {
                emptySearch.classList.toggle('hidden', visibleCount > 0);
            }
        });
    });
</script>

@endsection