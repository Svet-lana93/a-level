<x-layout>
    <x-slot name="menu">
        <a href="{{ route('users.getList') }}">All users</a>
        <a href="{{ route('users.getList') }}">All videos</a>
    </x-slot>
    <x-slot name="title">New user</x-slot>

    @if ($errors->any())
        <div>
            <ul class="color-red">
                @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label>First name
            <input type="text" name="firstname" value="{{ old('firstname') }}"><br>
        </label>
        <label>Last name
            <input type="text" name="lastname" value="{{ old('lastname') }}"><br>
        </label>
        <label>User name
            <input type="text" name="username" value="{{ old('username') }}"><br>
        </label>
        <label>Email
            <input type="text" name="email" value="{{ old('email') }}"><br>
        </label>
        <label>Mobile
            <input type="text" name="mobile" value="{{ old('mobile') }}"><br>
        </label>
        <button type="submit">Submit</button>
    </form>
</x-layout>
