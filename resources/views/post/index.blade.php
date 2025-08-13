<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .color-rojo {
            color: red;
        }
        .color-verde {
            color: green;
        }
    </style>
</head>
<body>
    <h1>Aqui se mostrara el listado de Posts</h1>
    @php
        $valor = true;
    @endphp
    @if($valor == true)
        <p>El valor es verdadero</p>
    @endif

   <p>@php
   echo $globalVariable
   @endphp</p>
    
    
    @if(isset($globalVariable2))
        <p>{{ $globalVariable2 }}</p>
    @else
        <p>La  variable globalVariable2 solo se puede ver en la vista de welcome</p>
    @endif


    @forelse ($productos as $producto)
        <h2 @class(['color-verde'=>$loop->first, 'color-rojo'=>$loop->last])>{{ $producto['nombre'] }}</h2>
        <p>{{ $producto['descripcion'] }}</p>
        <p>Precio: ${{ $producto['precio'] }}</p>
    @empty
        <p>No hay productos disponibles.</p>
    @endforelse




    










</body>
</html>