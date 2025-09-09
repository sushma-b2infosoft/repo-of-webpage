@extends('layouts.app')
@section('content')
<h1>Products</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td><a href="{{ route('products.show',$product->id) }}">{{ $product->name }}</a></td>
        <td>{{ $product->category->name }}</td>
        <td>{{ $product->price }}</td>
        <td>
            <a href="{{ route('products.edit',$product->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
