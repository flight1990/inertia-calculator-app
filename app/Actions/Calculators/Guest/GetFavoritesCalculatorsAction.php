<?php

namespace App\Actions\Calculators\Guest;

use App\Tasks\Calculators\Guest\GetGuestFavoritesCalculatorsTask;
use Illuminate\Support\Collection;


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
