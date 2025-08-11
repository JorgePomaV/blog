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
     * Bootstrap any application services. traduccion: Inicializa cualquier servicio de la aplicación.
     * Aquí se pueden definir patrones globales para las rutas, como por ejemplo, un patrón
     * que acepte solo números para un parámetro específico.
     * Esto evita tener que definir el patrón en cada ruta individualmente.
     * En este caso, se define un patrón global para el parámetro 'id' que acepta solo números.
     * Esto significa que cualquier ruta que tenga un parámetro 'id' será validated
     * y si el parámetro no es un número, la ruta no será accesible
     * Esto es útil para evitar errores y asegurar que las rutas reciban los parámetros correctos
     * Además, se pueden definir patrones para otros parámetros si es necesario.
     * Por ejemplo, si se quiere que un parámetro de tipo string solo acepte letras, se puede definir un patrón global para ese parámetro.
     * Esto ayuda a mantener la consistency en las rutas
     * y a evitar errores comunes en la definición de rutas.
     * Además, se pueden definir patrones para otros parámetros si es necesario.
     */
    public function boot(): void
    {
        Route::pattern('id', '[0-9]+'); // Define a global pattern for 'id' parameter

        // Define global resource verbs (cambia los nombres de los verbos que estan definidos en la ruta)
        Route::resourceVerbs([
            'create' => 'crear',
            'edit' => 'editar',
        ]);
    }
}
