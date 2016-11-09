<?php

namespace App\Providers;

use App\Super;
use App\Services\BaseService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('super', Super::getInstance());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Get config, then bind automaticly
        $models = array_keys(config('super.models'));
        foreach ($models as $model) {
            $this->app->singleton(config('super.service_prefix') . $model, function($app) use ($model) {
                return BaseService::getInstance($model);
            });
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array_map(function($value) {
            return config('super.service_prefix') . $value;
        }, array_keys(config('super.models')));
    }
}
