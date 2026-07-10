@extends('layouts.admin')

@section('title', 'Tambah Akreditasi')

@section('content')

<div class="space-y-8">

    <div>
        <h1 class="text-3xl font-black text-slate-800">
            Tambah Akreditasi
        </h1>

        <p class="mt-2 text-slate-500">
            Tambahkan data akreditasi nasional atau internasional program studi.
        </p>
    </div>

    <form action="{{ route('admin.accreditations.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        @include('admin.accreditations._form')

    </form>

</div>

@endsection