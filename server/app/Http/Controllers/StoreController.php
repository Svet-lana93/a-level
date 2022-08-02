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
    /*
       public function create()
       {
           return view('users.create');
       }

       public function store(Request $request)
       {
           $data = $request->validate(
               ['firstname' => ['required', 'max:255'],
               'lastname' => ['required', 'max:255'],
               'username' => ['required', 'max:255', 'unique:users,username'],
               'email' => ['required', 'email', 'unique:users,email'],
               'mobile' => ['nullable']]
           );
           try {
               $user = $this->userRepository->create($data);
           } catch (Exception $e) {
               //
           }
           return redirect(route('users.getUser', ['id' => $user->id]));
       }

       public function update($id)
       {
           if (!$user = $this->userRepository->byId($id)) {
               abort(404);
           }
           return view('users.update', ['user' => $user]);
       }

       public function edit($id, Request $request)
       {
           $data = $request->validate(
               ['firstname' => ['required', 'max:255'],
                   'lastname' => ['required', 'max:255'],
                   'username' => ['required', 'max:255'],
                   'email' => ['required', 'email'],
                   'mobile' => ['nullable']]
           );

           if (!$user = $this->userRepository->byId($id)) {
               abort(404);
           }
           $user = $this->userRepository->update($user, $data);
           return redirect(route('users.getUser', ['id' => $user->id]));
       }

       public function delete($id)
       {
           if (!$user = $this->userRepository->byId($id)) {
               abort(404);
           }
           $this->userRepository->delete($user);
           return redirect(route('users.getList'));
       }

       public function userVideos($id)
       {
           return view('users.videos', ['user' => $this->userRepository->byId($id)]);
       }
    */
}
