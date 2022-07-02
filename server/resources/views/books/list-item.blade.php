<li>
    <a href="{{ route('books.view', ['id' => $book->id]) }}">{{ $book->title . ' ' . $book->user_name}}</a>
</li>
