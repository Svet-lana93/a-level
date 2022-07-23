<x-layout>
    <x-slot name="title">Books</x-slot>
    <ul>
        @each('books.list-item', $books, 'book')
    </ul>
    <p>
        <a href="{{ route('books.create') }}">Create new book</a>
    </p>
</x-layout>
