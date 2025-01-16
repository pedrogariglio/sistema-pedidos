<?php

namespace Database\Factories;

use App\Models\{Product, Order};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{

    protected $model = \App\Models\OrderItem::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(), //Genero un Order (pedido) utilizando el factory asociado al modelo Order y asigno su ID al campo order_id
            'product_id' => Product::factory(), //Genero un product (producto) utilizando el factory asociado al modelo Product y asigna su ID al campo product_id
            'quantity' => $this->faker->numberBetween(1, 5),
            'price' => $this->faker->randomFloat(2, 10, 100), //Genero un número aleatorio de 2 decimales comprendido entre 10 y 100
        ];
    }
}
