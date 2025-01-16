<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Pedidos</title>

</head>
<body>
    <div class="cabecera">
        <div class="titulo">
            @yield("cabecera")
        </div>
    </div>
    
    <!-- Contenido principal -->
    <main>
        @yield('content')
    </main>
    
    <div class="pie">
        @yield("pie")
        DataBasePG. Todos los derechos reservados. &copy;2024
    </div>
</body>
</html>
