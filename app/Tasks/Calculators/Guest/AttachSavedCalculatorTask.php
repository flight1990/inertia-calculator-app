<?php

namespace App\Tasks\Calculators\Guest;

use Illuminate\Support\Facades\Auth;

class AttachSavedCalculatorTask
{
    public function run(array $payload): void
    {
        Auth::user()->savedCalculators()->attach($payload['calculator_id'], [
            'name' => $payload['title'],
            'input' => $payload['input']
        ]);
    }
}
