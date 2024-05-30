<?php

namespace App\Actions\Categories\Admin;

use Illuminate\Pagination\LengthAwarePaginator;

class GetCategoriesAction
{
    public function __construct(
        protected \App\Tasks\Categories\Admin\GetCategoriesTask $getAdminCategoriesTask
    )
    {
    }

    public function run(?array $params = []): LengthAwarePaginator
    {
        return $this->getAdminCategoriesTask->run($params);
    }
}
