@extends('layouts.admin')

@section('title', 'Edit Akreditasi')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-yellow-400 via-yellow-500 to-blue-800 p-8 shadow-xl">

        <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-white/20 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-72 h-72 rounded-full bg-blue-900/30 blur-3xl"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>
                <span class="inline-flex px-4 py-2 rounded-full bg-white/20 border border-white/30 text-white text-xs font-bold uppercase tracking-widest">
                    Edit Data
                </span>

                <h1 class="mt-5 text-3xl md:text-4xl font-black text-white">
                    Edit Akreditasi
                </h1>

                <p class="mt-3 max-w-2xl text-white/90 leading-7">
                    Perbarui informasi akreditasi, masa berlaku, peringkat, lembaga,
                    nomor sertifikat, serta file sertifikat yang tampil di website.
                </p>
            </div>

            <a href="{{ route('admin.accreditations.index') }}"
                class="inline-flex items-center justify-center px-6 py-4 rounded-2xl bg-white text-slate-800 font-black hover:bg-slate-100 transition shadow-lg">
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
    <form action="{{ route('admin.accreditations.update', $accreditation) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('admin.accreditations._form')

    </form>

</div>

@endsection