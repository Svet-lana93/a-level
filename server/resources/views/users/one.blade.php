<x-layout>
    <x-slot name="menu">
        <a href="{{ route('mainPage') }}">Main page</a>
        <a href="{{ route('users.getList') }}">All users</a>
        <a href="{{ route('videos.getList') }}">All videos</a>
        <a href="{{ route('books.list') }}">All books</a>
    </x-slot>
    <x-slot name="title">User</x-slot>
    <div>
         {{ 'First name: ' . $user->firstname }} <br>
         {{ 'Last name: ' . $user->lastname }} <br>
         {{ 'User name: ' . $user->username }} <br>
         {{ 'Email: ' . $user->email }}
    </div>
    <form action="{{ route('users.delete', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <p>
        <a href="{{ route('users.update', ['user' => $user->id]) }}">Update user</a>
    </p>
    <p>
        <a href="{{ route('videos.userVideos', ['user' => $user->id]) }}">All user videos</a>
    </p>
</x-layout>
