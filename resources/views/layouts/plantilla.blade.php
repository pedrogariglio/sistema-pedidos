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
    <!-- Wrapper para sidebar y contenido principal -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="bg-white w-64 shadow-lg fixed h-full z-20 transition-transform duration-300 ease-in-out" id="sidebar">
            <!-- Logo/Título -->
            <div class="p-4 border-b">
                <h1 class="text-xl font-semibold text-gray-800">Sistema de Pedidos</h1>
            </div>
            
            <!-- Menú de navegación -->
            <nav class="mt-4">
                <ul>
                    <!-- Inicio - Usando tu ruta raíz -->
                    <li class="mb-1">
                        <a href="{{ url('/') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-400 hover:text-white rounded-lg transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Inicio
                        </a>
                    </li>
                    
                    <!-- Productos - Ya tienes esta ruta resource -->
                    <li class="mb-1">
                        <a href="{{ route('products.index') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-400 hover:text-white rounded-lg transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />
                            </svg>
                            Productos
                        </a>
                    </li>
                    
                    <!-- Órdenes - Ya tienes esta ruta resource -->
                    <li class="mb-1">
                        <a href="{{ route('orders.index') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-400 hover:text-white rounded-lg transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            Órdenes
                        </a>
                    </li>
                    
                    <!-- Reportes - Necesitarás añadir esta ruta -->
                    <li class="mb-1">
                        <a href="{{ url('/reports') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-400 hover:text-white rounded-lg transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            Reportes
                        </a>
                    </li>
                </ul>
            </nav>
            
            <!-- Sección inferior (opciones adicionales) -->
            <div class="absolute bottom-0 w-full border-t pt-2 pb-2">
                <!-- Si no estás usando autenticación de Laravel, puedes eliminar o modificar este enlace -->
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center px-4 py-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Cerrar sesión
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>
        
        <!-- Botón para mostrar/ocultar sidebar en móviles -->
        <div class="md:hidden fixed bottom-4 right-4 z-50">
            <button type="button" id="sidebarToggle" class="p-2 rounded-full bg-blue-400 text-white shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        
        <!-- Contenido principal -->
        <div class="flex-1 flex flex-col md:ml-64">
            <!-- Cabecera -->
            <header class="bg-blue-400 text-white py-4 shadow">
                <div class="container mx-auto px-4">
                    <h1 class="text-2xl font-bold">@yield("cabecera")</h1>
                </div>
            </header>
            
            <!-- Contenido principal -->
            <main class="container mx-auto my-6 px-4 flex-grow">
                @yield('content')
            </main>
            
            <!-- Pie de página -->
            <footer class="bg-gray-600 text-white py-4 mt-6 text-center">
                @yield("pie")
                <p class="text-sm">DataBasePG. All rights reserved. &copy;2025</p>
            </footer>
        </div>
    </div>
    
    <!-- JavaScript para controlar el sidebar responsive -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            
            // Función para verificar ancho de pantalla
            function checkWidth() {
                if (window.innerWidth < 768) { // md breakpoint
                    sidebar.classList.add('-translate-x-full');
                } else {
                    sidebar.classList.remove('-translate-x-full');
                }
            }
            
            // Inicializar
            checkWidth();
            
            // Toggle sidebar en móviles
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('-translate-x-full');
            });
            
            // Ajustar cuando cambia el tamaño de la ventana
            window.addEventListener('resize', checkWidth);
        });
    </script>
</body>
</html>