<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserSessionToken;
use Illuminate\Support\Str;

class UserSessionTokenRepository
{
    public function updatedAt($token)
    {
        return UserSessionToken::where('token', $token)->first()->updated_at;
    }

    public function createOrUpdate(User $user): UserSessionToken
    {
        $userSessionToken = $this->byUserId($user->id) ?? new UserSessionToken();
        $userSessionToken->user_id = $user->id;
        $userSessionToken->token = Str::random(68);
        $userSessionToken->save();

        return $userSessionToken;
    }

    public function byUserId(int $userId)
    {
        return UserSessionToken::where('user_id', $userId)->first();
    }
}
