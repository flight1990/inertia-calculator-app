<?php

namespace App\Tasks\Menu;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;

class UpdateMenuTask
{
    public function run(array $payload, int $id): Model
    {
        $menu = Menu::query()->findOrFail($id);
        $menu->update($payload);

        return $menu;
    }
}
