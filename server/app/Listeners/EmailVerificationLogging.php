<?php

namespace App\Listeners;

use App\Mail\EmailVerificated;
use App\Events\EmailVerification;
use Illuminate\Support\Facades\Mail;

class EmailVerificationLogging
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

    /**
     * Handle the event.
     *
     * @param  \App\Events\EmailVerification  $event
     * @return void
     */
    public function handle(EmailVerification $event)
    {
        Mail::to($event->user)->send(new EmailVerificated($event->user));
    }
}
