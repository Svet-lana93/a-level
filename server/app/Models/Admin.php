<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class Admin extends User
{
    use HasFactory;

    protected $casts = [
        'super_admin' => 'bool'
    ];

    public function isSuperAdmin()
    {
        return $this->super_admin;
    }
}
