<?php

namespace App\Components\Store\ExternalServer;

use App\Components\Store\Repositories\ExternalServerStoreRepository;
use App\Components\Store\Repositories\StoreRepository;
use App\Components\Store\Repositories\StoreRepositoryContract;
use Illuminate\Contracts\Container\Container;

class ExternalServerService
{
    public function getStore(int $id): ExternalServerStoreResponse
    {
        return new ExternalServerStoreResponse($this->api()->getStore($id));
    }

    private function api()
    {
        return env('MOCK_EXTERNAL_STORE_SERVER')
            ? app(ExternalServerApiMock::class)
            : app(ExternalServerApi::class);
    }
}
