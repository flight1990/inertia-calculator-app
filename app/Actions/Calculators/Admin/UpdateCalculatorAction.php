<?php

namespace App\Actions\Calculators\Admin;

use App\Tasks\Calculators\Admin\UpdateCalculatorTask;
use Illuminate\Database\Eloquent\Model;

class UpdateCalculatorAction
{
    public function __construct(
        protected UpdateCalculatorTask $updateCalculatorTask
    )
    {
    }

    public function run(array $paylaod, int $id): Model
    {
        return $this->updateCalculatorTask->run($paylaod, $id);
    }
}
