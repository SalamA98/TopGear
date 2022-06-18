@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <form action="">
                    <input type="hidden" name="q" value="{{ request()->q }}">
                    <select name="category" >
                        <option value="">All</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == request()->category ?'selected' : '' }}>{{ $category->name }} ({{ $category->cars->count() }})</option>
                        @endforeach
                    </select>
                    <button type="submit">filter</button>
                </form>
            </div>
        </div>

        <div class="row ">
            @foreach ($cars as $car)
                <div class="card cardhov my-2" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $car->featured_image }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->brand }} - {{ $car->model }}</h5>
                        <a href="{{ route('cars.show', $car) }}" class="text-primary stretched-link"> show more
                            info
                        </a>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            {{ $cars->links() }}
        </div>
    </div>
@endsection

@push('css')
    <style>
        .card:hover {
            border-radius: 0.75rem;
            border-color: #161C34;
            transition-delay: 0.1s
        }

        h1 {
            color: #161C34;
        }

    </style>
@endpush
