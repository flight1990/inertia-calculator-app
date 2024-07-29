<?php

namespace App\Tasks\Calculators\Guest;

use App\Models\Calculator;
use Illuminate\Database\Eloquent\Collection;

class GetCalculatorsByUuidTask
{
    public function run(array $uuid): Collection
    {
        return Calculator::query()
            ->whereIn('uuid', $uuid)
            ->get();
    }
}
