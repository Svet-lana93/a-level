<?php

namespace App\Components\Store\ExternalServer;

class ExternalServerStoreResponse
{
    public $title;
    public $address;
    public $status;

    public function __construct($response)
    {
        $this->title = $response->data->title;
        $this->address = $response->data->address;
        $this->status = $response->data->status;
    }
}
