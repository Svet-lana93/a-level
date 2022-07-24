<?php

namespace App\Components\Store\Repositories;

use App\Components\Store\StoreEntity;

interface StoreRepositoryContract
{
    public function byId(int $id): StoreEntity;
}
