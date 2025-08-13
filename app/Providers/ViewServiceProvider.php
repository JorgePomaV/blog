<?php

namespace App\Providers;

use App\View\Composers\CompanyComposer;
use Faker\Provider\ar_EG\Company;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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

        // Se puede usar View::composer para definir que se cargue en una vista específica
        // Y en caso de que se necesite pasar a 2 o más vistas se puede agregar un Array asociativo con las vistas
        /*View::composer('welcome', function ($view) {
            $view->with('globalVariable2', 'Este es un dato que solo se usa en la vista welcome');
        });*/

        // Usamos una callback de la clase CompanyComposer para compartir datos con la vista welcome
        View::composer('welcome',CompanyComposer::class);

    }
}
