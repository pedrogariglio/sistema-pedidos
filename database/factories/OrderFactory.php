<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'status' => $this->faker->randomElement([
                Order::STATUS_PENDING,
                Order::STATUS_COMPLETED,
                Order::STATUS_CANCELLED
            ]),
            'total_price' => 0, // Este valor se calculará al agregar los detalles
        ];
    }

    /**
     * Indicate that the order is pending.
     */
    public function pending(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'status' => Order::STATUS_PENDING
        ]);
    }

    /**
     * Indicate that the order is completed.
     */
    public function completed(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'status' => Order::STATUS_COMPLETED
        ]);
    }

    /**
     * Indicate that the order is cancelled.
     */
    public function cancelled(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'status' => Order::STATUS_CANCELLED
        ]);
    }
}