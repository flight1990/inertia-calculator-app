<?php

namespace App\Actions\Calculators\Guest;

use App\Tasks\Calculators\DetachFavoriteCalculatorTask;

class DetachFavoriteCalculatorAction
{
    public function __construct(
        protected DetachFavoriteCalculatorTask $detachFavoriteCalculatorTask
    )
    {
    }

    public function run(int $id): void
    {
        $this->detachFavoriteCalculatorTask->run($id);
    }
}
