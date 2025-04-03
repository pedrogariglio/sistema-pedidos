@extends('layouts.crud')

@section('title', 'Add new purchase order')

@section('crud-content')
    <main class="container mx-auto my-8 px-4 flex-grow">
        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf

                <!-- Sección 1: datos básicos -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold mb-4 border-b pb-2">Order Detail</h2>
                </div>
            </form>

        </div>
    </main>
    
@endsection