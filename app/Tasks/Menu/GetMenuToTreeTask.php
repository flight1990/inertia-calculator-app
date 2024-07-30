<?php

namespace App\Tasks\Menu;

use App\Models\Menu;
use Kalnoy\Nestedset\Collection;

class GetMenuToTreeTask
{
    public function run(): Collection
    {
        return Menu::query()
            ->defaultOrder()
            ->get()
            ->toTree();
    }
}
