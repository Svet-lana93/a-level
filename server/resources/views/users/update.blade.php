<x-layout>
    <x-slot name="title">Update user</x-slot>

    <x-errors></x-errors>

    <form action="{{ route('users.edit', ['id' => $user->id]) }}" method="POST">
        @csrf
        <p>
            <label>First Name
                <input type="text" name="firstname" value="{{ $user->firstname }}">
            </label>
        </p>
        <p>
            <label>Last Name
                <input type="text" name="lastname" value="{{ $user->lastname }}">
            </label>
        </p>
        <p>
            <label>User Name
                <input type="text" name="username" value="{{ $user->username }}">
            </label>
        </p>
        <p>
            <label>Email
                <input type="text" name="email" value="{{ $user->email }}">
            </label>
        </p>
        <p>
            <label>Mobile
                <input type="text" name="mobile" value="{{ $user->mobile }}">
            </label>
        </p>
        <button type="submit">Save</button>
    </form>
</x-layout>
