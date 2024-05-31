<?php

namespace App\Actions\Users\Admin;

use App\Tasks\Users\Admin\DeleteUserTask;

class DeleteUserAction
{
    public function __construct(
        protected DeleteUserTask $deleteUserTask
    )
    {
    }

    public function run(int $id): void
    {
        $this->deleteUserTask->run($id);
    }
}
