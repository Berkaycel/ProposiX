<?php

namespace App\Providers;

use App\Library\Services\Interfaces\ProductServiceInterface;
use App\Library\Services\Interfaces\ProposalServiceInterface;
use App\Library\Services\ProductService;
use App\Library\Services\ProposalService;
use Illuminate\Support\ServiceProvider;

class RegisterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(ProposalServiceInterface::class, ProposalService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
