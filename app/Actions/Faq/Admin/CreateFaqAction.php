<?php

namespace App\Actions\Faq\Admin;

use App\Tasks\Faq\Admin\CreateFaqTask;
use Illuminate\Database\Eloquent\Model;

class CreateFaqAction
{
    public function __construct(
        protected CreateFaqTask $createFaqTask
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->createFaqTask->run($payload);
    }
}
