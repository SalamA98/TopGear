@extends('layouts.app')
@section('title', 'Categories')

@section('content')
    <section class="section layout_padding">
        <div class="container my-5">
            <div class="full">
                <h1>Here's Your Categories !</h1>
                <div class="col">
                    <h3><a href="{{ route('admin.categories.create') }}" class="text-primary stretched-link">Add more!</a></h3>
                </div>
            </div>

            <div class="row">
                @forelse ($categories as $category)
                    <div class="col-md-4">
                        <div class="card cardhov my-2" style="width: 18rem;">
                            {{-- <a href="{{ route('admin.categories.edit', $category) }}">
                                <h1 class="card-title">{{ $category->name }}({{ count($category->cars) }})</h1>
                                {{-- $category->cars->count()  cars is not array its acollection :class that make array are more useful --}}
                            {{-- </a> --}}
                            <img class="card-img-top"
                                src="https://i0.wp.com/52.0.170.206/wp-content/uploads/2021/09/Types-of-Car.jpg?fit=1280%2C720"
                                alt="Card image cap">
                            <div class="card-body">
                                <h3 class="card-title">{{ $category->name }} ({{ $category->cars->count() }})</h3>
                                <p class="card-text">Capacity: {{ $category->capacity }}</p>
                                <a href="{{ route('admin.categories.show',$category) }}" class="text-primary stretched-link"> show Cars in Category</a>
                                <div class="row my-2">
                                    <div class="col">
                                        <a class="btn ma-2" href="{{ route('admin.categories.edit',$category) }}" style="background-color: #161C34; color:white;">Edit</a>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn" data-toggle="modal"
                                            data-target="#delete-modal" style="background-color: #F36B2A; color:white;">
                                            DELETE
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete-modal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">DELETE THIS CAR
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ARE YOU SURE YOU WANT TO DELETE THIS CAR!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <form action="{{ route('admin.categories.destroy', $category) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button style="background-color: #F36B2A; color:white;"
                                                                class="btn mb-2" type="submit" data-toggle="modal"
                                                                data-target="#exampleModal">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <p class="card-text"> capacity: {{ $category->capacity }}</p>
                            <h5><form action="{{ route('admin.categories.destroy', $category) }}" method="POST"> @csrf @method('DELETE') <button type="submit">Delete</button> </form></h5> --}}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        There is no category now! <a href="{{ route('categories.create') }}"> Please create one!</a>

                    </div>
                @endforelse

            </div>
        </div>
    </section>
@endsection
