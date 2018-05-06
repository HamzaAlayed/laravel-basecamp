<?php

namespace DeveloperH\Basecamp\Providers;

use App;
use DeveloperH\Basecamp\Basecamp;
use Illuminate\Support\ServiceProvider;

class BasecampServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(
            [__DIR__ . '/../../config/basecamp.php' => config_path('basecamp.php')],
            'basecamp-config'
        );

        $this->publishes(
            [__DIR__ . '/../../migrations' => database_path('migrations')],
            'basecamp-migrations'
        );

        $this->publishes(
            [__DIR__ . '/../../resources/views' => resource_path('views/vendor/basecamp')],
            'basecamp-views'
        );

        $this->publishes(
            [__DIR__ . '/../../resources/translations' => resource_path('lang/vendor/basecamp')],
            'basecamp-translations'
        );

        $this->publishes([
            __DIR__ . '/../../resources/assets' => public_path('vendor/basecamp'),
        ], 'basecamp-assets');

        $this->loadMigrationsFrom(__DIR__ . '/../../migrations');
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/translations', 'basecamp');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'basecamp');

        if ($this->app->runningInConsole()) {
            $this->commands([
               // FooCommand::class,
              //  BarCommand::class,
            ]);
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/basecamp.php', 'basecamp');

        App::bind('Basecamp', function () {
            return new Basecamp();
        });
    }

    public function provides()
    {
        return ['basecamp'];
    }
}
