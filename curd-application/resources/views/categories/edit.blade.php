@extends('layouts.app')
@section('content')
<h1>Edit Category</h1>
@if($errors->any())
<div class="alert alert-danger">
    <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
</div>
@endif
<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
