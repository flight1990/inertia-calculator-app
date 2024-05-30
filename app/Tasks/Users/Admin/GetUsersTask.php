<?php

namespace App\Tasks\Users\Admin;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class GetUsersTask
{
    public function run(?array $params = []): LengthAwarePaginator
    {
        return User::query()
            ->paginate($params['limit'] ?? 10);
    }
}
