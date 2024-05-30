<?php

namespace App\Actions\Categories\Admin;

use App\Tasks\Categories\Admin\GetCategoriesTask;
use Illuminate\Pagination\LengthAwarePaginator;

class GetCategoriesAction
{
    public function __construct(
        protected GetCategoriesTask $getAdminCategoriesTask
    )
    {
    }

    public function run(?array $params = []): LengthAwarePaginator
    {
        return $this->getAdminCategoriesTask->run($params);
    }
}
