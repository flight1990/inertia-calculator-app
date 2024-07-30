<?php

namespace App\Actions\Menu;

use App\Tasks\Menu\RebuildMenuTreeTask;

class RebuildMenuTreeAction
{
    public function __construct(
        protected RebuildMenuTreeTask $rebuildMenuTreeTask
    )
    {}

    public function run(array $payload): int
    {
        return $this->rebuildMenuTreeTask->run($payload);
    }
}
