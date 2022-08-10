<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\Auth\UserContext;

class BaseController extends Controller
{
    protected function userContext(): ?UserContext
    {
        return app(UserContext::class);
    }

    protected function userId(): ?int
    {
        return $this->userContext()->userId ?? null;
    }
}
