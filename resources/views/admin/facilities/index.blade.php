@extends('layouts.admin')

@section('title', 'Fasilitas')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Dokumentasi
            </h1>

            <p class="mt-2 text-slate-500">
                Kelola foto dokumentasi fasilitas dan aktivitas mahasiswa Program Studi D-III Teknik Mesin.
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

    {{-- ===================================================== --}}
    {{-- FORM TAMBAH FOTO DENGAN PILIHAN KATEGORI --}}
    {{-- ===================================================== --}}
    <div class="rounded-3xl bg-white border border-slate-100 shadow-lg overflow-hidden">

        <div class="h-2 bg-gradient-to-r from-blue-700 via-yellow-400 to-blue-700"></div>

        <form action="{{ route('admin.facilities.photos.store-general') }}" method="POST" enctype="multipart/form-data" class="p-7 md:p-8 space-y-6">
            @csrf

            <div>
                <h2 class="text-2xl font-bold text-slate-800">
                    Tambah Foto Dokumentasi
                </h2>

                <p class="mt-2 text-slate-500">
                    Pilih kategori dokumentasi terlebih dahulu agar foto tampil pada slider yang sesuai.
                </p>
            </div>

            <div class="grid md:grid-cols-4 gap-6">

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Kategori Dokumentasi
                    </label>

                    <select
                        name="facility_id"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>

                        <option value="">
                            Pilih kategori
                        </option>

                        @foreach ($facilities as $facility)
                            <option value="{{ $facility->id }}">
                                {{ $facility->title }}
                            </option>
                        @endforeach

                    </select>
                </div>

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
                        required
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

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

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

                <button
                    type="submit"
                    class="px-7 py-4 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                    Tambah Foto
                </button>

            </div>

        </form>

    </div>

    {{-- Cards --}}
    <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">

        @forelse ($facilities as $facility)

            <div class="group rounded-3xl bg-white border border-slate-100 shadow-lg overflow-hidden hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">

                {{-- Top Accent --}}
                <div class="h-2 bg-gradient-to-r from-blue-700 via-yellow-400 to-blue-700"></div>

                <div class="p-6">

                    <div class="flex items-start justify-between gap-4">

                        <div class="w-14 h-14 rounded-2xl bg-blue-700 text-white flex items-center justify-center shadow-lg group-hover:bg-yellow-400 group-hover:text-slate-900 transition">

                            @if ($facility->category === 'laboratorium')
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-7 h-7"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 3v6l-5 8a3 3 0 002.6 4.5h10.8A3 3 0 0020 17l-5-8V3M9 3h6M9 9h6" />
                                </svg>
                            @elseif ($facility->category === 'workshop')
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-7 h-7"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.83-5.83M11.42 15.17l2.12-2.12M11.42 15.17l-4.95 4.95a2.652 2.652 0 01-3.75-3.75l4.95-4.95m5.87 1.63l-2.12-2.12" />
                                </svg>
                            @elseif ($facility->category === 'ruang_kelas')
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-7 h-7"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 6.253v13M12 6.253C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-7 h-7"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M4 20h16a2 2 0 002-2V6a2 2 0 00-2-2H4a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            @endif

                        </div>

                        <span class="px-3 py-1 rounded-full text-xs font-bold
                            {{ $facility->is_active ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
                            {{ $facility->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>

                    </div>

                    <h2 class="mt-6 text-xl font-bold text-slate-800 leading-snug">
                        {{ $facility->title }}
                    </h2>

                    <p class="mt-3 text-sm text-slate-500 leading-7 line-clamp-3">
                        {{ $facility->description }}
                    </p>

                    <div class="mt-6 grid grid-cols-2 gap-4">

                        <div class="rounded-2xl bg-slate-50 border border-slate-100 p-4">
                            <p class="text-2xl font-black text-blue-700">
                                {{ $facility->photos_count }}
                            </p>

                            <p class="text-xs text-slate-500 font-semibold mt-1">
                                Foto
                            </p>
                        </div>

                        <div class="rounded-2xl bg-slate-50 border border-slate-100 p-4">
                            <p class="text-2xl font-black text-yellow-500">
                                {{ $facility->sort_order }}
                            </p>

                            <p class="text-xs text-slate-500 font-semibold mt-1">
                                Urutan
                            </p>
                        </div>

                    </div>

                    <a href="{{ route('admin.facilities.edit', $facility) }}"
                        class="mt-6 inline-flex w-full items-center justify-center px-5 py-3 rounded-xl bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
                        Kelola Dokumentasi
                    </a>

                </div>

            </div>

        @empty

            <div class="md:col-span-2 xl:col-span-4 rounded-3xl bg-white border border-slate-100 shadow-lg p-10 text-center">

                <h3 class="text-2xl font-bold text-slate-800">
                    Data fasilitas belum tersedia
                </h3>

                <p class="mt-3 text-slate-500">
                    Jalankan seeder fasilitas terlebih dahulu.
                </p>

            </div>

        @endforelse

    </div>

</div>

@endsection