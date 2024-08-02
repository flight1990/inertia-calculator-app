<?php

namespace App\Providers;

use App\Actions\Menu\BuildMenusFromDataBaseAction;
use App\Actions\Settings\GetSettingsAction;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (!App::runningInConsole() && count(Schema::getColumnListing('settings'))) {
            $settings = app(GetSettingsAction::class)->run();

            foreach ($settings as $setting) {
                Config::set('settings.'.$setting->key, $setting->value);
            }
        }
    }
}
