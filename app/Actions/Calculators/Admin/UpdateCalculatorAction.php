<?php

namespace App\Actions\Calculators\Admin;

use App\Tasks\Calculators\Admin\FindCalculatorByIdTask;
use App\Tasks\Calculators\Admin\UpdateCalculatorTask;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UpdateCalculatorAction
{
    public function __construct(
        protected UpdateCalculatorTask $updateCalculatorTask,
        protected FindCalculatorByIdTask $findCalculatorByIdTask
    )
    {
    }

    public function run(array $paylaod, int $id): Model
    {
        $calculator = $this->findCalculatorByIdTask->run($id);

        if (!empty($payload['fronted'])) {
            Storage::disk('public')->delete($calculator['frontend_path']);
            $payload['frontend_path'] = $payload['frontend']->storeAs("calcs/{$calculator['uuid']}", 'frontend.'.$payload['frontend']->getClientOriginalExtension());
        }

        if (!empty($payload['backend'])) {
            Storage::disk('public')->delete($calculator['backend_path']);
            $payload['backend_path'] = $payload['backend']->storeAs("calcs/{$calculator['uuid']}", 'backend.'.$payload['backend']->getClientOriginalExtension());
        }

        $calculator->update($paylaod);

        return $calculator;
    }
}
