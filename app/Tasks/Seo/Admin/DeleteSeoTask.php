<?php

namespace App\Tasks\Seo\Admin;

use App\Models\Seo;

class DeleteSeoTask
{
    public function run(int $id): void
    {
        $seo = Seo::query()->findOrFail($id);
        $seo->delete();
    }
}
