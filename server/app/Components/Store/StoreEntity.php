<?php

namespace App\Components\Store;

class StoreEntity
{
    public $title;
    public $address;
    public $status;

    public function __construct(string $title, string$address, int $status)
    {
        $this->title = $title;
        $this->address = $address;
        $this->status = $status;
    }
}
