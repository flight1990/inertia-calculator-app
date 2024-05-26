<?php

namespace App\Tasks\Categories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class GetGuestCategoriesTask
{
    public function run(): Collection
    {
        return Category::query()
            ->with(['calculators'])
            ->get();
    }
}
