<x-registration-auth-layout>
    <x-slot name="title">Admin login</x-slot>

    <form action="{{ route('admin.login') }}" method="POST">
        @csrf
        <label>
            <input type="text" name="email" placeholder="Email"/>
        </label>
        <label>
            <input type="password" name="password" placeholder="Password"/>
        </label>
        <button type="submit">Login</button>
    </form>
</x-registration-auth-layout>
