<?php

namespace App\Services\Auth;

interface UserAuthenticationServiceContract
{
    public function attempt();
}
