<?php

namespace SmsBase;

use Illuminate\Support\ServiceProvider;

class SmsApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish configuration file to the main Laravel app
        $this->publishes([
            __DIR__ . '/../config/smsbase.php' => config_path('smsbase.php'),
        ], 'config');
    }

    public function register()
    {
        // Bind the SmsApi class to the service container
        $this->app->singleton('smsapi', function () {
            return new SmsApi;
        });
    }
}
