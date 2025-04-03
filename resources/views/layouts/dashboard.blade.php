@extends('layouts.app')

@section('header')
<header class="bg-white py-4 shadow-sm">
    <div class="container mx-auto px-4">
        <h1 class="text-xl font-bold text-gray-800">Control Panel</h1>
    </div>
</header>
@endsection

@section('content')
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
@endsection

@section('footer')
    <!-- Pie de página  -->
    <footer class="bg-white py-4 text-center border-t">
        <p class="text-sm text-gray-500">DataBasePG. All rights reserved. &copy;{{ date('Y') }}</p>
    </footer>
@endsection