<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

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
        return $user;
    }
}
