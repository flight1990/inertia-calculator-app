<?php

namespace App\Tasks\Menu;

use App\Models\Menu;
use Kalnoy\Nestedset\Collection;

class GetMenuToTreeTask
{
    public function run(int $id = null, int $depth = null): Collection
    {
        return Menu::query()
            ->when(!empty($id), function ($q) use ($id) {
                $q->where('id', '!=', $id)
                    ->whereNotDescendantOf($id);
            })
            ->when(!empty($depth), function ($q) use ($id) {
                $q->withDepth()
                    ->having('depth', '<=', 1);
            })
            ->defaultOrder()
            ->get()
            ->toTree();
    }
}
