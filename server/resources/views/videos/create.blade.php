<x-layout>
    <x-slot name="menu">
        <a href="{{ route('videos.getList') }}">All videos</a>
        <a href="{{ route('users.getList') }}">All users</a>
    </x-slot>
    <x-slot name="title">New video</x-slot>

    @if ($errors->any())
        <div>
            <ul class="color-red">
                @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
