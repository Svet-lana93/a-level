<?php

namespace App\Services\Auth\Middleware;

use App\Services\Auth\BasicUserAuthenticationService;
use App\Services\Auth\HttpUserAuthenticationService;
use App\Services\Auth\UserAuthenticationServiceContract;
use Closure;
use Illuminate\Http\Request;

class UserAuthByToken
{
    private $authenticationService;

    public function __construct(UserAuthenticationServiceContract $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    public function handle(Request $request, Closure $next)
    {
        try {
            $this->authenticationService->attempt();
        } catch (\Exception $e) {
            return response(['error' => $e->getMessage()], $e->getCode());
        }

        return $next($request);
    }
}
