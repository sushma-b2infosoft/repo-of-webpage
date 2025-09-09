@extends('layouts.app')
@section('content')
<h1>Categories</h1>
<a href="{{ route('categories.create') }}" class="btn btn-success mb-3">Add Category</a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    @foreach($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>
        <td>
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
