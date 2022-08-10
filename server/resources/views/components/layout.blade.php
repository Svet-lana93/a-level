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
{{--            @foreach($menu as $item)--}}
{{--                <a href="{{ route($item['route']) }}"--}}
{{--                   @if($item['active']) class="bold" @endif>--}}
{{--                    {{ $item['title'] }}--}}
{{--                </a>--}}
{{--            @endforeach--}}
            <a href="{{ route('mainPage') }}" @if($route == 'mainPage') class="bold" @endif>Main page</a>
            <a href="{{ route('books.list') }}" @if($route == 'books.list') class="bold" @endif>All books</a>
            <a href="{{ route('users.getList') }}" @if($route == 'users.getList') class="bold" @endif>All users</a>
            <a href="{{ route('videos.getList') }}" @if($route == 'videos.getList') class="bold" @endif>All videos</a>
            <a href="{{ route('libraries.index') }}" @if($route == 'libraries.index') class="bold" @endif>All libraries</a>
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
