<x-layout>
    <x-slot name="menu"></x-slot>
    <x-slot name="title">Login</x-slot>

    @if ($errors->any())
        <div>
            <ul class="color-red">
                @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label>
            <input type="text" name="email" placeholder="Email"/>
        </label>
        <label>
            <input type="password" name="password" placeholder="Password"/>
        </label>
        <button type="submit">Login</button>
    </form>
</x-layout>
