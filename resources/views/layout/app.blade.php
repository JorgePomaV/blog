<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mi App' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <header>
        <h1>Mi Aplicación</h1>
        <nav>
            <a href="/">Inicio</a>
            <a href="/productos">Productos</a>
        </nav>
    </header>

    <div class="container mx-auto py-12">
        <h1>Componente de clases: llevan una clase y vista</h1>
        <x-alert class="mb-12" type="success">
            <x-slot name="title">
                Titulo de prueba
            </x-slot>
            Hola mundo!
        </x-alert>

        {{ $slot }} {{-- Aquí se inyecta el contenido de cada vista --}}
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Mi App</p>
    </footer>
</body>
</html>
