<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8; /* Light background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-box {
            background: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0px 6px 20px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }
        .register-box h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .register-box input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
        }
        .register-box input:focus {
            border-color: #5aa9e6;
            box-shadow: 0 0 5px rgba(90,169,230,0.5);
        }
        .register-box button {
            width: 100%;
            padding: 12px;
            background: #5aa9e6;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        .register-box button:hover {
            background: #3d8dc9;
        }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>User Register</h2>
        <form method="POST" action="/register">
            @csrf
            <input type="text" name="name" placeholder="Enter Name" required>
            <input type="email" name="email" placeholder="Enter Email" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>

