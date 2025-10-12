<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HasOneOfMany\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'product_number' => $this->faker->ean8(),
            'amount' => $this->faker->numberBetween(100, 999),
            'customer_id' => Customer::factory(),
        ];
    }
}
