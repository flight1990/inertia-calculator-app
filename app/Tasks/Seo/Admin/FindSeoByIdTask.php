<?php

namespace App\Tasks\Seo\Admin;

use App\Models\Seo;
use Illuminate\Database\Eloquent\Model;

class FindSeoByIdTask
{
    public function run(int $id): Model
    {
        return Seo::query()->findOrFail($id);
    }
}
