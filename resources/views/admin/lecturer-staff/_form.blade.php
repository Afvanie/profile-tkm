@php
    $isEdit = isset($lecturerStaff);

    $currentPhotoUrl = $isEdit && !empty($lecturerStaff->photo)
        ? asset('storage/' . $lecturerStaff->photo)
        : null;

    $currentType = old('type', $lecturerStaff->type ?? 'dosen');
@endphp

<div class="grid xl:grid-cols-12 gap-6">

    {{-- Photo --}}
    <div class="xl:col-span-4">

        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100">
                <h2 class="text-xl font-black text-slate-900">
                    Foto Profil
                </h2>

                <p class="mt-1 text-sm text-slate-500 leading-6">
                    Upload foto dosen atau staff. Format disarankan JPG, PNG, atau WEBP.
                </p>
            </div>

            <div class="p-6 space-y-5">

                <div class="relative w-full aspect-[4/5] rounded-3xl bg-slate-50 border border-dashed border-slate-300 overflow-hidden flex items-center justify-center">

                    <img id="photoPreview"
                         src="{{ $currentPhotoUrl ?? '' }}"
                         alt="Preview Foto"
                         class="{{ $currentPhotoUrl ? '' : 'hidden' }} w-full h-full object-cover">

                    <div id="photoPlaceholder"
                         class="{{ $currentPhotoUrl ? 'hidden' : '' }} text-center px-6">

                        <div class="w-16 h-16 mx-auto rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center border border-blue-100">

                            @if ($isEdit)
                                <span class="text-2xl font-black">
                                    {{ strtoupper(substr($lecturerStaff->name, 0, 1)) }}
                                </span>
                            @else
                                <span class="text-2xl font-black">
                                    +
                                </span>
                            @endif

                        </div>

                        <p class="mt-4 text-sm font-black text-slate-900">
                            Belum ada foto
                        </p>

                        <p class="mt-1 text-xs text-slate-500">
                            Preview akan tampil di sini
                        </p>

                    </div>

                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        {{ $isEdit ? 'Ganti Foto' : 'Upload Foto' }}
                    </label>

                    <input type="file"
                           name="photo"
                           id="photoInput"
                           accept="image/jpeg,image/png,image/webp"
                           class="block w-full text-sm text-slate-600 file:mr-4 file:rounded-xl file:border-0 file:bg-blue-700 file:px-5 file:py-3 file:text-sm file:font-bold file:text-white hover:file:bg-blue-800">

                    <p class="mt-3 text-sm text-slate-500 leading-6">
                        Maksimal 5MB.
                        @if ($isEdit)
                            Kosongkan jika tidak ingin mengganti foto lama.
                        @endif
                    </p>

                    @error('photo')
                        <p class="mt-2 text-sm text-red-600 font-semibold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

            </div>

        </div>

    </div>


    {{-- Main Data --}}
    <div class="xl:col-span-8">

        <div class="rounded-3xl bg-white border border-slate-200 shadow-sm overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100">
                <h2 class="text-xl font-black text-slate-900">
                    Informasi Data
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Lengkapi informasi utama yang akan ditampilkan pada website.
                </p>
            </div>

            <div class="p-6 space-y-6">

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Nama Lengkap
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ old('name', $lecturerStaff->name ?? '') }}"
                           placeholder="Contoh: Dr. Nama Dosen, S.T., M.T."
                           class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500"
                           required>

                    @error('name')
                        <p class="mt-2 text-sm text-red-600 font-semibold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        NIP
                    </label>

                    <input type="text"
                           name="nip"
                           value="{{ old('nip', $lecturerStaff->nip ?? '') }}"
                           placeholder="Contoh: 198xxxxxxxxxxxxx"
                           class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500">

                    @error('nip')
                        <p class="mt-2 text-sm text-red-600 font-semibold">
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-3">
                        Kategori
                    </label>

                    <div class="grid sm:grid-cols-2 gap-4">

                        <label class="cursor-pointer">
                            <input type="radio"
                                   name="type"
                                   value="dosen"
                                   class="peer sr-only"
                                   @checked($currentType === 'dosen')>

                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 peer-checked:bg-blue-700 peer-checked:text-white peer-checked:border-blue-700 transition">
                                <h3 class="font-black">
                                    Dosen
                                </h3>

                                <p class="mt-1 text-sm opacity-75">
                                    Tenaga pendidik program studi
                                </p>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="radio"
                                   name="type"
                                   value="staff"
                                   class="peer sr-only"
                                   @checked($currentType === 'staff')>

                            <div class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 peer-checked:bg-amber-400 peer-checked:text-slate-900 peer-checked:border-amber-400 transition">
                                <h3 class="font-black">
                                    Staff
                                </h3>

                                <p class="mt-1 text-sm opacity-75">
                                    Tenaga kependidikan / administrasi
                                </p>
                            </div>
                        </label>

                    </div>

                    @error('type')
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
                {{ $isEdit ? 'Simpan perubahan data?' : 'Simpan data baru?' }}
            </h3>

            <p class="text-sm text-slate-500 mt-1">
                Pastikan nama, NIP, kategori, dan foto sudah benar.
            </p>
        </div>

        <div class="flex flex-col sm:flex-row gap-3">

            <a href="{{ route('admin.lecturer-staff.index') }}"
               class="inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition">
                Batal
            </a>

            <button type="submit"
                    class="inline-flex items-center justify-center px-6 py-3 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                {{ $isEdit ? 'Simpan Perubahan' : 'Simpan Data' }}
            </button>

        </div>

    </div>

</div>


{{-- Upload Loading Overlay --}}
<div id="lecturerUploadOverlay"
     class="hidden fixed inset-0 z-[9999] bg-slate-950/80 backdrop-blur-sm items-center justify-center px-6">

    <div class="w-full max-w-md rounded-3xl bg-white p-8 text-center shadow-2xl">

        <div class="mx-auto w-16 h-16 rounded-full border-4 border-slate-200 border-t-blue-700 animate-spin"></div>

        <h2 class="mt-6 text-xl font-black text-slate-900">
            Menyimpan Data
        </h2>

        <p class="mt-3 text-slate-500 leading-7">
            Mohon tunggu sampai proses selesai. Jangan tutup halaman ini saat data sedang disimpan.
        </p>

    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('lecturerStaffForm');
        const photoInput = document.getElementById('photoInput');
        const photoPreview = document.getElementById('photoPreview');
        const photoPlaceholder = document.getElementById('photoPlaceholder');
        const overlay = document.getElementById('lecturerUploadOverlay');

        if (photoInput && photoPreview && photoPlaceholder) {
            photoInput.addEventListener('change', function () {
                const file = this.files[0];

                if (!file) {
                    return;
                }

                const reader = new FileReader();

                reader.onload = function (event) {
                    photoPreview.src = event.target.result;
                    photoPreview.classList.remove('hidden');
                    photoPlaceholder.classList.add('hidden');
                };

                reader.readAsDataURL(file);
            });
        }

        if (form && overlay) {
            form.addEventListener('submit', function () {
                if (photoInput && photoInput.files && photoInput.files.length > 0) {
                    overlay.classList.remove('hidden');
                    overlay.classList.add('flex');
                }
            });
        }
    });
</script>