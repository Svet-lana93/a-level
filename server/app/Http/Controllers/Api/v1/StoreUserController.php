<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class StoreUserController
{
    public $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function list()
    {
        return UserResource::collection($this->userRepository->list());
    }

    public function view(int $id)
    {
        if (!$user = $this->userRepository->byId($id)) {
            abort(404);
        }
        return new UserResource($user);
    }

    public function create(Request $request)
    {
        $data = $request->validate(
            ['firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'unique:users,username'],
            'email' => ['required' , 'email', 'unique:users,email'],
            'mobile' => ['nullable']]
        );

        if (!$user = $this->userRepository->create($data)) {
            abort(404);
        };
        return new UserResource($user);
    }

    public function update(int $id, Request $request)
    {
        $data = $request->validate(
            ['firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'username' => ['required', 'max:255', 'unique:users,username'],
            'email' => ['required' , 'email', 'unique:users,email'],
            'mobile' => ['nullable']]
        );

        if (!$user = $this->userRepository->byId($id)) {
            abort(404);
        }

        $user = $this->userRepository->update($user, $data);
        return new UserResource($user);
    }

    public function delete(int $id)
    {
        if (!$user = $this->userRepository->byId($id)) {
            abort(404);
        }
        $this->userRepository->delete($user);

        return response([]);
    }
}
