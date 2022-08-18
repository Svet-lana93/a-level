<?php

namespace App\Repositories;

use App\Models\IpWhitelist;

class IpWhitelistRepository
{
    public function create(string $ip): ?IpWhitelist
    {
        $ipWhitelist = $this->findByIp($ip) ?? new IpWhitelist();

        if ($ipWhitelist->ip === null) {
            $ipWhitelist->ip = $ip;
            $ipWhitelist->save();
        }

        return $ipWhitelist;
    }

    public function findByIp(string $ip): ?IpWhitelist
    {
        return IpWhitelist::where('ip', $ip)->first();
    }
}
