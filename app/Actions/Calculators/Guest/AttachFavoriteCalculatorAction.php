<?php

namespace App\Actions\Calculators\Guest;

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
