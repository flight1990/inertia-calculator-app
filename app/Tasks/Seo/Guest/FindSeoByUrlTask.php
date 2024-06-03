<?php

namespace App\Tasks\Seo\Guest;

use App\Models\Seo;
use Illuminate\Database\Eloquent\Model;

class FindSeoByUrlTask
{
    public function run(string $url): Model|null
    {
        return Seo::query()
            ->where('url', $url)
            ->first();
    }
}
