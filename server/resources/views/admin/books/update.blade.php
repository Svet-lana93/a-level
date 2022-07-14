<x-layout>
    <x-slot name="menu">
        <a href="{{ route('books.list') }}">All books</a>
    </x-slot>
    <x-slot name="title">Update book</x-slot>

    @if ($errors->any())
        <div>
            <ul class="color-red">
                @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.edit', ['book' => $book]) }}" method="POST">
        @csrf
        <p>
            <label>Title
                <input type="text" name="title" value="{{ $book->title }}"/><br>
            </label>
        </p>
        <p>
            <label>Description<br>
                <textarea name="description" rows="5" cols="50">{{ $book->description }}</textarea>
            </label>
        </p>
        <p>
            <label for="user_id">Choose a user<br>
                <select name="user_id">
                    @foreach($users as $user)
                        <option value="{{ $user->id}}" {{ $user->id === $book->user->id ? "selected" : ''}}>
                            {{ $user->firstname  . ' ' . $user->lastname}}
                        </option>
                    @endforeach
                </select>
            </label>
        </p>

        <button type="submit">Update</button>
    </form>
</x-layout>
