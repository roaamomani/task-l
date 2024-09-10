@extends('layout.master')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="title-1">Edit Product</h2>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Insert product name" value="{{ old('name', $product->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="{{ old('description', $product->description) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Product Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Price" step="0.01" value="{{ old('price', $product->price) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-gradient-primary me-2">Update Product</button>
                    <a href="{{ route('products.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
