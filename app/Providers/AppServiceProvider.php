<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Configurar Carbon en español
        Carbon::setLocale(config('app.locale'));

        // Asegurar zona horaria de Colombia
        date_default_timezone_set(config('app.timezone'));
    }
}
