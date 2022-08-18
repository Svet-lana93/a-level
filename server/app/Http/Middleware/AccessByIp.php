<?php

namespace App\Http\Middleware;

use App\Models\IpWhitelist;
use App\Repositories\IpWhitelistRepository;
use Closure;
use Illuminate\Http\Request;

class AccessByIp
{
    public $ipWhitelistRepository;

    public function __construct(IpWhitelistRepository $ipWhitelistRepository)
    {
        $this->ipWhitelistRepository = $ipWhitelistRepository;
    }

    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $ipInTable = $this->ipWhitelistRepository->findByIp($ip)->ip ?? null;
        if ($ip !== $ipInTable) {
            return response(['error' => 'IP is not found'], 403);
        }

        return $next($request);
    }
}
