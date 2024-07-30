<?php

namespace App\Actions\Menu;

use App\Tasks\Menu\DeleteMenuTask;

class DeleteMenuAction
{
    public function __construct(
        protected DeleteMenuTask $deleteMenuTask
    )
    {
    }

    public function run(int $id): void
    {
        $this->deleteMenuTask->run($id);
    }
}
