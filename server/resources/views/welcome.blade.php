<x-layout>
    <x-slot name="menu">
        <a href="{{ route('users.getList') }}">All users</a>
        <a href="{{ route('videos.getList') }}">All videos</a>
        <a href="{{ route('books.list') }}">All books</a>
    </x-slot>
    <x-slot name="title">Main Page</x-slot>
</x-layout>
