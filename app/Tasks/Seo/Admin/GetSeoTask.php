<?php

namespace App\Tasks\Seo\Admin;

use App\Models\Seo;
use Illuminate\Pagination\LengthAwarePaginator;

class GetSeoTask
{
    public function run(?array $params = []): LengthAwarePaginator
    {
        return Seo::query()
            ->paginate($params['limit'] ?? 10);
    }
}
