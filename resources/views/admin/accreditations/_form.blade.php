@php
    $isEdit = isset($accreditation);

    $currentFileUrl = null;
    $currentExtension = null;
    $currentIsImage = false;
    $currentIsPdf = false;

    if ($isEdit && !empty($accreditation->file_path)) {
        $currentFileUrl = asset('storage/' . $accreditation->file_path);
        $currentExtension = strtolower(pathinfo($accreditation->file_path, PATHINFO_EXTENSION));
        $currentIsImage = in_array($currentExtension, ['jpg', 'jpeg', 'png', 'webp']);
        $currentIsPdf = $currentExtension === 'pdf';
    }
@endphp

<div class="grid xl:grid-cols-12 gap-8">

    {{-- LEFT FORM --}}
    <div class="xl:col-span-8 space-y-6">

        {{-- Main Information --}}
        <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/70">
                <h2 class="text-xl font-black text-slate-800">
                    Informasi Akreditasi
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Lengkapi data utama akreditasi program studi.
                </p>
            </div>

            <div class="p-6 space-y-6">

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Judul Akreditasi
                    </label>

                    <input type="text"
                        name="title"
                        value="{{ old('title', $accreditation->title ?? '') }}"
                        placeholder="Contoh: Akreditasi Nasional LAM Teknik"
                        class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 text-slate-700 focus:border-blue-500 focus:ring-blue-500">

                    @error('title')
                        <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>


                <div class="grid md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Jenis Akreditasi
                        </label>

                        <select name="type"
                            class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 text-slate-700 focus:border-blue-500 focus:ring-blue-500">

                            @foreach ($types as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('type', $accreditation->type ?? '') == $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach

                        </select>

                        @error('type')
                            <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Lembaga Akreditasi
                        </label>

                        <input type="text"
                            name="institution"
                            value="{{ old('institution', $accreditation->institution ?? '') }}"
                            placeholder="Contoh: LAM Teknik / ASIC"
                            class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 text-slate-700 focus:border-blue-500 focus:ring-blue-500">

                        @error('institution')
                            <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                </div>


                <div class="grid md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Peringkat / Status
                        </label>

                        <input type="text"
                            name="rank"
                            value="{{ old('rank', $accreditation->rank ?? '') }}"
                            placeholder="Contoh: Unggul / Accredited"
                            class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 text-slate-700 focus:border-blue-500 focus:ring-blue-500">

                        @error('rank')
                            <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Nomor Sertifikat / SK
                        </label>

                        <input type="text"
                            name="certificate_number"
                            value="{{ old('certificate_number', $accreditation->certificate_number ?? '') }}"
                            placeholder="Contoh: 0136/SK/LAM Teknik/VD3/XII/2022"
                            class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 text-slate-700 focus:border-blue-500 focus:ring-blue-500">

                        @error('certificate_number')
                            <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                </div>


                <div class="grid md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Berlaku Mulai
                        </label>

                        <input type="date"
                            name="valid_from"
                            value="{{ old('valid_from', isset($accreditation->valid_from) ? $accreditation->valid_from->format('Y-m-d') : '') }}"
                            class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 text-slate-700 focus:border-blue-500 focus:ring-blue-500">

                        @error('valid_from')
                            <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Berlaku Sampai
                        </label>

                        <input type="date"
                            name="valid_until"
                            value="{{ old('valid_until', isset($accreditation->valid_until) ? $accreditation->valid_until->format('Y-m-d') : '') }}"
                            class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 text-slate-700 focus:border-blue-500 focus:ring-blue-500">

                        @error('valid_until')
                            <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                </div>


                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Deskripsi
                    </label>

                    <textarea name="description"
                        rows="6"
                        placeholder="Tuliskan deskripsi singkat akreditasi..."
                        class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 text-slate-700 leading-7 focus:border-blue-500 focus:ring-blue-500">{{ old('description', $accreditation->description ?? '') }}</textarea>

                    @error('description')
                        <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

            </div>

        </div>

    </div>


    {{-- RIGHT PANEL --}}
    <div class="xl:col-span-4 space-y-6">

        {{-- Settings --}}
        <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/70">
                <h2 class="text-xl font-black text-slate-800">
                    Pengaturan
                </h2>
            </div>

            <div class="p-6 space-y-5">

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Urutan Tampil
                    </label>

                    <input type="number"
                        name="sort_order"
                        value="{{ old('sort_order', $accreditation->sort_order ?? 0) }}"
                        class="w-full rounded-2xl border-slate-200 bg-white px-4 py-3 text-slate-700 focus:border-blue-500 focus:ring-blue-500">

                    @error('sort_order')
                        <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <label class="flex items-start gap-4 rounded-2xl border border-slate-200 bg-slate-50 p-4 cursor-pointer hover:bg-blue-50 hover:border-blue-100 transition">

                    <input type="checkbox"
                        name="is_active"
                        value="1"
                        class="mt-1 rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                        {{ old('is_active', $accreditation->is_active ?? true) ? 'checked' : '' }}>

                    <span>
                        <span class="block text-sm font-black text-slate-800">
                            Tampilkan di website
                        </span>

                        <span class="block mt-1 text-xs leading-5 text-slate-500">
                            Jika aktif, data ini tampil di halaman Beranda dan Profile.
                        </span>
                    </span>

                </label>

            </div>

        </div>


        {{-- File Upload --}}
        <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/70">
                <h2 class="text-xl font-black text-slate-800">
                    File Sertifikat
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Upload sertifikat dalam bentuk PDF atau gambar.
                </p>
            </div>

            <div class="p-6 space-y-5">

                @if ($currentFileUrl)

                    <div class="rounded-2xl border border-slate-100 bg-slate-50 overflow-hidden">

                        @if ($currentIsImage)

                            <a href="{{ $currentFileUrl }}" target="_blank">
                                <img
                                    src="{{ $currentFileUrl }}"
                                    alt="Sertifikat Akreditasi"
                                    class="w-full h-56 object-contain bg-white p-3">
                            </a>

                        @elseif ($currentIsPdf)

                            <div class="h-56 bg-white flex flex-col items-center justify-center text-center p-6">

                                <div class="w-16 h-16 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center text-xl font-black">
                                    PDF
                                </div>

                                <p class="mt-4 text-sm font-black text-slate-800">
                                    File Sertifikat PDF
                                </p>

                                <a href="{{ $currentFileUrl }}"
                                    target="_blank"
                                    class="mt-2 text-xs font-black text-blue-700 hover:underline">
                                    Buka file
                                </a>

                            </div>

                        @endif

                    </div>

                @endif


                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        {{ $isEdit ? 'Ganti File Sertifikat' : 'Upload File Sertifikat' }}
                    </label>

                    <input type="file"
                        name="file_path"
                        accept=".pdf,.jpg,.jpeg,.png,.webp"
                        class="w-full rounded-2xl border border-slate-200 bg-white p-3 text-sm text-slate-600">

                    <p class="mt-2 text-xs text-slate-500 leading-5">
                        Format: PDF, JPG, JPEG, PNG, WEBP. Maksimal 20MB.
                        @if ($isEdit)
                            Kosongkan jika tidak ingin mengganti file.
                        @endif
                    </p>

                    @error('file_path')
                        <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

            </div>

        </div>


        {{-- Actions --}}
        <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-5">

            <div class="grid grid-cols-2 gap-3">

                <a href="{{ route('admin.accreditations.index') }}"
                    class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-slate-100 text-slate-700 font-black hover:bg-slate-200 transition">
                    Batal
                </a>

                <button type="submit"
                    class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-blue-700 text-white font-black hover:bg-blue-800 transition shadow-lg shadow-blue-700/20">
                    Simpan
                </button>

            </div>

        </div>

    </div>

</div>