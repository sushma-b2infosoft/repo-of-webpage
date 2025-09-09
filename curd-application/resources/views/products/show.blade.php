@extends('layouts.app')
@section('content')
<h1>Product Details</h1>
<ul class="list-group">
    <li class="list-group-item"><strong>ID:</strong> {{ $product->id }}</li>
    <li class="list-group-item"><strong>Name:</strong> {{ $product->name }}</li>
    <li class="list-group-item"><strong>Category:</strong> {{ $product->category->name }}</li>
    <li class="list-group-item"><strong>Price:</strong> {{ $product->price }}</li>
    <li class="list-group-item"><strong>Description:</strong> {{ $product->description }}</li>
</ul>
<a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Back</a>
@endsection
