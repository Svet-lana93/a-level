<?php

namespace App\Services\Auth;

class UserContext
{
    public $userId;
    public $email;

    public function __construct(?int $userId = null, ?string $email = null)
    {
        $this->userId = $userId;
        $this->email = $email;
    }
}
