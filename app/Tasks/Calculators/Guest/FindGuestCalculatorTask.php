<?php

namespace App\Tasks\Calculators\Guest;

use App\Models\Calculator;
use Illuminate\Database\Eloquent\Model;

class FindGuestCalculatorTask
{
    public function run(string $slug, ?int $userId = null): Model
    {
        return Calculator::query()
            ->where('slug', $slug)
            ->when(!empty($userId), function ($q) use ($userId) {
                $q->withCount(['favoriteUsers' => function ($q) use ($userId) {
                    $q->where('user_id', $userId);
                }]);
            })
            ->firstOrFail();
    }
}
