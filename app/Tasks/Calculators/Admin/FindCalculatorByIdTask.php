<?php

namespace App\Tasks\Calculators\Admin;

use App\Models\Calculator;
use Illuminate\Database\Eloquent\Model;

class FindCalculatorByIdTask
{
    public function run(int $id): Model
    {
        return Calculator::query()->findOrFail($id);
    }
}
