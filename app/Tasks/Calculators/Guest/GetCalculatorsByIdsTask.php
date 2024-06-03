<?php

namespace App\Tasks\Calculators\Guest;

use App\Models\Calculator;
use Illuminate\Database\Eloquent\Collection;

class GetCalculatorsByIdsTask
{
    public function run(array $ids): Collection
    {
        return Calculator::query()
            ->whereIn('id', $ids)
            ->get();
    }
}
