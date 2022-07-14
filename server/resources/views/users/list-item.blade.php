<li>
    <a href="{{ route('users.getUser', ['id' => $user->id]) }}">
        {{ $user->firstname . ' ' . $user->lastname }}
    </a>
</li>
