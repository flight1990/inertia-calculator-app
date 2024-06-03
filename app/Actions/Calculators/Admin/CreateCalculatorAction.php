<?php

namespace App\Actions\Calculators\Admin;

use App\Tasks\Calculators\Admin\CreateCalculatorTask;
use Illuminate\Database\Eloquent\Model;

class CreateCalculatorAction
{
    public function __construct(
        protected CreateCalculatorTask $createCalculatorTask
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->createCalculatorTask->run($payload);
    }
}
