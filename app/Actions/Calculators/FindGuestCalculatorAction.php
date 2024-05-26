<?php

namespace App\Actions\Calculators;

use App\Tasks\Calculators\FindGuestCalculatorTask;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FindGuestCalculatorAction
{
    public function __construct(
        protected FindGuestCalculatorTask $findGuestCalculatorTask
    )
    {
    }

    public function run(string $slug): Model
    {
        return $this->findGuestCalculatorTask->run($slug, Auth::id());
    }
}
