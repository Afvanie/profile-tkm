@extends('layouts.app')

@section('title', 'Profil D-III Teknik Mesin')

@section('content')

@include('components.profile.hero')

@include('components.profile.quick-nav')

<div id="profil-singkat" class="scroll-mt-32">
    @include('components.profile.overview')
</div>

<div id="perjalanan-prodi" class="scroll-mt-32">
    @include('components.profile.history')
</div>

<div id="visi-misi" class="scroll-mt-32">
    @include('components.profile.vision-mission', [
        'section' => $profileSections['vision-mission'] ?? null
    ])
</div>

<div id="tujuan-prodi" class="scroll-mt-32">
    @include('components.profile.tujuan-prodi', [
        'section' => $profileSections['goals'] ?? null
    ])
</div>

<div id="ppm" class="scroll-mt-32">
    @include('components.profile.ppm', [
        'section' => $profileSections['ppm'] ?? null
    ])
</div>

<div id="cpl" class="scroll-mt-32">
    @include('components.profile.cpl', [
        'section' => $profileSections['cpl'] ?? null
    ])
</div>

<div id="akreditasi" class="scroll-mt-32">
    @include('components.profile.accreditation')
</div>

@endsection