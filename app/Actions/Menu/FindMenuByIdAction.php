<?php

namespace App\Actions\Menu;

use App\Tasks\Menu\FindMenuByIdTask;
use Illuminate\Database\Eloquent\Model;

class FindMenuByIdAction
{
    public function __construct(
        protected FindMenuByIdTask $findMenuByIdTask
    )
    {
    }

    public function run(int $id): Model
    {
        return $this->findMenuByIdTask->run($id);
    }
}
