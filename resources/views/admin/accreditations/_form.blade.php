@php
    $isEdit = isset($accreditation);
@endphp

<div class="grid lg:grid-cols-3 gap-8">

    {{-- Main Form --}}
    <div class="lg:col-span-2 space-y-6">

        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">

            <h2 class="text-xl font-bold text-slate-800 mb-6">
                Informasi Akreditasi
            </h2>

            <div class="space-y-5">

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Judul Akreditasi
                    </label>

                    <input type="text"
                        name="title"
                        value="{{ old('title', $accreditation->title ?? '') }}"
                        placeholder="Contoh: Akreditasi Nasional LAM Teknik"
                        class="w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500">

                    @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Jenis Akreditasi
                        </label>

                        <select name="type"
                            class="w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500">

                            @foreach ($types as $key => $label)
                                <option value="{{ $key }}"
                                    {{ old('type', $accreditation->type ?? '') == $key ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach

                        </select>

                        @error('type')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Lembaga Akreditasi
                        </label>

                        <input type="text"
                            name="institution"
                            value="{{ old('institution', $accreditation->institution ?? '') }}"
                            placeholder="Contoh: LAM Teknik / ASIC"
                            class="w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500">

                        @error('institution')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="grid md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Peringkat / Status
                        </label>

                        <input type="text"
                            name="rank"
                            value="{{ old('rank', $accreditation->rank ?? '') }}"
                            placeholder="Contoh: Unggul / Accredited"
                            class="w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500">

                        @error('rank')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Nomor Sertifikat / SK
                        </label>

                        <input type="text"
                            name="certificate_number"
                            value="{{ old('certificate_number', $accreditation->certificate_number ?? '') }}"
                            placeholder="Contoh: 123/SK/LAM Teknik/..."
                            class="w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500">

                        @error('certificate_number')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="grid md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Berlaku Mulai
                        </label>

                        <input type="date"
                            name="valid_from"
                            value="{{ old('valid_from', isset($accreditation->valid_from) ? $accreditation->valid_from->format('Y-m-d') : '') }}"
                            class="w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500">

                        @error('valid_from')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Berlaku Sampai
                        </label>

                        <input type="date"
                            name="valid_until"
                            value="{{ old('valid_until', isset($accreditation->valid_until) ? $accreditation->valid_until->format('Y-m-d') : '') }}"
                            class="w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500">

                        @error('valid_until')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Deskripsi
                    </label>

                    <textarea name="description"
                        rows="5"
                        placeholder="Tuliskan deskripsi singkat akreditasi..."
                        class="w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500">{{ old('description', $accreditation->description ?? '') }}</textarea>

                    @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>

        </div>

    </div>


    {{-- Side Form --}}
    <div class="space-y-6">

        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">

            <h2 class="text-xl font-bold text-slate-800 mb-6">
                Pengaturan
            </h2>

            <div class="space-y-5">

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Urutan Tampil
                    </label>

                    <input type="number"
                        name="sort_order"
                        value="{{ old('sort_order', $accreditation->sort_order ?? 0) }}"
                        class="w-full rounded-2xl border-slate-200 focus:border-blue-500 focus:ring-blue-500">

                    @error('sort_order')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <label class="flex items-center gap-3 rounded-2xl border border-slate-200 p-4 cursor-pointer hover:bg-slate-50 transition">
                    <input type="checkbox"
                        name="is_active"
                        value="1"
                        class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                        {{ old('is_active', $accreditation->is_active ?? true) ? 'checked' : '' }}>

                    <span class="text-sm font-semibold text-slate-700">
                        Tampilkan di halaman profile
                    </span>
                </label>

            </div>

        </div>


        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-6">

            <h2 class="text-xl font-bold text-slate-800 mb-6">
                File Sertifikat
            </h2>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Upload File
                </label>

                <input type="file"
                    name="file_path"
                    accept=".pdf,.jpg,.jpeg,.png,.webp"
                    class="w-full rounded-2xl border border-slate-200 p-3 text-sm">

                <p class="mt-2 text-xs text-slate-500">
                    Format: PDF, JPG, JPEG, PNG, WEBP. Maksimal 20MB.
                </p>

                @error('file_path')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            @if ($isEdit && !empty($accreditation->file_path))
                <div class="mt-5 rounded-2xl bg-slate-50 border border-slate-100 p-4">

                    <p class="text-sm font-semibold text-slate-700 mb-3">
                        File saat ini:
                    </p>

                    <a href="{{ asset('storage/' . $accreditation->file_path) }}"
                        target="_blank"
                        class="inline-flex items-center gap-2 text-blue-700 font-semibold hover:underline">

                        <i class="fa-solid fa-file-lines"></i>
                        Lihat Sertifikat
                    </a>

                </div>
            @endif

        </div>


        <div class="flex gap-3">

            <a href="{{ route('admin.accreditations.index') }}"
                class="flex-1 text-center px-5 py-3 rounded-2xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition">
                Batal
            </a>

            <button type="submit"
                class="flex-1 px-5 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                Simpan
            </button>

        </div>

    </div>

</div>