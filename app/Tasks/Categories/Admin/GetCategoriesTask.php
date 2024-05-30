<?php

namespace App\Tasks\Categories\Admin;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class GetCategoriesTask
{
    public function run(?array $params = []): LengthAwarePaginator
    {
        return Category::query()
            ->paginate($params['limit'] ?? 10);
    }
}
