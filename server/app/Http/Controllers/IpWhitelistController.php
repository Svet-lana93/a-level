<?php

namespace App\Http\Controllers;

use App\Repositories\IpWhitelistRepository;
use Illuminate\Http\Request;

class IpWhitelistController extends Controller
{
    public $ipWhitelistRepository;

    public function __construct(IpWhitelistRepository $ipWhitelistRepository)
    {
        $this->ipWhitelistRepository = $ipWhitelistRepository;
    }

    public function add(Request $request): string
    {
        return $this->ipWhitelistRepository->create($request->ip());
    }
}
