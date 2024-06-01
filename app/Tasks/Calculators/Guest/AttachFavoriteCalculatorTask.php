<?php

namespace App\Tasks\Calculators\Guest;

use Illuminate\Support\Facades\Auth;

class AttachFavoriteCalculatorTask
{
    public function run(int $id): void
    {
        Auth::user()->favoriteCalculators()->attach($id);
    }
}
