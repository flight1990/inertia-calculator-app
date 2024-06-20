<?php

namespace App\Tasks\Categories\Guest;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class GetCategoriesTask
{
    public function run(): Collection
    {
        return Category::query()
            ->whereHas('calculators')
            ->with(['calculators'])
            ->get();
    }
}
