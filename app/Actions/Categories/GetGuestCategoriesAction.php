<?php

namespace App\Actions\Categories;

use App\Tasks\Categories\GetGuestCategoriesTask;
use Illuminate\Database\Eloquent\Collection;

class GetGuestCategoriesAction
{
    public function __construct(
        protected GetGuestCategoriesTask $getGuestCategoriesTask
    )
    {
    }

    public function run(): Collection
    {
        return $this->getGuestCategoriesTask->run();
    }
}
