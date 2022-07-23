<x-layout>
    <x-slot name="title">{{ $book->title }}</x-slot>

    <p> Description: {{ $book->description }}</p>
    <p>
        <a href="{{ route('users.getUser', ['id' => $book->user]) }}">
            {{ 'Author: ' . $book->user->firstname . ' ' . $book->user->lastname}}
        </a>
    </p>

    <form action="{{ route('books.delete', ['id' => $book->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <p>
        <a href="{{ route('books.update', ['id' => $book->id]) }}">Update book</a>
    </p>
</x-layout>
