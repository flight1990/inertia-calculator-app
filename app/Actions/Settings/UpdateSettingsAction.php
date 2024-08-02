<?php

namespace App\Actions\Settings;

use App\Tasks\Settings\UpdateSettingsTask;

class UpdateSettingsAction
{
    public function __construct(
        protected UpdateSettingsTask $updateSettingsTask
    )
    {
    }

    public function run(array $payload): void
    {
        $this->updateSettingsTask->run($payload);
    }
}
