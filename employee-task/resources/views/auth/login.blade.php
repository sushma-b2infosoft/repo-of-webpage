@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-100">
  <div class="card p-4" style="width:420px">
    <h4 class="mb-3 text-center">Employee Login</h4>
    <form method="POST" action="{{ route('login.post') }}">
      @csrf
      <div class="mb-3">
        <label>Email</label>
        <input name="email" value="{{ old('email') }}" class="form-control">
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
      </div>
      <div class="d-grid">
        <button class="btn btn-primary">Login</button>
      </div>
      @if($errors->any())
        <div class="mt-3 text-danger">{{ $errors->first() }}</div>
      @endif
    </form>
  </div>
</div>
@endsection
