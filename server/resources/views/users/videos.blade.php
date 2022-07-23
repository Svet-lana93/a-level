<x-layout>
    <x-slot name="title">All user videos</x-slot>
    @foreach ($user->videos as $video)
        <li>
            <a href="{{ route('videos.getVideo', ['id' => $video->id]) }}">{{ $video->title }}</a>
        </li>
    @endforeach
    <p>
        <a href="{{ route('users.getUser', ['id' => $user->id]) }}">Back to user</a>
    </p>
    <p>
        <a href="{{ route('videos.create') }}">Create new video</a>
    </p>
</x-layout>
