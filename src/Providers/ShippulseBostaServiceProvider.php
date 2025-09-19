<?php

namespace Obelaw\Shippulse\Bosta\Providers;

use Illuminate\Support\ServiceProvider;
use Obelaw\Shippulse\Bosta\Services\BostaService;

class ShippulseBostaServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('bosta', BostaService::class);
    }

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        // Boot logic for the service provider
    }
}
