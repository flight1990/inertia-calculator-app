<?php

namespace App\Actions\Calculators\Guest;

use App\Tasks\Calculators\GetGuestFavoritesCalculatorsTask;
use Illuminate\Database\Eloquent\Collection;

class GetFavoritesCalculatorsAction
{
    public function __construct(
        protected GetGuestFavoritesCalculatorsTask $getGuestFavoritesCalculatorsTask
    )
    {
    }

    public function run(): Collection
    {
        return $this->getGuestFavoritesCalculatorsTask->run();
    }
}
