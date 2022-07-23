<x-layout>
    <x-slot name="title">Library</x-slot>
    <div>
         {{ 'Title: ' . $library->title }}
    </div><br>
    @auth('admin')
    <form action="{{ route('libraries.destroy', ['library' => $library->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <p>
        <a href="{{ route('libraries.edit', ['library' => $library->id]) }}">Update library</a>
    </p>
    @endauth
</x-layout>
