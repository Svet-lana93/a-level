<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserSessionToken;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserRepository
{
    public function list()
    {
        return User::all();
    }

    public function byId(int $id)
    {
        return User::find($id);
    }

    public function create(array $data)
    {
        $user = new User;
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->mobile = $data['mobile'];
        $user->save();

        return $user;
    }

    public function update(User $user, array $data)
    {
        if (isset($data['firstname'])) {
            $user->firstname = $data['firstname'];
        }
        if (isset($data['lastname'])) {
            $user->lastname = $data['lastname'];
        }
        if (isset($data['username'])) {
            $user->username = $data['username'];
        }
        if (isset($data['email'])) {
            $user->email = $data['email'];
        }
        if (isset($data['firstname'])) {
            $user->mobile = $data['mobile'];
        }
        $user->save();
        return $user;
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function byEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function byUsername(string $username)
    {
        return User::where('username', $username)->first();
    }

    public function byToken($token)
    {
        return DB::table('users')
            ->select('users.*')
            ->join('user_session_tokens', function (JoinClause  $join) use ($token) {
                $join->on('users.id', '=', 'user_session_tokens.user_id')
                    ->where('user_session_tokens.token', $token);
            })->first();
    }
}
