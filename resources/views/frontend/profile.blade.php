@extends('layouts.app')

@section('title', 'Profile TOE')

@section('content')

@include('components.profile.hero')

@include('components.profile.overview')

@include('components.profile.history')

@include('components.profile.vision-mission')

@include('components.profile.ppm')

@include('components.profile.cpl')

@include('components.profile.accreditation')


@endsection