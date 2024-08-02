<?php

namespace App\Tasks\Settings;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

class GetSettingsTask
{
    public function run(): Collection
    {
        return Setting::query()
            ->get();
    }
}
