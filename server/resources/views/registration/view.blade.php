<x-registration-auth-layout>
    <x-slot name="title">Registration</x-slot>

    <form action="{{ route('registration.register') }}" method="POST">
        @csrf
        <p>
            <label>First name
                <input type="text" name="firstname" value="{{ old('firstname') }}"><br>
            </label>
        </p>
        <p>
            <label>Last name
                <input type="text" name="lastname" value="{{ old('lastname') }}"><br>
            </label>
        </p>
        <p>
            <label>User name
                <input type="text" name="username" value="{{ old('username') }}"><br>
            </label>
        </p>
        <p>
            <label>Email
                <input type="text" name="email" value="{{ old('email') }}"><br>
            </label>
        </p>
        <p>
            <label>Mobile
                <input type="text" name="mobile" value="{{ old('mobile') }}"><br>
            </label>
        </p>
        <p>
            <label>Password
                <input type="password" name="password"/>
            </label>
        </p>
        <button type="submit">Submit</button>
    </form>
</x-registration-auth-layout>
