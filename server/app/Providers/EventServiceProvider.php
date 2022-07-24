<?php

namespace App\Providers;

use App\Events\BookUpdate;
use App\Events\EmailVerification;
use App\Listeners\BookUpdateLogging;
use App\Listeners\EmailVerificationLogging;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        BookUpdate::class => [
            BookUpdateLogging::class,
        ],
        EmailVerification::class => [
            EmailVerificationLogging::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
