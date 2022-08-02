<?php

namespace App\Http\Middleware;

use App\Repositories\ClientRepository;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifyClientApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function handle(Request $request, Closure $next)
    {
        $apiToken = $request->header('api-token');
        if (!$apiToken || !$this->clientRepository->byApiToken($apiToken)) {
            return response(['error' => 'Client is not verified'], 403);
        }

        return $next($request);
    }
}
