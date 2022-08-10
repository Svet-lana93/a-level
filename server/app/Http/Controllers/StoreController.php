<?php

namespace App\Http\Controllers;

use App\Components\Store\Repositories\StoreRepository;

class StoreController extends Controller
{
    private $storeRepository;

    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function getList()
    {
        return view('stores.list', ['stores' => $this->storeRepository->list()]);
    }

    public function getOne($id)
    {
        if (!$store = $this->storeRepository->byId($id)) {
            abort(404);
        }
        return view('stores.one', ['store' => $store]);
    }
}
