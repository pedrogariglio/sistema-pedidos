<?php
namespace Database\Seeders;

use App\Models\{Product, Order, OrderItem};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // SECCIÓN 1: CREACIÓN DE 15 PRODUCTOS
        Product::factory(15)->create();

        // SECCIÓN 2: CREACIÓN DE ÓRDENES CON DIFERENTES ESTADOS Y SUS ITEMS
        // Función helper para crear órdenes con items
        $createOrdersWithItems = function($orderFactory) {
            return $orderFactory->has(
                OrderItem::factory(3)
                    ->state(function (array $attributes, Order $order) {
                        $product = Product::inRandomOrder()->first();
                        return [
                            'product_id' => $product->id,
                            'price' => $product->price,
                            'quantity' => fake()->numberBetween(1, 5),
                        ];
                    }),
                'items'
            )->create();
        };

        // Crear 10 órdenes pendientes con items
        $createOrdersWithItems(Order::factory()->count(10)->pending());

        // Crear 10 órdenes completadas con items
        $createOrdersWithItems(Order::factory()->count(10)->completed());

        // Crear 10 órdenes canceladas con items
        $createOrdersWithItems(Order::factory()->count(10)->cancelled());
    }
}