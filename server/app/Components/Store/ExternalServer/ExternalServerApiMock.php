<?php

namespace App\Components\Store\ExternalServer;

class ExternalServerApiMock
{
    public function getStore(int $id): object
    {
        return (object)
            [
            'status' => 'success',
            'data' => (object) [
                'id' => $id,
                'title' => 'test test',
                'address' => 'dsgsdg',
                'status' => 1
            ]
        ];
    }
}
