<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $guard)
    {
        if (!\Illuminate\Support\Facades\Auth::guard($guard)->check()) {
            return $guard == 'admin'
                ? redirect(route('login-page'))
                : redirect(route('registration.register-page'));
        }
        return $next($request);
    }
}
