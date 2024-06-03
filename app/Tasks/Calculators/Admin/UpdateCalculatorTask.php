<?php

namespace App\Tasks\Calculators\Admin;

use App\Models\Calculator;
use Illuminate\Database\Eloquent\Model;

class UpdateCalculatorTask
{
    public function run(array $payload, int $id): Model
    {
        $calculator = Calculator::query()->findOrFail($id);
        $calculator->update($payload);

        return $calculator;
    }
}
