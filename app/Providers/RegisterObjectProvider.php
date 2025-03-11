<?php

namespace App\Providers;

use App\Library\Objects\Interfaces\ProductObjectInterface;
use App\Library\Objects\ProductObject;
use Illuminate\Support\ServiceProvider;

class RegisterObjectProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductObjectInterface::class, ProductObject::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
