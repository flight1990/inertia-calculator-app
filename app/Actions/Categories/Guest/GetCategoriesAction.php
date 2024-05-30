<?php

namespace App\Actions\Categories\Guest;

use App\Tasks\Categories\Guest\GetCategoriesTask;
use Illuminate\Database\Eloquent\Collection;

class GetCategoriesAction
{
    public function __construct(
        protected GetCategoriesTask $getGuestCategoriesTask
    )
    {
    }

    public function run(): Collection
    {
        return $this->getGuestCategoriesTask->run();
    }
}
