<li>
    <a href="{{ route('books.view', ['book' => $book->id]) }}">{{ $book->title . ' ' . $book->user_name}}</a>
</li>
