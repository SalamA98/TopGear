@extends('layouts.app')

@section('title', 'Category' . '-' . $category->name)

@section('content')
    <div class="container my-5">
        <div  class="card my-2 shadow bg-white rounded">
            <div class="card-body">
                <h1 class="card-title"> {{'Category '.$category->id}}</h1>
            </div>
        </div>
        <div class="card mb-3">
            {{-- <img src="{{ $car->featured_image }}"
                class="card-img-top" alt="...">
            @foreach ($car->getMedia() as $media)
                {{ $media }}
            @endforeach --}}
            <div class="card-body">
                <h1 class="card-title text-primary"> Basic Info </h1>
                <p class="card-text">
                <h4>name:</h4> {{ $category->name }} <br>
                <h4>COLOR:</h4> capacity:{{ $category->capacity }}<br>
                 {{-- reduce(function ($carry, $color) {return $carry . $color->name . ', ';}) }} <br> --}}

                </p>
            </div>
        </div>
    </div>

@endsection
