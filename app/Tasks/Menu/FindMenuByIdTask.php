<?php

namespace App\Tasks\Menu;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;

class FindMenuByIdTask
{
    public function run(int $id): Model
    {
        return Menu::query()->findOrFail($id);
    }
}
