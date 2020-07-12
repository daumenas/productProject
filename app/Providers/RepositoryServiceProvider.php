<?php

namespace App\Providers;

use App\Repositories\Interfaces\ImageRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ProductRepository;
use App\Repositories\ImageRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
        $this->app->bind(
            ImageRepositoryInterface::class,
            ImageRepository::class
        );
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
