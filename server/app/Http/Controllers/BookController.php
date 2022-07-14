<?php

namespace App\Http\Controllers;

use App\Repositories\BookRepository;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function list()
    {
        return view('books.list', ['books' => $this->bookRepository->list()]);
    }

    public function view($id)
    {
        if (!$book = $this->bookRepository->byId($id)) {
            abort(404);
        }

        return view('books.book', ['book' => $book]);
    }

    public function create(UserRepository $userRepository)
    {
        return (view('books.create', ['users' => $userRepository->list()]));
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            ['title' => ['required', 'max:255'],
            'description' => ['nullable', 'max:255'],
            'user_id' => ['required', 'exists:users,id']]
        );

        try {
            $book = $this->bookRepository->create($data);
        } catch (Exception $e) {
            //
        }
        return redirect(route('books.view', ['id' => $book->id]));
    }

    public function update($id, UserRepository $userRepository)
    {
        if (!$book = $this->bookRepository->byId($id)) {
            abort(404);
        }
        return (view('books.update', ['book' => $book, 'users' => $userRepository->list()]));
    }

    public function edit($id, Request $request)
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

        return redirect(route('books.view', ['id' => $book->id]));
    }

    public function delete($id)
    {
        if (!$book = $this->bookRepository->byId($id)) {
            abort(404);
        }
        $this->bookRepository->delete($book);

        return redirect(route('books.list'));
    }
}
