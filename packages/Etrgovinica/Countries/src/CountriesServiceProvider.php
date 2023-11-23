<?php
namespace Etrgovinica\Countries;

use Illuminate\Support\ServiceProvider;

class CountriesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/countries.php' => config_path('countries.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/countries.php', 'countries'
        );
    }
}