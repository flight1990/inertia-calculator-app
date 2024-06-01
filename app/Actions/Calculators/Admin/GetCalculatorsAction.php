<?php

namespace App\Actions\Calculators\Admin;

use App\Tasks\Calculators\Admin\GetCalculatorsTask;
use Illuminate\Pagination\LengthAwarePaginator;

class GetCalculatorsAction
{
    public function __construct(
        protected GetCalculatorsTask $getCalculatorsTask
    )
    {
    }

    public function run(?array $params = []): LengthAwarePaginator
    {
        return $this->getCalculatorsTask->run($params);
    }
}
