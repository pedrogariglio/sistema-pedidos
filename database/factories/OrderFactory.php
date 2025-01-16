<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{

    protected $model = \App\Models\Order::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), //Genero un usuario ficticio usando el factory asociado al modelo User y asigna su ID al campo user
            'status' => 'processing',
            'total_price' => 0, //Este valor se calculará al agregar los detalles
        ];
    }
}
