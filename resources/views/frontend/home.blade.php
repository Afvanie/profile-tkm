@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

@include('components.home.hero')
@include('components.home.statistics')
@include('components.home.about')


@endsection