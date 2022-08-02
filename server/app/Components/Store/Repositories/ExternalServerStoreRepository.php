<?php

namespace App\Components\Store\Repositories;

use App\Components\Store\ExternalServer\ExternalServerService;
use App\Components\Store\StoreEntity;
use App\Models\Store;

class ExternalServerStoreRepository implements StoreRepositoryContract
{
    public $externalServerService;

    public function __construct(ExternalServerService $externalServerService)
    {
        $this->externalServerService = $externalServerService;
    }

    public function byId(int $id): StoreEntity
    {
        $response = $this->externalServerService->getStore($id);

        return new StoreEntity(
            $response->title,
            $response->address,
            $response->status
        );
    }
}
