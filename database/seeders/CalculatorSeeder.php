<?php

namespace Database\Seeders;

use App\Models\Calculator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalculatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Calculator::factory()->create([
            'name' => 'Калькулятор процентов',
            'category_id' => 1
        ]);

        Calculator::factory()->create([
            'name' => 'Калькулятор веса',
            'category_id' => 3
        ]);

        Calculator::factory()->create([
            'name' => 'Кредитный калькулятор',
            'category_id' => 2
        ]);
    }
}
