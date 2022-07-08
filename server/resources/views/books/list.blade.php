<x-layout>
    <x-slot name="menu">
        <a href="{{ route('mainPage') }}">Main page</a>
        <a href="{{ route('users.getList') }}">All users</a>
        <a href="{{ route('videos.getList') }}">All videos</a>
    </x-slot>
    <x-slot name="title">Books</x-slot>
    <ul>
        @each('books.list-item', $books, 'book')
    </ul>
    <p>
        <a href="{{ route('books.create') }}">Create new book</a>
    </p>
</x-layout>
