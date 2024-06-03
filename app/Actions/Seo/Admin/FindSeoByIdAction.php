<?php

namespace App\Actions\Seo\Admin;

use App\Tasks\Seo\Admin\FindSeoByIdTask;
use Illuminate\Database\Eloquent\Model;

class FindSeoByIdAction
{
    public function __construct(
        protected FindSeoByIdTask $findSeoByIdTask,
    )
    {
    }

    public function run(int $id): Model
    {
        return $this->findSeoByIdTask->run($id);
    }
}
