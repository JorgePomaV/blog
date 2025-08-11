<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return "Retorna la vista 'home' al acceder a la ruta raíz";
    }
}
