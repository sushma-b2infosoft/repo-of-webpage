@extends('layouts.app')
@section('content')
<h1>Category Details</h1>
<ul class="list-group">
    <li class="list-group-item"><strong>ID:</strong> {{ $category->id }}</li>
    <li class="list-group-item"><strong>Name:</strong> {{ $category->name }}</li>
</ul>
<a href="{{ route('categories.index') }}" class="btn btn-primary mt-3">Back</a>
@endsection
