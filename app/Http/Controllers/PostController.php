<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    // Mostra el listado de posts
    public function index()
    {
        $productos = [
            [
                'nombre' => 'Producto 1',
                'descripcion' => 'Descripcion del producto 1',
                'precio' => 100
            ],
            [
                'nombre' => 'Producto 2',
                'descripcion' => 'Descripcion del producto 2',
                'precio' => 200
            ],
            [
                'nombre' => 'Producto 3',
                'descripcion' => 'Descripcion del producto 3',
                'precio' => 300
            ]
        ];

        return view('post.index', compact('productos'));
    }
    // Muestra un formulario para crear un nuevo post
    public function create()
    {
        return view('post.create');
    }
    // Procesa el formulario para crear un nuevo post
    public function store()
    {
        return "Aqui se procesa el formulario para crear un nuevo post";
    }
    // Muestra un post específico
    public function show($post)
    {
        return view('post.show', compact('post'));//crea un array asociativo a partir de variables.
    }
    // Muestra un formulario para editar un post específico
    public function edit($post)
    {
        return view('post.edit', compact('post'));
    }
    // Procesa el formulario para actualizar un post específico
    public function update($post){
        return "Aqui se procesa el formulario para actualizar el post: " . $post;
    }
    // Procesa la solicitud para eliminar un post específico
    public function destroy($post)
    {
        return "Aqui se elimina el post: " . $post;
    }
}
