@extends('layouts.admin')

@section('title', 'Kelola Dokumentasi Fasilitas')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-6 md:p-8">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>
                <a href="{{ route('admin.facilities.index') }}"
                   class="inline-flex items-center text-sm font-bold text-blue-700 hover:text-blue-900 mb-4">
                    ← Kembali ke Dokumentasi Fasilitas
                </a>

                <p class="text-sm font-extrabold tracking-[0.2em] uppercase text-blue-700">
                    Kelola Dokumentasi
                </p>

                <h1 class="mt-3 text-2xl md:text-3xl font-black text-slate-900">
                    {{ $facility->title }}
                </h1>

                <p class="mt-3 max-w-3xl text-slate-500 leading-7">
                    Upload dan kelola foto dokumentasi untuk kategori {{ $facility->title }}.
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


    {{-- Upload Photo --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-100">

            <h2 class="text-xl font-black text-slate-900">
                Tambah Foto Dokumentasi
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Foto baru akan ditambahkan ke kategori {{ $facility->title }}.
            </p>

        </div>

        <form id="facilityPhotoUploadForm"
              action="{{ route('admin.facilities.photos.store', $facility) }}"
              method="POST"
              enctype="multipart/form-data"
              class="p-6 space-y-5">

            @csrf

            <div class="grid lg:grid-cols-12 gap-4 items-end">

                <div class="lg:col-span-4">
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Judul Foto
                    </label>

                    <input type="text"
                           name="title"
                           value="{{ old('title') }}"
                           placeholder="Contoh: Laboratorium Utama"
                           class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                </div>

                <div class="lg:col-span-4">
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Upload Foto
                    </label>

                    <input type="file"
                           id="facilityPhotoInput"
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

                <div class="lg:col-span-2">
                    <button type="submit"
                            class="w-full inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                        Tambah Foto
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


    {{-- Photo List --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

            <div>
                <h2 class="text-xl font-black text-slate-900">
                    Foto Dokumentasi
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Kelola foto yang tampil pada slider dokumentasi {{ $facility->title }}.
                </p>
            </div>

            <div class="relative w-full lg:w-80">

                <input type="text"
                       id="facilityPhotoSearch"
                       placeholder="Cari foto..."
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

        @if ($facility->photos->count())

            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-5 p-4 md:p-6">

                @foreach ($facility->photos as $photo)

                    <div class="rounded-3xl border border-slate-200 bg-slate-50 overflow-hidden"
                         data-facility-photo-card
                         data-title="{{ strtolower($photo->title ?? '') }}">

                        {{-- Preview --}}
                        <div class="relative h-56 bg-slate-100">

                            <a href="{{ asset('storage/' . $photo->photo) }}" target="_blank">
                                <img src="{{ asset('storage/' . $photo->photo) }}"
                                     alt="{{ $photo->title ?? 'Foto Dokumentasi' }}"
                                     class="w-full h-full object-cover">
                            </a>

                            <div class="absolute left-4 top-4">
                                @if ($photo->is_active)
                                    <span class="px-3 py-1.5 rounded-full text-xs font-black bg-green-100 text-green-700">
                                        Tampil
                                    </span>
                                @else
                                    <span class="px-3 py-1.5 rounded-full text-xs font-black bg-slate-200 text-slate-600">
                                        Nonaktif
                                    </span>
                                @endif
                            </div>

                        </div>

                        {{-- Edit Photo --}}
                        <form action="{{ route('admin.facilities.photos.update', $photo) }}"
                              method="POST"
                              enctype="multipart/form-data"
                              class="facility-photo-update-form p-5 space-y-4">

                            @csrf
                            @method('PUT')

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">
                                    Judul Foto
                                </label>

                                <input type="text"
                                       name="title"
                                       value="{{ old('title', $photo->title) }}"
                                       placeholder="Judul foto"
                                       class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">
                                    Ganti Foto
                                </label>

                                <input type="file"
                                       name="photo"
                                       accept="image/jpeg,image/png,image/webp"
                                       class="block w-full text-sm text-slate-600 file:mr-4 file:rounded-xl file:border-0 file:bg-slate-800 file:px-4 file:py-2 file:text-sm file:font-bold file:text-white hover:file:bg-slate-900">

                                <p class="mt-2 text-xs text-slate-500">
                                    Kosongkan jika tidak ingin mengganti foto.
                                </p>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">
                                    Urutan
                                </label>

                                <input type="number"
                                       name="sort_order"
                                       value="{{ old('sort_order', $photo->sort_order) }}"
                                       class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                            </div>

                            <label class="flex items-center gap-3 cursor-pointer rounded-xl border border-blue-100 bg-blue-50 px-4 py-3">
                                <input type="hidden" name="is_active" value="0">

                                <input type="checkbox"
                                       name="is_active"
                                       value="1"
                                       {{ old('is_active', $photo->is_active) ? 'checked' : '' }}
                                       class="w-5 h-5 rounded border-slate-300 text-blue-700 focus:ring-blue-500">

                                <span class="text-sm font-bold text-slate-700">
                                    Tampilkan foto
                                </span>
                            </label>

                            <div class="grid grid-cols-2 gap-3 pt-2">

                                <button type="submit"
                                        class="px-4 py-3 rounded-xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                                    Simpan
                                </button>

                                <button type="submit"
                                        form="delete-photo-{{ $photo->id }}"
                                        class="px-4 py-3 rounded-xl bg-red-600 text-white font-bold hover:bg-red-700 transition">
                                    Hapus
                                </button>

                            </div>

                        </form>

                        <form id="delete-photo-{{ $photo->id }}"
                              action="{{ route('admin.facilities.photos.destroy', $photo) }}"
                              method="POST"
                              class="hidden"
                              onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                            @csrf
                            @method('DELETE')
                        </form>

                    </div>

                @endforeach

                <div id="facilityPhotoEmptySearch"
                     class="hidden md:col-span-2 xl:col-span-3 rounded-3xl bg-slate-50 border border-slate-200 p-10 text-center">

                    <h3 class="text-xl font-black text-slate-900">
                        Foto tidak ditemukan
                    </h3>

                    <p class="mt-2 text-sm text-slate-500">
                        Coba gunakan kata kunci pencarian lain.
                    </p>

                </div>

            </div>

        @else

            <div class="p-10 text-center">

                <h3 class="text-2xl font-black text-slate-900">
                    Belum ada foto
                </h3>

                <p class="mt-3 text-slate-500">
                    Tambahkan foto dokumentasi untuk kategori {{ $facility->title }}.
                </p>

            </div>

        @endif

    </div>

</div>


{{-- Upload Loading Overlay --}}
<div id="facilityPhotoUploadOverlay"
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
        const searchInput = document.getElementById('facilityPhotoSearch');
        const cards = document.querySelectorAll('[data-facility-photo-card]');
        const emptySearch = document.getElementById('facilityPhotoEmptySearch');

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const keyword = this.value.toLowerCase().trim();
                let visibleCount = 0;

                cards.forEach(function (card) {
                    const title = card.dataset.title || '';
                    const isMatch = title.includes(keyword);

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

        const uploadForm = document.getElementById('facilityPhotoUploadForm');
        const uploadInput = document.getElementById('facilityPhotoInput');
        const updateForms = document.querySelectorAll('.facility-photo-update-form');
        const overlay = document.getElementById('facilityPhotoUploadOverlay');

        if (overlay) {
            if (uploadForm && uploadInput) {
                uploadForm.addEventListener('submit', function () {
                    if (uploadInput.files && uploadInput.files.length > 0) {
                        overlay.classList.remove('hidden');
                        overlay.classList.add('flex');
                    }
                });
            }

            updateForms.forEach(function (form) {
                form.addEventListener('submit', function () {
                    const fileInput = form.querySelector('input[type="file"]');

                    if (fileInput && fileInput.files && fileInput.files.length > 0) {
                        overlay.classList.remove('hidden');
                        overlay.classList.add('flex');
                    }
                });
            });
        }
    });
</script>

@endsection