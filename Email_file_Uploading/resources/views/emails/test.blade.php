<!DOCTYPE html>
<html>
<head>
    <title>Test Email</title>
</head>
<body>
    <h1>Hello {{ $user->name }}</h1>
    <p>This is a test email from Laravel.</p>
    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width:150px;">
</body>
</html>
