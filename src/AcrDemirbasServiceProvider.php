<?php

namespace Acr\Demirbas;

use Illuminate\Support\ServiceProvider;


class AcrDemirbasServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadViewsFrom(__DIR__ . '/Views', 'acr_views');
        $this->publishes([
            __DIR__ . '/../config/demirbas_config.php' => config_path('demirbas_config.php'),
        ]);
        require __DIR__ . '/Routes/routes.php';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('acr-demirbas', function () {
            return new demirbas();
        });
        config([
            '/../config/demirbas_config.php',
        ]);
    }

}
