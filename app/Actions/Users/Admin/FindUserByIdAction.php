<?php

namespace App\Actions\Users\Admin;

use App\Tasks\Users\Admin\FindUserByIdTask;
use Illuminate\Database\Eloquent\Model;

class FindUserByIdAction
{
    public function __construct(
        protected FindUserByIdTask $findUserByIdTask
    )
    {
    }

    public function run(int $id): Model
    {
        return $this->findUserByIdTask->run($id);
    }
}
