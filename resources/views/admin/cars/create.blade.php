@extends('layouts.app');

@section('title', 'Add a new car')


@push('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: 'Hello Bootstrap 4',
                tabsize: 2,
                height: 100
            });
        });
    </script>
@endpush
@section('content') <section class="section py-10 layout_padding">
    <div class="container">
        <form action="{{ route('admin.cars.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand"
                    placeholder="A4" value={{ old('brand') }}>
                @error('brand')
                    <div class="invalid feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model"
                    placeholder="Audi" value={{ old('model') }}>
                @error('model')
                    <div class="invalid feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Car category</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                            ({{ $category->capacity }})
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">price</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">SYP</span>
                    </div>
                    <input name="price" id="price" type="number" min="10000000" step="500000"
                        class="form-control @error('price') is-invalid @enderror" value={{ old('price', 2500000) }}>
                    @error('price')
                        <div class="invalid feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="">Car Colors</label>
                <select name="colors" class="form-control @error('colors') is-invalid @enderror" id="inputGroupSelect01"
                    multiple>
                    <option value="1" selected>black</option>
                    <option value="2">white</option>
                    <option value="3">grey</option>
                </select>
                @error('colors')
                    <div class="invalid feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Gear Type</label>
                <select name="gear_type" class="form-control @error('gear_type') is-invalid @enderror"
                    id="inputGroupSelect01">
                    <option value="auto">automatic</option>
                    <option value="manual">manual</option>
                </select>
                @error('gear_type')
                    <div class="invalid feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check">
                <input name="is_new" type="checkbox" class="form-check-input @error('is_new') is-invalid @enderror"
                    id="is_new" value="1">
                <label class="form-check-label" for="is_new">This is a new car?</label>
                @error('is_new')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <div class="input-group mb-3">
                    <input name="year" id="year" type="number" min="1890"
                        class="form-control @error('year') is-invalid @enderror" value={{ old('year') }}>
                    @error('year')
                        <div class="invalid feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="country">country</label>
                <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country"
                    placeholder="Germany" value={{ old('country') }}>
                @error('country')
                    <div class="invalid feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="5" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
    </section>
@endsection
