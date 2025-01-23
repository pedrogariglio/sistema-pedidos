<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Pedidos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 flex flex-col min-h-screen">
    <header class="bg-blue-400 text-white py-4 shadow">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold">@yield("cabecera")</h1>
        </div>
    </header>
    
    <main class="container mx-auto my-6 flex-grow">
        @yield('content')
    </main>
    
    <footer class="bg-gray-600 text-white py-4 mt-6 text-center">
        @yield("pie")
        <p class="text-sm">DataBasePG. Todos los derechos reservados. &copy;2024</p>
    </footer>
</body>
</html>
