<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory; //Importo la clase base Factory de Laravel

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected $model = \App\Models\Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //Utilizo la biblioteca Faker para generar datos aleatorios
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'stock' => $this->faker->numberBetween(1, 50),
            'image' => $this->faker->imageUrl(640, 480, 'products', true),
        ];
    }
}
