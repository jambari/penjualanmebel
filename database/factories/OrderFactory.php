<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->randomNumber(8),
            'total_price' => $this->faker->numberBetween(25000, 200000),
            'payment_status' => 1,
            'item_name' => $this->faker->text(15),
            'item_price' => $this->faker->numberBetween(25000, 200000),
            'customer_name' => $this->faker->text(20),
            'customer_email' => $this->faker->text(20),
            'customer_phone' => $this->faker->randomNumber(8)
        ];
    }
}
