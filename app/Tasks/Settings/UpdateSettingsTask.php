<?php

namespace App\Tasks\Settings;

use App\Models\Setting;
use Illuminate\Support\Facades\Config;

class UpdateSettingsTask
{
    public function run(array $payload): void
    {
        foreach ($payload as $setting) {
            Setting::query()
                ->where('key', $setting['key'])
                ->update(['value' => $setting['value']]);

            Config::set('settings.'.$setting['key'], $setting['value']);
        }
    }
}
