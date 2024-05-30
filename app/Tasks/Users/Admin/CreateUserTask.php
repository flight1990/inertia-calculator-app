<?php

namespace App\Tasks\Users\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CreateUserTask
{
    public function run(array $paload): Model
    {
        return User::create($paload);
    }
}
