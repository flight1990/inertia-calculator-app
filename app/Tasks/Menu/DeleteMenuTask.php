<?php

namespace App\Tasks\Menu;

use App\Models\Menu;

class DeleteMenuTask
{
    public function run(int $id): void
    {
        $menu = Menu::query()->findOrFail($id);
        $menu->delete();
    }
}
