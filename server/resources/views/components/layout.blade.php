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
        <div>
            @foreach($menu as $item)
                <a href="{{ route($item['route']) }}"
                   @if($item['active']) class="bold" @endif>
                    {{ $item['title'] }}
                </a>
            @endforeach
        </div>

        <h1>{{ $title }}</h1>
        <hr/>
        {{ $slot }}
        <hr/>
        <div>
            @auth
                <a href="{{ route('logout') }}">Logout</a>
            @else
                <a href="{{ route('login-page') }}">Login</a>
            @endauth
        </div>
    </body>
</html>
