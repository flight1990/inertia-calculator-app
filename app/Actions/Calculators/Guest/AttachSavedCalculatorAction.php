<?php

namespace App\Actions\Calculators\Guest;

use App\Tasks\Calculators\Guest\AttachSavedCalculatorTask;

class AttachSavedCalculatorAction
{

    public function __construct(
        protected AttachSavedCalculatorTask $attachSavedCalculatorTask
    )
    {
    }

    public function run(array $payload): void
    {
        $this->attachSavedCalculatorTask->run($payload);
    }
}
