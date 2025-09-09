@component('mail::message')
# Hello, {{ $user->name }}

Welcome to our website! We are happy to have you on board.

<img src="{{ asset('logo.png') }}" alt="Logo" style="width:100px; margin-top:10px;">

Thanks,<br>
{{ config('app.name') }}
@endcomponent
