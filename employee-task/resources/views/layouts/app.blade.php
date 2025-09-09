<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Employee Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CDN (no npm) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f7f9fc; }
    .sidebar { min-height: 100vh; background: #fff; border-right:1px solid #eee; }
    .card-light { background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ route('dashboard') }}">My Company</a>
    <div class="ms-auto">
      @auth
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-outline-secondary btn-sm">Logout</button>
      </form>
      @endauth
    </div>
  </div>
</nav>

<div class="container-fluid mt-4">
  <div class="row">
    @auth
    <div class="col-md-3 sidebar p-3">
      <h5>Menu</h5>
      <ul class="nav flex-column">
        <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>
        <li class="nav-item"><a href="{{ route('projects.index') }}" class="nav-link">Projects</a></li>
        <li class="nav-item"><a href="{{ route('tasks.index') }}" class="nav-link">Tasks</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Employees</a></li>
      </ul>

      <div class="mt-4">
        <div class="card p-3">
          <div>Total Employees: <strong>{{ $total ?? '--' }}</strong></div>
          <div>Active: <strong>{{ $active ?? '--' }}</strong></div>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      @yield('content')
    </div>
    @endauth

    @guest
      <div class="col-md-12">
        @yield('content')
      </div>
    @endguest
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
