<?php

namespace App\Actions\Seo\Admin;

use App\Tasks\Seo\Admin\GetSeoTask;
use Illuminate\Pagination\LengthAwarePaginator;

class GetSeoAction
{
    public function __construct(
        protected GetSeoTask $getSeoTask,
    )
    {
    }

    public function run(array $params = []): LengthAwarePaginator
    {
        return $this->getSeoTask->run($params);
    }
}
