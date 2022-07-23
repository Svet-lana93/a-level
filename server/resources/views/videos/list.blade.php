<x-layout>
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
