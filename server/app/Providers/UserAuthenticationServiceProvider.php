<?php

namespace App\Providers;

use App\Components\Store\Repositories\ExternalServerStoreRepository;
use App\Components\Store\Repositories\StoreRepository;
use App\Components\Store\Repositories\StoreRepositoryContract;
use App\Services\Auth\BasicUserAuthenticationService;
use App\Services\Auth\HttpUserAuthenticationService;
use App\Services\Auth\UserAuthenticationServiceContract;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

class UserAuthenticationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserAuthenticationServiceContract::class, function (Container $container) {
            if (env('API_USER_AUTH_METHOD') === 'bearer') {
                return $container->make(HttpUserAuthenticationService::class);
            }
            return $container->make(BasicUserAuthenticationService::class);
        });
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
