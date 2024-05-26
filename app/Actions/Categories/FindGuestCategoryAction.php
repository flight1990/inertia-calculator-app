<?php

namespace App\Actions\Categories;

use App\Tasks\Categories\FindGuestCategoryTask;
use Illuminate\Database\Eloquent\Model;

class FindGuestCategoryAction
{
    public function __construct(
        protected FindGuestCategoryTask $findGuestCategoryTask
    )
    {
    }

    public function run(int $categoryId, ?int $calculatorId = null): Model
    {
        return $this->findGuestCategoryTask->run($categoryId, $calculatorId);
    }
}
