@extends('layouts.admin')

@section('title', 'Data Dosen & Staff')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

        <div>
            <h1 class="text-3xl md:text-4xl font-black text-slate-800">
                Data Dosen & Staff
            </h1>

            <p class="mt-3 text-slate-500 leading-7">
                Kelola data dosen dan staff Program Studi D-III Teknik Mesin Politeknik Negeri Malang.
            </p>
        </div>

        <a href="{{ route('admin.lecturer-staff.create') }}"
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

            Tambah Data
        </a>

    </div>


    {{-- Alert --}}
    @if (session('success'))
        <div class="rounded-2xl bg-green-50 border border-green-200 text-green-700 px-6 py-4 font-semibold">
            {{ session('success') }}
        </div>
    @endif


    {{-- Statistik --}}
    <div class="grid md:grid-cols-3 gap-6">

        <div class="rounded-[2rem] bg-white/95 backdrop-blur border border-slate-100 shadow-xl p-6">

            <div class="flex items-center justify-between gap-4">

                <div>
                    <p class="text-sm font-bold text-slate-500">
                        Total Data
                    </p>

                    <h2 class="mt-3 text-4xl font-black text-slate-800">
                        {{ $lecturerStaff->count() }}
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
                            d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H4v-2a4 4 0 015-3.87M12 12a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>
                </div>

            </div>

        </div>

        <div class="rounded-[2rem] bg-white/95 backdrop-blur border border-slate-100 shadow-xl p-6">

            <div class="flex items-center justify-between gap-4">

                <div>
                    <p class="text-sm font-bold text-slate-500">
                        Total Dosen
                    </p>

                    <h2 class="mt-3 text-4xl font-black text-slate-800">
                        {{ $lecturerStaff->where('type', 'dosen')->count() }}
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
                            d="M12 14l9-5-9-5-9 5 9 5z" />

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 14l6.16-3.422A12.083 12.083 0 0112 21.5a12.083 12.083 0 01-6.16-10.922L12 14z" />
                    </svg>
                </div>

            </div>

        </div>

        <div class="rounded-[2rem] bg-white/95 backdrop-blur border border-slate-100 shadow-xl p-6">

            <div class="flex items-center justify-between gap-4">

                <div>
                    <p class="text-sm font-bold text-slate-500">
                        Total Staff
                    </p>

                    <h2 class="mt-3 text-4xl font-black text-slate-800">
                        {{ $lecturerStaff->where('type', 'staff')->count() }}
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
                            d="M5.121 17.804A4 4 0 017.95 16.6h8.1a4 4 0 012.829 1.204M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
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
                        Daftar Dosen & Staff
                    </h2>

                    <p class="mt-2 text-slate-500">
                        Data ini akan ditampilkan pada halaman publik Dosen & Staff.
                    </p>
                </div>

                <div class="relative w-full lg:w-96">

                    <input
                        type="text"
                        id="lecturerStaffSearch"
                        placeholder="Cari nama, NIP, atau tipe..."
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
        <div class="hidden lg:block overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 border-b border-slate-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                            Nama
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                            NIP
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">
                            Tipe
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($lecturerStaff as $item)

                        <tr
                            class="hover:bg-slate-50/70 transition"
                            data-person-card
                            data-name="{{ strtolower($item->name) }}"
                            data-nip="{{ strtolower($item->nip ?? '') }}"
                            data-type="{{ strtolower($item->type) }}">

                            <td class="px-6 py-5">

                                <div class="flex items-center gap-4">

                                    @if ($item->photo)

                                        <img
                                            src="{{ asset('storage/' . $item->photo) }}"
                                            class="w-16 h-16 rounded-2xl object-cover shadow-md border border-slate-100"
                                            alt="{{ $item->name }}">

                                    @else

                                        <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center shadow-md">
                                            <span class="text-xl font-black text-blue-700">
                                                {{ strtoupper(substr($item->name, 0, 1)) }}
                                            </span>
                                        </div>

                                    @endif

                                    <div>
                                        <h3 class="font-bold text-slate-800">
                                            {{ $item->name }}
                                        </h3>

                                        <p class="mt-1 text-sm text-slate-500">
                                            Program Studi D-III Teknik Mesin
                                        </p>
                                    </div>

                                </div>

                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                {{ $item->nip ?? '-' }}
                            </td>

                            <td class="px-6 py-5">

                                @if ($item->type === 'dosen')
                                    <span class="inline-flex px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-bold">
                                        Dosen
                                    </span>
                                @else
                                    <span class="inline-flex px-3 py-1 rounded-full bg-yellow-50 text-yellow-700 text-xs font-bold">
                                        Staff
                                    </span>
                                @endif

                            </td>

                            <td class="px-6 py-5">

                                <div class="flex justify-end gap-3">

                                    <a href="{{ route('admin.lecturer-staff.edit', $item->id) }}"
                                        class="px-4 py-2 rounded-xl bg-blue-50 text-blue-700 text-sm font-bold hover:bg-blue-700 hover:text-white transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.lecturer-staff.destroy', $item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">

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
                            <td colspan="4" class="px-6 py-14 text-center">

                                <h3 class="text-xl font-bold text-slate-800">
                                    Belum ada data
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Tambahkan data dosen atau staff terlebih dahulu.
                                </p>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Mobile / Tablet Cards --}}
        <div class="lg:hidden p-5 md:p-6 space-y-4">

            @forelse ($lecturerStaff as $item)

                <div
                    class="rounded-3xl bg-slate-50 border border-slate-100 p-5"
                    data-person-card
                    data-name="{{ strtolower($item->name) }}"
                    data-nip="{{ strtolower($item->nip ?? '') }}"
                    data-type="{{ strtolower($item->type) }}">

                    <div class="flex items-start gap-4">

                        @if ($item->photo)

                            <img
                                src="{{ asset('storage/' . $item->photo) }}"
                                class="w-16 h-16 rounded-2xl object-cover shadow-md border border-slate-100 shrink-0"
                                alt="{{ $item->name }}">

                        @else

                            <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center shadow-md shrink-0">
                                <span class="text-xl font-black text-blue-700">
                                    {{ strtoupper(substr($item->name, 0, 1)) }}
                                </span>
                            </div>

                        @endif

                        <div class="min-w-0 flex-1">

                            <div class="flex items-start justify-between gap-3">

                                <div class="min-w-0">
                                    <h3 class="font-bold text-slate-800">
                                        {{ $item->name }}
                                    </h3>

                                    <p class="mt-1 text-sm text-slate-500 break-all">
                                        NIP. {{ $item->nip ?? '-' }}
                                    </p>
                                </div>

                                @if ($item->type === 'dosen')
                                    <span class="shrink-0 inline-flex px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-bold">
                                        Dosen
                                    </span>
                                @else
                                    <span class="shrink-0 inline-flex px-3 py-1 rounded-full bg-yellow-50 text-yellow-700 text-xs font-bold">
                                        Staff
                                    </span>
                                @endif

                            </div>

                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-3 mt-5">

                        <a href="{{ route('admin.lecturer-staff.edit', $item->id) }}"
                            class="px-4 py-3 rounded-xl bg-blue-700 text-white text-center text-sm font-bold hover:bg-blue-800 transition">
                            Edit
                        </a>

                        <form action="{{ route('admin.lecturer-staff.destroy', $item->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">

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
                        Belum ada data
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Tambahkan data dosen atau staff terlebih dahulu.
                    </p>

                </div>

            @endforelse

        </div>


        {{-- Empty Search --}}
        <div id="lecturerStaffEmptySearch" class="hidden p-10 text-center border-t border-slate-100">

            <h3 class="text-xl font-bold text-slate-800">
                Data tidak ditemukan
            </h3>

            <p class="mt-2 text-slate-500">
                Coba gunakan kata kunci pencarian lain.
            </p>

        </div>

    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('lecturerStaffSearch');
        const cards = document.querySelectorAll('[data-person-card]');
        const emptySearch = document.getElementById('lecturerStaffEmptySearch');

        if (!searchInput) {
            return;
        }

        searchInput.addEventListener('input', function () {
            const keyword = this.value.toLowerCase().trim();
            let visibleCount = 0;

            cards.forEach(function (card) {
                const name = card.dataset.name || '';
                const nip = card.dataset.nip || '';
                const type = card.dataset.type || '';

                const isMatch =
                    name.includes(keyword) ||
                    nip.includes(keyword) ||
                    type.includes(keyword);

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