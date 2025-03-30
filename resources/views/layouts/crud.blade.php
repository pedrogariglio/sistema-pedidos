<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión') | Sistema Pedidos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Estilos para dropdown responsive */
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-btn {
            background: #3b82f6;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            cursor: pointer;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.1);
            z-index: 1;
            border-radius: 0.25rem;
        }
        .dropdown-content a {
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem;
            color: #4b5563;
        }
        .dropdown-content a:hover {
            background-color: #f3f4f6;
        }
        .icon {
            width: 1rem;
            height: 1rem;
            margin-right: 0.5rem;
        }
        /* Estilos para tablas responsive */
        @media (max-width: 768px) {
            td[data-label]::before {
                content: attr(data-label);
                font-weight: bold;
                display: inline-block;
                width: 6rem;
            }
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50">
    <!-- Cabecera mejorada -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        @yield('header-title', 'Panel de Gestión')
                    </h1>
                    @hasSection('header-subtitle')
                    <p class="text-sm text-gray-500 mt-1">
                        @yield('header-subtitle')
                    </p>
                    @endif
                </div>
                
                <div class="flex flex-col sm:flex-row gap-3">
                    @hasSection('header-actions')
                        @yield('header-actions')
                    @endif
                    <a href="{{ route('dashboard') }}" 
                       class="flex items-center justify-center text-blue-600 hover:text-blue-800 text-sm bg-blue-50 px-3 py-1 rounded">
                        ← Volver al Dashboard
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="container mx-auto px-4 py-6">
        @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
            <p>{{ session('success') }}</p>
        </div>
        @endif
        
        @yield('content')
    </main>

    <!-- Footer simplificado -->
    <footer class="bg-white border-t py-4 text-center text-sm text-gray-500">
        DataBasePG. All rights reserved. &copy;{{ date('Y') }}  - Versión 1.0
    </footer>

    <!-- Scripts para funcionalidad -->
    <script>
        // Función para dropdowns
        function toggleDropdown(orderId) {
            const dropdown = document.getElementById(`myDropdown${orderId}`);
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }

        // Cerrar dropdowns al hacer click fuera
        window.onclick = function(event) {
            if (!event.target.matches('.dropdown-btn')) {
                const dropdowns = document.getElementsByClassName("dropdown-content");
                for (let i = 0; i < dropdowns.length; i++) {
                    dropdowns[i].style.display = "none";
                }
            }
        }

        // Ordenamiento por select
        document.addEventListener('DOMContentLoaded', function() {
            const sortSelects = document.querySelectorAll('select[id^="sort_"]');
            sortSelects.forEach(select => {
                select.addEventListener('change', function() {
                    window.location.href = this.value;
                });
            });
        });
    </script>
    @stack('scripts')
</body>
</html>