<?php

namespace App\Actions\Faq\Admin;

use App\Tasks\Faq\Admin\GetFaqsTask;
use Illuminate\Pagination\LengthAwarePaginator;

class GetFaqsAction
{
    public function __construct(
        protected GetFaqsTask $getFaqsTask
    )
    {
    }

    public function run(?array $params = []): LengthAwarePaginator
    {
        return $this->getFaqsTask->run($params);
    }
}
