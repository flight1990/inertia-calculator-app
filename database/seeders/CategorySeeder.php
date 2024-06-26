<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'name' => 'Математические калькуляторы',
            'icon' => '<i class="bi bi-percent"></i>'
        ]);

        Category::factory()->create([
            'name' => 'Финансовые калькуляторы',
            'icon' => '<i class="bi bi-coin"></i>'
        ]);

        Category::factory()->create([
            'name' => 'Калькуляторы для здоровья',
            'icon' => '<i class="bi bi-heart-pulse-fill"></i>'
        ]);
    }
}
