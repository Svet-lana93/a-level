<li>
    <a href="{{ route('users.getUser', ['user' => $user]) }}">
        {{ $user->firstname . ' ' . $user->lastname }}
    </a>
</li>
