<?php

namespace App\Actions\Categories\Admin;

use App\Tasks\Categories\Admin\GetPaginatedCategoriesTask;
use Illuminate\Pagination\LengthAwarePaginator;

class GetPaginatedCategoriesAction
{
    public function __construct(
        protected GetPaginatedCategoriesTask $getPaginatedCategoriesTask
    )
    {
    }

    public function run(?array $params = []): LengthAwarePaginator
    {
        return $this->getPaginatedCategoriesTask->run($params);
    }
}
