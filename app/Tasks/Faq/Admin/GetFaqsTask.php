<?php

namespace App\Tasks\Faq\Admin;

use App\Models\Faq;
use Illuminate\Pagination\LengthAwarePaginator;

class GetFaqsTask
{
    public function run(?array $params = []): LengthAwarePaginator
    {
        return Faq::query()
            ->paginate($params['limit'] ?? 10);
    }
}
