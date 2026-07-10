@extends('layouts.admin')

@section('title', 'Tambah Akreditasi')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-blue-700 via-blue-800 to-slate-900 p-8 shadow-xl">

        <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-yellow-300/20 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-72 h-72 rounded-full bg-white/10 blur-3xl"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>
                <span class="inline-flex px-4 py-2 rounded-full bg-white/10 border border-white/20 text-white/90 text-xs font-bold uppercase tracking-widest">
                    Tambah Data
                </span>

                <h1 class="mt-5 text-3xl md:text-4xl font-black text-white">
                    Tambah Akreditasi
                </h1>

                <p class="mt-3 max-w-2xl text-white/75 leading-7">
                    Tambahkan data akreditasi nasional atau internasional yang akan tampil
                    di halaman Beranda dan Profile.
                </p>
            </div>

            <a href="{{ route('admin.accreditations.index') }}"
                class="inline-flex items-center justify-center px-6 py-4 rounded-2xl bg-yellow-400 text-slate-900 font-black hover:bg-yellow-300 transition shadow-lg shadow-yellow-400/20">
                Kembali
            </a>

        </div>

    </div>


    {{-- Error Summary --}}
    @if ($errors->any())
        <div class="rounded-2xl bg-red-50 border border-red-100 text-red-700 px-5 py-4">

            <h3 class="font-black">
                Ada data yang perlu diperbaiki.
            </h3>

            <ul class="mt-2 list-disc list-inside text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif


    {{-- Form --}}
    <form action="{{ route('admin.accreditations.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        @include('admin.accreditations._form')

    </form>

</div>

@endsection