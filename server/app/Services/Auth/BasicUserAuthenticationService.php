<?php

namespace App\Services\Auth;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class BasicUserAuthenticationService implements UserAuthenticationServiceContract
{
    private $userRepository;
    private $request;

    public function __construct(UserRepository $userRepository, Request $request)
    {
        $this->userRepository = $userRepository;
        $this->request = $request;
    }

    public function attempt()
    {
        $username = $this->request->header('php-auth-user');

        if (!$user = $this->userRepository->byUsername($username)) {
            throw new \Exception('User is not found', 403);
        }

        if (!Hash::check($this->request->header('php-auth-pw'), $user->password)) {
            throw new \Exception('Password do not match', 403);
        }

        $userContext = new UserContext($user->id, $user->email);

        App::instance(UserContext::class, $userContext);
    }
}
