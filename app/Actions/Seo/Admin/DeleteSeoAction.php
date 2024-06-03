<?php

namespace App\Actions\Seo\Admin;

use App\Tasks\Seo\Admin\DeleteSeoTask;

class DeleteSeoAction
{
    public function __construct(
        protected DeleteSeoTask $deleteSeoTask,
    )
    {
    }

    public function run(int $id): void
    {
        $this->deleteSeoTask->run($id);
    }
}
