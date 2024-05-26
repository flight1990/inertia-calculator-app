<?php

namespace App\Tasks\Calculators;

use Illuminate\Support\Facades\Auth;

class DetachFavoriteCalculatorTask
{
    public function run(int $id): void
    {
        Auth::user()->favoriteCalculators()->detach($id);
    }
}
