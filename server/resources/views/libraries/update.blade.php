<x-layout>
    <x-slot name="title">Update library</x-slot>

    <x-errors></x-errors>

    <form action="{{ route('libraries.update', ['library' => $library->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <p>
            <label>Title
                <input type="text" name="title" value="{{ $library->title }}">
            </label>
        </p>
        <button type="submit">Save</button>
    </form>
</x-layout>
