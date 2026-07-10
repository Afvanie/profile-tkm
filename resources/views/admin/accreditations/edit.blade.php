@extends('layouts.admin')

@section('title', 'Edit Akreditasi')

@section('content')

<div class="space-y-8">

    <div>
        <h1 class="text-3xl font-black text-slate-800">
            Edit Akreditasi
        </h1>

        <p class="mt-2 text-slate-500">
            Perbarui data akreditasi nasional atau internasional program studi.
        </p>
    </div>

    <form action="{{ route('admin.accreditations.update', $accreditation) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('admin.accreditations._form')

    </form>

</div>

@endsection