<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    public function list()
    {
        return Book::select('books.*', 'users.firstname as user_name')
            ->join('users', 'users.id', '=', 'books.user_id')
            ->get();
    }

    public function byId(int $id)
    {
        return Book::find($id);
    }

    public function create(array $data)
    {
        $book = new Book;
        $book->title = $data['title'];
        $book->description = $data['description'];
        $book->user_id = $data['user_id'];
        $book->save();

        return $book;
    }

    public function update(Book $book, array $data)
    {
        if (isset($data['title'])) {
            $book->title = $data['title'];
        }
        if (isset($data['title'])) {
            $book->description = $data['description'];
        }
        $book->user_id = $data['user_id'];
        $book->save();

        return $book;
    }

    public function delete(Book $book)
    {
        $book->delete();
        return $book;
    }
}
