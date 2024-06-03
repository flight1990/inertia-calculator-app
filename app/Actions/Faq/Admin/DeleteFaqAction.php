<?php

namespace App\Actions\Faq\Admin;

use App\Tasks\Faq\Admin\DeleteFaqTask;

class DeleteFaqAction
{
    public function __construct(
        protected DeleteFaqTask $deleteFaqTask
    )
    {
    }

    public function run(int $id): void
    {
        $this->deleteFaqTask->run($id);
    }
}
