<?php

namespace App\Actions\Settings;

use App\Tasks\Settings\GetSettingsTask;
use Illuminate\Database\Eloquent\Collection;

class GetSettingsAction
{
    public function __construct(
        protected GetSettingsTask $getSettingsTask
    )
    {
    }

    public function run(): Collection
    {
        return $this->getSettingsTask->run();
    }
}
