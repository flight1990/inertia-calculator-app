<?php

namespace App\Actions\Calculators\Guest;

use App\Tasks\Calculators\Guest\GetCalculatorsByUuidTask;
use Illuminate\Database\Eloquent\Collection;

class GetCalculatorsByUuidAction
{

    public function __construct(
        protected GetCalculatorsByUuidTask $getCalculatorsByUuidTask
    )
    {}

    public function run(array $uuid): Collection
    {
        return $this->getCalculatorsByUuidTask->run($uuid);
    }
}
