@extends('layouts.admin')

@section('title', 'Dokumentasi Fasilitas')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-6 md:p-8">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>
                <p class="text-sm font-extrabold tracking-[0.2em] uppercase text-blue-700">
                    Dokumentasi Fasilitas
                </p>

                <h1 class="mt-3 text-2xl md:text-3xl font-black text-slate-900">
                    Kelola Dokumentasi Fasilitas
                </h1>

                <p class="mt-3 max-w-3xl text-slate-500 leading-7">
                    Kelola foto dokumentasi fasilitas dan aktivitas mahasiswa Program Studi D-III Teknik Mesin.
                </p>
            </div>

            <a href="{{ route('facilities') }}"
               target="_blank"
               class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition">
                Lihat Halaman Fasilitas
            </a>

        </div>

    </div>


    {{-- Alert --}}
    @if (session('success'))
        <div class="rounded-2xl border border-green-100 bg-green-50 px-5 py-4 text-green-700 font-semibold shadow-sm">
            {{ session('success') }}
        </div>
    @endif


    {{-- Error --}}
    @if ($errors->any())
        <div class="rounded-2xl border border-red-100 bg-red-50 px-5 py-4 text-red-700 shadow-sm">

            <h3 class="font-black mb-2">
                Ada data yang perlu diperbaiki:
            </h3>

            <ul class="list-disc list-inside space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>

        </div>
    @endif


    {{-- Upload Foto Compact --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-100">

            <h2 class="text-xl font-black text-slate-900">
                Tambah Foto Dokumentasi
            </h2>

            <p class="mt-1 text-sm text-slate-500 leading-6">
                Pilih kategori, isi judul singkat, lalu upload foto dokumentasi.
            </p>

        </div>

        <form id="facilityGeneralUploadForm"
              action="{{ route('admin.facilities.photos.store-general') }}"
              method="POST"
              enctype="multipart/form-data"
              class="p-5 md:p-6 space-y-5">

            @csrf

            <div class="grid lg:grid-cols-12 gap-4 items-end">

                <div class="lg:col-span-3">
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Kategori
                    </label>

                    <select name="facility_id"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500"
                            required>
                        <option value="">
                            Pilih kategori
                        </option>

                        @foreach ($facilities as $facility)
                            <option value="{{ $facility->id }}" @selected(old('facility_id') == $facility->id)>
                                {{ $facility->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="lg:col-span-3">
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Judul Foto
                    </label>

                    <input type="text"
                           name="title"
                           value="{{ old('title') }}"
                           placeholder="Contoh: Praktikum Laboratorium"
                           class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                </div>

                <div class="lg:col-span-3">
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Upload Foto
                    </label>

                    <input type="file"
                           id="facilityGeneralPhotoInput"
                           name="photo"
                           accept="image/jpeg,image/png,image/webp"
                           required
                           class="block w-full text-sm text-slate-600 file:mr-4 file:rounded-xl file:border-0 file:bg-blue-700 file:px-5 file:py-3 file:text-sm file:font-bold file:text-white hover:file:bg-blue-800">
                </div>

                <div class="lg:col-span-2">
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Urutan
                    </label>

                    <input type="number"
                           name="sort_order"
                           value="{{ old('sort_order') }}"
                           placeholder="Otomatis"
                           class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                </div>

                <div class="lg:col-span-1">
                    <button type="submit"
                            class="w-full inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                        Tambah
                    </button>
                </div>

            </div>

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 pt-4 border-t border-slate-100">

                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="hidden" name="is_active" value="0">

                    <input type="checkbox"
                           name="is_active"
                           value="1"
                           checked
                           class="w-5 h-5 rounded border-slate-300 text-blue-700 focus:ring-blue-500">

                    <span class="text-sm font-bold text-slate-700">
                        Tampilkan foto ini di halaman publik
                    </span>
                </label>

                <p class="text-sm text-slate-500">
                    Format foto: JPG, PNG, WEBP. Maksimal 20MB.
                </p>

            </div>

        </form>

    </div>


    {{-- List Kategori Compact --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

            <div>
                <h2 class="text-xl font-black text-slate-900">
                    Kategori Dokumentasi
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Daftar kategori dokumentasi fasilitas. Klik kelola untuk melihat dan mengatur foto.
                </p>
            </div>

            <div class="relative w-full lg:w-80">

                <input type="text"
                       id="facilitySearch"
                       placeholder="Cari kategori..."
                       class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 pl-11 text-sm focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                </svg>

            </div>

        </div>


        {{-- Desktop Table --}}
        <div class="hidden lg:block overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 border-b border-slate-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-black text-slate-500 uppercase tracking-wider">
                            Kategori
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-black text-slate-500 uppercase tracking-wider">
                            Deskripsi
                        </th>

                        <th class="px-6 py-4 text-center text-xs font-black text-slate-500 uppercase tracking-wider">
                            Foto
                        </th>

                        <th class="px-6 py-4 text-center text-xs font-black text-slate-500 uppercase tracking-wider">
                            Urutan
                        </th>

                        <th class="px-6 py-4 text-center text-xs font-black text-slate-500 uppercase tracking-wider">
                            Status
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-black text-slate-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($facilities as $facility)

                        <tr class="hover:bg-slate-50 transition"
                            data-facility-card
                            data-title="{{ strtolower($facility->title ?? '') }}"
                            data-description="{{ strtolower($facility->description ?? '') }}">

                            <td class="px-6 py-5">

                                <div class="flex items-center gap-4">

                                    <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-700 border border-blue-100 flex items-center justify-center font-black">
                                        {{ $loop->iteration }}
                                    </div>

                                    <div>
                                        <h3 class="font-black text-slate-900">
                                            {{ $facility->title }}
                                        </h3>

                                        <p class="mt-1 text-xs font-bold text-slate-400">
                                            {{ $facility->category ?? 'kategori' }}
                                        </p>
                                    </div>

                                </div>

                            </td>

                            <td class="px-6 py-5 max-w-md">
                                <p class="text-sm text-slate-500 leading-6">
                                    {{ $facility->description ?: 'Belum ada deskripsi.' }}
                                </p>
                            </td>

                            <td class="px-6 py-5 text-center">
                                <span class="inline-flex items-center justify-center min-w-12 px-3 py-2 rounded-xl bg-blue-50 text-blue-700 text-sm font-black">
                                    {{ $facility->photos_count }}
                                </span>
                            </td>

                            <td class="px-6 py-5 text-center">
                                <span class="inline-flex items-center justify-center min-w-12 px-3 py-2 rounded-xl bg-slate-100 text-slate-700 text-sm font-black">
                                    {{ $facility->sort_order }}
                                </span>
                            </td>

                            <td class="px-6 py-5 text-center">
                                @if ($facility->is_active)
                                    <span class="inline-flex px-3 py-1.5 rounded-full bg-green-100 text-green-700 text-xs font-black">
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex px-3 py-1.5 rounded-full bg-slate-200 text-slate-600 text-xs font-black">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-5 text-right">
                                <a href="{{ route('admin.facilities.edit', $facility) }}"
                                   class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-blue-700 text-white text-sm font-bold hover:bg-blue-800 transition">
                                    Kelola
                                </a>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="px-6 py-14 text-center">

                                <h3 class="text-xl font-black text-slate-900">
                                    Data fasilitas belum tersedia
                                </h3>

                                <p class="mt-2 text-slate-500">
                                    Jalankan seeder fasilitas terlebih dahulu.
                                </p>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Mobile List --}}
        <div class="lg:hidden divide-y divide-slate-100">

            @forelse ($facilities as $facility)

                <div class="p-5"
                     data-facility-card
                     data-title="{{ strtolower($facility->title ?? '') }}"
                     data-description="{{ strtolower($facility->description ?? '') }}">

                    <div class="flex items-start justify-between gap-4">

                        <div class="min-w-0">

                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 border border-blue-100 flex items-center justify-center font-black shrink-0">
                                    {{ $loop->iteration }}
                                </div>

                                <div>
                                    <h3 class="font-black text-slate-900">
                                        {{ $facility->title }}
                                    </h3>

                                    <p class="mt-1 text-xs font-bold text-slate-400">
                                        {{ $facility->category ?? 'kategori' }}
                                    </p>
                                </div>

                            </div>

                            <p class="mt-3 text-sm text-slate-500 leading-6">
                                {{ $facility->description ?: 'Belum ada deskripsi.' }}
                            </p>

                        </div>

                        @if ($facility->is_active)
                            <span class="shrink-0 inline-flex px-3 py-1.5 rounded-full bg-green-100 text-green-700 text-xs font-black">
                                Aktif
                            </span>
                        @else
                            <span class="shrink-0 inline-flex px-3 py-1.5 rounded-full bg-slate-200 text-slate-600 text-xs font-black">
                                Nonaktif
                            </span>
                        @endif

                    </div>

                    <div class="mt-4 flex items-center justify-between gap-3">

                        <div class="flex items-center gap-2 text-sm">

                            <span class="inline-flex px-3 py-2 rounded-xl bg-blue-50 text-blue-700 font-black">
                                {{ $facility->photos_count }} Foto
                            </span>

                            <span class="inline-flex px-3 py-2 rounded-xl bg-slate-100 text-slate-700 font-black">
                                Urutan {{ $facility->sort_order }}
                            </span>

                        </div>

                        <a href="{{ route('admin.facilities.edit', $facility) }}"
                           class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-blue-700 text-white text-sm font-bold hover:bg-blue-800 transition">
                            Kelola
                        </a>

                    </div>

                </div>

            @empty

                <div class="p-10 text-center">

                    <h3 class="text-xl font-black text-slate-900">
                        Data fasilitas belum tersedia
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Jalankan seeder fasilitas terlebih dahulu.
                    </p>

                </div>

            @endforelse

        </div>


        <div id="facilityEmptySearch"
             class="hidden p-10 text-center border-t border-slate-100">

            <h3 class="text-xl font-black text-slate-900">
                Kategori tidak ditemukan
            </h3>

            <p class="mt-2 text-sm text-slate-500">
                Coba gunakan kata kunci pencarian lain.
            </p>

        </div>

    </div>

</div>


{{-- Upload Loading Overlay --}}
<div id="facilityUploadOverlay"
     class="hidden fixed inset-0 z-[9999] bg-slate-950/80 backdrop-blur-sm items-center justify-center px-6">

    <div class="w-full max-w-md rounded-3xl bg-white p-8 text-center shadow-2xl">

        <div class="mx-auto w-16 h-16 rounded-full border-4 border-slate-200 border-t-blue-700 animate-spin"></div>

        <h2 class="mt-6 text-xl font-black text-slate-900">
            Mengupload Foto
        </h2>

        <p class="mt-3 text-slate-500 leading-7">
            Mohon tunggu sampai proses selesai. Jangan tutup halaman ini saat foto sedang diupload.
        </p>

    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('facilitySearch');
        const cards = document.querySelectorAll('[data-facility-card]');
        const emptySearch = document.getElementById('facilityEmptySearch');

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const keyword = this.value.toLowerCase().trim();
                let visibleCount = 0;

                cards.forEach(function (card) {
                    const title = card.dataset.title || '';
                    const description = card.dataset.description || '';
                    const isMatch = title.includes(keyword) || description.includes(keyword);

                    card.style.display = isMatch ? '' : 'none';

                    if (isMatch) {
                        visibleCount++;
                    }
                });

                if (emptySearch) {
                    emptySearch.classList.toggle('hidden', visibleCount > 0);
                }
            });
        }

        const form = document.getElementById('facilityGeneralUploadForm');
        const fileInput = document.getElementById('facilityGeneralPhotoInput');
        const overlay = document.getElementById('facilityUploadOverlay');

        if (form && fileInput && overlay) {
            form.addEventListener('submit', function () {
                if (fileInput.files && fileInput.files.length > 0) {
                    overlay.classList.remove('hidden');
                    overlay.classList.add('flex');
                }
            });
        }
    });
</script>

@endsection