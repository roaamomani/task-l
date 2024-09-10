
@extends('layout.master')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="title-1">Add New Product</h2>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Insert product name" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" required>
                    </div>

                    <div class="form-group">
                        <label for="price">Product Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Price" step="0.01" required>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-gradient-primary me-2">Submit New Product</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
