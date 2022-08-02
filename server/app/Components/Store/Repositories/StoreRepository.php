<?php

namespace App\Components\Store\Repositories;

use App\Models\Store;
use App\Components\Store\StoreEntity;

class StoreRepository implements StoreRepositoryContract
{
    public function list()
    {
        return Store::all();
    }

    public function byId(int $id): StoreEntity
    {
        $store = Store::find($id);

        return new StoreEntity(
            $store->title,
            $store->address,
            $store->status,
        );
    }
}
