<?php

namespace App\Components\Store\Exceptions;

class ExternalServerStoreException extends \RuntimeException
{
    public function __construct($jsonDecodedResponse)
    {
        parent::__construct($jsonDecodedResponse->error_details ?? 'External server response not successful');
    }
}
