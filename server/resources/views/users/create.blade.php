<x-layout>
    <x-slot name="menu">
        <a href="{{ route('users.getList') }}">All users</a>
        <a href="{{ route('users.getList') }}">All videos</a>
    </x-slot>
    <x-slot name="title">New user</x-slot>

    <form action="{{ route('users.create') }}" method="POST">
        @csrf
        <label>First name
            <input type="text" name="firstname"><br>
        </label>
        <label>Last name
            <input type="text" name="lastname"><br>
        </label>
        <label>User name
            <input type="text" name="username"><br>
        </label>
        <label>Email
            <input type="text" name="email"><br>
        </label>
        <label>Mobile
            <input type="text" name="mobile"><br>
        </label>
        <button type="submit">Submit</button>
    </form>
</x-layout>
