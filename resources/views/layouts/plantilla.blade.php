<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Pedidos</title>
    @vite(['resources/css/app.css', 'resources/css/dropdown-actions.css', 'resources/js/app.js', 'resources/js/dropdown-actions.js'])
</head>
<body class="bg-gray-100 text-gray-900 flex flex-col min-h-screen">
    <!-- Wrapper para sidebar y contenido principal -->
    <div class="flex min-h-screen">
        <!-- Sidebar (Actualizado según tu captura) -->
        <div class="bg-white w-64 shadow-lg fixed h-full z-20 transition-transform duration-300 ease-in-out" id="sidebar">
            <!-- Logo/Título -->
            <div class="p-4 border-b">
                <h1 class="text-xl font-semibold text-gray-800">Sistema Pedidos</h1>
            </div>
            
            <!-- Menú de navegación (Estilo de tu captura) -->
            <nav class="mt-4 px-2">
                <h2 class="text-lg font-semibold text-gray-700 px-2 mb-2">Admin</h2>
                <ul class="space-y-1">
                    <li><a href="#" class="block px-2 py-2 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 rounded">Status</a></li>
                    <li><a href="#" class="block px-2 py-2 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 rounded">Nº 0000</a></li>
                    <li><a href="{{ url('/dashboard') }}" class="block px-2 py-2 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 rounded">Início</a></li>
                    <li><a href="#" class="block px-2 py-2 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 rounded">Positiva</a></li>
                    <li><a href="{{ route('products.index') }}" class="block px-2 py-2 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 rounded">Catálogo</a></li>
                    <li><a href="#" class="block px-2 py-2 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 rounded">Proveedores</a></li>
                    <li><a href="#" class="block px-2 py-2 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 rounded">Reportes</a></li>
                    <li><a href="#" class="block px-2 py-2 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 rounded">Configuración</a></li>
                    <li><a href="#" class="block px-2 py-2 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 rounded">Administrar accesos</a></li>
                </ul>
            </nav>
            
            <!-- Versión del sistema -->
            <div class="absolute bottom-0 w-full p-4 border-t">
                <p class="text-sm text-gray-500">Versión 1.0</p>
            </div>
        </div>
        
        <!-- Contenido principal (Ajustado al diseño de tu captura) -->
        <div class="flex-1 flex flex-col md:ml-64">
            <!-- Cabecera simplificada -->
            <header class="bg-white py-4 shadow-sm">
                <div class="container mx-auto px-4">
                    <h1 class="text-xl font-bold text-gray-800">Panel de Control</h1>
                </div>
            </header>
            
            <!-- Contenido principal -->
            <main class="container mx-auto my-6 px-4 flex-grow">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Sección de Últimos Pedidos -->
                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-semibold">Últimos pedidos</h2>
                            <button class="text-gray-400 hover:text-gray-600">×</button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">N°</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Proveedor</th>
                                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Fecha</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <!-- Ejemplo estático (reemplazar con datos reales) -->
                                    <tr>
                                        <td class="px-4 py-3">12/02</td>
                                        <td class="px-4 py-3">Free</td>
                                        <td class="px-4 py-3">18:43:2025</td>
                                    </tr>
                                    <!-- Más filas... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Sección de Nuevos Productos -->
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h2 class="text-lg font-semibold mb-4">Nuevos productos</h2>
                        <div class="space-y-3">
                            <div class="flex justify-between border-b pb-2">
                                <span class="font-medium">Total</span>
                                <span>€65,00</span>
                            </div>
                            <ul class="space-y-2">
                                <li class="py-1">Monitor 24 75 Hz</li>
                                <li class="py-1">Pad silicone</li>
                                <li class="py-1">Mechanical Keyboard</li>
                                <!-- Más productos... -->
                            </ul>
                            <div class="pt-2 mt-2 border-t">
                                <a href="{{ route('products.index') }}" class="text-indigo-600 hover:text-indigo-800">Ver todos los productos →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            
            <!-- Pie de página (como en tu captura) -->
            <footer class="bg-white py-4 text-center border-t">
                <p class="text-sm text-gray-500">DataBasePG. All rights reserved. &copy;{{ date('Y') }}</p>
            </footer>
        </div>
    </div>
    
    <!-- JavaScript para el sidebar responsive (se mantiene igual) -->
    <script>
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