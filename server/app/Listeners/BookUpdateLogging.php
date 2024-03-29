<?php

namespace App\Listeners;

use App\Events\BookUpdate;
use App\Mail\BookUpdated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BookUpdateLogging
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle(BookUpdate $event)
    {
        Mail::to(User::first())->send(new BookUpdated($event->book));
    }
}
