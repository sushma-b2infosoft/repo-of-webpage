@extends('layouts.app')

@section('content')
<div class="card p-3">
  <h5>Add Task</h5>
  <form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    <div class="mb-3">
      <label>Title</label>
      <input name="title" class="form-control" value="{{ old('title') }}" required>
    </div>
    <div class="mb-3">
      <label>Project (optional)</label>
      <select name="project_id" class="form-control">
        <option value="">-- None --</option>
        @foreach($projects as $p)
          <option value="{{ $p->id }}">{{ $p->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label>Scheduled (date & time)</label>
      <input type="datetime-local" name="scheduled_at" class="form-control" value="{{ old('scheduled_at') }}">
    </div>
    <div class="mb-3">
      <label>Description</label>
      <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>
    <div>
      <button class="btn btn-primary">Save</button>
      <a href="{{ route('dashboard') }}" class="btn btn-link">Cancel</a>
    </div>
  </form>
</div>
@endsection
