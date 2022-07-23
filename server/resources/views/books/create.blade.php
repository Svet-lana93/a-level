<x-layout>
    <x-slot name="title">Create book</x-slot>

    <x-errors></x-errors>

    <form action="{{ route('admin.books.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="title" value="{{ old('title') }}"/>
        <input type="text" name="description" placeholder="description" value="{{ old('description') }}"/><br>
        <label for="user_id">Choose a user<br>
            <select name="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id}}">
                        {{ $user->firstname  . ' ' . $user->lastname}}
                    </option>
                @endforeach
            </select>
        </label>
        <button type="submit">Create</button>
    </form>
</x-layout>
