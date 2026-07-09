@extends('layouts.admin')

@section('title', 'Edit Konten Profil')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

        <div>
            <a href="{{ route('admin.profile-contents.index') }}"
                class="inline-flex items-center text-sm font-bold text-blue-700 hover:underline mb-4">
                ← Kembali ke Konten Profil
            </a>

            <h1 class="text-3xl md:text-4xl font-black text-slate-800">
                Edit {{ $profileSection->title }}
            </h1>

            <p class="mt-3 text-slate-500 leading-7 max-w-4xl">
                Kelola judul section, deskripsi, status tampil, serta item konten yang muncul
                pada halaman profil Program Studi D-III Teknik Mesin.
            </p>
        </div>

        <a href="{{ url('/profil') }}"
            target="_blank"
            class="inline-flex items-center justify-center gap-3 px-6 py-4 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition shadow-lg shadow-blue-700/20">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>

            Lihat Halaman Profil
        </a>

    </div>


    {{-- Alert Success --}}
    @if (session('success'))
        <div class="rounded-2xl bg-green-50 border border-green-200 text-green-700 px-6 py-4 font-semibold">
            {{ session('success') }}
        </div>
    @endif


    {{-- Error --}}
    @if ($errors->any())
        <div class="rounded-2xl bg-red-50 border border-red-200 text-red-700 px-6 py-4">
            <strong class="font-black">Terjadi kesalahan:</strong>

            <ul class="mt-2 list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Section Information --}}
    <div class="rounded-[2rem] bg-white/95 backdrop-blur border border-slate-100 shadow-xl overflow-hidden">

        <div class="h-2 bg-gradient-to-r from-blue-700 via-yellow-400 to-blue-700"></div>

        <form action="{{ route('admin.profile-contents.update', $profileSection) }}"
            method="POST"
            class="p-7 md:p-8 space-y-7">

            @csrf
            @method('PUT')

            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6">

                <div>
                    <h2 class="text-2xl font-black text-slate-800">
                        Informasi Section
                    </h2>

                    <p class="mt-2 text-slate-500 leading-7">
                        Bagian ini digunakan untuk mengatur judul, subjudul, deskripsi, urutan,
                        dan status tampil section profil.
                    </p>
                </div>

                <div>
                    @if ($profileSection->is_active)
                        <span class="inline-flex px-4 py-2 rounded-full bg-green-50 text-green-700 text-sm font-bold">
                            Aktif
                        </span>
                    @else
                        <span class="inline-flex px-4 py-2 rounded-full bg-red-50 text-red-700 text-sm font-bold">
                            Nonaktif
                        </span>
                    @endif
                </div>

            </div>

            <div class="grid md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Judul Section
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $profileSection->title) }}"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Subjudul
                    </label>

                    <input
                        type="text"
                        name="subtitle"
                        value="{{ old('subtitle', $profileSection->subtitle) }}"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

            </div>

            <div class="grid md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Urutan Section
                    </label>

                    <input
                        type="number"
                        name="sort_order"
                        value="{{ old('sort_order', $profileSection->sort_order) }}"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="rounded-3xl bg-blue-50 border border-blue-100 p-5">

                    <label class="flex items-start gap-4 cursor-pointer">

                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            class="mt-1 w-5 h-5 rounded border-slate-300 text-blue-700 focus:ring-blue-500"
                            {{ old('is_active', $profileSection->is_active) ? 'checked' : '' }}>

                        <div>
                            <h3 class="font-black text-slate-800">
                                Tampilkan section ini
                            </h3>

                            <p class="mt-1 text-sm text-slate-500 leading-6">
                                Jika aktif, section ini akan tampil pada halaman profil website.
                            </p>
                        </div>

                    </label>

                </div>

            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Deskripsi Section
                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $profileSection->description) }}</textarea>
            </div>

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 pt-6 border-t border-slate-100">

                <p class="text-sm text-slate-500">
                    Simpan section terlebih dahulu jika mengubah judul, subjudul, deskripsi, atau status section.
                </p>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center px-7 py-4 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition shadow-lg shadow-blue-700/20">
                    Simpan Section
                </button>

            </div>

        </form>

    </div>


    {{-- Item Content --}}
    <div class="rounded-[2rem] bg-white/95 backdrop-blur border border-slate-100 shadow-xl overflow-hidden">

        <div class="h-2 bg-gradient-to-r from-blue-700 via-yellow-400 to-blue-700"></div>

        <div class="p-6 md:p-8 border-b border-slate-100">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                <div>
                    <h2 class="text-2xl font-black text-slate-800">
                        Daftar Item Konten
                    </h2>

                    <p class="mt-2 text-slate-500">
                        Kelola item yang berada di dalam section {{ $profileSection->title }}.
                    </p>
                </div>

                <div class="relative w-full lg:w-96">

                    <input
                        type="text"
                        id="profileItemSearch"
                        placeholder="Cari item konten..."
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 pl-12 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                    </svg>

                </div>

            </div>

        </div>


        <div class="p-6 md:p-8 space-y-6">

            @forelse ($profileSection->items as $item)

                <div
                    class="rounded-[2rem] bg-slate-50 border border-slate-100 p-6"
                    data-profile-item-card
                    data-title="{{ strtolower($item->title ?? '') }}"
                    data-group="{{ strtolower($item->item_group ?? '') }}"
                    data-content="{{ strtolower($item->content ?? '') }}">

                    <form action="{{ route('admin.profile-contents.items.update', $item) }}"
                        method="POST"
                        class="space-y-6">

                        @csrf
                        @method('PUT')

                        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-5">

                            <div class="flex items-start gap-4">

                                <div class="w-14 h-14 rounded-2xl bg-blue-700 text-white flex items-center justify-center font-black shadow-lg shrink-0">
                                    {{ $loop->iteration }}
                                </div>

                                <div>
                                    <h3 class="text-xl font-black text-slate-800">
                                        {{ $item->title ?: 'Item Konten' }}
                                    </h3>

                                    <p class="mt-1 text-sm text-slate-500">
                                        Group: {{ $item->item_group ?: '-' }} • Urutan {{ $item->sort_order }}
                                    </p>
                                </div>

                            </div>

                            @if ($item->is_active)
                                <span class="inline-flex px-3 py-1 rounded-full bg-green-50 text-green-700 text-xs font-bold">
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex px-3 py-1 rounded-full bg-red-50 text-red-700 text-xs font-bold">
                                    Nonaktif
                                </span>
                            @endif

                        </div>

                        <div class="grid md:grid-cols-3 gap-5">

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">
                                    Group
                                </label>

                                <input
                                    type="text"
                                    name="item_group"
                                    value="{{ old('item_group', $item->item_group) }}"
                                    placeholder="visi / misi / tujuan / ppm / cpl"
                                    class="w-full rounded-2xl border border-slate-200 bg-white px-5 py-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">
                                    Judul Item
                                </label>

                                <input
                                    type="text"
                                    name="title"
                                    value="{{ old('title', $item->title) }}"
                                    placeholder="Contoh: Misi 1"
                                    class="w-full rounded-2xl border border-slate-200 bg-white px-5 py-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">
                                    Urutan
                                </label>

                                <input
                                    type="number"
                                    name="sort_order"
                                    value="{{ old('sort_order', $item->sort_order) }}"
                                    class="w-full rounded-2xl border border-slate-200 bg-white px-5 py-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                Isi Konten
                            </label>

                            <textarea
                                name="content"
                                rows="6"
                                class="w-full rounded-2xl border border-slate-200 bg-white px-5 py-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>{{ old('content', $item->content) }}</textarea>
                        </div>

                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 pt-4 border-t border-slate-200">

                            <label class="flex items-center gap-3 cursor-pointer">

                                <input
                                    type="checkbox"
                                    name="is_active"
                                    value="1"
                                    class="w-5 h-5 rounded border-slate-300 text-blue-700 focus:ring-blue-500"
                                    {{ old('is_active', $item->is_active) ? 'checked' : '' }}>

                                <span class="text-sm font-bold text-slate-700">
                                    Tampilkan item ini
                                </span>

                            </label>

                            <div class="flex flex-col sm:flex-row gap-3">

                                <button
                                    type="submit"
                                    class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                                    Simpan Item
                                </button>

                            </div>

                        </div>

                    </form>

                    <form action="{{ route('admin.profile-contents.items.destroy', $item) }}"
                        method="POST"
                        class="mt-4"
                        onsubmit="return confirm('Yakin ingin menghapus item ini?')">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-red-50 text-red-700 font-bold hover:bg-red-600 hover:text-white transition">
                            Hapus Item
                        </button>

                    </form>

                </div>

            @empty

                <div class="rounded-3xl bg-slate-50 border border-slate-100 p-10 text-center">

                    <h3 class="text-xl font-bold text-slate-800">
                        Belum ada item konten
                    </h3>

                    <p class="mt-2 text-slate-500">
                        Tambahkan item baru melalui form di bawah.
                    </p>

                </div>

            @endforelse


            {{-- Empty Search --}}
            <div id="profileItemEmptySearch" class="hidden rounded-3xl bg-slate-50 border border-slate-100 p-10 text-center">

                <h3 class="text-xl font-bold text-slate-800">
                    Item tidak ditemukan
                </h3>

                <p class="mt-2 text-slate-500">
                    Coba gunakan kata kunci pencarian lain.
                </p>

            </div>

        </div>

    </div>


    {{-- Add New Item --}}
    <div class="rounded-[2rem] bg-white/95 backdrop-blur border border-slate-100 shadow-xl overflow-hidden">

        <div class="h-2 bg-gradient-to-r from-green-600 via-yellow-400 to-blue-700"></div>

        <form action="{{ route('admin.profile-contents.items.store', $profileSection) }}"
            method="POST"
            class="p-7 md:p-8 space-y-6">

            @csrf

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                <div>
                    <h2 class="text-2xl font-black text-slate-800">
                        Tambah Item Baru
                    </h2>

                    <p class="mt-2 text-slate-500">
                        Tambahkan item baru untuk section {{ $profileSection->title }}.
                    </p>
                </div>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center gap-3 px-7 py-4 rounded-2xl bg-green-600 text-white font-bold hover:bg-green-700 transition shadow-lg shadow-green-600/20">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4v16m8-8H4" />
                    </svg>

                    Tambah Item
                </button>

            </div>

            <div class="grid md:grid-cols-3 gap-5">

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Group
                    </label>

                    <input
                        type="text"
                        name="item_group"
                        placeholder="visi / misi / tujuan / ppm / cpl"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Judul Item
                    </label>

                    <input
                        type="text"
                        name="title"
                        placeholder="Contoh: Misi 1"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Urutan
                    </label>

                    <input
                        type="number"
                        name="sort_order"
                        value="0"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Isi Konten
                </label>

                <textarea
                    name="content"
                    rows="6"
                    class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required></textarea>
            </div>

            <div class="rounded-3xl bg-green-50 border border-green-100 p-5">

                <label class="flex items-start gap-4 cursor-pointer">

                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        checked
                        class="mt-1 w-5 h-5 rounded border-slate-300 text-green-600 focus:ring-green-500">

                    <div>
                        <h3 class="font-black text-slate-800">
                            Tampilkan item ini
                        </h3>

                        <p class="mt-1 text-sm text-slate-500 leading-6">
                            Jika aktif, item baru akan tampil pada halaman profil sesuai section ini.
                        </p>
                    </div>

                </label>

            </div>

        </form>

    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('profileItemSearch');
        const cards = document.querySelectorAll('[data-profile-item-card]');
        const emptySearch = document.getElementById('profileItemEmptySearch');

        if (!searchInput) {
            return;
        }

        searchInput.addEventListener('input', function () {
            const keyword = this.value.toLowerCase().trim();
            let visibleCount = 0;

            cards.forEach(function (card) {
                const title = card.dataset.title || '';
                const group = card.dataset.group || '';
                const content = card.dataset.content || '';

                const isMatch =
                    title.includes(keyword) ||
                    group.includes(keyword) ||
                    content.includes(keyword);

                card.style.display = isMatch ? '' : 'none';

                if (isMatch) {
                    visibleCount++;
                }
            });

            if (emptySearch) {
                emptySearch.classList.toggle('hidden', visibleCount > 0);
            }
        });
    });
</script>

@endsection