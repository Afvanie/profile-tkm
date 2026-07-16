@extends('layouts.admin')

@section('title', 'Konten Beranda')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-6 md:p-8">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>
                <p class="text-sm font-extrabold tracking-[0.2em] uppercase text-blue-700">
                    Beranda Website
                </p>

                <h1 class="mt-3 text-2xl md:text-3xl font-black text-slate-900">
                    Konten Beranda
                </h1>

                <p class="mt-3 max-w-2xl text-slate-500 leading-7">
                    Kelola video hero, statistik, deskripsi program studi, dan gambar yang tampil di halaman utama website.
                </p>
            </div>

            <a href="{{ route('home') }}"
               target="_blank"
               class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                Lihat Website
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

            <h3 class="font-bold mb-2">
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


    <form id="homeContentForm"
          action="{{ route('admin.home-content.update') }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-6">

        @csrf
        @method('PUT')


        {{-- Video Hero Beranda --}}
        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <div>
                    <h2 class="text-xl font-black text-slate-900">
                        Video Hero Beranda
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Video ini tampil sebagai background utama di bagian paling atas halaman beranda.
                    </p>
                </div>

                <span class="inline-flex w-fit px-4 py-2 rounded-full bg-blue-50 text-blue-700 text-sm font-bold">
                    Prioritas Utama
                </span>

            </div>

            <div class="p-6">

                <div class="grid xl:grid-cols-12 gap-6 items-start">

                    {{-- Preview Video --}}
                    <div class="xl:col-span-7">

                        <div class="rounded-3xl overflow-hidden border border-slate-200 bg-slate-50">

                            <div class="px-5 py-4 border-b border-slate-200 bg-white flex items-center justify-between">

                                <h3 class="font-black text-slate-900">
                                    Preview Video
                                </h3>

                                <span class="text-xs font-bold text-slate-400 uppercase">
                                    Hero Beranda
                                </span>

                            </div>

                            <div class="p-5">

                                @if ($content?->hero_video_path)
                                    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-black">
                                        <video class="w-full h-72 md:h-80 object-cover" controls>
                                            <source src="{{ asset('storage/' . $content->hero_video_path) }}" type="video/mp4">
                                            Browser kamu tidak mendukung preview video.
                                        </video>
                                    </div>

                                    <p class="mt-3 text-xs text-slate-500">
                                        Video saat ini akan diganti jika kamu mengupload video baru.
                                    </p>
                                @else
                                    <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-8 text-center">

                                        <div class="mx-auto w-14 h-14 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="w-7 h-7"
                                                 fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke="currentColor"
                                                 stroke-width="2">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                            </svg>
                                        </div>

                                        <h3 class="mt-4 font-black text-slate-900">
                                            Belum Ada Video dari Admin
                                        </h3>

                                        <p class="mt-2 text-sm text-slate-500 leading-6">
                                            Website masih memakai video default dari folder
                                            <span class="font-bold">public/assets/videos/hero.mp4</span>.
                                        </p>

                                    </div>
                                @endif

                            </div>

                        </div>

                    </div>


                    {{-- Upload Video --}}
                    <div class="xl:col-span-5">

                        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">

                            <label class="block text-sm font-bold text-slate-700 mb-3">
                                Upload Video Baru
                            </label>

                            <input
                                id="heroVideoInput"
                                type="file"
                                name="hero_video"
                                accept="video/mp4,video/webm,video/quicktime"
                                class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-600 file:mr-4 file:rounded-xl file:border-0 file:bg-blue-700 file:px-4 file:py-2 file:text-white file:font-bold hover:file:bg-blue-800 transition">

                            <p class="mt-3 text-xs text-slate-500 leading-6">
                                Format disarankan: MP4 atau WebM. Gunakan video pendek dan sudah dikompres agar halaman beranda tetap ringan.
                            </p>

                        </div>

                        <div class="mt-5 rounded-3xl bg-blue-50 border border-blue-100 p-5">

                            <h3 class="text-sm font-black text-blue-900">
                                Catatan
                            </h3>

                            <p class="mt-2 text-sm text-blue-700 leading-6">
                                Jika video baru diupload, video lama akan otomatis diganti.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Statistik --}}
        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100 flex flex-col md:flex-row md:items-center md:justify-between gap-3">

                <div>
                    <h2 class="text-xl font-black text-slate-900">
                        Statistik Program Studi
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Kelola angka statistik singkat yang tampil di halaman beranda.
                    </p>
                </div>

                <span class="inline-flex w-fit px-4 py-2 rounded-full bg-blue-50 text-blue-700 text-sm font-bold">
                    {{ $statistics->count() }} Data
                </span>

            </div>

            <div class="p-6">

                <div class="overflow-x-auto rounded-2xl border border-slate-200">

                    <table class="w-full text-sm">

                        <thead class="bg-slate-50 text-slate-600">
                            <tr>
                                <th class="px-4 py-3 text-left font-bold w-32">
                                    Urutan
                                </th>

                                <th class="px-4 py-3 text-left font-bold">
                                    Label
                                </th>

                                <th class="px-4 py-3 text-left font-bold w-56">
                                    Angka / Nilai
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100 bg-white">

                            @foreach ($statistics as $statistic)

                                <tr class="hover:bg-slate-50 transition">

                                    <td class="px-4 py-3">
                                        <input type="number"
                                            name="statistics[{{ $statistic->id }}][sort_order]"
                                            value="{{ old('statistics.'.$statistic->id.'.sort_order', $statistic->sort_order) }}"
                                            class="w-full rounded-xl border border-slate-200 px-3 py-2 text-slate-800 font-semibold focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition">
                                    </td>

                                    <td class="px-4 py-3">
                                        <input type="text"
                                            name="statistics[{{ $statistic->id }}][label]"
                                            value="{{ old('statistics.'.$statistic->id.'.label', $statistic->label) }}"
                                            class="w-full rounded-xl border border-slate-200 px-3 py-2 text-slate-800 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition">
                                    </td>

                                    <td class="px-4 py-3">
                                        <input type="text"
                                            name="statistics[{{ $statistic->id }}][value]"
                                            value="{{ old('statistics.'.$statistic->id.'.value', $statistic->value) }}"
                                            class="w-full rounded-xl border border-slate-200 px-3 py-2 text-slate-800 font-bold focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition">
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        {{-- Deskripsi Program Studi --}}
        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100">

                <h2 class="text-xl font-black text-slate-900">
                    Deskripsi Program Studi
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Konten ini tampil pada section deskripsi program studi di halaman beranda.
                </p>

            </div>

            <div class="p-6">

                <div class="grid xl:grid-cols-12 gap-6">

                    {{-- Form --}}
                    <div class="xl:col-span-7 space-y-5">

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                Badge Kecil
                            </label>

                            <input type="text"
                                   name="badge"
                                   value="{{ old('badge', $content->badge) }}"
                                   placeholder="Contoh: Program Studi"
                                   class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-slate-800 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                Judul Section
                            </label>

                            <input type="text"
                                   name="title"
                                   value="{{ old('title', $content->title) }}"
                                   placeholder="Contoh: Deskripsi Program Studi"
                                   class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-slate-800 font-bold focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">
                                Deskripsi
                            </label>

                            <textarea name="description"
                                      rows="10"
                                      placeholder="Tulis deskripsi program studi..."
                                      class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-slate-800 leading-8 focus:border-blue-500 focus:ring-4 focus:ring-blue-100 outline-none transition">{{ old('description', $content->description) }}</textarea>
                        </div>

                    </div>


                    {{-- Gambar --}}
                    <div class="xl:col-span-5">

                        <div class="space-y-5">

                            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">

                                <label class="block text-sm font-bold text-slate-700 mb-3">
                                    Gambar Deskripsi
                                </label>

                                <input type="file"
                                       name="image"
                                       accept="image/*"
                                       class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-600 file:mr-4 file:rounded-xl file:border-0 file:bg-blue-700 file:px-4 file:py-2 file:text-white file:font-bold hover:file:bg-blue-800 transition">

                                <p class="mt-3 text-xs text-slate-500 leading-6">
                                    Format disarankan: JPG, PNG, atau WEBP. Ukuran maksimal 2MB.
                                </p>

                            </div>

                            <div class="rounded-3xl overflow-hidden border border-slate-200 bg-white">

                                <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">

                                    <h3 class="font-black text-slate-900">
                                        Preview Gambar
                                    </h3>

                                    <span class="text-xs font-bold text-slate-400 uppercase">
                                        Beranda
                                    </span>

                                </div>

                                <div class="p-5">

                                    @if ($content->image)
                                        <img src="{{ asset('storage/'.$content->image) }}"
                                             alt="Preview"
                                             class="w-full h-72 object-cover rounded-2xl">
                                    @else
                                        <img src="{{ asset('assets/images/about.png') }}"
                                             alt="Preview"
                                             class="w-full h-72 object-cover rounded-2xl">
                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Sticky Submit --}}
        <div class="sticky bottom-5 z-20">

            <div class="rounded-3xl bg-white/90 backdrop-blur-xl border border-slate-200 shadow-2xl px-5 py-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <div>
                    <h3 class="font-black text-slate-900">
                        Simpan perubahan konten beranda?
                    </h3>

                    <p class="text-sm text-slate-500 mt-1">
                        Perubahan akan langsung tampil di halaman utama website.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-3">

                    <a href="{{ route('home') }}"
                       target="_blank"
                       class="inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition">
                        Preview
                    </a>

                    <button type="submit"
                            id="saveHomeContentButton"
                            class="inline-flex items-center justify-center gap-2 px-7 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition shadow-lg shadow-blue-700/20 disabled:opacity-70 disabled:cursor-not-allowed">
                        <span id="saveHomeContentText">Simpan Perubahan</span>
                    </button>

                </div>

            </div>

        </div>

    </form>

</div>


{{-- Upload Loading Overlay --}}
<div id="uploadLoadingOverlay"
     class="fixed inset-0 z-[99999] hidden items-center justify-center bg-slate-950/70 backdrop-blur-sm">

    <div class="w-[90%] max-w-md rounded-3xl bg-white p-7 text-center shadow-2xl">

        <div class="mx-auto w-16 h-16 rounded-full border-4 border-slate-200 border-t-blue-700 animate-spin"></div>

        <h3 class="mt-6 text-xl font-black text-slate-900">
            Sedang Mengupload Video...
        </h3>

        <p class="mt-3 text-sm text-slate-500 leading-6">
            Mohon tunggu. Jika video berukuran besar, proses upload bisa memakan waktu beberapa menit.
            Jangan tutup halaman ini.
        </p>

        <div class="mt-6 h-2 w-full overflow-hidden rounded-full bg-slate-100">
            <div class="h-full w-1/2 animate-pulse rounded-full bg-blue-700"></div>
        </div>

    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('homeContentForm');
        const button = document.getElementById('saveHomeContentButton');
        const buttonText = document.getElementById('saveHomeContentText');
        const overlay = document.getElementById('uploadLoadingOverlay');
        const heroVideoInput = document.getElementById('heroVideoInput');

        if (!form || !button) {
            return;
        }

        form.addEventListener('submit', function () {
            const hasVideoUpload = heroVideoInput &&
                heroVideoInput.files &&
                heroVideoInput.files.length > 0;

            button.disabled = true;

            if (buttonText) {
                buttonText.textContent = hasVideoUpload ? 'Mengupload Video...' : 'Menyimpan...';
            }

            if (hasVideoUpload && overlay) {
                overlay.classList.remove('hidden');
                overlay.classList.add('flex');
            }
        });
    });
</script>

@endsection