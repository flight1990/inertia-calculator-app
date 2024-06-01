<?php

namespace App\Tasks\Calculators\Guest;

use App\Models\Calculator;

class SearchCalculatorsTask
{
    public function run(?string $search = null): array
    {
        return Calculator::search($search ?? "")->raw();
    }
}
