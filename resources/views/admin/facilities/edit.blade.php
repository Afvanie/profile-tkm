@extends('layouts.admin')

@section('title', 'Kelola Dokumentasi Fasilitas')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <a href="{{ route('admin.facilities.index') }}"
                class="inline-block text-sm text-blue-700 font-semibold hover:underline mb-3">
                ← Kembali ke Dokumentasi Fasilitas
            </a>

            <h1 class="text-3xl font-bold text-slate-800">
                Kelola Dokumentasi {{ $facility->title }}
            </h1>

            <p class="mt-2 text-slate-500">
                Upload dan kelola foto dokumentasi untuk kategori {{ $facility->title }}.
            </p>
        </div>

        <a href="{{ url('/facilities') }}"
            target="_blank"
            class="inline-flex items-center justify-center px-5 py-3 rounded-xl bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
            Lihat Halaman Fasilitas
        </a>

    </div>

    {{-- Alert --}}
    @if (session('success'))
        <div class="rounded-2xl bg-green-50 border border-green-200 text-green-700 px-6 py-4">
            {{ session('success') }}
        </div>
    @endif

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


    {{-- ===================================================== --}}
    {{-- FORM TAMBAH FOTO --}}
    {{-- ===================================================== --}}
    <div class="rounded-3xl bg-white border border-slate-100 shadow-lg overflow-hidden">

        <div class="h-2 bg-gradient-to-r from-blue-700 via-yellow-400 to-blue-700"></div>

        <form action="{{ route('admin.facilities.photos.store', $facility) }}" method="POST" enctype="multipart/form-data" class="p-7 md:p-8 space-y-6">
            @csrf

            <div>
                <h2 class="text-2xl font-bold text-slate-800">
                    Tambah Foto Dokumentasi
                </h2>

                <p class="mt-2 text-slate-500">
                    Upload foto untuk kategori {{ $facility->title }}. Foto ini akan tampil pada slider dokumentasi di halaman fasilitas.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Judul Foto
                    </label>

                    <input
                        type="text"
                        name="title"
                        placeholder="Contoh: Laboratorium Utama"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Upload Foto
                    </label>

                    <input
                        type="file"
                        name="photo"
                        accept="image/*"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-3 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Urutan
                    </label>

                    <input
                        type="number"
                        name="sort_order"
                        value="0"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

            </div>

            <label class="inline-flex items-center gap-3">
                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    checked
                    class="w-5 h-5 rounded border-slate-300 text-blue-700 focus:ring-blue-500">

                <span class="text-sm font-semibold text-slate-700">
                    Tampilkan foto ini di halaman publik
                </span>
            </label>

            <div class="flex justify-end">
                <button
                    type="submit"
                    class="px-7 py-4 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                    Tambah Foto
                </button>
            </div>

        </form>

    </div>


    {{-- ===================================================== --}}
    {{-- DAFTAR FOTO --}}
    {{-- ===================================================== --}}
    <div class="rounded-3xl bg-white border border-slate-100 shadow-lg overflow-hidden">

        <div class="p-7 md:p-8 border-b border-slate-100">

            <h2 class="text-2xl font-bold text-slate-800">
                Foto Dokumentasi
            </h2>

            <p class="mt-2 text-slate-500">
                Kelola foto yang tampil pada slider dokumentasi {{ $facility->title }}.
            </p>

        </div>

        @if ($facility->photos->count())

            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6 p-7 md:p-8">

                @foreach ($facility->photos as $photo)

                    <div class="rounded-3xl border border-slate-100 shadow-lg overflow-hidden bg-white">

                        {{-- Preview --}}
                        <div class="relative h-56 bg-slate-100">

                            <img
                                src="{{ asset('storage/' . $photo->photo) }}"
                                alt="{{ $photo->title }}"
                                class="w-full h-full object-cover">

                            <div class="absolute left-4 top-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold
                                    {{ $photo->is_active ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
                                    {{ $photo->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </div>

                        </div>

                        {{-- Edit Photo --}}
                        <form action="{{ route('admin.facilities.photos.update', $photo) }}" method="POST" enctype="multipart/form-data" class="p-5 space-y-4">
                            @csrf
                            @method('PUT')

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Judul Foto
                                </label>

                                <input
                                    type="text"
                                    name="title"
                                    value="{{ $photo->title }}"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Ganti Foto
                                </label>

                                <input
                                    type="file"
                                    name="photo"
                                    accept="image/*"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Urutan
                                </label>

                                <input
                                    type="number"
                                    name="sort_order"
                                    value="{{ $photo->sort_order }}"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <label class="inline-flex items-center gap-3">
                                <input
                                    type="checkbox"
                                    name="is_active"
                                    value="1"
                                    {{ $photo->is_active ? 'checked' : '' }}
                                    class="w-5 h-5 rounded border-slate-300 text-blue-700 focus:ring-blue-500">

                                <span class="text-sm font-semibold text-slate-700">
                                    Aktif
                                </span>
                            </label>

                            <div class="grid grid-cols-2 gap-3 pt-2">

                                <button
                                    type="submit"
                                    class="px-4 py-3 rounded-xl bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
                                    Update
                                </button>

                                <button
                                    type="button"
                                    onclick="document.getElementById('delete-photo-{{ $photo->id }}').submit()"
                                    class="px-4 py-3 rounded-xl bg-red-600 text-white font-semibold hover:bg-red-700 transition">
                                    Hapus
                                </button>

                            </div>

                        </form>

                        <form
                            id="delete-photo-{{ $photo->id }}"
                            action="{{ route('admin.facilities.photos.destroy', $photo) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                            @csrf
                            @method('DELETE')
                        </form>

                    </div>

                @endforeach

            </div>

        @else

            <div class="p-10 text-center">

                <h3 class="text-2xl font-bold text-slate-800">
                    Belum ada foto
                </h3>

                <p class="mt-3 text-slate-500">
                    Tambahkan foto dokumentasi untuk kategori {{ $facility->title }}.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection