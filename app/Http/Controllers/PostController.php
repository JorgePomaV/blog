<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{


    public function index()
    {
        return view('post.index');
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        return "Aqui se procesa el formulario para crear un nuevo post";
    }

    public function show($post)
    {
        return view('post.show', compact('post'));//crea un array asociativo a partir de variables.
    }
    public function edit($post)
    {
        return view('post.edit', compact('post'));
    }

    public function update($post){
        return "Aqui se procesa el formulario para actualizar el post: " . $post;
    }

    public function destroy($post)
    {
        return "Aqui se elimina el post: " . $post;
    }
}
