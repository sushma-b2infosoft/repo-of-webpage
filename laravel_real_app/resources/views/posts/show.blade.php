@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->body }}</p>

    <hr>
    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>

    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this post?')">Delete</button>
    </form>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
