<?php
namespace Database\Seeders;

use App\Models\{Product, Order, OrderItem};
use Illuminate\Database\Seeder;

/**
 * DatabaseSeeder: Clase principal para poblar la base de datos con datos de prueba
 * Este seeder crea productos y órdenes con sus respectivos items para testing
 */
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // SECCIÓN 1: CREACIÓN DE PRODUCTOS
        // Genera 10 productos utilizando la factory de Product
        // Cada producto tendrá valores aleatorios según lo definido en ProductFactory
        // Estos productos servirán como catálogo base para crear las órdenes
        Product::factory(10)->create();

        // SECCIÓN 2: CREACIÓN DE ÓRDENES Y SUS ITEMS
        Order::factory(5)  // Crear 5 órdenes
            ->has(         // Establece una relación "has many" con OrderItem
                OrderItem::factory(3)  // Cada orden tendrá 3 items
                    ->state(function (array $attributes, Order $order) {
                        // Para cada item, seleccionamos un producto al azar
                        // inRandomOrder() mezcla los productos y first() toma el primero
                        $product = Product::inRandomOrder()->first();
                        
                        // Definimos los valores específicos para cada item:
                        return [
                            'product_id' => $product->id,    // ID del producto seleccionado
                            'price' => $product->price,      // Precio actual del producto
                            'quantity' => fake()->numberBetween(1, 5), // Cantidad aleatoria entre 1 y 5
                        ];
                    }),
                'items'    
            )->create();   // Ejecuta la creación de las órdenes con sus items
    }
}