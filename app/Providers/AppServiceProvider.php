<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        $appRoot = env('APP_ROOT');
        if (!empty($appRoot)) {
            Livewire::setUpdateRoute(fn ($handle) => Route::post(sprintf("/%s/livewire/update", $appRoot), $handle));
        }

        $appUrl = Config::get('app.url');
        URL::forceRootUrl($appUrl);

        // Check if running on localhost or 127.0.0.1
        if (!in_array(parse_url($appUrl, PHP_URL_HOST), ['localhost', '127.0.0.1'])) {
            if (str_contains($appUrl, 'https://')) {
                URL::forceScheme('https');
            } else {
                URL::forceScheme('http');
            }
        }

        // if (env('APP_ENV') == 'production' || 'prod') {
        //     URL::forceScheme('https');
        // }
    }
}
