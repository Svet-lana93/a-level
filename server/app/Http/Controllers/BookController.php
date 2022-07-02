<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Generator;
use App\Models\Book;

class BookController extends Controller
{
    public function list()
    {
        $books = Book::select('books.*', 'users.firstname as user_name')
            ->join('users', 'users.id', '=', 'books.user_id')
            ->get();
        /*
        $books = DB::table('books')->pluck('title', 'id')->toArray();//array books
        $booksTitle = [];
        foreach ($books as $book) {
            $booksTitle[$book->id] = $book->title;
        }*/
        return view('books.list', ['books' => $books]);
    }

    public function view($id)
    {
        $books = DB::table('books')
            ->select('books.*', 'users.firstname as user_name')
            ->join('users', 'users.id', '=', 'books.user_id')
            ->get();

        if (!$book = $books[$id] ?? null) {
            abort(404);
        };
        return view('books.book', ['book' => $book]);
    }

    public function create(Generator $faker)
    {
        /*
        $user = DB::table('users')->first();
        DB::table('books')->insert([
            'user_id' => $user->id,
            'title'=>$faker->sentence(2),
            'description' => $faker->text(258),
        ]);*/
        $book = new Book;
        $book->title = $faker->sentence(2);
        $book->description = $faker->text(258);
        $book->user_id = 7;
        $book->save();
    }
}
