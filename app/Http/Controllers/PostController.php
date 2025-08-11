<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{


    public function index()
    {
        return "Hola desde la pagina de posts";
    }

    public function create()
    {
        return "Aqui se muestra el formulario para crear un nuevo post";
    }

    public function store()
    {
        return "Aqui se procesa el formulario para crear un nuevo post";
    }

    public function show($post)
    {
        return "Aqui se muestra el post: " . $post;
    }
    public function edit($post)
    {
        return "Aqui se muestra el formulario para editar el post: " . $post;
    }

    public function update($post){
        return "Aqui se procesa el formulario para actualizar el post: " . $post;
    }

    public function destroy($post)
    {
        return "Aqui se elimina el post: " . $post;
    }
}
