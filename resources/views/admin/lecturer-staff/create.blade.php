@extends('layouts.admin')

@section('title', 'Tambah Dosen & Staff')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <div>
        <a href="{{ route('admin.lecturer-staff.index') }}"
            class="inline-flex items-center text-sm font-bold text-blue-700 hover:underline mb-4">
            ← Kembali ke Data Dosen & Staff
        </a>

        <h1 class="text-3xl md:text-4xl font-black text-slate-800">
            Tambah Data Dosen & Staff
        </h1>

        <p class="mt-3 text-slate-500 leading-7">
            Tambahkan data dosen atau staff Program Studi D-III Teknik Mesin.
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

        <form action="{{ route('admin.lecturer-staff.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="p-7 md:p-8 space-y-8">

            @csrf

            <div class="grid lg:grid-cols-12 gap-8">

                {{-- Upload Foto --}}
                <div class="lg:col-span-4">

                    <div class="rounded-[2rem] bg-slate-50 border border-slate-100 p-6">

                        <h2 class="text-xl font-black text-slate-800">
                            Foto Profil
                        </h2>

                        <p class="mt-2 text-sm text-slate-500 leading-6">
                            Upload foto dosen atau staff. Format disarankan JPG, PNG, atau WEBP.
                        </p>

                        <div class="mt-6">

                            <div class="relative w-full aspect-[4/5] rounded-[2rem] bg-white border-2 border-dashed border-slate-200 overflow-hidden flex items-center justify-center">

                                <img
                                    id="photoPreview"
                                    src=""
                                    alt="Preview Foto"
                                    class="hidden w-full h-full object-cover">

                                <div id="photoPlaceholder" class="text-center px-6">

                                    <div class="w-16 h-16 mx-auto rounded-2xl bg-blue-100 text-blue-700 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-8 h-8"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M4 20h16a2 2 0 002-2V6a2 2 0 00-2-2H4a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>

                                    <p class="mt-4 text-sm font-bold text-slate-700">
                                        Belum ada foto
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        Preview akan tampil di sini
                                    </p>

                                </div>

                            </div>

                            <input
                                type="file"
                                name="photo"
                                id="photoInput"
                                accept="image/*"
                                class="mt-5 block w-full text-sm text-slate-600 file:mr-4 file:py-3 file:px-5 file:rounded-xl file:border-0 file:bg-blue-700 file:text-white file:font-bold hover:file:bg-blue-800">

                        </div>

                    </div>

                </div>


                {{-- Data Utama --}}
                <div class="lg:col-span-8">

                    <div class="space-y-6">

                        <div>
                            <h2 class="text-2xl font-black text-slate-800">
                                Informasi Data
                            </h2>

                            <p class="mt-2 text-slate-500">
                                Lengkapi informasi utama yang akan ditampilkan pada website.
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Contoh: Dr. Nama Dosen, S.T., M.T."
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                NIP
                            </label>

                            <input
                                type="text"
                                name="nip"
                                value="{{ old('nip') }}"
                                placeholder="Contoh: 198xxxxxxxxxxxxx"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                Tipe
                            </label>

                            <div class="grid sm:grid-cols-2 gap-4">

                                <label class="cursor-pointer">
                                    <input
                                        type="radio"
                                        name="type"
                                        value="dosen"
                                        class="peer sr-only"
                                        {{ old('type', 'dosen') === 'dosen' ? 'checked' : '' }}>

                                    <div class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 peer-checked:bg-blue-700 peer-checked:text-white peer-checked:border-blue-700 transition">
                                        <h3 class="font-black">
                                            Dosen
                                        </h3>

                                        <p class="mt-1 text-sm opacity-75">
                                            Tenaga pendidik program studi
                                        </p>
                                    </div>
                                </label>

                                <label class="cursor-pointer">
                                    <input
                                        type="radio"
                                        name="type"
                                        value="staff"
                                        class="peer sr-only"
                                        {{ old('type') === 'staff' ? 'checked' : '' }}>

                                    <div class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 peer-checked:bg-yellow-400 peer-checked:text-slate-900 peer-checked:border-yellow-400 transition">
                                        <h3 class="font-black">
                                            Staff
                                        </h3>

                                        <p class="mt-1 text-sm opacity-75">
                                            Tenaga kependidikan / administrasi
                                        </p>
                                    </div>
                                </label>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Action --}}
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 pt-6 border-t border-slate-100">

                <p class="text-sm text-slate-500">
                    Pastikan data sudah benar sebelum disimpan.
                </p>

                <div class="flex flex-col sm:flex-row gap-3">

                    <a href="{{ route('admin.lecturer-staff.index') }}"
                        class="inline-flex items-center justify-center px-6 py-4 rounded-2xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition">
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center px-7 py-4 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition shadow-lg shadow-blue-700/20">
                        Simpan Data
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const photoInput = document.getElementById('photoInput');
        const photoPreview = document.getElementById('photoPreview');
        const photoPlaceholder = document.getElementById('photoPlaceholder');

        if (!photoInput) {
            return;
        }

        photoInput.addEventListener('change', function () {
            const file = this.files[0];

            if (!file) {
                return;
            }

            const reader = new FileReader();

            reader.onload = function (event) {
                photoPreview.src = event.target.result;
                photoPreview.classList.remove('hidden');
                photoPlaceholder.classList.add('hidden');
            };

            reader.readAsDataURL(file);
        });
    });
</script>

@endsection