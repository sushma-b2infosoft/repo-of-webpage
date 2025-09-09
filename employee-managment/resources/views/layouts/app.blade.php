<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }
        .topbar {
            height: 60px;
            background-color: #0d6efd;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 10;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .sidebar {
            width: 220px;
            background: #f8f9fa;
            position: fixed;
            top: 60px;
            left: 0;
            bottom: 0;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* 👈 logout button bottom me jayega */
        }
        .sidebar-links {
            flex-grow: 1;
        }
        .sidebar a, .sidebar form button {
            display: block;
            padding: 10px 20px;
            margin: 5px 10px;
            text-align: left;
            border: none;
            background: none;
            cursor: pointer;
            text-decoration: none;
            color: #333;
            width: 90%;
        }
        .sidebar a:hover, .sidebar form button:hover {
            background: #e2e6ea;
            border-radius: 5px;
        }
        .logout-btn {
        background: #dc3545 !important;
        widthcolor: #fff !important;
        border-radius: 8px;
        text-align: center;
        }

        .logout-btn:hover {
          background-color: #bb2d3b; 
          transform: scale(1.05); 
        }

        .content {
            margin-left: 220px;
            margin-top: 60px;
            margin-bottom: 50px; /* 👈 footer ke liye space */
            padding: 20px;
        }
        footer {
            height: 50px;
            background-color: #0d6efd;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            bottom: 0;
            left: 220px;
            right: 0;
             border-radius: 12px;
            box-shadow: 0 -2px 6px rgba(0,0,0,0.05);

        }
        .calendar {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>
    <!-- Top Navbar -->
    <div class="topbar">
        <div class="logo">
            <img src="{{ asset('images/EMPLOYEE.PNG') }}" alt="Logo" style="height:40px;">
        </div>
        <div class="title">Employee Management</div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-links">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('status.index') }}"class="block py-2 px-4 hover:bg-gray-200">Enter Status</a>
            <a href="{{ route('leaves.index') }}" class="block py-2 px-4 hover:bg-gray-200">
                    Leaves
                </a>
            <a href="{{ route('holidays.index') }}" class="block py-2 px-4 hover:bg-gray-200">Holiday</a>
        </div>
        <div class="flex justify-center">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"class="logout-btn">
                    Logout
                </button>
        </form>
        </div>
    </div>


    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        © {{ date('Y') }} Employee Management. All rights reserved.
    </footer>

    @stack('scripts')
</body>
</html>


            