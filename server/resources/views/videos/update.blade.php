<x-layout>
    <x-slot name="title">Update video</x-slot>

    <x-errors></x-errors>

    <form action="{{ route('videos.edit', ['id' => $video->id]) }}" method="POST">
        @csrf
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
            <label for="user_id">Choose a user<br>
                <select name="user_id">
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
