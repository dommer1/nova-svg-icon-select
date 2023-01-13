<?php

namespace Dommer1\NovaSVGIconSelect;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config.php' => config_path('nova-svg-icon.php'),
        ], 'nova-icon-config');

        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-svg-icon-select', __DIR__.'/../dist/js/field.js');
            Nova::style('nova-svg-icon-select', __DIR__.'/../dist/css/field.css');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config.php', 'nova-svg-icon');
    }

}
