<x-layout>
    <x-slot name="title">All users</x-slot>
    <ul>
        @foreach($libraries as $library)
            <li>
                <a href="{{ route('libraries.show', ['library' => $library->id]) }}">
                    {{ $library->title }}
                </a>
            </li>
        @endforeach
    </ul>
    <p>
        <a href="{{ route('libraries.create') }}">Create new library</a>
    </p>
</x-layout>
