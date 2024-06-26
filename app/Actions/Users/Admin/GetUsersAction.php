<?php

namespace App\Actions\Users\Admin;

use App\Tasks\Users\Admin\GetUsersTask;
use Illuminate\Pagination\LengthAwarePaginator;

class GetUsersAction
{
    public function __construct(
        protected GetUsersTask $getUsersTask
    )
    {
    }

    public function run(?array $params = []): LengthAwarePaginator
    {
        return $this->getUsersTask->run($params);
    }
}
