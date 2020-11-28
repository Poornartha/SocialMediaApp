<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyAlley</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100">
    <nav class="p-6 bg-white flex justify-between">
        <ul class="flex items-center">
            <li>
                <a href="{{ route('home') }}" class="p-3">Home</a>
            </li>
            @auth
                <li>
                    <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
                </li>
            @endauth
            <li>
                <a href="{{ route('posts') }}" class="p-3">Posts</a>
            </li>
        </ul>
        <ul class="flex items-center">
            @if (auth()->user())
                <li>
                    <a href="" class="p-3">{{ auth()->user()->username }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>                
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>
            @endif
        </ul>
    </nav>
    @yield('content')
</body>
</html>