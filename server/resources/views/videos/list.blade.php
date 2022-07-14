<x-layout>
    <x-slot name="menu">
        <a href="{{ route('mainPage') }}">Main page</a>
        <a href="{{ route('users.getList') }}">All users</a>
        <a href="{{ route('books.list') }}">All books</a>
    </x-slot>
    <x-slot name="title">All videos</x-slot>
    @foreach ($videos as $video)
        <li>
            <a href="{{ route('videos.getVideo', ['id' => $video->id]) }}">
                {{ trim($video->title, '.') }}
            </a>
            Author : {{ $video->user->firstname . ' ' . $video->user->lastname}}
        </li>
    @endforeach
    <p>
        <a href="{{ route('videos.create') }}">Create new video</a>
    </p>
</x-layout>
