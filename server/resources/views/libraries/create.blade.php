<x-layout>
    <x-slot name="title">New library</x-slot>

    <x-errors></x-errors>

    <form action="{{ route('libraries.store') }}" method="POST">
        @csrf
        <p>
            <label>Title
                <input type="text" name="title" value="{{ old('title') }}"><br>
            </label>
        </p>
        <button type="submit">Submit</button>
    </form>
</x-layout>
