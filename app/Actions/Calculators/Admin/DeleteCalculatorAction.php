<?php

namespace App\Actions\Calculators\Admin;

use App\Tasks\Calculators\Admin\FindCalculatorByIdTask;
use Illuminate\Support\Facades\Storage;

class DeleteCalculatorAction
{
    public function __construct(
        protected FindCalculatorByIdTask $findCalculatorByIdTask
    )
    {
    }

    public function run(int $id): void
    {
        $calculator = $this->findCalculatorByIdTask->run($id);

        Storage::disk('public')->deleteDirectory("calcs/{$calculator['uuid']}");

        $calculator->delete();
    }
}
