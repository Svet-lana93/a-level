<x-layout>
    <x-slot name="title">User</x-slot>
    <div>
         {{ 'First name: ' . $user->firstname }} <br>
         {{ 'Last name: ' . $user->lastname }} <br>
         {{ 'User name: ' . $user->username }} <br>
         {{ 'Email: ' . $user->email }}
    </div>
    <form action="{{ route('users.delete', ['id' => $user->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <p>
        <a href="{{ route('users.update', ['id' => $user->id]) }}">Update user</a>
    </p>
    <p>
        <a href="{{ route('users.userVideos', ['id' => $user->id]) }}">All user videos</a>
    </p>
</x-layout>
