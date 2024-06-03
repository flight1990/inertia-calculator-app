<?php

namespace App\Actions\Faq\Guest;

use App\Tasks\Faq\Guest\GetFaqsTask;
use Illuminate\Database\Eloquent\Collection;

class GetFaqsAction
{
    public function __construct(
        protected GetFaqsTask $getFaqsTask
    )
    {
    }

    public function run(?array $params = []): Collection
    {
        return $this->getFaqsTask->run($params);
    }
}
