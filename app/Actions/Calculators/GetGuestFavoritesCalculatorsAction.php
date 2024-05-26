<?php

namespace App\Actions\Calculators;

use App\Tasks\Calculators\GetGuestFavoritesCalculatorsTask;
use Illuminate\Database\Eloquent\Collection;

class GetGuestFavoritesCalculatorsAction
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
