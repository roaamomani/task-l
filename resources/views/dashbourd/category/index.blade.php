@extends('layout.master')


@section('content')

    <div class="container">
        
       

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="title-1">Categories</h2>
            <a href="{{ route('dash.create') }}">
                <button type="button" class="btn btn-primary">
                    <i class="zmdi zmdi-plus"></i> Add New Category
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
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <a href="{{ route('dash.edit', $category->id) }}">
                                        <button type="button" class="btn btn-secondary">Edit</button>
                                    </a>
                                    <form action="{{ route('dash.destroy', $category->id) }}" method="POST" style="display: inline;">
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
