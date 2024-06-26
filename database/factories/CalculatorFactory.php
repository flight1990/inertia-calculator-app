<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CalculatorFactory extends Factory
{
    public function definition(): array
    {
        $name = ucfirst($this->faker->words(rand(1,3), true));

        return [
            'name' => $name,
            'uuid' => $this->faker->uuid(),
            'description' => $this->faker->realText(750),
            'category_id' => 1
        ];
    }
}
