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

<div class="grid xl:grid-cols-12 gap-6">

    {{-- Main Form --}}
    <div class="xl:col-span-8 space-y-6">

        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100">
                <h2 class="text-xl font-black text-slate-900">
                    Informasi Akreditasi
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Isi data utama akreditasi program studi.
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
                           class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500"
                           required>

                    @error('title')
                        <p class="mt-2 text-sm text-red-600 font-semibold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                <div class="grid md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Jenis Akreditasi
                        </label>

                        <select name="type"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500"
                                required>

                            @foreach ($types as $key => $label)
                                <option value="{{ $key }}"
                                        @selected(old('type', $accreditation->type ?? 'nasional') == $key)>
                                    {{ $label }}
                                </option>
                            @endforeach

                        </select>

                        @error('type')
                            <p class="mt-2 text-sm text-red-600 font-semibold">
                                {{ $message }}
                            </p>
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
                               class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">

                        @error('institution')
                            <p class="mt-2 text-sm text-red-600 font-semibold">
                                {{ $message }}
                            </p>
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
                               class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">

                        @error('rank')
                            <p class="mt-2 text-sm text-red-600 font-semibold">
                                {{ $message }}
                            </p>
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
                               class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">

                        @error('certificate_number')
                            <p class="mt-2 text-sm text-red-600 font-semibold">
                                {{ $message }}
                            </p>
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
                               value="{{ old('valid_from', optional($accreditation->valid_from ?? null)->format('Y-m-d')) }}"
                               class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">

                        @error('valid_from')
                            <p class="mt-2 text-sm text-red-600 font-semibold">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">
                            Berlaku Sampai
                        </label>

                        <input type="date"
                               name="valid_until"
                               value="{{ old('valid_until', optional($accreditation->valid_until ?? null)->format('Y-m-d')) }}"
                               class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">

                        @error('valid_until')
                            <p class="mt-2 text-sm text-red-600 font-semibold">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                </div>


                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Deskripsi
                    </label>

                    <textarea name="description"
                              rows="7"
                              placeholder="Tuliskan deskripsi singkat akreditasi..."
                              class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 leading-8 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">{{ old('description', $accreditation->description ?? '') }}</textarea>

                    @error('description')
                        <p class="mt-2 text-sm text-red-600 font-semibold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

            </div>

        </div>

    </div>


    {{-- Right Panel --}}
    <div class="xl:col-span-4 space-y-6">

        {{-- Settings --}}
        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100">
                <h2 class="text-xl font-black text-slate-900">
                    Pengaturan
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Atur status tampil dan urutan data.
                </p>
            </div>

            <div class="p-6 space-y-5">

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Urutan Tampil
                    </label>

                    <input type="number"
                           name="sort_order"
                           value="{{ old('sort_order', $accreditation->sort_order ?? '') }}"
                           placeholder="Otomatis"
                           class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">

                    <p class="mt-2 text-xs text-slate-500">
                        Kosongkan saat tambah data jika ingin otomatis masuk urutan terakhir.
                    </p>

                    @error('sort_order')
                        <p class="mt-2 text-sm text-red-600 font-semibold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <label class="flex items-start gap-4 rounded-2xl border border-blue-100 bg-blue-50 p-4 cursor-pointer">

                    <input type="hidden"
                           name="is_active"
                           value="0">

                    <input type="checkbox"
                           name="is_active"
                           value="1"
                           class="mt-1 w-5 h-5 rounded border-slate-300 text-blue-700 focus:ring-blue-500"
                           {{ old('is_active', $accreditation->is_active ?? true) ? 'checked' : '' }}>

                    <span>
                        <span class="block text-sm font-black text-slate-900">
                            Tampilkan di website
                        </span>

                        <span class="block mt-1 text-xs leading-5 text-slate-500">
                            Jika dicentang, data ini tampil di bagian akreditasi website.
                        </span>
                    </span>

                </label>

            </div>

        </div>


        {{-- File Upload --}}
        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100">
                <h2 class="text-xl font-black text-slate-900">
                    File Sertifikat
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Upload sertifikat dalam bentuk PDF atau gambar.
                </p>
            </div>

            <div class="p-6 space-y-5">

                @if ($currentFileUrl)

                    <div class="rounded-2xl border border-slate-200 bg-slate-50 overflow-hidden">

                        @if ($currentIsImage)

                            <a href="{{ $currentFileUrl }}" target="_blank">
                                <img src="{{ $currentFileUrl }}"
                                     alt="Sertifikat Akreditasi"
                                     class="w-full h-64 object-contain bg-white p-3">
                            </a>

                        @elseif ($currentIsPdf)

                            <div class="h-64 bg-white flex flex-col items-center justify-center text-center p-6">

                                <div class="w-16 h-16 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center text-xl font-black">
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

                        @else

                            <div class="h-64 bg-white flex flex-col items-center justify-center text-center p-6">

                                <div class="w-16 h-16 rounded-2xl bg-slate-100 text-slate-500 flex items-center justify-center text-xl font-black">
                                    FILE
                                </div>

                                <p class="mt-4 text-sm font-black text-slate-800">
                                    File Sertifikat
                                </p>

                            </div>

                        @endif

                    </div>

                @else

                    <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-6 text-center">

                        <div class="w-14 h-14 mx-auto rounded-2xl bg-white border border-slate-200 flex items-center justify-center text-slate-500 font-black">
                            A
                        </div>

                        <h3 class="mt-4 font-black text-slate-900">
                            Belum ada file
                        </h3>

                        <p class="mt-2 text-sm text-slate-500">
                            Upload file sertifikat jika sudah tersedia.
                        </p>

                    </div>

                @endif


                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        {{ $isEdit ? 'Ganti File Sertifikat' : 'Upload File Sertifikat' }}
                    </label>

                    <input type="file"
                           id="accreditationFileInput"
                           name="file_path"
                           accept=".pdf,.jpg,.jpeg,.png,.webp"
                           class="block w-full text-sm text-slate-600 file:mr-4 file:rounded-xl file:border-0 file:bg-blue-700 file:px-5 file:py-3 file:text-sm file:font-bold file:text-white hover:file:bg-blue-800">

                    <p class="mt-3 text-sm text-slate-500 leading-6">
                        Format: PDF, JPG, JPEG, PNG, WEBP. Maksimal 20MB.
                        @if ($isEdit)
                            Kosongkan jika tidak ingin mengganti file lama.
                        @endif
                    </p>

                    @error('file_path')
                        <p class="mt-2 text-sm text-red-600 font-semibold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

            </div>

        </div>

    </div>

</div>


{{-- Sticky Save --}}
<div class="sticky bottom-5 z-30 mt-6">

    <div class="rounded-3xl bg-white/90 backdrop-blur-xl border border-slate-200 shadow-2xl px-5 py-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h3 class="font-black text-slate-900">
                {{ $isEdit ? 'Simpan perubahan akreditasi?' : 'Simpan data akreditasi?' }}
            </h3>

            <p class="text-sm text-slate-500 mt-1">
                Pastikan data, status tampil, dan file sertifikat sudah benar.
            </p>
        </div>

        <div class="flex flex-col sm:flex-row gap-3">

            <a href="{{ route('admin.accreditations.index') }}"
               class="inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition">
                Batal
            </a>

            <button type="submit"
                    class="inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                Simpan Akreditasi
            </button>

        </div>

    </div>

</div>


{{-- Upload Loading Overlay --}}
<div id="accreditationUploadOverlay"
     class="hidden fixed inset-0 z-[9999] bg-slate-950/80 backdrop-blur-sm items-center justify-center px-6">

    <div class="w-full max-w-md rounded-3xl bg-white p-8 text-center shadow-2xl">

        <div class="mx-auto w-16 h-16 rounded-full border-4 border-slate-200 border-t-blue-700 animate-spin"></div>

        <h2 class="mt-6 text-xl font-black text-slate-900">
            Mengupload File
        </h2>

        <p class="mt-3 text-slate-500 leading-7">
            Mohon tunggu sampai proses selesai. Jangan tutup halaman ini saat file sedang diupload.
        </p>

    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('accreditationForm');
        const fileInput = document.getElementById('accreditationFileInput');
        const overlay = document.getElementById('accreditationUploadOverlay');

        if (!form || !fileInput || !overlay) {
            return;
        }

        form.addEventListener('submit', function () {
            if (fileInput.files && fileInput.files.length > 0) {
                overlay.classList.remove('hidden');
                overlay.classList.add('flex');
            }
        });
    });
</script>