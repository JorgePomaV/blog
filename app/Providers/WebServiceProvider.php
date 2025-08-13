<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class WebServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
         // Esto es un ejemplo de como se pueden definir verbos globales
        // Se usa para cosas como menús, títulos, configuraciones globales, etc.
        View::share('globalVariable', 'Esta es una variable global compartida entre vistas');
    }
}
