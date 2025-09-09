@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card shadow-lg w-50">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">➕ Create New Post</h4>
        </div>

        <div class="card-body bg-light">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter post title" required>
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label fw-bold">Content</label>
                    <textarea name="body" class="form-control" rows="5" placeholder="Write something..."></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Save Post</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

