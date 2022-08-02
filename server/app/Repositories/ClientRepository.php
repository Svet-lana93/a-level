<?php

namespace App\Repositories;

use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientRepository
{
    public function byApiToken(string $apiToken)
    {
        return DB::table('clients')->where('api_token', $apiToken)->get();
    }
}
