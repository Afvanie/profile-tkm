<section class="relative -mt-12 z-20">
    <div class="max-w-7xl mx-auto px-6">

        <form action="{{ url('/lecturers') }}" method="GET"
            class="bg-white rounded-3xl border border-slate-100 shadow-xl p-5 md:p-6">

            <div class="grid lg:grid-cols-12 gap-4 items-end">

                <div class="lg:col-span-6">
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Cari Nama
                    </label>

                    <input type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Masukkan nama dosen atau staff..."
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="lg:col-span-3">
                    <label class="block text-sm font-bold text-slate-700 mb-2">
                        Filter Kategori
                    </label>

                    <select name="type"
                        class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 focus:bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                        <option value="all" {{ request('type', 'all') === 'all' ? 'selected' : '' }}>
                            Semua
                        </option>

                        <option value="dosen" {{ request('type') === 'dosen' ? 'selected' : '' }}>
                            Dosen
                        </option>

                        <option value="staff" {{ request('type') === 'staff' ? 'selected' : '' }}>
                            Staff
                        </option>

                    </select>
                </div>

                <div class="lg:col-span-3 flex gap-3">
                    <button type="submit"
                        class="flex-1 inline-flex items-center justify-center px-5 py-4 rounded-2xl bg-blue-700 text-white font-bold hover:bg-blue-800 transition">
                        Cari
                    </button>

                    <a href="{{ url('/lecturers') }}"
                        class="inline-flex items-center justify-center px-5 py-4 rounded-2xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition">
                        Reset
                    </a>
                </div>

            </div>

        </form>

    </div>
</section>