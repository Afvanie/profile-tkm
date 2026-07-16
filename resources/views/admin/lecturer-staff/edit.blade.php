@extends('layouts.admin')

@section('title', 'Edit Dosen & Staff')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="rounded-3xl bg-white border border-slate-200 shadow-sm p-6 md:p-8">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <div>
                <a href="{{ route('admin.lecturer-staff.index') }}"
                   class="inline-flex items-center text-sm font-bold text-blue-700 hover:text-blue-900 mb-4">
                    ← Kembali ke Data Dosen & Staff
                </a>

                <p class="text-sm font-extrabold tracking-[0.2em] uppercase text-blue-700">
                    Edit Data
                </p>

                <h1 class="mt-3 text-2xl md:text-3xl font-black text-slate-900">
                    Edit Dosen & Staff
                </h1>

                <p class="mt-3 max-w-3xl text-slate-500 leading-7">
                    Perbarui informasi dosen atau staff Program Studi D-III Teknik Mesin.
                </p>
            </div>

            <a href="{{ route('lecturers') }}"
               target="_blank"
               class="inline-flex items-center justify-center px-5 py-3 rounded-2xl bg-slate-100 text-slate-700 font-bold hover:bg-slate-200 transition">
                Lihat Website
            </a>

        </div>

    </div>


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


    <form id="lecturerStaffForm"
          action="{{ route('admin.lecturer-staff.update', $lecturerStaff) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('admin.lecturer-staff._form')

    </form>

</div>

@endsection