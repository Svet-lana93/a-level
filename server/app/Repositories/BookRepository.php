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
}
