<?php

namespace Lopatin96\LaraEnum;

use Illuminate\Support\ServiceProvider;

class LaraEnumServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/lara-enum.php', 'lara-enum'
        );
    };

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/lara-enum.php' => config_path('lara-enum.php'),
        ], 'lara-enum-config');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'lara-enum');

        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('vendor/lara-enum'),
        ], 'lara-enum-lang');

    }
}
