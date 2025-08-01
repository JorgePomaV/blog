<?php

namespace App\Providers;

// este archivo es parte de la configuracion de Laravel, aqui se pueden definir patrones globales para las rutas
// por ejemplo, si se quiere que todas las rutas que tengan un parametro id acepten solo numeros, se puede definir un patron global para el parametro id
// esto evita tener que definir el patron en cada ruta individualmente
// en este caso, se define un patron global para el parametro id que acepta solo numeros
// esto significa que cualquier ruta que tenga un parametro id sera validada
// y si el parametro no es un numero, la ruta no sera accesible
// esto es util para evitar errores y asegurar que las rutas reciban los parametros correctos
// ademas, se pueden definir patrones para otros parametros si es necesario
// por ejemplo, si se quiere que un parametro de tipo string solo acepte letras, se puede definir un patron global para ese parametro
// esto ayuda a mantener la consistencia en las rutas
// y a evitar errores comunes en la definicion de rutas
// ademas, se pueden definir patrones para otros parametros si es necesario
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

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
        Route::pattern('id', '[0-9]+'); // Define a global pattern for 'id' parameter
    }
}
