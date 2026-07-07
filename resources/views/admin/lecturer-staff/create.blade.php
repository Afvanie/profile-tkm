@extends('layouts.admin')

@section('title', 'Tambah Dosen & Staff')

@section('content')

<div class="p-6 max-w-3xl">

    <h1 class="text-3xl font-bold text-slate-800 mb-2">
        Tambah Dosen & Staff
    </h1>

    <p class="text-slate-500 mb-8">
        Tambahkan data baru untuk ditampilkan pada halaman Dosen & Staff.
    </p>

    <form action="{{ route('admin.lecturer-staff.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6 space-y-6">

        @csrf

        <div>
            <label class="block mb-2 font-semibold text-slate-700">
                Nama
            </label>

            <input type="text"
                   name="name"
                   value="{{ old('name') }}"
                   class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                   required>

            @error('name')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block mb-2 font-semibold text-slate-700">
                NIP
            </label>

            <input type="text"
                   name="nip"
                   value="{{ old('nip') }}"
                   class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <div>
            <label class="block mb-2 font-semibold text-slate-700">
                Tipe
            </label>

            <select name="type"
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>

                <option value="dosen" {{ old('type') === 'dosen' ? 'selected' : '' }}>
                    Dosen
                </option>

                <option value="staff" {{ old('type') === 'staff' ? 'selected' : '' }}>
                    Staff
                </option>

            </select>
        </div>

        <div>
            <label class="block mb-2 font-semibold text-slate-700">
                Foto
            </label>

            <input type="file"
                   name="photo"
                   accept="image/*"
                   class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

            <p class="text-sm text-slate-500 mt-2">
                Format: jpg, jpeg, png, webp. Maksimal 2MB.
            </p>
        </div>

        <div class="flex gap-3">

            <button type="submit"
                    class="px-6 py-3 rounded-xl bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
                Simpan
            </button>

            <a href="{{ route('admin.lecturer-staff.index') }}"
               class="px-6 py-3 rounded-xl bg-slate-100 text-slate-700 font-semibold hover:bg-slate-200 transition">
                Batal
            </a>

        </div>

    </form>

</div>

@endsection