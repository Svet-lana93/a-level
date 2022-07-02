<x-layout>
    <x-slot name="menu">
        <a href="{{ route('mainPage') }}">Main page</a>
        <a href="{{ route('users.getList') }}">All users</a>
        <a href="{{ route('videos.getList') }}">All videos</a>
    </x-slot>
    <x-slot name="title">All user videos</x-slot>
    @foreach ($user->videos as $video)
        <li>
            <a href="{{ route('videos.getVideo', ['video' => $video]) }}">{{ $video->title }}</a>
        </li>
    @endforeach
    <p>
        <a href="{{ route('users.getUser', ['user' => $user]) }}">Back to user</a>
    </p>
</x-layout>
