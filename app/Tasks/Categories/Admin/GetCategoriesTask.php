<?php

namespace App\Tasks\Categories\Admin;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class GetCategoriesTask
{
    public function run(?array $params = []): Collection
    {
        return Category::query()->get();

    }
}
