<?php

namespace App\Tasks\Users\Admin;

use App\Models\User;

class DeleteUserTask
{
    public function run(int $id): void
    {
        $user = User::query()->findOrFail($id);
        $user->delete();
    }
}
