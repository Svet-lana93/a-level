<!DOCTYPE html>
<html>
    <head>
        <title>{{ $title }}</title>
        <style>
            .italic {
                font-style: italic;
            }
            .bold {
                font-weight: bold;
            }
            .color-red {
                color: red;
            }
        </style>
    </head>
    <body>
        <div>{{ $menu }}</div>

        <h1>{{ $title }}</h1>

        {{ $slot }}

        <div>
            @auth
                <a href="{{ route('logout') }}">Logout</a>
            @else
                <a href="{{ route('login-page') }}">Login</a>
            @endauth
        </div>
    </body>
</html>
