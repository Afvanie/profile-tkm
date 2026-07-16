@extends('layouts.admin')

@section('title', 'Konten Profil')

@section('content')

@php
    $sectionLabels = [
        'overview' => [
            'title' => 'Profil Singkat Program Studi',
            'description' => 'Mengatur bagian pengenalan singkat Program Studi D-III Teknik Mesin.',
        ],
        'history' => [
            'title' => 'Sejarah Program Studi',
            'description' => 'Mengatur bagian sejarah atau perjalanan Program Studi.',
        ],
        'vision-mission' => [
            'title' => 'Visi dan Misi Program Studi',
            'description' => 'Mengatur visi dan misi Program Studi.',
        ],
        'visi-misi' => [
            'title' => 'Visi dan Misi Program Studi',
            'description' => 'Mengatur visi dan misi Program Studi.',
        ],
        'goals' => [
            'title' => 'Tujuan Program Studi',
            'description' => 'Mengatur tujuan pendidikan Program Studi.',
        ],
        'tujuan-prodi' => [
            'title' => 'Tujuan Program Studi',
            'description' => 'Mengatur tujuan pendidikan Program Studi.',
        ],
        'ppm' => [
            'title' => 'Profil Profesional Mandiri Lulusan',
            'description' => 'Mengatur profil kemampuan lulusan setelah menyelesaikan pendidikan.',
        ],
        'cpl' => [
            'title' => 'Capaian Pembelajaran Lulusan',
            'description' => 'Mengatur capaian pembelajaran lulusan Program Studi.',
        ],
        'accreditation' => [
            'title' => 'Akreditasi Program Studi',
            'description' => 'Mengatur informasi akreditasi Program Studi.',
        ],
    ];

    $totalSections = $sections->count();
    $activeSections = $sections->where('is_active', true)->count();
@endphp

<div class="space-y-6">

    {{-- Header --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-6 md:p-8">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>
                <p class="text-sm font-extrabold tracking-[0.2em] uppercase text-blue-700">
                    Profil Program Studi
                </p>

                <h1 class="mt-3 text-2xl md:text-3xl font-black text-slate-900">
                    Konten Profil Program Studi
                </h1>

                <p class="mt-3 max-w-3xl text-slate-500 leading-7">
                    Kelola informasi yang tampil pada halaman profil Program Studi D-III Teknik Mesin,
                    seperti profil singkat, sejarah, visi misi, tujuan, PPM, dan CPL.
                </p>
            </div>

            <a href="{{ route('profile') }}"
               target="_blank"
               class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                Lihat Halaman Profil
            </a>

        </div>

    </div>


    {{-- Alert --}}
    @if (session('success'))
        <div class="rounded-2xl border border-green-100 bg-green-50 px-5 py-4 text-green-700 font-semibold shadow-sm">
            {{ session('success') }}
        </div>
    @endif


    {{-- Summary --}}
    <div class="grid sm:grid-cols-2 gap-4">

        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5">
            <p class="text-sm font-bold text-slate-500">
                Total Bagian Profil
            </p>

            <p class="mt-3 text-3xl font-black text-slate-900">
                {{ $totalSections }}
            </p>
        </div>

        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5">
            <p class="text-sm font-bold text-slate-500">
                Bagian yang Ditampilkan
            </p>

            <p class="mt-3 text-3xl font-black text-slate-900">
                {{ $activeSections }}
            </p>
        </div>

    </div>


    {{-- List Content --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

            <div>
                <h2 class="text-xl font-black text-slate-900">
                    Daftar Bagian Profil
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Pilih bagian profil yang ingin diperbarui.
                </p>
            </div>

            <div class="relative w-full lg:w-80">

                <input
                    type="text"
                    id="profileContentSearch"
                    placeholder="Cari bagian profil..."
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


        <div class="divide-y divide-slate-100">

            @forelse ($sections as $section)

                @php
                    $displayTitle = $sectionLabels[$section->slug]['title'] ?? $section->title;
                    $displayDescription = $sectionLabels[$section->slug]['description']
                        ?? ($section->subtitle ?: 'Kelola konten bagian profil program studi.');

                    $displayOrder = $loop->iteration;
                @endphp

                <div class="group px-6 py-5 hover:bg-slate-50 transition"
                     data-profile-row
                     data-title="{{ strtolower($displayTitle) }}"
                     data-description="{{ strtolower($displayDescription) }}">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                        <div class="flex items-start gap-4 min-w-0">

                            <div class="w-11 h-11 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center font-black shrink-0">
                                {{ $displayOrder }}
                            </div>

                            <div class="min-w-0">

                                <div class="flex flex-wrap items-center gap-2">

                                    <h3 class="text-lg font-black text-slate-900">
                                        {{ $displayTitle }}
                                    </h3>

                                    @if ($section->is_active)
                                        <span class="inline-flex px-3 py-1 rounded-full bg-green-50 text-green-700 text-xs font-bold">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="inline-flex px-3 py-1 rounded-full bg-red-50 text-red-700 text-xs font-bold">
                                            Nonaktif
                                        </span>
                                    @endif

                                </div>

                                <p class="mt-2 text-sm text-slate-500 leading-6">
                                    {{ $displayDescription }}
                                </p>

                                <div class="mt-3 flex flex-wrap gap-3 text-xs text-slate-400">

                                    <span>
                                        {{ $section->items_count }} item konten
                                    </span>

                                    <span>
                                        Urutan tampil: {{ $section->sort_order }}
                                    </span>

                                </div>

                            </div>

                        </div>


                        <div class="flex flex-col sm:flex-row gap-3 lg:shrink-0">

                            <a href="{{ route('admin.profile-contents.edit', $section) }}"
                               class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-blue-700 text-white text-sm font-bold hover:bg-blue-800 transition">
                                Edit Konten
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="p-10 text-center">

                    <h3 class="text-xl font-black text-slate-900">
                        Belum ada konten profil
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Data konten profil belum tersedia.
                    </p>

                </div>

            @endforelse

        </div>


        {{-- Empty Search --}}
        <div id="profileContentEmptySearch"
             class="hidden p-10 text-center border-t border-slate-100">

            <h3 class="text-xl font-black text-slate-900">
                Bagian profil tidak ditemukan
            </h3>

            <p class="mt-2 text-slate-500">
                Coba gunakan kata kunci pencarian lain.
            </p>

        </div>

    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('profileContentSearch');
        const rows = document.querySelectorAll('[data-profile-row]');
        const emptySearch = document.getElementById('profileContentEmptySearch');

        if (!searchInput) {
            return;
        }

        searchInput.addEventListener('input', function () {
            const keyword = this.value.toLowerCase().trim();
            let visibleCount = 0;

            rows.forEach(function (row) {
                const title = row.dataset.title || '';
                const description = row.dataset.description || '';

                const isMatch =
                    title.includes(keyword) ||
                    description.includes(keyword);

                row.style.display = isMatch ? '' : 'none';

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