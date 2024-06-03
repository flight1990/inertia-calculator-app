<?php

namespace App\Tasks\Seo\Admin;

use App\Models\Seo;
use Illuminate\Database\Eloquent\Model;

class UpdateSeoTask
{
    public function run(array $payload, int $id): Model
    {
        $seo = Seo::query()->findOrFail($id);
        $seo->update($payload);

        return $seo;
    }
}
