<x-layout>
    <x-slot name="menu">
        <a href="{{ route('users.getList') }}">All users</a>
    </x-slot>
    <x-slot name="title">Update user</x-slot>
    <form action="{{ route('users.update', ['user' => $user]) }}" method="POST">
        @csrf
        @method('PUT')
        <p>
            <label>First Name
                <input type="text" name="firstname" value="{{ $user->firstname }}">
            </label>
        </p>
        <p>
            <label>Last Name
                <input type="text" name="lastname" value="{{ $user->lastname }}">
            </label>
        </p>
        <p>
            <label>User Name
                <input type="text" name="username" value="{{ $user->username }}">
            </label>
        </p>
        <p>
            <label>Email
                <input type="text" name="email" value="{{ $user->email }}">
            </label>
        </p>
        <p>
            <label>Mobile
                <input type="text" name="mobile" value="{{ $user->mobile }}">
            </label>
        </p>
        <button type="submit">Save</button>
    </form>
</x-layout>
