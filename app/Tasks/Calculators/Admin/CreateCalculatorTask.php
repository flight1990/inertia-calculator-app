<?php

namespace App\Tasks\Calculators\Admin;

use App\Models\Calculator;
use Illuminate\Database\Eloquent\Model;

class CreateCalculatorTask
{
    public function run(array $paload): Model
    {
        return Calculator::create($paload);
    }
}
