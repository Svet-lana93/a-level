<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getList()
    {
        return view('users.list', ['users' => $this->userRepository->list()]);
    }

    public function getOne($id)
    {
        if (!$user = $this->userRepository->byId($id)) {
            abort(404);
        }
        return view('users.one', ['user' => $user]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            ['firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'mobile' => ['nullable']]
        );
        try {
            $user = $this->userRepository->create($data);
        } catch (Exception $e) {
            //
        }
        return redirect(route('users.getUser', ['id' => $user->id]));
    }

    public function update($id)
    {
        if (!$user = $this->userRepository->byId($id)) {
            abort(404);
        }
        return view('users.update', ['user' => $user]);
    }

    public function edit($id, Request $request)
    {
        $data = $request->validate(
            ['firstname' => ['required', 'max:255'],
                'lastname' => ['required', 'max:255'],
                'username' => ['required', 'max:255'],
                'email' => ['required', 'email'],
                'mobile' => ['nullable']]
        );

        if (!$user = $this->userRepository->byId($id)) {
            abort(404);
        }
        $user = $this->userRepository->update($user, $data);
        return redirect(route('users.getUser', ['id' => $user->id]));
    }

    public function delete($id)
    {
        if (!$user = $this->userRepository->byId($id)) {
            abort(404);
        }
        $this->userRepository->delete($user);
        return redirect(route('users.getList'));
    }

    public function userVideos($id)
    {
        return view('users.videos', ['user' => $this->userRepository->byId($id)]);
    }
}
