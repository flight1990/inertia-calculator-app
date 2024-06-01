<?php

namespace App\Tasks\Seo\Admin;

use App\Models\Seo;
use Illuminate\Database\Eloquent\Model;

class CreateSeoTask
{
    public function run(array $payload): Model
    {
        return Seo::create($payload);
    }
}
