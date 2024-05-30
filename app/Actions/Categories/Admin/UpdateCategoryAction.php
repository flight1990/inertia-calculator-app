<?php

namespace App\Actions\Categories\Admin;

use App\Tasks\Categories\Admin\UpdateCategoryTask;
use Illuminate\Database\Eloquent\Model;

class UpdateCategoryAction
{
    public function __construct(
        protected UpdateCategoryTask $updateCategoryTask
    )
    {
    }

    public function run(array $paylaod, int $id): Model
    {
        return $this->updateCategoryTask->run($paylaod, $id);
    }
}
