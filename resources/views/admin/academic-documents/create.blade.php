@extends('layouts.admin')

@section('title', 'Tambah Dokumen Akademik')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <div>
        <a href="{{ route('admin.academic-documents.index') }}"
            class="inline-flex items-center text-sm font-bold text-blue-700 hover:underline mb-4">
            ← Kembali ke Dokumen Akademik
        </a>

        <h1 class="text-3xl md:text-4xl font-black text-slate-800">
            Tambah Dokumen Akademik
        </h1>

        <p class="mt-3 text-slate-500 leading-7 max-w-3xl">
            Tambahkan dokumen akademik yang akan tampil pada halaman Akademik website,
            seperti Pedoman Akademik, Kalender Akademik, Kurikulum, Jadwal Kuliah,
            dan Laporan Ketercapaian.
        </p>
    </div>


    {{-- Error --}}
    @if ($errors->any())
        <div class="rounded-2xl bg-red-50 border border-red-200 text-red-700 px-6 py-4">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Form Card --}}
    <div class="rounded-[2rem] bg-white/95 backdrop-blur border border-slate-100 shadow-xl overflow-hidden">

        <div class="h-2 bg-gradient-to-r from-blue-700 via-yellow-400 to-blue-700"></div>

        <form action="{{ route('admin.academic-documents.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="p-7 md:p-8 space-y-8">

            @csrf

            <div class="grid lg:grid-cols-12 gap-8">

                {{-- Left Info --}}
                <div class="lg:col-span-4">

                    <div class="rounded-[2rem] bg-[#06172E] text-white p-6 relative overflow-hidden">

                        <div class="absolute -right-20 -top-20 w-52 h-52 rounded-full bg-blue-500/30 blur-3xl"></div>
                        <div class="absolute -left-20 -bottom-20 w-52 h-52 rounded-full bg-yellow-400/20 blur-3xl"></div>

                        <div class="relative z-10">

                            <div class="w-16 h-16 rounded-3xl bg-yellow-400 text-slate-900 flex items-center justify-center shadow-xl">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-8 h-8"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12h6m-6 4h6M5 4h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                </svg>
                            </div>

                            <h2 class="mt-6 text-2xl font-black">
                                Informasi Dokumen
                            </h2>

                            <p class="mt-3 text-white/70 leading-7">
                                Dokumen yang aktif akan langsung tampil pada halaman publik sesuai kategori yang dipilih.
                            </p>

                            <div class="mt-8 space-y-4">

                                <div class="rounded-2xl bg-white/10 border border-white/15 p-4">
                                    <p class="text-sm text-white/60">
                                        Format File
                                    </p>

                                    <p class="mt-1 font-bold">
                                        PDF, JPG, PNG, WEBP
                                    </p>
                                </div>

                                <div class="rounded-2xl bg-white/10 border border-white/15 p-4">
                                    <p class="text-sm text-white/60">
                                        Maksimal Upload
                                    </p>

                                    <p class="mt-1 font-bold">
                                        20 Mb
                                    </p>
                                </div>

                                <div class="rounded-2xl bg-white/10 border border-white/15 p-4">
                                    <p class="text-sm text-white/60">
                                        Alternatif
                                    </p>

                                    <p class="mt-1 font-bold">
                                        Bisa memakai link eksternal
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Right Form --}}
                <div class="lg:col-span-8">

                    <div class="space-y-6">

                        <div>
                            <h2 class="text-2xl font-black text-slate-800">
                                Detail Dokumen
                            </h2>

                            <p class="mt-2 text-slate-500">
                                Lengkapi informasi dokumen akademik yang akan ditampilkan.
                            </p>
                        </div>

                        {{-- Judul --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                Judul Dokumen
                            </label>

                            <input
                                type="text"
                                name="title"
                                value="{{ old('title') }}"
                                placeholder="Contoh: Pedoman Akademik D-III Teknik Mesin"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>

                        {{-- Kategori --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                Kategori
                            </label>

                            <select
                                name="category"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>

                                <option value="">Pilih Kategori</option>

                                @foreach ($categories as $key => $label)
                                    <option value="{{ $key }}" {{ old('category') === $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        {{-- Deskripsi --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                Deskripsi
                            </label>

                            <textarea
                                name="description"
                                rows="5"
                                placeholder="Tuliskan deskripsi singkat dokumen..."
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
                        </div>

                        {{-- Tahun dan Urutan --}}
                        <div class="grid md:grid-cols-2 gap-6">

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">
                                    Tahun Akademik
                                </label>

                                <input
                                    type="text"
                                    name="academic_year"
                                    value="{{ old('academic_year') }}"
                                    placeholder="Contoh: 2025/2026"
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">
                                    Urutan
                                </label>

                                <input
                                    type="number"
                                    name="sort_order"
                                    value="{{ old('sort_order', 0) }}"
                                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                        </div>

                        {{-- Upload File --}}
                        <div class="rounded-3xl bg-slate-50 border border-slate-100 p-6">

                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                Upload File
                            </label>

                            <input
                                type="file"
                                name="file_path"
                                id="academicFileInput"
                                accept=".pdf,.jpg,.jpeg,.png,.webp"
                                class="block w-full text-sm text-slate-600 file:mr-4 file:py-3 file:px-5 file:rounded-xl file:border-0 file:bg-blue-700 file:text-white file:font-bold hover:file:bg-blue-800">

                            <p class="mt-3 text-sm text-slate-500">
                                Format: PDF, JPG, JPEG, PNG, WEBP.
                            </p>

                            <div id="academicFileName"
                                class="hidden mt-4 rounded-2xl bg-white border border-slate-100 px-5 py-4 text-sm font-semibold text-slate-700">
                            </div>

                        </div>

                        {{-- Link Eksternal --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                Link Eksternal
                            </label>

                            <input
                                type="url"
                                name="external_link"
                                value="{{ old('external_link') }}"
                                placeholder="https://contoh.com/dokumen"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                            <p class="mt-2 text-sm text-slate-500">
                                Boleh dikosongkan jika hanya memakai file upload.
                            </p>
                        </div>

                        {{-- Status --}}
                        <div class="rounded-3xl bg-blue-50 border border-blue-100 p-5">

                            <label class="flex items-start gap-4 cursor-pointer">

                                <input
                                    type="checkbox"
                                    name="is_active"
                                    value="1"
                                    class="mt-1 w-5 h-5 rounded border-slate-300 text-blue-700 focus:ring-blue-500"
                                    {{ old('is_active', true) ? 'checked' : '' }}>

                                <div>
                                    <h3 class="font-black text-slate-800">
                                        Tampilkan dokumen di website
                                    </h3>

                                    <p class="mt-1 text-sm text-slate-500 leading-6">
                                        Jika aktif, dokumen akan tampil pada halaman publik sesuai kategori akademik.
                                    </p>
                                </div>

                            </label>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Action --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 pt-6 border-t border-slate-100">

                <p class="text-sm text-slate-500">
                    Pastikan kategori dokumen sudah sesuai sebelum disimpan.
                </p>

                <div class="flex flex-col sm:flex-row gap-3">

                    <a href="{{ route('admin.academic-documents.index') }}"
                        class="inline-flex items-center justify-center px-6 py-4 rounded-2xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition">
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center px-7 py-4 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition shadow-lg shadow-blue-700/20">
                        Simpan Dokumen
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fileInput = document.getElementById('academicFileInput');
        const fileNameBox = document.getElementById('academicFileName');

        if (!fileInput || !fileNameBox) {
            return;
        }

        fileInput.addEventListener('change', function () {
            const file = this.files[0];

            if (!file) {
                fileNameBox.classList.add('hidden');
                fileNameBox.textContent = '';
                return;
            }

            fileNameBox.textContent = 'File dipilih: ' + file.name;
            fileNameBox.classList.remove('hidden');
        });
    });
</script>

@endsection