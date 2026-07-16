@extends('layouts.admin')

@section('title', 'Edit Konten Profil')

@section('content')

@php
    $slug = $profileSection->slug;

    $isOverviewSection = $slug === 'overview';
    $isHistorySection = $slug === 'history';
    $isVisionMissionSection = in_array($slug, ['vision-mission', 'visi-misi']);
    $isGoalsSection = in_array($slug, ['goals', 'tujuan-prodi']);
    $isPpmSection = $slug === 'ppm';
    $isCplSection = $slug === 'cpl';

    $sectionLabels = [
        'overview' => [
            'title' => 'Profil Singkat Program Studi',
            'description' => 'Kelola pengenalan singkat Program Studi D-III Teknik Mesin.',
            'badge' => 'Profil Singkat',
        ],
        'history' => [
            'title' => 'Sejarah Program Studi',
            'description' => 'Kelola narasi sejarah dan perjalanan Program Studi.',
            'badge' => 'Sejarah',
        ],
        'vision-mission' => [
            'title' => 'Visi dan Misi Program Studi',
            'description' => 'Kelola visi dan misi Program Studi.',
            'badge' => 'Visi Misi',
        ],
        'visi-misi' => [
            'title' => 'Visi dan Misi Program Studi',
            'description' => 'Kelola visi dan misi Program Studi.',
            'badge' => 'Visi Misi',
        ],
        'goals' => [
            'title' => 'Tujuan Program Studi',
            'description' => 'Kelola tujuan pendidikan Program Studi.',
            'badge' => 'Tujuan',
        ],
        'tujuan-prodi' => [
            'title' => 'Tujuan Program Studi',
            'description' => 'Kelola tujuan pendidikan Program Studi.',
            'badge' => 'Tujuan',
        ],
        'ppm' => [
            'title' => 'Profil Profesional Mandiri Lulusan',
            'description' => 'Kelola profil kemampuan lulusan setelah menyelesaikan pendidikan.',
            'badge' => 'PPM',
        ],
        'cpl' => [
            'title' => 'Capaian Pembelajaran Lulusan',
            'description' => 'Kelola capaian pembelajaran lulusan Program Studi.',
            'badge' => 'CPL',
        ],
    ];

    $sectionMeta = $sectionLabels[$slug] ?? [
        'title' => $profileSection->title,
        'description' => 'Kelola konten profil Program Studi.',
        'badge' => 'Konten Profil',
    ];

    $overviewLabelItem = $profileSection->items
        ->where('item_group', 'label')
        ->sortBy('sort_order')
        ->first();

    $overviewParagraphItems = $profileSection->items
        ->where('item_group', 'paragraph')
        ->sortBy('sort_order');

    $overviewParagraphText = $overviewParagraphItems
        ->pluck('content')
        ->filter()
        ->implode("\n\n");

    $overviewInfoCards = $profileSection->items
        ->where('item_group', 'info_card')
        ->sortBy('sort_order');

    $historyParagraphItems = $profileSection->items
        ->where('item_group', 'paragraph')
        ->sortBy('sort_order');

    $historyParagraphText = $historyParagraphItems
        ->pluck('content')
        ->filter()
        ->implode("\n\n");

    $timelineItems = $profileSection->items
        ->where('item_group', 'timeline')
        ->sortBy('sort_order');

    $defaultItems = $profileSection->items
        ->reject(fn ($item) => in_array($item->item_group, ['paragraph', 'label', 'timeline', 'info_card']))
        ->sortBy('sort_order');

    $defaultItemGroup = match (true) {
        $isVisionMissionSection => 'mission',
        $isGoalsSection => 'goal',
        $isPpmSection => 'ppm',
        $isCplSection => 'cpl',
        default => 'content',
    };

    $itemGroupLabel = function ($group) {
        return match ($group) {
            'vision', 'visi' => 'Visi Program Studi',
            'mission', 'misi' => 'Misi Program Studi',
            'goal', 'goals', 'tujuan' => 'Tujuan Program Studi',
            'ppm' => 'Profil Profesional Mandiri',
            'cpl' => 'Capaian Pembelajaran Lulusan',
            'timeline' => 'Timeline Sejarah',
            'info_card' => 'Kartu Informasi',
            default => 'Konten',
        };
    };
@endphp

<div class="space-y-6">

    {{-- Header --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-6 md:p-8">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>
                <a href="{{ route('admin.profile-contents.index') }}"
                   class="inline-flex items-center text-sm font-bold text-blue-700 hover:text-blue-900 mb-4">
                    ← Kembali ke Konten Profil
                </a>

                <p class="text-sm font-extrabold tracking-[0.2em] uppercase text-blue-700">
                    {{ $sectionMeta['badge'] }}
                </p>

                <h1 class="mt-3 text-2xl md:text-3xl font-black text-slate-900">
                    Edit {{ $sectionMeta['title'] }}
                </h1>

                <p class="mt-3 max-w-3xl text-slate-500 leading-7">
                    {{ $sectionMeta['description'] }}
                </p>
            </div>

            <a href="{{ route('profile') }}"
               target="_blank"
               class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                Lihat Halaman Profil
            </a>

        </div>

    </div>


    {{-- Alert Success --}}
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


    {{-- Informasi Utama --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-100">

            <h2 class="text-xl font-black text-slate-900">
                Informasi Utama
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Bagian ini mengatur judul, label kecil, deskripsi, urutan, dan status tampil.
            </p>

        </div>

        <form action="{{ route('admin.profile-contents.update', $profileSection) }}"
              method="POST"
              class="p-6 space-y-6">

            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-5">

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Judul yang Tampil
                    </label>

                    <input type="text"
                           name="title"
                           value="{{ old('title', $profileSection->title) }}"
                           class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Label Kecil
                    </label>

                    <input type="text"
                           name="subtitle"
                           value="{{ old('subtitle', $profileSection->subtitle) }}"
                           placeholder="Contoh: TENTANG KAMI"
                           class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                </div>

            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Deskripsi Singkat
                </label>

                <textarea name="description"
                          rows="4"
                          class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 leading-8 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">{{ old('description', $profileSection->description) }}</textarea>
            </div>

            <div class="grid md:grid-cols-2 gap-5">

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Urutan Tampil
                    </label>

                    <input type="number"
                           name="sort_order"
                           value="{{ old('sort_order', $profileSection->sort_order) }}"
                           class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                </div>

                <div class="rounded-2xl border border-blue-100 bg-blue-50 px-5 py-4">

                    <label class="flex items-start gap-3 cursor-pointer">

                        <input type="checkbox"
                               name="is_active"
                               value="1"
                               class="mt-1 w-5 h-5 rounded border-slate-300 text-blue-700 focus:ring-blue-500"
                               {{ old('is_active', $profileSection->is_active) ? 'checked' : '' }}>

                        <div>
                            <h3 class="font-black text-slate-900">
                                Tampilkan bagian ini
                            </h3>

                            <p class="mt-1 text-sm text-slate-500 leading-6">
                                Jika dicentang, bagian ini akan tampil di halaman profil website.
                            </p>
                        </div>

                    </label>

                </div>

            </div>

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 pt-5 border-t border-slate-100">

                <p class="text-sm text-slate-500">
                    Simpan jika kamu mengubah informasi utama bagian ini.
                </p>

                <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                    Simpan Informasi Utama
                </button>

            </div>

        </form>

    </div>


    {{-- Profil Singkat --}}
    @if ($isOverviewSection)

        {{-- Label Profil --}}
        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100">
                <h2 class="text-xl font-black text-slate-900">
                    Label Profil Singkat
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Label kecil yang tampil di atas teks profil singkat.
                </p>
            </div>

            <div class="p-6">

                @if ($overviewLabelItem)

                    <form action="{{ route('admin.profile-contents.items.update', $overviewLabelItem) }}"
                          method="POST"
                          class="space-y-5">

                        @csrf
                        @method('PUT')

                        <input type="hidden" name="item_group" value="label">
                        <input type="hidden" name="title" value="Label Konten">
                        <input type="hidden" name="sort_order" value="{{ $overviewLabelItem->sort_order }}">
                        <input type="hidden" name="is_active" value="1">

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                Label yang Tampil
                            </label>

                            <input type="text"
                                   name="content"
                                   value="{{ old('content', $overviewLabelItem->content) }}"
                                   placeholder="Contoh: PROFIL SINGKAT"
                                   class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500"
                                   required>
                        </div>

                        <button type="submit"
                                class="inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                            Simpan Label
                        </button>

                    </form>

                @else

                    <form action="{{ route('admin.profile-contents.items.store', $profileSection) }}"
                          method="POST"
                          class="space-y-5">

                        @csrf

                        <input type="hidden" name="item_group" value="label">
                        <input type="hidden" name="title" value="Label Konten">
                        <input type="hidden" name="sort_order" value="1">
                        <input type="hidden" name="is_active" value="1">

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                Label yang Tampil
                            </label>

                            <input type="text"
                                   name="content"
                                   value="PROFIL SINGKAT"
                                   class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500"
                                   required>
                        </div>

                        <button type="submit"
                                class="inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-green-600 text-white font-bold hover:bg-green-700 transition">
                            Buat Label
                        </button>

                    </form>

                @endif

            </div>

        </div>


        {{-- Isi Profil Singkat --}}
        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100">
                <h2 class="text-xl font-black text-slate-900">
                    Isi Profil Singkat
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Tulis semua paragraf profil singkat di sini. Untuk membuat paragraf baru, beri jarak satu baris kosong.
                </p>
            </div>

            <form action="{{ route('admin.profile-contents.paragraphs.update', $profileSection) }}"
                  method="POST"
                  class="p-6 space-y-5">

                @csrf
                @method('PUT')

                <input type="hidden" name="title_prefix" value="Paragraf Profil">

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Teks Profil Singkat
                    </label>

                    <textarea name="content"
                              rows="14"
                              class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 leading-8 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">{{ old('content', $overviewParagraphText) }}</textarea>
                </div>

                <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                    Simpan Profil Singkat
                </button>

            </form>

        </div>


        {{-- Kartu Informasi --}}
        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100">
                <h2 class="text-xl font-black text-slate-900">
                    Kartu Informasi Singkat
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Kartu kecil seperti jenjang pendidikan, akreditasi, gelar lulusan, dan masa studi.
                </p>
            </div>

            <div class="p-4 md:p-5 space-y-3">

                @forelse ($overviewInfoCards as $item)

                    @php
                        $parts = explode('|', $item->content);
                        $cardValue = trim($parts[0] ?? '');
                        $cardDescription = trim($parts[1] ?? '');
                    @endphp

                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-3">

                        <form action="{{ route('admin.profile-contents.items.update', $item) }}"
                              method="POST"
                              class="js-info-card-form grid lg:grid-cols-12 gap-3 items-end">

                            @csrf
                            @method('PUT')

                            <input type="hidden" name="item_group" value="info_card">
                            <input type="hidden" name="is_active" value="0">
                            <input type="hidden" name="content" class="js-info-card-content" value="{{ $item->content }}">

                            <div class="lg:col-span-2">
                                <label class="block text-xs font-black text-slate-500 mb-1">
                                    Nilai Utama
                                </label>

                                <input type="text"
                                       data-card-value
                                       value="{{ $cardValue }}"
                                       placeholder="D-III"
                                       class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm font-bold focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                            </div>

                            <div class="lg:col-span-2">
                                <label class="block text-xs font-black text-slate-500 mb-1">
                                    Judul Kartu
                                </label>

                                <input type="text"
                                       name="title"
                                       value="{{ old('title', $item->title) }}"
                                       placeholder="Jenjang Pendidikan"
                                       class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                            </div>

                            <div class="lg:col-span-3">
                                <label class="block text-xs font-black text-slate-500 mb-1">
                                    Keterangan
                                </label>

                                <input type="text"
                                       data-card-description
                                       value="{{ $cardDescription }}"
                                       placeholder="Program Diploma Tiga"
                                       class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                            </div>

                            <div class="lg:col-span-1">
                                <label class="block text-xs font-black text-slate-500 mb-1">
                                    Urutan
                                </label>

                                <input type="number"
                                       name="sort_order"
                                       value="{{ old('sort_order', $item->sort_order) }}"
                                       class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm text-center focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                            </div>

                            <div class="lg:col-span-2">
                                <label class="flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm font-bold text-slate-600 cursor-pointer">
                                    <input type="checkbox"
                                           name="is_active"
                                           value="1"
                                           class="w-4 h-4 rounded border-slate-300 text-blue-700 focus:ring-blue-500"
                                           {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
                                    Tampilkan
                                </label>
                            </div>

                            <div class="lg:col-span-2">
                                <button type="submit"
                                        class="w-full inline-flex items-center justify-center px-4 py-2 rounded-xl bg-blue-700 text-white text-sm font-bold hover:bg-blue-800 transition">
                                    Simpan
                                </button>
                            </div>

                        </form>

                        <form action="{{ route('admin.profile-contents.items.destroy', $item) }}"
                              method="POST"
                              class="mt-2 flex justify-end"
                              onsubmit="return confirm('Yakin ingin menghapus kartu informasi ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-red-50 text-red-700 text-sm font-bold hover:bg-red-600 hover:text-white transition">
                                Hapus
                            </button>

                        </form>

                    </div>

                @empty

                    <div class="rounded-2xl bg-slate-50 border border-slate-200 p-8 text-center">
                        <h3 class="font-black text-slate-900">
                            Belum ada kartu informasi
                        </h3>

                        <p class="mt-2 text-sm text-slate-500">
                            Tambahkan kartu informasi melalui form di bawah.
                        </p>
                    </div>

                @endforelse

            </div>

        </div>


        {{-- Tambah Kartu Informasi --}}
        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

            <form action="{{ route('admin.profile-contents.items.store', $profileSection) }}"
                  method="POST"
                  class="p-4 md:p-5 space-y-4 js-info-card-form">

                @csrf

                <input type="hidden" name="item_group" value="info_card">
                <input type="hidden" name="is_active" value="1">
                <input type="hidden" name="content" class="js-info-card-content">

                <div>
                    <h2 class="text-lg font-black text-slate-900">
                        Tambah Kartu Informasi Baru
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Kosongkan urutan jika ingin otomatis masuk urutan terakhir.
                    </p>
                </div>

                <div class="grid lg:grid-cols-12 gap-3 items-end">

                    <div class="lg:col-span-2">
                        <label class="block text-xs font-black text-slate-500 mb-1">
                            Nilai Utama
                        </label>

                        <input type="text"
                               data-card-value
                               placeholder="D-III"
                               class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm font-bold focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                    </div>

                    <div class="lg:col-span-2">
                        <label class="block text-xs font-black text-slate-500 mb-1">
                            Judul Kartu
                        </label>

                        <input type="text"
                               name="title"
                               placeholder="Jenjang Pendidikan"
                               class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                    </div>

                    <div class="lg:col-span-3">
                        <label class="block text-xs font-black text-slate-500 mb-1">
                            Keterangan
                        </label>

                        <input type="text"
                               data-card-description
                               placeholder="Program Diploma Tiga"
                               class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                    </div>

                    <div class="lg:col-span-2">
                        <label class="block text-xs font-black text-slate-500 mb-1">
                            Urutan
                        </label>

                        <input type="number"
                               name="sort_order"
                               placeholder="Otomatis"
                               class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                    </div>

                    <div class="lg:col-span-3">
                        <button type="submit"
                                class="w-full inline-flex items-center justify-center px-4 py-2 rounded-xl bg-green-600 text-white text-sm font-bold hover:bg-green-700 transition">
                            Tambah Kartu
                        </button>
                    </div>

                </div>

            </form>

        </div>


    {{-- Sejarah --}}
    @elseif ($isHistorySection)

        {{-- Narasi Sejarah --}}
        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100">
                <h2 class="text-xl font-black text-slate-900">
                    Narasi Sejarah Program Studi
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Tulis semua paragraf sejarah di sini. Untuk membuat paragraf baru, beri jarak satu baris kosong.
                </p>
            </div>

            <form action="{{ route('admin.profile-contents.paragraphs.update', $profileSection) }}"
                  method="POST"
                  class="p-6 space-y-5">

                @csrf
                @method('PUT')

                <input type="hidden" name="title_prefix" value="Paragraf Sejarah">

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Teks Sejarah
                    </label>

                    <textarea name="content"
                              rows="14"
                              class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 leading-8 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">{{ old('content', $historyParagraphText) }}</textarea>
                </div>

                <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                    Simpan Narasi Sejarah
                </button>

            </form>

        </div>


        {{-- Timeline --}}
        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

                <div>
                    <h2 class="text-xl font-black text-slate-900">
                        Poin Timeline Sejarah
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Edit beberapa timeline sekaligus, lalu klik tombol Simpan Semua Timeline.
                    </p>
                </div>

                <div class="relative w-full lg:w-80">

                    <input type="text"
                           id="profileItemSearch"
                           placeholder="Cari timeline..."
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

            <form action="{{ route('admin.profile-contents.items.batch-update', $profileSection) }}"
                  method="POST"
                  class="p-4 md:p-5 space-y-3">

                @csrf
                @method('PUT')

                @forelse ($timelineItems as $item)

                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4"
                         data-profile-item-card
                         data-title="{{ strtolower($item->title ?? '') }}"
                         data-content="{{ strtolower($item->content ?? '') }}">

                        <input type="hidden"
                               name="items[{{ $item->id }}][id]"
                               value="{{ $item->id }}">

                        <input type="hidden"
                               name="items[{{ $item->id }}][item_group]"
                               value="timeline">

                        <div class="grid xl:grid-cols-12 gap-3 items-start">

                            <div class="xl:col-span-3">
                                <label class="block text-xs font-black text-slate-500 mb-1">
                                    Judul Timeline
                                </label>

                                <input type="text"
                                       name="items[{{ $item->id }}][title]"
                                       value="{{ old('items.'.$item->id.'.title', $item->title) }}"
                                       placeholder="Contoh: Penguatan Kompetensi"
                                       class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                            </div>

                            <div class="xl:col-span-5">
                                <label class="block text-xs font-black text-slate-500 mb-1">
                                    Deskripsi Timeline
                                </label>

                                <textarea name="items[{{ $item->id }}][content]"
                                          rows="3"
                                          class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm leading-6 focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500"
                                          required>{{ old('items.'.$item->id.'.content', $item->content) }}</textarea>
                            </div>

                            <div class="xl:col-span-1">
                                <label class="block text-xs font-black text-slate-500 mb-1">
                                    Urutan
                                </label>

                                <input type="number"
                                       name="items[{{ $item->id }}][sort_order]"
                                       value="{{ old('items.'.$item->id.'.sort_order', $item->sort_order) }}"
                                       class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm text-center focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                            </div>

                            <div class="xl:col-span-1">
                                <label class="block text-xs font-black text-slate-500 mb-1">
                                    Status
                                </label>

                                <label class="flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm font-bold text-slate-600 cursor-pointer">
                                    <input type="hidden"
                                           name="items[{{ $item->id }}][is_active]"
                                           value="0">

                                    <input type="checkbox"
                                           name="items[{{ $item->id }}][is_active]"
                                           value="1"
                                           class="w-4 h-4 rounded border-slate-300 text-blue-700 focus:ring-blue-500"
                                           {{ old('items.'.$item->id.'.is_active', $item->is_active) ? 'checked' : '' }}>
                                    Tampil
                                </label>
                            </div>

                            <div class="xl:col-span-2">
                                <label class="block text-xs font-black text-slate-500 mb-1">
                                    Aksi
                                </label>

                                <button type="submit"
                                        form="delete-profile-item-{{ $item->id }}"
                                        class="w-full inline-flex items-center justify-center px-4 py-2 rounded-xl bg-red-50 text-red-700 text-sm font-bold hover:bg-red-600 hover:text-white transition">
                                    Hapus
                                </button>
                            </div>

                        </div>

                    </div>

                @empty

                    <div class="rounded-2xl bg-slate-50 border border-slate-200 p-8 text-center">
                        <h3 class="font-black text-slate-900">
                            Belum ada timeline
                        </h3>

                        <p class="mt-2 text-sm text-slate-500">
                            Tambahkan timeline melalui form di bawah.
                        </p>
                    </div>

                @endforelse

                <div id="profileItemEmptySearch"
                     class="hidden rounded-2xl bg-slate-50 border border-slate-200 p-8 text-center">

                    <h3 class="font-black text-slate-900">
                        Timeline tidak ditemukan
                    </h3>

                    <p class="mt-2 text-sm text-slate-500">
                        Coba gunakan kata kunci pencarian lain.
                    </p>

                </div>

                @if ($timelineItems->isNotEmpty())
                    <div class="sticky bottom-5 z-20 pt-3">

                        <div class="rounded-3xl bg-white/90 backdrop-blur-xl border border-slate-200 shadow-2xl px-5 py-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                            <div>
                                <h3 class="font-black text-slate-900">
                                    Simpan semua perubahan timeline?
                                </h3>

                                <p class="text-sm text-slate-500 mt-1">
                                    Semua perubahan timeline di atas akan disimpan sekaligus.
                                </p>
                            </div>

                            <button type="submit"
                                    class="inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                                Simpan Semua Timeline
                            </button>

                        </div>

                    </div>
                @endif

            </form>

            @foreach ($timelineItems as $item)
                <form id="delete-profile-item-{{ $item->id }}"
                      action="{{ route('admin.profile-contents.items.destroy', $item) }}"
                      method="POST"
                      class="hidden"
                      onsubmit="return confirm('Yakin ingin menghapus timeline ini?')">
                    @csrf
                    @method('DELETE')
                </form>
            @endforeach

        </div>


        {{-- Tambah Timeline --}}
        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

            <form action="{{ route('admin.profile-contents.items.store', $profileSection) }}"
                  method="POST"
                  class="p-6 space-y-5">

                @csrf

                <input type="hidden" name="item_group" value="timeline">
                <input type="hidden" name="is_active" value="1">

                <div>
                    <h2 class="text-xl font-black text-slate-900">
                        Tambah Timeline Baru
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Timeline baru akan ditambahkan ke bagian sejarah.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-4">

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Judul Timeline
                        </label>

                        <input type="text"
                               name="title"
                               placeholder="Contoh: Penguatan Kompetensi Vokasi"
                               class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Urutan Tampil
                        </label>

                        <input type="number"
                               name="sort_order"
                               placeholder="Otomatis"
                               class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">

                        <p class="mt-2 text-xs text-slate-500">
                            Kosongkan agar otomatis masuk urutan terakhir.
                        </p>
                    </div>

                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Deskripsi Timeline
                    </label>

                    <textarea name="content"
                              rows="5"
                              class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 leading-8 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500"
                              required></textarea>
                </div>

                <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-green-600 text-white font-bold hover:bg-green-700 transition">
                    Tambah Timeline
                </button>

            </form>

        </div>


    {{-- Visi Misi / Tujuan / PPM / CPL --}}
    @else

        @php
            $existingGroups = $profileSection->items->pluck('item_group');

            $visionGroupValue = $existingGroups->contains('visi') ? 'visi' : 'vision';
            $missionGroupValue = $existingGroups->contains('misi') ? 'misi' : 'mission';
        @endphp

        {{-- Daftar Konten --}}
        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

                <div>
                    <h2 class="text-xl font-black text-slate-900">
                        Daftar Isi Konten
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Edit beberapa poin sekaligus, lalu klik tombol Simpan Semua Konten.
                    </p>
                </div>

                <div class="relative w-full lg:w-80">

                    <input type="text"
                           id="profileItemSearch"
                           placeholder="Cari isi konten..."
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

            <form action="{{ route('admin.profile-contents.items.batch-update', $profileSection) }}"
                  method="POST"
                  class="p-4 md:p-5 space-y-3">

                @csrf
                @method('PUT')

                @forelse ($defaultItems as $item)

                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4"
                         data-profile-item-card
                         data-title="{{ strtolower($item->title ?? '') }}"
                         data-content="{{ strtolower($item->content ?? '') }}">

                        <input type="hidden"
                               name="items[{{ $item->id }}][id]"
                               value="{{ $item->id }}">

                        <div class="grid xl:grid-cols-12 gap-3 items-start">

                            @if ($isVisionMissionSection)
                                <div class="xl:col-span-2">
                                    <label class="block text-xs font-black text-slate-500 mb-1">
                                        Jenis
                                    </label>

                                    <select name="items[{{ $item->id }}][item_group]"
                                            class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                                        <option value="{{ $visionGroupValue }}" @selected(in_array($item->item_group, ['vision', 'visi']))>
                                            Visi
                                        </option>
                                        <option value="{{ $missionGroupValue }}" @selected(in_array($item->item_group, ['mission', 'misi']))>
                                            Misi
                                        </option>
                                    </select>
                                </div>
                            @else
                                <input type="hidden"
                                       name="items[{{ $item->id }}][item_group]"
                                       value="{{ $item->item_group }}">
                            @endif

                            <div class="{{ $isVisionMissionSection ? 'xl:col-span-2' : 'xl:col-span-3' }}">
                                <label class="block text-xs font-black text-slate-500 mb-1">
                                    Judul / Nomor
                                </label>

                                <input type="text"
                                       name="items[{{ $item->id }}][title]"
                                       value="{{ old('items.'.$item->id.'.title', $item->title) }}"
                                       placeholder="Contoh: Misi 1"
                                       class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                            </div>

                            <div class="{{ $isVisionMissionSection ? 'xl:col-span-4' : 'xl:col-span-5' }}">
                                <label class="block text-xs font-black text-slate-500 mb-1">
                                    Isi Konten
                                </label>

                                <textarea name="items[{{ $item->id }}][content]"
                                          rows="3"
                                          class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm leading-6 focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500"
                                          required>{{ old('items.'.$item->id.'.content', $item->content) }}</textarea>
                            </div>

                            <div class="xl:col-span-1">
                                <label class="block text-xs font-black text-slate-500 mb-1">
                                    Urutan
                                </label>

                                <input type="number"
                                       name="items[{{ $item->id }}][sort_order]"
                                       value="{{ old('items.'.$item->id.'.sort_order', $item->sort_order) }}"
                                       class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm text-center focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                            </div>

                            <div class="xl:col-span-1">
                                <label class="block text-xs font-black text-slate-500 mb-1">
                                    Status
                                </label>

                                <label class="flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm font-bold text-slate-600 cursor-pointer">
                                    <input type="hidden"
                                           name="items[{{ $item->id }}][is_active]"
                                           value="0">

                                    <input type="checkbox"
                                           name="items[{{ $item->id }}][is_active]"
                                           value="1"
                                           class="w-4 h-4 rounded border-slate-300 text-blue-700 focus:ring-blue-500"
                                           {{ old('items.'.$item->id.'.is_active', $item->is_active) ? 'checked' : '' }}>
                                    Tampil
                                </label>
                            </div>

                            <div class="xl:col-span-2">
                                <label class="block text-xs font-black text-slate-500 mb-1">
                                    Aksi
                                </label>

                                <button type="submit"
                                        form="delete-profile-item-{{ $item->id }}"
                                        class="w-full inline-flex items-center justify-center px-4 py-2 rounded-xl bg-red-50 text-red-700 text-sm font-bold hover:bg-red-600 hover:text-white transition">
                                    Hapus
                                </button>
                            </div>

                        </div>

                    </div>

                @empty

                    <div class="rounded-2xl bg-slate-50 border border-slate-200 p-8 text-center">
                        <h3 class="font-black text-slate-900">
                            Belum ada isi konten
                        </h3>

                        <p class="mt-2 text-sm text-slate-500">
                            Tambahkan konten melalui form di bawah.
                        </p>
                    </div>

                @endforelse

                <div id="profileItemEmptySearch"
                     class="hidden rounded-2xl bg-slate-50 border border-slate-200 p-8 text-center">

                    <h3 class="font-black text-slate-900">
                        Konten tidak ditemukan
                    </h3>

                    <p class="mt-2 text-sm text-slate-500">
                        Coba gunakan kata kunci pencarian lain.
                    </p>

                </div>

                @if ($defaultItems->isNotEmpty())
                    <div class="sticky bottom-5 z-20 pt-3">

                        <div class="rounded-3xl bg-white/90 backdrop-blur-xl border border-slate-200 shadow-2xl px-5 py-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                            <div>
                                <h3 class="font-black text-slate-900">
                                    Simpan semua perubahan konten?
                                </h3>

                                <p class="text-sm text-slate-500 mt-1">
                                    Semua perubahan pada daftar di atas akan disimpan sekaligus.
                                </p>
                            </div>

                            <button type="submit"
                                    class="inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                                Simpan Semua Konten
                            </button>

                        </div>

                    </div>
                @endif

            </form>

            @foreach ($defaultItems as $item)
                <form id="delete-profile-item-{{ $item->id }}"
                      action="{{ route('admin.profile-contents.items.destroy', $item) }}"
                      method="POST"
                      class="hidden"
                      onsubmit="return confirm('Yakin ingin menghapus konten ini?')">
                    @csrf
                    @method('DELETE')
                </form>
            @endforeach

        </div>


        {{-- Tambah Konten Baru --}}
        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

            <form action="{{ route('admin.profile-contents.items.store', $profileSection) }}"
                  method="POST"
                  class="p-6 space-y-5">

                @csrf

                <input type="hidden" name="is_active" value="1">

                <div>
                    <h2 class="text-xl font-black text-slate-900">
                        Tambah Konten Baru
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Konten baru akan ditambahkan ke bagian {{ $sectionMeta['title'] }}.
                    </p>
                </div>

                @if ($isVisionMissionSection)
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Jenis Konten
                        </label>

                        <select name="item_group"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                            <option value="{{ $visionGroupValue }}">
                                Visi Program Studi
                            </option>
                            <option value="{{ $missionGroupValue }}" selected>
                                Misi Program Studi
                            </option>
                        </select>
                    </div>
                @else
                    <input type="hidden" name="item_group" value="{{ $defaultItemGroup }}">
                @endif

                <div class="grid md:grid-cols-2 gap-4">

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Judul / Nomor
                        </label>

                        <input type="text"
                               name="title"
                               placeholder="Contoh: Misi 1"
                               class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Urutan Tampil
                        </label>

                        <input type="number"
                               name="sort_order"
                               placeholder="Otomatis"
                               class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">

                        <p class="mt-2 text-xs text-slate-500">
                            Kosongkan agar otomatis masuk urutan terakhir.
                        </p>
                    </div>

                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Isi Konten
                    </label>

                    <textarea name="content"
                              rows="6"
                              class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 leading-8 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500"
                              required></textarea>
                </div>

                <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-green-600 text-white font-bold hover:bg-green-700 transition">
                    Tambah Konten
                </button>

            </form>

        </div>

    @endif

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const searchInput = document.getElementById('profileItemSearch');
        const cards = document.querySelectorAll('[data-profile-item-card]');
        const emptySearch = document.getElementById('profileItemEmptySearch');

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const keyword = this.value.toLowerCase().trim();
                let visibleCount = 0;

                cards.forEach(function (card) {
                    const title = card.dataset.title || '';
                    const content = card.dataset.content || '';

                    const isMatch =
                        title.includes(keyword) ||
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
        }


        document.querySelectorAll('.js-info-card-form').forEach(function (form) {
            form.addEventListener('submit', function () {
                const valueInput = form.querySelector('[data-card-value]');
                const descriptionInput = form.querySelector('[data-card-description]');
                const hiddenContent = form.querySelector('.js-info-card-content');

                if (!hiddenContent) {
                    return;
                }

                const value = valueInput ? valueInput.value.trim() : '';
                const description = descriptionInput ? descriptionInput.value.trim() : '';

                hiddenContent.value = value + '|' + description;
            });
        });

    });
</script>

@endsection