@extends('layouts.admin')

@section('title', 'Tambah Dokumen Akademik')

@section('content')

<div class="p-6 max-w-4xl">

    <h1 class="text-3xl font-bold text-slate-800 mb-2">
        Tambah Dokumen Akademik
    </h1>

    <p class="text-slate-500 mb-8">
        Tambahkan dokumen akademik yang akan tampil pada halaman dropdown Akademik.
    </p>

    <form action="{{ route('admin.academic-documents.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6 space-y-6">

        @csrf

        <div>
            <label class="block mb-2 font-semibold text-slate-700">
                Judul
            </label>

            <input type="text"
                   name="title"
                   value="{{ old('title') }}"
                   class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                   required>

            @error('title')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block mb-2 font-semibold text-slate-700">
                Kategori
            </label>

            <select name="category"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>

                <option value="">Pilih Kategori</option>

                @foreach ($categories as $key => $label)

                    <option value="{{ $key }}" {{ old('category') === $key ? 'selected' : '' }}>
                        {{ $label }}
                    </option>

                @endforeach

            </select>

            @error('category')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block mb-2 font-semibold text-slate-700">
                Deskripsi
            </label>

            <textarea name="description"
                      rows="5"
                      class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('description') }}</textarea>
        </div>

        <div class="grid md:grid-cols-2 gap-6">

            <div>
                <label class="block mb-2 font-semibold text-slate-700">
                    Tahun Akademik
                </label>

                <input type="text"
                       name="academic_year"
                       value="{{ old('academic_year') }}"
                       placeholder="Contoh: 2025/2026"
                       class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div>
                <label class="block mb-2 font-semibold text-slate-700">
                    Urutan
                </label>

                <input type="number"
                       name="sort_order"
                       value="{{ old('sort_order', 0) }}"
                       class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

        </div>

        <div>
            <label class="block mb-2 font-semibold text-slate-700">
                Upload File
            </label>

            <input type="file"
                   name="file_path"
                   accept=".pdf,.jpg,.jpeg,.png,.webp"
                   class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

            <p class="text-sm text-slate-500 mt-2">
                Format: PDF, JPG, JPEG, PNG, WEBP. Maksimal 5MB.
            </p>

            @error('file_path')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block mb-2 font-semibold text-slate-700">
                Link Eksternal
            </label>

            <input type="url"
                   name="external_link"
                   value="{{ old('external_link') }}"
                   placeholder="https://contoh.com/dokumen"
                   class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

            <p class="text-sm text-slate-500 mt-2">
                Boleh dikosongkan jika hanya memakai file upload.
            </p>

            @error('external_link')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-3">

            <input type="checkbox"
                   name="is_active"
                   value="1"
                   id="is_active"
                   class="w-5 h-5 rounded border-slate-300"
                   checked>

            <label for="is_active" class="font-semibold text-slate-700">
                Tampilkan dokumen di website
            </label>

        </div>

        <div class="flex gap-3">

            <button type="submit"
                    class="px-6 py-3 rounded-xl bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
                Simpan
            </button>

            <a href="{{ route('admin.academic-documents.index') }}"
               class="px-6 py-3 rounded-xl bg-slate-100 text-slate-700 font-semibold hover:bg-slate-200 transition">
                Batal
            </a>

        </div>

    </form>

</div>

@endsection