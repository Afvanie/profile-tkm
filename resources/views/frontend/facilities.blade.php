@extends('layouts.app')

@section('title','Fasilitas')

@section('content')

@include('components.facilities.hero')

@include('components.facilities.categories')

@include('components.facilities.competency')

@include('components.facilities.floor-plan')

@include('components.facilities.gallery')

@endsection