<?php

namespace App\Tasks\Calculators\Guest;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class GetGuestFavoritesCalculatorsTask
{
    public function run(): Collection
    {
        return Auth::check() ? Auth::user()->favoriteCalculators()->get() : collect([]);
    }
}
