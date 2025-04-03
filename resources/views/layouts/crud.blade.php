@extends('layouts.app')

@section('styles')
    @parent
    @vite(['resources/css/crud.css'])
@endsection

@section('header')
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
                    ← Back to the dashboard
                </a>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
<main class="container mx-auto px-4 py-6">
    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
        <p>{{ session('success') }}</p>
    </div>
    @endif
    
    @yield('crud-content')
</main>
@endsection

@section('footer')
<footer class="bg-white border-t py-4 text-center text-sm text-gray-500">
    DataBasePG. All rights reserved. &copy;{{ date('Y') }} - Versión 1.0
</footer>
@endsection

@section('scripts')
    @parent
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
@endsection