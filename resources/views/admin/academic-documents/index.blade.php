@extends('layouts.admin')

@section('title', 'Dokumen Akademik')

@section('content')

@php
    $documentCollection = $documents instanceof \Illuminate\Pagination\AbstractPaginator
        ? $documents->getCollection()
        : collect($documents);

    $totalDocuments = $documentCollection->count();
    $activeDocuments = $documentCollection->where('is_active', true)->count();
    $inactiveDocuments = $documentCollection->where('is_active', false)->count();
@endphp

<div class="space-y-8">

    {{-- Header --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

        <div>
            <h1 class="text-3xl md:text-4xl font-black text-slate-800">
                Dokumen Akademik
            </h1>

            <p class="mt-3 text-slate-500 leading-7 max-w-4xl">
                Kelola dokumen akademik untuk menu Pedoman Akademik, Kalender Akademik,
                Kurikulum, Jadwal Kuliah, dan Laporan Ketercapaian.
            </p>
        </div>

        <a href="{{ route('admin.academic-documents.create') }}"
            class="inline-flex items-center justify-center gap-3 px-6 py-4 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition shadow-lg shadow-blue-700/20">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>

            Tambah Dokumen
        </a>

    </div>


    {{-- Alert --}}
    @if (session('success'))
        <div class="rounded-2xl bg-green-50 border border-green-200 text-green-700 px-6 py-4 font-semibold">
            {{ session('success') }}
        </div>
    @endif


    {{-- Statistic --}}
    <div class="grid md:grid-cols-3 gap-6">

        <div class="rounded-[2rem] bg-white/95 backdrop-blur border border-slate-100 shadow-xl p-6">

            <div class="flex items-center justify-between gap-4">

                <div>
                    <p class="text-sm font-bold text-slate-500">
                        Total Dokumen
                    </p>

                    <h2 class="mt-3 text-4xl font-black text-slate-800">
                        {{ $totalDocuments }}
                    </h2>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-blue-700 text-white flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-7 h-7"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12h6m-6 4h6M5 4h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z" />
                    </svg>
                </div>

            </div>

        </div>

        <div class="rounded-[2rem] bg-white/95 backdrop-blur border border-slate-100 shadow-xl p-6">

            <div class="flex items-center justify-between gap-4">

                <div>
                    <p class="text-sm font-bold text-slate-500">
                        Dokumen Aktif
                    </p>

                    <h2 class="mt-3 text-4xl font-black text-slate-800">
                        {{ $activeDocuments }}
                    </h2>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-green-600 text-white flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-7 h-7"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7" />
                    </svg>
                </div>

            </div>

        </div>

        <div class="rounded-[2rem] bg-white/95 backdrop-blur border border-slate-100 shadow-xl p-6">

            <div class="flex items-center justify-between gap-4">

                <div>
                    <p class="text-sm font-bold text-slate-500">
                        Dokumen Nonaktif
                    </p>

                    <h2 class="mt-3 text-4xl font-black text-slate-800">
                        {{ $inactiveDocuments }}
                    </h2>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-yellow-400 text-slate-900 flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-7 h-7"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12A9 9 0 113 12a9 9 0 0118 0z" />
                    </svg>
                </div>

            </div>

        </div>

    </div>


    {{-- Main Card --}}
    <div class="rounded-[2rem] bg-white/95 backdrop-blur border border-slate-100 shadow-xl overflow-hidden">

        <div class="h-2 bg-gradient-to-r from-blue-700 via-yellow-400 to-blue-700"></div>

        {{-- Toolbar --}}
        <div class="p-6 md:p-8 border-b border-slate-100">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                <div>
                    <h2 class="text-2xl font-black text-slate-800">
                        Daftar Dokumen Akademik
                    </h2>

                    <p class="mt-2 text-slate-500">
                        Dokumen ini akan tampil pada halaman akademik website publik.
                    </p>
                </div>

                <div class="relative w-full lg:w-96">

                    <input
                        type="text"
                        id="academicDocumentSearch"
                        placeholder="Cari judul, kategori, atau tahun..."
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 pl-12 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                    </svg>

                </div>

            </div>

        </div>


        {{-- Desktop Table --}}
        <div class="hidden xl:block overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 border-b border-slate-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                            Dokumen
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                            Kategori
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                            Tahun
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                            Status
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                            File / Link
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($documents as $document)

                        <tr
                            class="hover:bg-slate-50/70 transition"
                            data-document-card
                            data-title="{{ strtolower($document->title) }}"
                            data-category="{{ strtolower($document->category_label ?? $document->category) }}"
                            data-year="{{ strtolower($document->academic_year ?? '') }}">

                            <td class="px-6 py-5">

                                <div class="flex items-start gap-4">

                                    <div class="w-14 h-14 rounded-2xl bg-blue-700 text-white flex items-center justify-center shrink-0 shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-7 h-7"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 12h6m-6 4h6M5 4h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                        </svg>
                                    </div>

                                    <div class="min-w-0">

                                        <h3 class="font-bold text-slate-800">
                                            {{ $document->title }}
                                        </h3>

                                        @if ($document->description)
                                            <p class="mt-1 text-sm text-slate-500 leading-6">
                                                {{ \Illuminate\Support\Str::limit($document->description, 90) }}
                                            </p>
                                        @else
                                            <p class="mt-1 text-sm text-slate-400">
                                                Tidak ada deskripsi.
                                            </p>
                                        @endif

                                    </div>

                                </div>

                            </td>

                            <td class="px-6 py-5">

                                <span class="inline-flex px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-bold">
                                    {{ $document->category_label }}
                                </span>

                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                {{ $document->academic_year ?? '-' }}
                            </td>

                            <td class="px-6 py-5">

                                @if ($document->is_active)
                                    <span class="inline-flex px-3 py-1 rounded-full bg-green-50 text-green-700 text-xs font-bold">
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex px-3 py-1 rounded-full bg-slate-100 text-slate-500 text-xs font-bold">
                                        Nonaktif
                                    </span>
                                @endif

                            </td>

                            <td class="px-6 py-5">

                                <div class="flex flex-col gap-2">

                                    @if ($document->file_path)
                                        <a href="{{ asset('storage/' . $document->file_path) }}"
                                            target="_blank"
                                            class="inline-flex text-sm font-bold text-blue-700 hover:underline">
                                            Lihat File
                                        </a>
                                    @endif

                                    @if ($document->external_link)
                                        <a href="{{ $document->external_link }}"
                                            target="_blank"
                                            class="inline-flex text-sm font-bold text-yellow-600 hover:underline">
                                            Buka Link
                                        </a>
                                    @endif

                                    @if (!$document->file_path && !$document->external_link)
                                        <span class="text-sm text-slate-400">
                                            -
                                        </span>
                                    @endif

                                </div>

                            </td>

                            <td class="px-6 py-5">

                                <div class="flex justify-end gap-3">

                                    <a href="{{ route('admin.academic-documents.edit', $document->id) }}"
                                        class="px-4 py-2 rounded-xl bg-blue-50 text-blue-700 text-sm font-bold hover:bg-blue-700 hover:text-white transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.academic-documents.destroy', $document->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="px-4 py-2 rounded-xl bg-red-50 text-red-700 text-sm font-bold hover:bg-red-600 hover:text-white transition">
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="px-6 py-14 text-center">

                                <h3 class="text-xl font-bold text-slate-800">
                                    Belum ada dokumen akademik
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Tambahkan dokumen akademik terlebih dahulu.
                                </p>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Mobile / Tablet Cards --}}
        <div class="xl:hidden p-5 md:p-6 space-y-4">

            @forelse ($documents as $document)

                <div
                    class="rounded-3xl bg-slate-50 border border-slate-100 p-5"
                    data-document-card
                    data-title="{{ strtolower($document->title) }}"
                    data-category="{{ strtolower($document->category_label ?? $document->category) }}"
                    data-year="{{ strtolower($document->academic_year ?? '') }}">

                    <div class="flex items-start gap-4">

                        <div class="w-14 h-14 rounded-2xl bg-blue-700 text-white flex items-center justify-center shrink-0 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-7 h-7"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12h6m-6 4h6M5 4h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z" />
                            </svg>
                        </div>

                        <div class="min-w-0 flex-1">

                            <h3 class="font-bold text-slate-800">
                                {{ $document->title }}
                            </h3>

                            <div class="mt-3 flex flex-wrap gap-2">

                                <span class="inline-flex px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-bold">
                                    {{ $document->category_label }}
                                </span>

                                @if ($document->academic_year)
                                    <span class="inline-flex px-3 py-1 rounded-full bg-white text-slate-600 text-xs font-bold border border-slate-100">
                                        {{ $document->academic_year }}
                                    </span>
                                @endif

                                @if ($document->is_active)
                                    <span class="inline-flex px-3 py-1 rounded-full bg-green-50 text-green-700 text-xs font-bold">
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex px-3 py-1 rounded-full bg-slate-100 text-slate-500 text-xs font-bold">
                                        Nonaktif
                                    </span>
                                @endif

                            </div>

                        </div>

                    </div>

                    @if ($document->description)
                        <p class="mt-4 text-sm text-slate-500 leading-6">
                            {{ \Illuminate\Support\Str::limit($document->description, 130) }}
                        </p>
                    @endif

                    <div class="mt-5 flex flex-wrap gap-3">

                        @if ($document->file_path)
                            <a href="{{ asset('storage/' . $document->file_path) }}"
                                target="_blank"
                                class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-white border border-slate-200 text-blue-700 text-sm font-bold hover:bg-blue-50 transition">
                                Lihat File
                            </a>
                        @endif

                        @if ($document->external_link)
                            <a href="{{ $document->external_link }}"
                                target="_blank"
                                class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-white border border-slate-200 text-yellow-600 text-sm font-bold hover:bg-yellow-50 transition">
                                Buka Link
                            </a>
                        @endif

                    </div>

                    <div class="grid grid-cols-2 gap-3 mt-5">

                        <a href="{{ route('admin.academic-documents.edit', $document->id) }}"
                            class="px-4 py-3 rounded-xl bg-blue-700 text-white text-center text-sm font-bold hover:bg-blue-800 transition">
                            Edit
                        </a>

                        <form action="{{ route('admin.academic-documents.destroy', $document->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="w-full px-4 py-3 rounded-xl bg-red-600 text-white text-sm font-bold hover:bg-red-700 transition">
                                Hapus
                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <div class="rounded-3xl bg-slate-50 border border-slate-100 p-10 text-center">

                    <h3 class="text-xl font-bold text-slate-800">
                        Belum ada dokumen akademik
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Tambahkan dokumen akademik terlebih dahulu.
                    </p>

                </div>

            @endforelse

        </div>


        {{-- Empty Search --}}
        <div id="academicDocumentEmptySearch" class="hidden p-10 text-center border-t border-slate-100">

            <h3 class="text-xl font-bold text-slate-800">
                Dokumen tidak ditemukan
            </h3>

            <p class="mt-2 text-slate-500">
                Coba gunakan kata kunci pencarian lain.
            </p>

        </div>

    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('academicDocumentSearch');
        const cards = document.querySelectorAll('[data-document-card]');
        const emptySearch = document.getElementById('academicDocumentEmptySearch');

        if (!searchInput) {
            return;
        }

        searchInput.addEventListener('input', function () {
            const keyword = this.value.toLowerCase().trim();
            let visibleCount = 0;

            cards.forEach(function (card) {
                const title = card.dataset.title || '';
                const category = card.dataset.category || '';
                const year = card.dataset.year || '';

                const isMatch =
                    title.includes(keyword) ||
                    category.includes(keyword) ||
                    year.includes(keyword);

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