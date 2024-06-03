<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = ucfirst($this->faker->words(rand(1,3), true));

        return [
            'name' => $name,
        ];
    }
}
