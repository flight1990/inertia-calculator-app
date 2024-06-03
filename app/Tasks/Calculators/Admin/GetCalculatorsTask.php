<?php

namespace App\Tasks\Calculators\Admin;

use App\Models\Calculator;
use Illuminate\Pagination\LengthAwarePaginator;

class GetCalculatorsTask
{
    public function run(?array $params = []): LengthAwarePaginator
    {
        return Calculator::query()
            ->paginate($params['limit'] ?? 10);
    }
}
