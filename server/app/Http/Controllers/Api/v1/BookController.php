<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\BookResource;
use App\Repositories\BookRepository;
use Illuminate\Http\Request;

class BookController extends BaseController
{
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function list()
    {
        return BookResource::collection($this->bookRepository->list());
    }

    public function view($id)
    {
        if (!$book = $this->bookRepository->byId($id)) {
            abort(404);
        }

        return new BookResource($book);
    }

    public function create(Request $request)
    {
        $data = $request->validate(
            ['title' => ['required', 'max:255'],
            'description' => ['nullable', 'max:255'],
            'user_id' => ['required', 'exists:users,id']]
        );

        if (!$book = $this->bookRepository->create($data)) {
            abort(404);
        }
        return new BookResource($book);
    }

    public function update($id, Request $request)
    {
        $data = $request->validate(
            ['title' => ['required', 'max:255'],
            'description' => ['nullable', 'max:255'],
            'user_id' => ['required', 'exists:users,id']]
        );

        if (!$book = $this->bookRepository->byId($id)) {
            abort(404);
        }
        $book = $this->bookRepository->update($book, $data);
        return new BookResource($book);
    }

    public function delete($id)
    {
        if (!$book = $this->bookRepository->byId($id)) {
            abort(404);
        }
        $this->bookRepository->delete($book);

        return response([]);
    }
}
