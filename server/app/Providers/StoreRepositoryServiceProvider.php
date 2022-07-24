<?php

namespace App\Providers;

use App\Components\Store\Repositories\ExternalServerStoreRepository;
use App\Components\Store\Repositories\StoreRepository;
use App\Components\Store\Repositories\StoreRepositoryContract;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

class StoreRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(StoreRepositoryContract::class, function (Container $container) {
            if (env('USE_EXTERNAL_STORE_SERVER')) {
                return $container->make(ExternalServerStoreRepository::class);
            }
            return $container->make(StoreRepository::class);
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
