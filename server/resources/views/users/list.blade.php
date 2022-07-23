<x-layout>
    <x-slot name="title">All users</x-slot>
    <ul>
        @each('users.list-item', $users, 'user')
    </ul>
    <p>
        <a href="{{ route('users.create') }}">Create new user</a>
    </p>
</x-layout>
