<x-layout>
    <x-slot name="title">New video</x-slot>

    <x-errors></x-errors>

    <form action="{{ route('videos.store') }}" method="POST">
        @csrf
        <label>Title
            <input type="text" name="title" value="{{ old('title') }}"><br>
        </label>
        <label>Description
            <input type="text" name="description" value="{{ old('description') }}"><br>
        </label>
        <label>Video
            <input type="text" name="video" value="{{ old('video') }}"><br>
        </label>
        <label for="user_id">Choose a user
            <select name="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id}}">
                        {{ $user->firstname  . ' ' . $user->lastname}}
                    </option>
                 @endforeach
            </select>
        </label><br>
        <button type="submit">Create</button>
    </form>
</x-layout>
