<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        /* Page ko center karne ke liye */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        /* Form container */
        .form-container {
            background-color: #FFDB58; /* Mustard */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            width: 350px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Input fields */
        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        /* Submit button */
        .form-container button {
            width: 100%;
            padding: 12px;
            background-color: #007BFF; /* Blue */
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        /* Success message */
        .success {
            text-align: center;
            color: green;
            margin-bottom: 10px;
        }
    
        .error { color: red; font-size: 14px; margin-bottom: 5px; }
        .success { color: green; margin-bottom: 10px; }
        .form-container {
            width: 350px; margin: 50px auto;
            background: #FFDB58; padding: 25px;
            border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        input, button { width: 100%; padding: 10px; margin: 8px 0; }
        button { background: blue; color: white; border: none; border-radius: 6px; }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>Register</h1>

        {{-- Success message --}}
        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif
        {{-- Error Messages --}}
    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form method="POST" action="{{ route('register.submit') }}">
            @csrf
            <label for="name" class="form-label">Name</label>
                <input type="text"
                       name="name"
                       id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            <!-- <input type="text" name="name" placeholder="Enter your name" required> -->
            <!-- <input type="email" name="email" placeholder="Enter your email" required>
              -->
            <label for="email" class="form-label">Email</label>
                <input type="email"
                       name="email"
                       id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            <!-- <input type="password" name="password" placeholder="Enter password" required> -->
             <label for="password" class="form-label">Password</label>
                <input type="password"
                       name="password"
                       id="password"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            <!-- <input type="password" name="password_confirmation" placeholder="Confirm password" required> -->
               <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password"
                       name="password_confirmation"
                       id="password_confirmation"
                       class="form-control">

            <button type="submit">Register</button>
        </form>
    </div>

</body>
</html>
