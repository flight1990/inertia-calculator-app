<?php

namespace App\Tasks\Calculators;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class GetGuestFavoritesCalculatorsTask
{
    public function run(): Collection
    {
        return Auth::user()->favoriteCalculators()->get();
    }
}
