<?php

namespace App\Components\Store\ExternalServer;

class ExternalServerService
{
    private $api;

    public function __construct(ExternalServerApi $api)
    {
        $this->api = $api;
    }

    public function getStore(int $id): ExternalServerStoreResponse
    {
        return new ExternalServerStoreResponse($this->api->getStore($id));
    }
}
