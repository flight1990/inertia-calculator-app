<?php

namespace App\Actions\Calculators\Guest;

use App\Tasks\Calculators\FindGuestCalculatorTask;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FindCalculatorAction
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
