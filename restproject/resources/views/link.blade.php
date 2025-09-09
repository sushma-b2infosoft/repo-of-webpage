<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Links Example</title>

    {{-- Load CSS using asset() --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <h1>Laravel Helpers Demo</h1>

    {{-- Link using url() --}}
    <p>
        <a href="{{ url('/about') }}">Go to About Page (using url())</a>
    </p>

    {{-- Link using route() --}}
    <p>
        <a href="{{ route('about') }}">Go to About Page (using route())</a>
    </p>

    {{-- Form with csrf_field() --}}
    <form method="POST" action="{{ url('/submit') }}">
        {{ csrf_field() }}

        <label for="name">Your Name:</label>
        <input type="text" name="name" id="name">

        <button type="submit">Submit</button>
    </form>

</body>
</html>
