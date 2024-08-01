<?php

namespace App\Tasks\Menu;

use App\Models\Menu;

class RebuildMenuTreeTask
{
    public function run(array $payload): int
    {
        Menu::rebuildTree($payload);
        Menu::fixTree();

        return  true;
    }
}
