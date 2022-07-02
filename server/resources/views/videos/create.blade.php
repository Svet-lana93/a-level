<x-layout>
    <x-slot name="menu">
        <a href="{{ route('videos.getList') }}">All videos</a>
        <a href="{{ route('users.getList') }}">All users</a>
    </x-slot>
    <x-slot name="title">New video</x-slot>
    <form action="{{ route('videos.create') }}" method="POST">
        @csrf
        <label>Title
            <input type="text" name="title"><br>
        </label>
        <label>Description
            <input type="text" name="description"><br>
        </label>
        <label>Video
            <input type="text" name="video"><br>
        </label>
        <label for="user">Choose a user
            <select name="user">
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
