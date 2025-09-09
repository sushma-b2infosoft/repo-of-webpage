<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>
    <h2>User Details</h2>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

    <h3>Profile Details</h3>
    <p><strong>Phone:</strong> {{ $user->profile->phone ?? 'Not Added' }}</p>
    <p><strong>Address:</strong> {{ $user->profile->address ?? 'Not Added' }}</p>
</body>
</html>
