<?php
namespace App\View\Composers;

use Illuminate\View\View;

// Este es un ejemplo de un View Composer que se puede usar para compartir datos con una vista específica y 
// hacer logica con base de datos o cualquier otra fuente de datos para no llenar de codigo el provider
class CompanyComposer
{
    public function compose(View $view)
    {
        // Aquí puedes agregar lógica para compartir datos con la vista
        $view->with('globalVariable2', 'Este dato viene del CompanyComposer');
    }
}
