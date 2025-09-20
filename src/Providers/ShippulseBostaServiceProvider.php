<?php

namespace Obelaw\Shippulse\Bosta\Providers;

use Illuminate\Support\ServiceProvider;
use Obelaw\Shippulse\Bosta\Services\BostaService;
use Obelaw\Shippulse\Shipper\ShipperManager;

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

        ShipperManager::addShipper('bosta', fn() => app('bosta'));
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
