<?php

namespace App\Actions\Calculators\Guest;
use App\Tasks\Calculators\Guest\DeleteSavedCalculatorTask;

class DeleteSavedCalculatorAction
{
    public function __construct(
        protected DeleteSavedCalculatorTask $deleteSavedCalculatorTask
    )
    {
    }

    public function run(int $id): void
    {
        $this->deleteSavedCalculatorTask->run($id);
    }
}
