<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'owner' => $this->faker->name(),
            'plate_number' => rand(1, 99),
            'plate_image' => '',
            'travel_fee' => rand(10, 100),
        ];
    }
}
