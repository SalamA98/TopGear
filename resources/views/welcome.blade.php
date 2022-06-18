@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @include('sections.home')
    @include('sections.about')
    @include('sections.our_cars')
    @include('sections.why_choose_us')
    @include('sections.testimontials')
    @include('sections.contact')
@endsection
