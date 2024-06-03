<?php

namespace App\Actions\Faq\Admin;

use App\Tasks\Faq\Admin\UpdateFaqTask;
use Illuminate\Database\Eloquent\Model;

class UpdateFaqAction
{
    public function __construct(
        protected UpdateFaqTask $updateFaqTask
    )
    {
    }

    public function run(array $paylaod, int $id): Model
    {
        return $this->updateFaqTask->run($paylaod, $id);
    }
}
