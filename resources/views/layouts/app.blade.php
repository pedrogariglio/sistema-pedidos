<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema Pedidos')</title>
    @vite(['resources/css/app.css', 'resources/css/dropdown-actions.css', 'resources/js/app.js', 'resources/js/dropdown-actions.js'])
</head>
<body class="bg-gray-100 text-gray-900 flex flex-col min-h-screen">
    <!-- Wrapper principal -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Contenido dinámico -->
        <div class="flex-1 flex flex-col md:ml-64">
            @yield('header')
            
            <main class="container mx-auto my-6 px-4 flex-grow">
                @yield('content')
            </main>

            @yield('footer')
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Código del sidebar responsive
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            
            function checkWidth() {
                if (window.innerWidth < 768) {
                    sidebar.classList.add('-translate-x-full');
                } else {
                    sidebar.classList.remove('-translate-x-full');
                }
            }
            
            checkWidth();
            
            sidebarToggle?.addEventListener('click', function() {
                sidebar.classList.toggle('-translate-x-full');
            });
            
            window.addEventListener('resize', checkWidth);
        });
    </script>
</body>
</html>