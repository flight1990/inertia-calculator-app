<?php

namespace App\Actions\Categories\Admin;

use App\Tasks\Categories\Admin\DeleteCategoryTask;

class DeleteCategoryAction
{
    public function __construct(
        protected DeleteCategoryTask $deleteCategoryTask
    )
    {
    }

    public function run(int $id): void
    {
        $this->deleteCategoryTask->run($id);
    }
}
