@extends('layouts.admin')

@section('title', 'Edit Dokumen Akademik')

@section('content')

<div class="p-6 max-w-4xl">

    <h1 class="text-3xl font-bold text-slate-800 mb-2">
        Edit Dokumen Akademik
    </h1>

    <p class="text-slate-500 mb-8">
        Perbarui dokumen akademik yang tampil pada halaman website.
    </p>

    <form action="{{ route('admin.academic-documents.update', $academicDocument->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6 space-y-6">

        @csrf
        @method('PUT')

        <div>
            <label class="block mb-2 font-semibold text-slate-700">
                Judul
            </label>

            <input type="text"
                   name="title"
                   value="{{ old('title', $academicDocument->title) }}"
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

                @foreach ($categories as $key => $label)

                    <option value="{{ $key }}" {{ old('category', $academicDocument->category) === $key ? 'selected' : '' }}>
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
                      class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('description', $academicDocument->description) }}</textarea>
        </div>

        <div class="grid md:grid-cols-2 gap-6">

            <div>
                <label class="block mb-2 font-semibold text-slate-700">
                    Tahun Akademik
                </label>

                <input type="text"
                       name="academic_year"
                       value="{{ old('academic_year', $academicDocument->academic_year) }}"
                       placeholder="Contoh: 2025/2026"
                       class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div>
                <label class="block mb-2 font-semibold text-slate-700">
                    Urutan
                </label>

                <input type="number"
                       name="sort_order"
                       value="{{ old('sort_order', $academicDocument->sort_order) }}"
                       class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

        </div>

        <div>
            <label class="block mb-2 font-semibold text-slate-700">
                File Saat Ini
            </label>

            @if ($academicDocument->file_path)

                <a href="{{ asset('storage/' . $academicDocument->file_path) }}"
                   target="_blank"
                   class="inline-flex px-5 py-3 rounded-xl bg-blue-50 text-blue-700 font-semibold hover:bg-blue-100 transition">
                    Lihat File Saat Ini
                </a>

            @else

                <p class="text-slate-500">
                    Belum ada file.
                </p>

            @endif

        </div>

        <div>
            <label class="block mb-2 font-semibold text-slate-700">
                Ganti File
            </label>

            <input type="file"
                   name="file_path"
                   accept=".pdf,.jpg,.jpeg,.png,.webp"
                   class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

            <p class="text-sm text-slate-500 mt-2">
                Kosongkan jika tidak ingin mengganti file.
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
                   value="{{ old('external_link', $academicDocument->external_link) }}"
                   placeholder="https://contoh.com/dokumen"
                   class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

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
                   {{ old('is_active', $academicDocument->is_active) ? 'checked' : '' }}>

            <label for="is_active" class="font-semibold text-slate-700">
                Tampilkan dokumen di website
            </label>

        </div>

        <div class="flex gap-3">

            <button type="submit"
                    class="px-6 py-3 rounded-xl bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
                Update
            </button>

            <a href="{{ route('admin.academic-documents.index') }}"
               class="px-6 py-3 rounded-xl bg-slate-100 text-slate-700 font-semibold hover:bg-slate-200 transition">
                Batal
            </a>

        </div>

    </form>

</div>

@endsection