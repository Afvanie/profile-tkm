<section class="relative py-24 overflow-hidden bg-gradient-to-br from-slate-50 via-white to-blue-50">

    {{-- Background Decoration --}}
    <div class="absolute inset-0 -z-10">

        <div class="absolute -top-40 -left-40 w-[520px] h-[520px] rounded-full bg-blue-200/30 blur-[140px]"></div>

        <div class="absolute bottom-0 -right-40 w-[520px] h-[520px] rounded-full bg-yellow-200/30 blur-[140px]"></div>

        <div
            class="absolute inset-0 opacity-[0.03]"
            style="background-image: linear-gradient(#0f172a 1px, transparent 1px),
            linear-gradient(to right,#0f172a 1px,transparent 1px);
            background-size:70px 70px;">
        </div>

    </div>

    <div class="max-w-7xl mx-auto px-6">

        {{-- Heading --}}
        <div class="text-center max-w-3xl mx-auto mb-12" data-aos="fade-up">

            <span class="uppercase tracking-[5px] text-blue-700 font-semibold">
                Dokumen Akademik
            </span>

            <h2 class="mt-4 text-4xl md:text-5xl font-bold text-slate-800 leading-tight">
                {{ $page['title'] }}
            </h2>

            <div class="w-24 h-1 bg-yellow-400 rounded-full mx-auto mt-6"></div>

            <p class="mt-7 text-slate-600 leading-8">
                {{ $page['subtitle'] }}
            </p>

        </div>

        {{-- Shortcut antar menu akademik --}}
        <div class="mb-12 rounded-3xl bg-white border border-slate-100 shadow-lg p-5" data-aos="fade-up">

            <div class="flex flex-wrap justify-center gap-3">

                @foreach ($pages as $pageSlug => $item)

                    <a href="{{ route('academic.page', $pageSlug) }}"
                       class="px-5 py-3 rounded-xl font-semibold transition
                       {{ $slug === $pageSlug
                            ? 'bg-blue-700 text-white'
                            : 'bg-slate-100 text-slate-700 hover:bg-blue-50 hover:text-blue-700' }}">

                        {{ $item['title'] }}

                    </a>

                @endforeach

            </div>

        </div>

        {{-- Documents --}}
        @if ($documents->count() > 0)

            <div class="space-y-10">

                @foreach ($documents as $document)

                    @php
                        $fileUrl = $document->file_path ? asset('storage/' . $document->file_path) : null;
                        $extension = $document->file_path ? strtolower(pathinfo($document->file_path, PATHINFO_EXTENSION)) : null;
                    @endphp

                    <div
                        data-aos="fade-up"
                        data-aos-delay="{{ $loop->index * 70 }}"
                        class="overflow-hidden rounded-3xl bg-white border border-slate-100 shadow-xl">

                        {{-- Header --}}
                        <div class="p-7 md:p-8 border-b border-slate-100">

                            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6">

                                <div>

                                    <span class="inline-block px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 text-sm font-semibold">
                                        {{ $document->category_label }}
                                    </span>

                                    <h3 class="mt-5 text-3xl font-bold text-slate-800 leading-snug">
                                        {{ $document->title }}
                                    </h3>

                                    @if ($document->academic_year)

                                        <p class="mt-3 text-sm font-semibold text-blue-700">
                                            Tahun Akademik {{ $document->academic_year }}
                                        </p>

                                    @endif

                                    @if ($document->description)

                                        <p class="mt-5 text-slate-600 leading-8 text-justify">
                                            {{ $document->description }}
                                        </p>

                                    @endif

                                </div>

                                <div class="flex flex-wrap gap-3 lg:justify-end">

                                    @if ($fileUrl)

                                        <a href="{{ $fileUrl }}"
                                           target="_blank"
                                           class="inline-flex items-center justify-center px-5 py-3 rounded-xl bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
                                            Buka File
                                        </a>

                                    @endif

                                    @if ($document->external_link)

                                        <a href="{{ $document->external_link }}"
                                           target="_blank"
                                           class="inline-flex items-center justify-center px-5 py-3 rounded-xl bg-yellow-400 text-slate-900 font-semibold hover:bg-yellow-500 transition">
                                            Buka Link
                                        </a>

                                    @endif

                                </div>

                            </div>

                        </div>

                        {{-- File Preview --}}
                        <div class="bg-slate-100 p-4 md:p-6">

                            @if ($fileUrl && $extension === 'pdf')

                                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-lg">

                                    <iframe
                                        src="{{ $fileUrl }}#toolbar=1&navpanes=0&scrollbar=1"
                                        class="w-full h-[780px]"
                                        title="{{ $document->title }}">
                                    </iframe>

                                </div>

                            @elseif ($fileUrl && in_array($extension, ['jpg', 'jpeg', 'png', 'webp']))

                                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-lg">

                                    <img
                                        src="{{ $fileUrl }}"
                                        alt="{{ $document->title }}"
                                        class="w-full h-auto">

                                </div>

                            @elseif ($document->external_link)

                                <div class="rounded-2xl bg-white border border-slate-200 p-10 text-center">

                                    <h4 class="text-2xl font-bold text-slate-800">
                                        Dokumen tersedia melalui link eksternal
                                    </h4>

                                    <p class="mt-3 text-slate-500">
                                        Klik tombol “Buka Link” untuk melihat dokumen.
                                    </p>

                                </div>

                            @else

                                <div class="rounded-2xl bg-white border border-slate-200 p-10 text-center">

                                    <h4 class="text-2xl font-bold text-slate-800">
                                        Dokumen belum tersedia
                                    </h4>

                                    <p class="mt-3 text-slate-500">
                                        File belum diunggah melalui halaman admin.
                                    </p>

                                </div>

                            @endif

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div data-aos="fade-up" class="rounded-3xl bg-white border border-slate-100 p-12 text-center shadow-lg">

                <h3 class="text-2xl font-bold text-slate-800">
                    Dokumen belum tersedia
                </h3>

                <p class="mt-3 text-slate-500">
                    Data {{ strtolower($page['title']) }} belum ditambahkan melalui halaman admin.
                </p>

            </div>

        @endif

    </div>

</section>