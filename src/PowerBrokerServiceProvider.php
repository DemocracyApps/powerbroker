<?php namespace DemocracyApps\PowerBroker;

/*
* This file is part of the DemocracyApps\member-org package.
*
* Copyright 2015 DemocracyApps, Inc.
*
* See the LICENSE.txt file distributed with this source code for full copyright and license information.
*
*/

use Illuminate\Support\ServiceProvider;

class PowerBrokerServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('DemocracyApps\PowerBroker\PowerBroker', function ($app) {
            return new PowerBroker();
        });
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/database/migrations/' => database_path('/migrations')
        ], 'migrations');
    }
}