<?php

namespace App\Providers;

use App\Library\Repository\Interfaces\ProductRepositoryInterface;
use App\Library\Repository\Interfaces\UserRepositoryInterface;
use App\Library\Repository\ProductRepository;
use App\Library\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
