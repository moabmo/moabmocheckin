<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Checkin App</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* Your custom styles here */
        body {
            font-family: Figtree, sans-serif;
            background-color: #f0f5f9;
            color: #37405f;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0.5%;
            text-align: center;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 2rem;
            color: #0d9488;
        }

        p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }

        a {
            color: white;
            text-decoration: none;
            background-color: red;
            padding: 1.5%;
            font-size: 200%;
            margin: 2%; 
            border-radius: 10px;
        }

        footer {
            background-color: red;
            color: #fff;
            font-weight: bolder;
            border-radius: 10px;
            padding: 0.5%;
            margin-top: auto;
            margin-bottom: 0;
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
        }

        footer a {
            color: green;
            text-decoration: none;
            background color: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Checkin App!</h1>
        <p>
            This app allows you to easily check in and manage the trainees
        </p>
        <br><br><br><br>
        @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Home</a>>
                    @else
                        <a href="{{ route('login') }}" >Capturer Login</a>  

                        <a href="{{ url('admin/login') }}" >Admin Login</a>
                    @endauth
            @endif 
    </div>
    <br>

    <footer>
        <div class="container">
            &copy; 2023 Checkin App. All rights reserved. <br>
                Terms of Service |
                Privacy Policy
        </div>
    </footer>
</body>
</html>
