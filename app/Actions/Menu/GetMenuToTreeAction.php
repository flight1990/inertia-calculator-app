<?php

namespace App\Actions\Menu;

use App\Tasks\Menu\GetMenuToTreeTask;
use Kalnoy\Nestedset\Collection;

class GetMenuToTreeAction
{
    public function __construct(
        protected GetMenuToTreeTask $getMenuToTreeTask
    )
    {
    }

    public function run(): Collection
    {
        return $this->getMenuToTreeTask->run();
    }
}
