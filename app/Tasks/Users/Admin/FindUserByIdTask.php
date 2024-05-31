<?php

namespace App\Tasks\Users\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class FindUserByIdTask
{
    public function run(int $id): Model
    {
        return User::query()->findOrFail($id);
    }
}
