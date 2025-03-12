<?php

namespace App\Providers;

use App\Library\Objects\Interfaces\ProductObjectInterface;
use App\Library\Objects\Interfaces\ProposalObjectInterface;
use App\Library\Objects\ProductObject;
use App\Library\Objects\ProposalObject;
use Illuminate\Support\ServiceProvider;

class RegisterObjectProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductObjectInterface::class, ProductObject::class);
        $this->app->bind(ProposalObjectInterface::class, ProposalObject::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
