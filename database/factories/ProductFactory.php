<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name,
            'description' => $this->faker->sentence(),
            'price' => rand(99,99999),
            'image' => $this->faker->imageUrl,
            'stocked' => rand(0,50),
            'status' => $this->faker->randomElement([true, false]),
        ];
    }
}
