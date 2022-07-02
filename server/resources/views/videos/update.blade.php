<x-layout>
    <x-slot name="menu">
        <a href="{{ route('videos.getList') }}">All videos</a>
    </x-slot>
    <x-slot name="title">Update video</x-slot>
    <form action="" method="POST">
        @csrf
        @method('PUT')
        <p>
            <label>Title<br>
                <input type="text" name="title" value="{{ $video->title }}">
            </label>
        </p>
        <p>
            <label>Description<br>
                <textarea name="description" rows="3" cols="50">{{ $video->description }}</textarea>
            </label>
        </p>
        <p>
            <label>Video<br>
                <input type="text" name="video" value="{{ $video->video }}">
            </label>
        </p>
        <p>
            <label for="user">Choose a user<br>
                <select name="user">
                    @foreach($users as $user)
                        <option value="{{ $user->id}}" {{ $user->id === $video->user->id ? "selected" : ''}}>
                            {{ $user->firstname  . ' ' . $user->lastname}}
                        </option>
                    @endforeach
                </select>
            </label>
        </p>
        <button type="submit">Update</button>
    </form>
</x-layout>
