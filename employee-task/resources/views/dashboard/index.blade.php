@extends('layouts.app')

@section('content')
<div class="card card-light p-3">
  <h4>Welcome, {{ auth()->user()->name }}</h4>
  <p>Overview</p>

  <div class="row">
    <div class="col-md-6">
      <h5>Today ({{ \Carbon\Carbon::now()->toDateString() }})</h5>
      @if($todayTasks->count())
        <ul class="list-group">
          @foreach($todayTasks as $t)
            <li class="list-group-item">
              <strong>{{ $t->title }}</strong> — {{ $t->project?->name ?? 'No Project' }} <br>
              {{ \Illuminate\Support\Str::limit($t->description, 80) }}
            </li>
          @endforeach
        </ul>
      @else
        <div class="text-muted">Koi task nahi hai aaj ke liye.</div>
      @endif
    </div>

    <div class="col-md-6">
      <h5>Add Task</h5>
      <a href="{{ route('tasks.create') }}" class="btn btn-outline-primary btn-sm mb-2">Add Task</a>

      <h6 class="mt-3">Your tasks</h6>
      @if($tasks->count())
        <ul class="list-group">
          @foreach($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div>
                <div><strong>{{ $task->title }}</strong></div>
                <div class="small text-muted">{{ $task->scheduled_at }}</div>
              </div>
              <div>
                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                <form method="POST" action="{{ route('tasks.destroy', $task) }}" style="display:inline">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
              </div>
            </li>
          @endforeach
        </ul>
      @else
        <div class="text-muted">No tasks yet.</div>
      @endif
    </div>
  </div>
</div>
@endsection
