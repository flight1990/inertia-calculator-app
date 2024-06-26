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

    public function run(array $payload, int $id): Model
    {
        $calculator = $this->findCalculatorByIdTask->run($id);

        if (!empty($payload['frontend'])) {


            if (!empty($calculator['frontend_path'])) {
                Storage::disk('public')->delete($calculator['frontend_path']);
            }


            $payload['frontend_path'] = $payload['frontend']->storeAs("calcs/{$calculator['uuid']}", 'frontend.'.$payload['frontend']->getClientOriginalExtension());
        }

        if (!empty($payload['backend'])) {

            if (!empty($calculator['backend_path'])) {
                Storage::disk('public')->delete($calculator['backend_path']);
            }


            $payload['backend_path'] = $payload['backend']->storeAs("calcs/{$calculator['uuid']}", 'backend.'.$payload['backend']->getClientOriginalExtension());
        }

        $calculator->update($payload);

        return $calculator;
    }
}
