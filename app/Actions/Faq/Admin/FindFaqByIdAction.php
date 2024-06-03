<?php

namespace App\Actions\Faq\Admin;

use App\Tasks\Calculators\Admin\FindCalculatorByIdTask;
use App\Tasks\Faq\Admin\FindFaqByIdTask;
use Illuminate\Database\Eloquent\Model;

class FindFaqByIdAction
{
    public function __construct(
        protected FindFaqByIdTask $findFaqByIdTask
    )
    {
    }

    public function run(int $id): Model
    {
        return $this->findFaqByIdTask->run($id);
    }
}
