<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getList()
    {
        return view('users.list', ['users' => User::all()]);
    }

    public function getOne(User $user)
    {
        return view('users.one', ['user' => $user]);
    }

    public function create(Request $request)
    {
        if ($request->getMethod() === Request::METHOD_POST) {
            $user = new User;
            $this->updateUser($user, $request);
            return redirect(route('users.getList'));
        }
        return view('users.create');
    }

    public function update(User $user, Request $request)
    {
        if ($request->getMethod() === Request::METHOD_PUT) {
            $this->updateUser($user, $request);
            return redirect(route('users.getUser', ['user' => $user]));
        }
        return view('users.update', ['user' => $user]);
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect(route('users.getList'));
    }

    public function updateUser(User $user, Request $request)
    {
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();
    }
}
