<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\post;

// El controlador tiene un metodo __invoke por lo que no se necesita especificar el método
Route::get('/', HomeController::class);
// Grupo de rutas se usa el método group cuando se quiere agrupar varias rutas que comparten un mismo prefijo y nombre, tambien si no tienen la estructura de un crud
Route::prefix('posts')->name('posts.')->controller(PostController::class)
    ->group(function () {
        // Ruta para mostrar el listado de registros
        Route::get('/', 'index')->name('index');

        // Ruta para mostrar un formulario para crear un nuevo registro
        Route::get('/create', 'create')->name('create');

        // Ruta para guardar un nuevo registro
        Route::post('/', 'store')->name('store');

        // Ruta para mostrar un registro en especifico
        Route::get('/{post}', 'show')->name('show');

        // Ruta para mostrar un formulario para editar un registro en especifico
        Route::get('/{post}/edit', 'edit')->name('edit');

        // Ruta para actualizar un registro en especifico
        Route::put('/{post}', 'update')->name('update');

        // Ruta para eliminar un registro en especifico
        Route::delete('/{post}', 'destroy')->name('destroy');
    });









// Rutas para un CRUD (Create, Read, Update, Delete)
// Ruta para mostrar el listado de registros
/*
Route::get('/posts', [PostController::class, 'index'])
        ->name('posts.index'); // Definimos un nombre para la ruta para poder referenciarla más fácilmente en el código. Convención: nombre de la ruta en plural y con el sufijo .index

// Ruta para mostrar un formulario para crear un nuevo registro
Route::get('/posts/create', [PostController::class, 'create'])
        ->name('posts.create'); // Definimos un nombre para la ruta para poder referenciarla más fácilmente en el código. Convención: nombre de la ruta en plural y con el sufijo .create

// Ruta para guardar un nuevo registro
Route::post('/posts', [PostController::class, 'store'])
        ->name('posts.store'); // Definimos un nombre para la ruta para poder referenciarla más fácilmente en el código. Convención: nombre de la ruta en plural y con el sufijo .store

// Ruta para mostrar un registro en especifico
Route::get('/posts/{post}', [PostController::class, 'show'])
        ->name('posts.show'); // Definimos un nombre para la ruta para poder referenciarla más fácilmente en el código. Convención: nombre de la ruta en plural y con el sufijo .show

// Ruta para mostrar un formulario para editar un registro en especifico
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
        ->name('posts.edit'); // Definimos un nombre para la ruta para poder referenciarla más fácilmente en el código. Convención: nombre de la ruta en plural y con el sufijo .edit

// Ruta para actualizar un registro en especifico
Route::put('/posts/{post}', [PostController::class, 'update'])
        ->name('posts.update'); // Definimos un nombre para la ruta para poder referenciarla más fácilmente en el código. Convención: nombre de la ruta en plural y con el sufijo .update   

// Ruta para eliminar un registro en especifico
Route::delete('/posts/{post}', [PostController::class, 'destroy'])
        ->name('posts.destroy'); // Definimos un nombre para la ruta para poder referenciarla más fácilmente en el código. Convención: nombre de la ruta en plural y con el sufijo .destroy



*/

// Definición de rutas utilizando el recurso de Laravel para manejar CRUD automáticamente
// Esto crea todas las rutas necesarias para un CRUD de posts
// Las rutas generadas son las siguientes:
// GET /posts - index
// GET /posts/create - create
// POST /posts - store
// GET /posts/{post} - show 

Route::resource('articulos', PostController::class)
    ->parameters(['articulos' => 'post']) // Cambiamos el nombre del parámetro de la ruta a 'post'
    ->names('posts');// Definimos un nombre para la ruta para poder referenciarla más fácilmente en el código. Convención: nombre de la ruta en plural y con el sufijo .index, .create, .store, .show, etc.



















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