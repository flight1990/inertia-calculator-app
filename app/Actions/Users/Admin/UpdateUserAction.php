<?php

namespace App\Actions\Users\Admin;

use App\Tasks\Users\Admin\UpdateUserTask;
use Illuminate\Database\Eloquent\Model;

class UpdateUserAction
{
    public function __construct(
        protected UpdateUserTask $updateUserTask
    )
    {
    }

    public function run(array $paylaod, int $id): Model
    {
        if (empty($paylaod['password'])) unset($paylaod['password']);
        if (empty($paylaod['password_confirmation'])) unset($paylaod['password_confirmation']);

        return $this->updateUserTask->run($paylaod, $id);
    }
}
