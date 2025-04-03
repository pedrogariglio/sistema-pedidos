<div class="bg-white w-64 shadow-lg fixed h-full z-20 transition-transform duration-300 ease-in-out" id="sidebar">
    <div class="p-4 border-b">
        <h1 class="text-xl font-semibold text-gray-800">Orders System</h1>
    </div>

    <!-- Menú de navegación -->
    <nav class="mt-4 px-2">
        <h2 class="text-lg font-semibold text-gray-700 px-2 mb-2">Admin</h2>
        <ul class="space-y-1">
            <li><a href="{{ url('/dashboard') }}" class="block px-2 py-2 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 rounded">Home</a></li>
            <li><a href="{{ route('orders.index')}}" class="block px-2 py-2 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 rounded">Orders</a></li>
            <li><a href="{{ route('products.index') }}" class="block px-2 py-2 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 rounded">Catalog</a></li>   
            <li><a href="#" class="block px-2 py-2 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 rounded">Status</a></li>                
            <li><a href="#" class="block px-2 py-2 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 rounded">Suppliers</a></li>
            <li><a href="#" class="block px-2 py-2 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 rounded">Reports</a></li>
            <li><a href="#" class="block px-2 py-2 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 rounded">Settings</a></li>
            <li><a href="#" class="block px-2 py-2 text-gray-600 hover:bg-indigo-50 hover:text-indigo-600 rounded">Manage access</a></li>
        </ul>
    </nav>

    <!-- Versión del sistema -->
    <div class="absolute bottom-0 w-full p-4 border-t">
        <p class="text-sm text-gray-500">Versión 1.0</p>
    </div>
</div>