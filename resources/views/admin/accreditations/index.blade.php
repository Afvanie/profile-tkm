@extends('layouts.admin')

@section('title', 'Akreditasi')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h1 class="text-3xl font-black text-slate-800">
                Akreditasi
            </h1>

            <p class="mt-2 text-slate-500">
                Kelola data akreditasi nasional dan internasional program studi.
            </p>
        </div>

        <a href="{{ route('admin.accreditations.create') }}"
            class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">

            <i class="fa-solid fa-plus"></i>
            Tambah Akreditasi
        </a>

    </div>


    {{-- Alert --}}
    @if (session('success'))
        <div class="rounded-2xl bg-emerald-50 border border-emerald-100 text-emerald-700 px-5 py-4 font-semibold">
            {{ session('success') }}
        </div>
    @endif


    {{-- Table --}}
    <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-slate-50 border-b border-slate-100">
                    <tr>
                        <th class="px-6 py-4 text-left font-bold text-slate-600">
                            Akreditasi
                        </th>

                        <th class="px-6 py-4 text-left font-bold text-slate-600">
                            Jenis
                        </th>

                        <th class="px-6 py-4 text-left font-bold text-slate-600">
                            Lembaga
                        </th>

                        <th class="px-6 py-4 text-left font-bold text-slate-600">
                            Peringkat
                        </th>

                        <th class="px-6 py-4 text-left font-bold text-slate-600">
                            Masa Berlaku
                        </th>

                        <th class="px-6 py-4 text-center font-bold text-slate-600">
                            Status
                        </th>

                        <th class="px-6 py-4 text-center font-bold text-slate-600 min-w-[160px]">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($accreditations as $accreditation)
                        <tr class="hover:bg-slate-50 transition">

                            <td class="px-6 py-5">

                                <div class="font-bold text-slate-800">
                                    {{ $accreditation->title }}
                                </div>

                                @if ($accreditation->certificate_number)
                                    <div class="mt-1 text-xs text-slate-500">
                                        No: {{ $accreditation->certificate_number }}
                                    </div>
                                @endif

                                @if ($accreditation->file_path)
                                    <a href="{{ asset('storage/' . $accreditation->file_path) }}"
                                        target="_blank"
                                        class="mt-2 inline-flex items-center gap-1 text-xs font-semibold text-blue-700 hover:underline">

                                        <i class="fa-solid fa-file-lines"></i>
                                        Lihat file
                                    </a>
                                @endif

                            </td>

                            <td class="px-6 py-5">
                                <span class="inline-flex px-3 py-1 rounded-full text-xs font-bold
                                    {{ $accreditation->type === 'internasional' ? 'bg-yellow-100 text-yellow-700' : 'bg-blue-100 text-blue-700' }}">

                                    {{ $accreditation->type_label }}
                                </span>
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                {{ $accreditation->institution ?? '-' }}
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                {{ $accreditation->rank ?? '-' }}
                            </td>

                            <td class="px-6 py-5 text-slate-600">

                                @if ($accreditation->valid_from || $accreditation->valid_until)
                                    <div>
                                        {{ $accreditation->valid_from ? $accreditation->valid_from->format('d M Y') : '-' }}
                                    </div>

                                    <div class="text-xs text-slate-400">
                                        sampai
                                        {{ $accreditation->valid_until ? $accreditation->valid_until->format('d M Y') : '-' }}
                                    </div>
                                @else
                                    -
                                @endif

                            </td>

                            <td class="px-6 py-5 text-center">

                                @if ($accreditation->is_active)
                                    <span class="inline-flex px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-bold">
                                        Tampil
                                    </span>
                                @else
                                    <span class="inline-flex px-3 py-1 rounded-full bg-slate-100 text-slate-500 text-xs font-bold">
                                        Nonaktif
                                    </span>
                                @endif

                            </td>

                            <td class="px-6 py-5">

                                <div class="flex items-center justify-center gap-2 whitespace-nowrap">

                                    <a href="{{ route('admin.accreditations.edit', $accreditation) }}"
                                        class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-yellow-100 text-yellow-700 text-xs font-bold hover:bg-yellow-200 transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.accreditations.destroy', $accreditation) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data akreditasi ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-red-100 text-red-700 text-xs font-bold hover:bg-red-200 transition">
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>
                    @empty

                        <tr>
                            <td colspan="7" class="px-6 py-16 text-center">

                                <div class="w-16 h-16 mx-auto rounded-3xl bg-slate-100 text-slate-400 flex items-center justify-center">
                                    <i class="fa-solid fa-award text-2xl"></i>
                                </div>

                                <h3 class="mt-4 text-lg font-bold text-slate-800">
                                    Belum ada data akreditasi
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Tambahkan data akreditasi nasional atau internasional.
                                </p>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection