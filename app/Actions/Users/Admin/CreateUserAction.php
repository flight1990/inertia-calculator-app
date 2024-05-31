<?php

namespace App\Actions\Users\Admin;

use App\Tasks\Users\Admin\CreateUserTask;
use Illuminate\Database\Eloquent\Model;

class CreateUserAction
{
    public function __construct(
        protected CreateUserTask $createUserTask
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->createUserTask->run($payload);
    }
}
