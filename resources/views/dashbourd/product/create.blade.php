@extends('layout.master')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="title-1">Products</h2>
        <a href="{{ route('products.create') }}">
            <button type="button" class="btn btn-primary">
                <i class="zmdi zmdi-plus"></i> Add New Product
            </button>
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-bordered bg-white">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>${{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}">
                                        <button type="button" class="btn btn-secondary">Edit</button>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
