@extends('layouts.admin')

@section('title', 'Dokumen Akademik')

@section('content')

<div class="p-6">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Dokumen Akademik
            </h1>

            <p class="text-slate-500 mt-2">
                Kelola dokumen akademik untuk menu Pedoman Akademik, Kalender Akademik, Kurikulum, Jadwal Kuliah, dan Laporan Ketercapaian.
            </p>
        </div>

        <a href="{{ route('admin.academic-documents.create') }}"
           class="inline-flex items-center justify-center px-5 py-3 rounded-xl bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
            + Tambah Dokumen
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
                        <th class="px-6 py-4 text-sm font-semibold text-slate-600">Judul</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-600">Kategori</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-600">Tahun</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-600">Status</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-600">File/Link</th>
                        <th class="px-6 py-4 text-sm font-semibold text-slate-600 text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($documents as $document)

                        <tr class="hover:bg-slate-50 transition">

                            <td class="px-6 py-4">
                                <h3 class="font-semibold text-slate-800">
                                    {{ $document->title }}
                                </h3>

                                @if ($document->description)
                                    <p class="text-sm text-slate-500 mt-1">
                                        {{ \Illuminate\Support\Str::limit($document->description, 80) }}
                                    </p>
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold">
                                    {{ $document->category_label }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $document->academic_year ?? '-' }}
                            </td>

                            <td class="px-6 py-4">
                                @if ($document->is_active)
                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">
                                        Aktif
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-500 text-sm font-semibold">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-1">

                                    @if ($document->file_path)
                                        <a href="{{ asset('storage/' . $document->file_path) }}"
                                           target="_blank"
                                           class="text-blue-700 font-semibold hover:underline">
                                            Lihat File
                                        </a>
                                    @endif

                                    @if ($document->external_link)
                                        <a href="{{ $document->external_link }}"
                                           target="_blank"
                                           class="text-yellow-600 font-semibold hover:underline">
                                            Buka Link
                                        </a>
                                    @endif

                                    @if (!$document->file_path && !$document->external_link)
                                        <span class="text-slate-400">
                                            -
                                        </span>
                                    @endif

                                </div>
                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-end gap-3">

                                    <a href="{{ route('admin.academic-documents.edit', $document->id) }}"
                                       class="px-4 py-2 rounded-lg bg-yellow-400 text-slate-900 font-semibold hover:bg-yellow-500 transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.academic-documents.destroy', $document->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')">

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
                            <td colspan="6" class="px-6 py-10 text-center text-slate-500">
                                Belum ada dokumen akademik.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection