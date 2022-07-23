<x-layout>
    <x-slot name="title">{{ trim($video->title, '.') }}</x-slot>
    <div>
        <p>{{ 'Description: ' . $video->description }}</p>
        <p><a href="{{ route('users.getUser', ['id' => $video->user->id]) }}">
                {{ 'Author: ' . $video->user->firstname . ' ' . $video->user->lastname}}
            </a>
        </p>
        <iframe width="560" height="315" src="{{ $video->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <form action="{{ route('videos.delete', ['id' => $video->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <p>
        <a href="{{ route('videos.update', ['id' => $video->id]) }}">Update video</a>
    </p>
</x-layout>
