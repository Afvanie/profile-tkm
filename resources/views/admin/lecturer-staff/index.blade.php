@extends('layouts.admin')

@section('title', 'Data Dosen & Staff')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-6 md:p-8">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>
                <p class="text-sm font-extrabold tracking-[0.2em] uppercase text-blue-700">
                    Dosen & Staff
                </p>

                <h1 class="mt-3 text-2xl md:text-3xl font-black text-slate-900">
                    Kelola Data Dosen & Staff
                </h1>

                <p class="mt-3 max-w-3xl text-slate-500 leading-7">
                    Kelola data dosen dan staff Program Studi D-III Teknik Mesin Politeknik Negeri Malang.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">

                <a href="{{ route('lecturers') }}"
                   target="_blank"
                   class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition">
                    Lihat Website
                </a>

                <a href="{{ route('admin.lecturer-staff.create') }}"
                   class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                    Tambah Data
                </a>

            </div>

        </div>

    </div>


    {{-- Alert Success --}}
    @if (session('success'))
        <div class="rounded-2xl border border-green-100 bg-green-50 px-5 py-4 text-green-700 font-semibold shadow-sm">
            {{ session('success') }}
        </div>
    @endif


    {{-- Error --}}
    @if ($errors->any())
        <div class="rounded-2xl border border-red-100 bg-red-50 px-5 py-4 text-red-700 shadow-sm">

            <h3 class="font-black mb-2">
                Ada data yang perlu diperbaiki:
            </h3>

            <ul class="list-disc list-inside space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>

        </div>
    @endif


    {{-- Summary --}}
    <div class="grid sm:grid-cols-3 gap-4">

        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5">
            <p class="text-sm font-bold text-slate-500">
                Total Data
            </p>

            <h2 class="mt-3 text-3xl font-black text-slate-900">
                {{ $totalAll ?? 0 }}
            </h2>
        </div>

        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5">
            <p class="text-sm font-bold text-slate-500">
                Total Dosen
            </p>

            <h2 class="mt-3 text-3xl font-black text-blue-700">
                {{ $totalDosen ?? 0 }}
            </h2>
        </div>

        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-5">
            <p class="text-sm font-bold text-slate-500">
                Total Staff
            </p>

            <h2 class="mt-3 text-3xl font-black text-amber-600">
                {{ $totalStaff ?? 0 }}
            </h2>
        </div>

    </div>


    {{-- Import --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

            <div>
                <h2 class="text-xl font-black text-slate-900">
                    Import Data Dosen & Staff
                </h2>

                <p class="mt-1 text-sm text-slate-500 leading-6">
                    Gunakan template Excel agar format data sesuai. Kolom yang dibaca hanya nama dan NIP.
                </p>
            </div>

            <a href="{{ route('admin.lecturer-staff.template') }}"
               class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition">
                Download Template
            </a>

        </div>

        <div class="p-4 md:p-6 grid lg:grid-cols-2 gap-4">

            {{-- Import Dosen --}}
            <form action="{{ route('admin.lecturer-staff.import', 'dosen') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="lecturer-import-form rounded-3xl border border-blue-100 bg-blue-50 p-5 space-y-4">

                @csrf

                <div>
                    <h3 class="text-lg font-black text-blue-800">
                        Import Dosen
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Upload file Excel untuk menambahkan data dosen.
                    </p>
                </div>

                <input type="file"
                       name="file"
                       accept=".xlsx,.xls,.csv"
                       required
                       class="block w-full text-sm text-slate-600 file:mr-4 file:rounded-xl file:border-0 file:bg-blue-700 file:px-5 file:py-3 file:text-sm file:font-bold file:text-white hover:file:bg-blue-800">

                <button type="submit"
                        class="w-full inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                    Import Dosen
                </button>

            </form>


            {{-- Import Staff --}}
            <form action="{{ route('admin.lecturer-staff.import', 'staff') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="lecturer-import-form rounded-3xl border border-amber-100 bg-amber-50 p-5 space-y-4">

                @csrf

                <div>
                    <h3 class="text-lg font-black text-amber-700">
                        Import Staff
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Upload file Excel untuk menambahkan data staff.
                    </p>
                </div>

                <input type="file"
                       name="file"
                       accept=".xlsx,.xls,.csv"
                       required
                       class="block w-full text-sm text-slate-600 file:mr-4 file:rounded-xl file:border-0 file:bg-amber-500 file:px-5 file:py-3 file:text-sm file:font-bold file:text-white hover:file:bg-amber-600">

                <button type="submit"
                        class="w-full inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-amber-500 text-white font-bold hover:bg-amber-600 transition">
                    Import Staff
                </button>

            </form>

        </div>

    </div>


    {{-- Main Content --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

        {{-- Toolbar --}}
        <div class="px-6 py-5 border-b border-slate-100">

            <div class="flex flex-col gap-5">

                <div>
                    <h2 class="text-xl font-black text-slate-900">
                        Daftar Dosen & Staff
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Data ini akan ditampilkan pada halaman publik Dosen & Staff.
                    </p>
                </div>

                <form action="{{ route('admin.lecturer-staff.index') }}" method="GET">

                    <div class="grid lg:grid-cols-12 gap-4 items-end">

                        <div class="lg:col-span-6">
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                Cari Nama / NIP
                            </label>

                            <input type="text"
                                   name="search"
                                   value="{{ request('search') }}"
                                   placeholder="Masukkan nama dosen, staff, atau NIP..."
                                   class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                        </div>

                        <div class="lg:col-span-3">
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                Filter Kategori
                            </label>

                            <select name="type"
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">

                                <option value="all" @selected(request('type', 'all') === 'all')>
                                    Semua Data
                                </option>

                                <option value="dosen" @selected(request('type') === 'dosen')>
                                    Dosen
                                </option>

                                <option value="staff" @selected(request('type') === 'staff')>
                                    Staff
                                </option>

                            </select>
                        </div>

                        <div class="lg:col-span-3 flex gap-3">

                            <button type="submit"
                                    class="flex-1 inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                                Cari
                            </button>

                            <a href="{{ route('admin.lecturer-staff.index') }}"
                               class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition">
                                Reset
                            </a>

                        </div>

                    </div>

                </form>

            </div>

        </div>


        {{-- Desktop Table --}}
        <div class="hidden lg:block overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 border-b border-slate-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-black text-slate-500 uppercase tracking-wider">
                            Nama
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-black text-slate-500 uppercase tracking-wider">
                            NIP
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-black text-slate-500 uppercase tracking-wider">
                            Kategori
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-black text-slate-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($lecturerStaff as $item)

                        <tr class="hover:bg-slate-50 transition">

                            <td class="px-6 py-5">

                                <div class="flex items-center gap-4">

                                    @if ($item->photo)
                                        <img src="{{ asset('storage/' . $item->photo) }}"
                                             class="w-16 h-16 rounded-2xl object-cover border border-slate-200"
                                             alt="{{ $item->name }}">
                                    @else
                                        <div class="w-16 h-16 rounded-2xl bg-blue-50 flex items-center justify-center border border-blue-100">
                                            <span class="text-xl font-black text-blue-700">
                                                {{ strtoupper(substr($item->name, 0, 1)) }}
                                            </span>
                                        </div>
                                    @endif

                                    <div class="min-w-0">
                                        <h3 class="font-black text-slate-900">
                                            {{ $item->name }}
                                        </h3>

                                        <p class="mt-1 text-sm text-slate-500">
                                            Program Studi D-III Teknik Mesin
                                        </p>
                                    </div>

                                </div>

                            </td>

                            <td class="px-6 py-5 text-sm font-semibold text-slate-600">
                                {{ $item->nip ?: '-' }}
                            </td>

                            <td class="px-6 py-5">

                                @if ($item->type === 'dosen')
                                    <span class="inline-flex px-3 py-1.5 rounded-full bg-blue-100 text-blue-700 text-xs font-black">
                                        Dosen
                                    </span>
                                @else
                                    <span class="inline-flex px-3 py-1.5 rounded-full bg-amber-100 text-amber-700 text-xs font-black">
                                        Staff
                                    </span>
                                @endif

                            </td>

                            <td class="px-6 py-5">

                                <div class="flex justify-end gap-2">

                                    <a href="{{ route('admin.lecturer-staff.edit', $item) }}"
                                       class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-blue-700 text-white text-sm font-bold hover:bg-blue-800 transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.lecturer-staff.destroy', $item) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-red-50 text-red-700 text-sm font-bold hover:bg-red-600 hover:text-white transition">
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="px-6 py-14 text-center">

                                <h3 class="text-xl font-black text-slate-900">
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


        {{-- Mobile Cards --}}
        <div class="lg:hidden p-4 md:p-6 space-y-4">

            @forelse ($lecturerStaff as $item)

                <div class="rounded-3xl bg-slate-50 border border-slate-200 p-5">

                    <div class="flex items-start gap-4">

                        @if ($item->photo)
                            <img src="{{ asset('storage/' . $item->photo) }}"
                                 class="w-16 h-16 rounded-2xl object-cover border border-slate-200 shrink-0"
                                 alt="{{ $item->name }}">
                        @else
                            <div class="w-16 h-16 rounded-2xl bg-blue-50 flex items-center justify-center border border-blue-100 shrink-0">
                                <span class="text-xl font-black text-blue-700">
                                    {{ strtoupper(substr($item->name, 0, 1)) }}
                                </span>
                            </div>
                        @endif

                        <div class="min-w-0 flex-1">

                            <div class="flex items-start justify-between gap-3">

                                <div class="min-w-0">
                                    <h3 class="font-black text-slate-900">
                                        {{ $item->name }}
                                    </h3>

                                    <p class="mt-1 text-sm text-slate-500 break-all">
                                        NIP. {{ $item->nip ?: '-' }}
                                    </p>
                                </div>

                                @if ($item->type === 'dosen')
                                    <span class="shrink-0 inline-flex px-3 py-1.5 rounded-full bg-blue-100 text-blue-700 text-xs font-black">
                                        Dosen
                                    </span>
                                @else
                                    <span class="shrink-0 inline-flex px-3 py-1.5 rounded-full bg-amber-100 text-amber-700 text-xs font-black">
                                        Staff
                                    </span>
                                @endif

                            </div>

                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-3 mt-5">

                        <a href="{{ route('admin.lecturer-staff.edit', $item) }}"
                           class="inline-flex items-center justify-center px-4 py-3 rounded-xl bg-blue-700 text-white text-sm font-bold hover:bg-blue-800 transition">
                            Edit
                        </a>

                        <form action="{{ route('admin.lecturer-staff.destroy', $item) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="w-full inline-flex items-center justify-center px-4 py-3 rounded-xl bg-red-600 text-white text-sm font-bold hover:bg-red-700 transition">
                                Hapus
                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <div class="rounded-3xl bg-slate-50 border border-slate-200 p-10 text-center">

                    <h3 class="text-xl font-black text-slate-900">
                        Belum ada data
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Tambahkan data dosen atau staff terlebih dahulu.
                    </p>

                </div>

            @endforelse

        </div>


        {{-- Pagination --}}
        @if ($lecturerStaff->hasPages())
            <div class="px-6 py-5 border-t border-slate-100">
                {{ $lecturerStaff->links() }}
            </div>
        @endif

    </div>

</div>


{{-- Import Loading Overlay --}}
<div id="lecturerImportOverlay"
     class="hidden fixed inset-0 z-[9999] bg-slate-950/80 backdrop-blur-sm items-center justify-center px-6">

    <div class="w-full max-w-md rounded-3xl bg-white p-8 text-center shadow-2xl">

        <div class="mx-auto w-16 h-16 rounded-full border-4 border-slate-200 border-t-blue-700 animate-spin"></div>

        <h2 class="mt-6 text-xl font-black text-slate-900">
            Mengimport Data
        </h2>

        <p class="mt-3 text-slate-500 leading-7">
            Mohon tunggu sampai proses selesai. Jangan tutup halaman ini saat file sedang diproses.
        </p>

    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const importForms = document.querySelectorAll('.lecturer-import-form');
        const overlay = document.getElementById('lecturerImportOverlay');

        if (!overlay) {
            return;
        }

        importForms.forEach(function (form) {
            form.addEventListener('submit', function () {
                overlay.classList.remove('hidden');
                overlay.classList.add('flex');
            });
        });
    });
</script>

@endsection