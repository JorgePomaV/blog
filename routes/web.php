<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return "hola desde la pagina principal";
});


// Rutas para un CRUD (Create, Read, Update, Delete)

// Ruta para mostrar el listado de registros

Route::get('/posts', function () {
    return "Hola desde la pagina de posts";
});
 
// Ruta para mostrar un formulario para crear un nuevo registro

Route::get('/posts/create', function () {
    return "Aqui se muestra el formulario para crear un nuevo post";
});
// Ruta para guardar un nuevo registro

Route::post('/posts', function () {
    return "Aqui se procesa el formulario para crear un nuevo post";
});
// Ruta para mostrar un registro en especifico

Route::get('/posts/{post}', function ($post) {
    return "Aqui se muestra la informacion del: " . $post;
}); 

// Ruta para mostrar un formulario para editar un registro en especifico

Route::get('/posts/{post}/edit', function ($post) {
    return "Aqui se muestra el formulario para editar el post: " . $post;
});

// Ruta para actualizar un registro en especifico

Route::put('/posts/{post}', function ($post) {
    return "Aqui se procesa el formulario para actualizar el post: " . $post;
});

// Ruta para eliminar un registro en especifico

Route::delete('/posts/{post}', function ($post) {
    return "Aqui se elimina el post: " . $post;
});

























/*

// Rutas de ejemplo para mostrar la definicion de nombres y parametros de rutas con patrones

Route::get('/', function () {
    //return route('cursos.informacion');
    return route('cursos.show', ['id' => 5]);// para rutas con parametros hay que pasar un array con el nombre del parametro y su valor
    //return view('welcome');
});

Route::get('/contacto', function () {
    return "hola desde la pagina contacto";
});

Route::get('/cursos/informacion', function () {
    return "aqui se muestra la informacion del curso";
})->name('cursos.informacion'); // Definimos un nombre para la ruta para poder referenciarla más fácilmente en el código

Route::get('/cursos/{id}', function ($id) {
    return "aqui se muestra la informacion del curso con id: " . $id;
})->name('cursos.show'); // Definimos un nombre para la ruta con el id del curso


*/


















// Rutas de ejemplo para demostrar el uso de patrones y parámetros en Laravel

/*



//Expresiones regulares en las rutas

route::get('/cursos/{curso}', function ($curso) {
    return "hola desde la pagina contacto desde el metodo GET";
})->where('curso', '[0-9]+'); // solo acepta numeros en el parametro curso

route::post('/contactos/{contacto}', function ($contacto) {
    return "hola desde la pagina contacto desde el metodo POST";
})->whereAlpha('contacto'); // solo acepta letras en el parametro contacto

route::get('/contacto/{contacto}', function ($contacto) {
    return "hola desde la pagina contacto desde el metodo GET y el contacto es: " . $contacto;
})->whereIn('contacto', ['contacto1', 'contacto2']); // solo acepta los valores contacto1 y contacto2


route::get('/libros/{id}', function ($id) {
    return "hola desde la pagina libros y el id es: " . $id;
}); //en provider se ha definido un patron global para el id, por lo que no es necesario definirlo aqui





// esto es una ruta que acepta tanto GET como POST para la misma URL y no es necesario definir dos rutas separadas
route::match(['get', 'post'], '/contacto', function () {
    return "hola desde la pagina contacto desde el metodo GET y POST";
});

// ruta con un parametro que se le pasa a la URL(rutas con parametros variables)
/*route::get('/cursos/{curso}', function ($curso) {
    return "hola desde la pagina cursos y el curso es: " . $curso;
});*/

// ruta con un parametro opcional que se le pasa a la URL(si se coloca signo de interrogación al final del nombre del parametro se convierte en opcional)
/*route::get('/cursos/{categorias}/{curso?}', function ($categoria, $curso = null) {
    if ($curso) {
        return "hola desde la categoria: " . $categoria . " y el curso es: " . $curso;
    } else {
        return "hola desde la categoria es: " . $categoria;
    }
});




*/