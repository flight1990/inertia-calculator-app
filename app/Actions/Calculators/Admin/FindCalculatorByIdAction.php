<?php

namespace App\Actions\Calculators\Admin;

use App\Tasks\Calculators\Admin\FindCalculatorByIdTask;
use Illuminate\Database\Eloquent\Model;

class FindCalculatorByIdAction
{
    public function __construct(
        protected FindCalculatorByIdTask $findCalculatorByIdTask
    )
    {
    }

    public function run(int $id): Model
    {
        return $this->findCalculatorByIdTask->run($id);
    }
}
