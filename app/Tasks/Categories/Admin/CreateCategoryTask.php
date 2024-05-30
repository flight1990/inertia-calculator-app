<?php

namespace App\Tasks\Categories\Admin;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CreateCategoryTask
{
    public function run(array $paload): Model
    {
        return Category::create($paload);
    }
}
