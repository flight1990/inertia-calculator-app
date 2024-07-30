<?php

namespace App\Tasks\Menu;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;

class CreateMenuTask
{
    public function run(array $paylaod): Model
    {
        return Menu::create($paylaod);
    }
}
