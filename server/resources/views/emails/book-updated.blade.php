Book {{ $book->title }}
@if(!$book->wasChanged('title'))
    wasn't updated!
@else
    was updated!
@endif
