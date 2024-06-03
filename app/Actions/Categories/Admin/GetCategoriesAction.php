<?php

namespace App\Actions\Categories\Admin;

use App\Tasks\Categories\Admin\GetCategoriesTask;
use Illuminate\Database\Eloquent\Collection;

class GetCategoriesAction
{
    public function __construct(
        protected GetCategoriesTask $getAdminCategoriesTask
    )
    {
    }

    public function run(?array $params = []): Collection
    {
        return $this->getAdminCategoriesTask->run($params);
    }
}
