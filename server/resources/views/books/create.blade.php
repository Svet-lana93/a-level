<x-layout>
    <x-slot name="menu">

    </x-slot>
    <x-slot name="title">Create book</x-slot>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="title"/>
        <input type="text" name="description" placeholder="description"/>
        <button type="submit">Create</button>
    </form>
</x-layout>
