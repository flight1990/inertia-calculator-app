<?php

namespace App\Actions\Calculators;

use App\Tasks\Calculators\AttachFavoriteCalculatorTask;

class AttachFavoriteCalculatorAction
{
    public function __construct(
        protected AttachFavoriteCalculatorTask $attachFavoriteCalculatorTasks
    )
    {
    }

    public function run(int $id): void
    {
        $this->attachFavoriteCalculatorTasks->run($id);
    }
}
