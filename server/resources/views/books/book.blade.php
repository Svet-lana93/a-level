<x-layout>
    <x-slot name="menu">
        <a href="{{ route('mainPage') }}">Main page</a>
        <a href="{{ route('books.list') }}">All books</a>
        <a href="{{ route('users.getList') }}">All users</a>
        <a href="{{ route('videos.getList') }}">All videos</a>
    </x-slot>
    <x-slot name="title">{{ $book->title }}</x-slot>

    <p> Description: {{ $book->description }}</p>
    <p>
        <a href="{{ route('users.getUser', ['user' => $book->user]) }}">
            {{ 'Author: ' . $book->user->firstname . ' ' . $book->user->lastname}}
        </a>
    </p>

    <form action="{{ route('books.delete', ['book' => $book]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <p>
        <a href="{{ route('books.update', ['book' => $book->id]) }}">Update book</a>
    </p>
</x-layout>
