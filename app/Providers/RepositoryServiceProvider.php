<?php

namespace App\Providers;

use App\Decorators\CachingProviderRepository;
use App\Repositories\Provider\EloquentRepository as ProviderEloquentRepository;
use App\Repositories\Consumer\EloquentRepository as ConsumerEloquentRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(\App\Interfaces\Repositories\IProviderRepository::class, function ($app) {
            $eloquentRepository = new ProviderEloquentRepository();
            $cacheRepository = new CachingProviderRepository($eloquentRepository, $app['cache.store']);
            return $cacheRepository;
        });

        $this->app->singleton(\App\Interfaces\Repositories\IConsumerRepository::class, function () {
            $eloquentRepository = new ConsumerEloquentRepository();
            return $eloquentRepository;
        });
    }
}
