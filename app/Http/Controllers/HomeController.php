<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*public function index()
    {
        return "Retorna la vista 'home' al acceder a la ruta raíz";
    }*/

    // Maneja la solicitud para la ruta raíz, se usa el método __invoke cuando solo se usara un metodo para la ruta
    public function __invoke()
    {
        return "Retorna la vista 'home' al acceder a la ruta raíz";
    }
}
