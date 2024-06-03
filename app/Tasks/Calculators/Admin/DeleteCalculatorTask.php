<?php

namespace App\Tasks\Calculators\Admin;

use App\Models\Calculator;

class DeleteCalculatorTask
{
    public function run(int $id): void
    {
        $calculator = Calculator::query()->findOrFail($id);
        $calculator->delete();
    }
}
