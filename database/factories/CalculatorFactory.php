<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calculator>
 */
class CalculatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = ucfirst($this->faker->words(rand(1,3), true));

        return [
            'name' => $name,
            'seo_title' => $name,
            'seo_description' => $this->faker->words(10, true),
            'seo_keywords' => $this->faker->words(10, true),
            'description' => $this->faker->realText(750),
            'category_id' => Category::query()->inRandomOrder()->value('id')
        ];
    }
}
