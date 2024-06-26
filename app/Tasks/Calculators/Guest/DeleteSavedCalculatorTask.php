<?php

namespace App\Tasks\Calculators\Guest;

use Illuminate\Support\Facades\DB;

class DeleteSavedCalculatorTask
{
    public function run(int $id): void
    {
        DB::table('calculator_user')->delete($id);
    }
}
