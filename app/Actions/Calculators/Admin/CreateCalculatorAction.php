<?php

namespace App\Actions\Calculators\Admin;

use App\Tasks\Calculators\Admin\CreateCalculatorTask;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CreateCalculatorAction
{
    public function __construct(
        protected CreateCalculatorTask $createCalculatorTask
    )
    {
    }

    public function run(array $payload): Model
    {
        $payload['uuid'] = md5(now());

        $payload['frontend_path'] = $payload['frontend']->storeAs("calcs/{$payload['uuid']}", 'frontend.'.$payload['frontend']->getClientOriginalExtension());
        $payload['backend_path'] = $payload['backend']->storeAs("calcs/{$payload['uuid']}", 'backend.'.$payload['backend']->getClientOriginalExtension());

        return $this->createCalculatorTask->run($payload);
    }
}
