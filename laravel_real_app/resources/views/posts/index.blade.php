@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card shadow-lg w-75">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">📌 Posts</h3>
            <a href="{{ route('posts.create') }}" class="btn btn-light btn-sm">+ Create Post</a>
        </div>

        <div class="card-body">
            @foreach($posts as $post)
                <div class="mb-4 p-3 border rounded bg-light">
                    <h5 class="fw-bold">
                        <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none">
                            {{ $post->title }}
                        </a>
                    </h5>
                    <p class="text-muted mb-1">By {{ $post->user->name ?? 'Unknown' }}</p>
                    <small class="text-secondary">{{ $post->created_at->diffForHumans() }}</small>
                </div>
            @endforeach

            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

