<?php

namespace Rjvandoesburg\Apixu;

use Illuminate\Support\ServiceProvider;
use Rjvandoesburg\Apixu\Facades\Apixu;

class ApixuServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $path = app('path.config').'/apixu.php';

        $this->publishes([
            __DIR__.'/../config/apixu.php' => $path,
        ]);
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ApixuClient::class, function ($app) {
            return new ApixuClient($app->make(\Illuminate\Cache\Repository::class));
        });

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Apixu', Apixu::class);

        $this->mergeConfigFrom(
            __DIR__.'/../config/apixu.php', 'apixu'
        );
    }
}