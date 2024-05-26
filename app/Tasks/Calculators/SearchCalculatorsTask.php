<?php

namespace App\Tasks\Calculators;

use App\Models\Calculator;
use Illuminate\Support\Arr;

class SearchCalculatorsTask
{
    public function run(?string $search = null): array
    {
        return Calculator::search($search ?? "")->raw();
    }
}
