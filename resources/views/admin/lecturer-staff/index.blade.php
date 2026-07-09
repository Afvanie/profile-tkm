@extends('layouts.admin')

@section('title', 'Data Dosen & Staff')

@section('content')

<div class="p-6">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Data Dosen & Staff
            </h1>

            <p class="text-slate-500 mt-2">
                Kelola data dosen dan staff Program Studi Teknik Mesin.
            </p>
        </div>

        <a href="{{ route('admin.lecturer-staff.create') }}"
           class="inline-flex items-center justify-center px-5 py-3 rounded-xl bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
            + Tambah Data
        </a>

    </div>

    @if (session('success'))
        <div class="mb-6 rounded-xl bg-green-50 border border-green-200 text-green-700 px-5 py-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead class="bg-slate-50 border-b border-slate-100">

                    <tr>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-600">Foto</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-600">Nama</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-600">NIP</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-600">Tipe</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-600 text-right">Aksi</th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($lecturerStaff as $item)

                        <tr class="hover:bg-slate-50 transition">

                            <td class="px-6 py-4">

                                @if ($item->photo)

                                    <img src="{{ asset('storage/' . $item->photo) }}"
                                         class="w-16 h-16 rounded-xl object-cover"
                                         alt="{{ $item->name }}">

                                @else

                                    <div class="w-16 h-16 rounded-xl bg-blue-100 flex items-center justify-center">
                                        <span class="text-xl font-bold text-blue-700">
                                            {{ strtoupper(substr($item->name, 0, 1)) }}
                                        </span>
                                    </div>

                                @endif

                            </td>

                            <td class="px-6 py-4 font-semibold text-slate-800">
                                {{ $item->name }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $item->nip ?? '-' }}
                            </td>

                            <td class="px-6 py-4">

                                @if ($item->type === 'dosen')
                                    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold">
                                        Dosen
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm font-semibold">
                                        Staff
                                    </span>
                                @endif

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-end gap-3">

                                    <a href="{{ route('admin.lecturer-staff.edit', $item->id) }}"
                                       class="px-4 py-2 rounded-lg bg-yellow-400 text-slate-900 font-semibold hover:bg-yellow-500 transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.lecturer-staff.destroy', $item->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="px-4 py-2 rounded-lg bg-red-600 text-white font-semibold hover:bg-red-700 transition">
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-slate-500">
                                Belum ada data dosen atau staff.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection