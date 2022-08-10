<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\UserAuthResource;
use App\Repositories\UserRepository;
use App\Repositories\UserSessionTokenRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAuthenticationController extends BaseController
{
    public function login(
        Request $request,
        UserRepository $userRepository,
        UserSessionTokenRepository $userSessionTokenRepository
    ) {
        $data = $request->validate(
            ['email' => 'required|email',
            'password' => 'required']
        );

        if (!$user = $userRepository->byEmail($data['email'])) {
            return response(['error' => 'User not found or password is incorrect'], 403);
        }

        if (!Hash::check($data['password'], $user->password)) {
            return response(['error' => 'User not found or password is incorrect'], 403);
        }

        $userSessionTokenRepository->createOrUpdate($user);

        return new UserAuthResource($user);
    }
}
