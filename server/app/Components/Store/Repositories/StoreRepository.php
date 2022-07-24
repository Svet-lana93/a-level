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
    /*
        public function create(array $data): object
        {
            $user = new User;
            $user->firstname = $data['firstname'];
            $user->lastname = $data['lastname'];
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->mobile = $data['mobile'];
            $user->save();

            return $user;
        }

        public function update(User $user, array $data): object
        {
            if (isset($data['firstname'])) {
                $user->firstname = $data['firstname'];
            }
            if (isset($data['lastname'])) {
                $user->lastname = $data['lastname'];
            }
            if (isset($data['username'])) {
                $user->username = $data['username'];
            }
            if (isset($data['email'])) {
                $user->email = $data['email'];
            }
            if (isset($data['firstname'])) {
                $user->mobile = $data['mobile'];
            }
            $user->save();
            return $user;
        }

        public function delete(User $user)
        {
            $user->delete();
        }*/
}
