<x-layout>
    <x-slot name="menu">
        <a href="{{ route('mainPage') }}">Main page</a>
    </x-slot>
    <x-slot name="title">Books</x-slot>
    <ul>
        @each('books.list-item', $books, 'book')
    </ul>
</x-layout>
