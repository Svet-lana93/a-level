<x-layout>
    <x-slot name="title">New user</x-slot>

    <x-errors></x-errors>

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
