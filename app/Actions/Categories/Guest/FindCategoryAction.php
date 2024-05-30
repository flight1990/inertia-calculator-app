<?php

namespace App\Actions\Categories\Guest;

use Illuminate\Database\Eloquent\Model;

class FindCategoryAction
{
    public function __construct(
        protected \App\Tasks\Categories\Guest\FindCategoryTask $findGuestCategoryTask
    )
    {
    }

    public function run(int $categoryId, ?int $calculatorId = null): Model
    {
        return $this->findGuestCategoryTask->run($categoryId, $calculatorId);
    }
}
