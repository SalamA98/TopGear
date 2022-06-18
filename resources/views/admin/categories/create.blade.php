
@extends('layouts.app');

@section('title', 'Add a new category')

@section('content')
    <section class="section py-10 layout_padding">
        <div class="container">
            <form action="{{ route('admin.categories.store') }}"  method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        placeholder="A4"  value={{ old('name') }} >
                    @error('name')
                        <div class="invalid feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="capacity">capacity</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">person</span>
                        </div>
                        <input name="capacity" id="capacity" type="number" min="2"
                            class="form-control @error('capacity') is-invalid @enderror" value={{ old('capacity') }}>
                        @error('capacity')
                            <div class="invalid feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </section>
@endsection
