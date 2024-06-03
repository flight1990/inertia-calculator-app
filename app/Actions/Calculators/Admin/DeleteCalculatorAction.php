<?php

namespace App\Actions\Calculators\Admin;

use App\Tasks\Calculators\Admin\DeleteCalculatorTask;

class DeleteCalculatorAction
{
    public function __construct(
        protected DeleteCalculatorTask $deleteCalculatorTask
    )
    {
    }

    public function run(int $id): void
    {
        $this->deleteCalculatorTask->run($id);
    }
}
