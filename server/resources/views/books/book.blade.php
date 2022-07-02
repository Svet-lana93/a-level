<x-layout>
    <x-slot name="menu">Menu</x-slot>
    <x-slot name="title">{{ $book->title }}</x-slot>
    <p> by {{ $book->user_name }} </p>
    <a href="{{ route('books.list') }}">All books</a>
</x-layout>
