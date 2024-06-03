<?php

namespace App\Actions\Seo\Admin;

use App\Tasks\Seo\Admin\UpdateSeoTask;
use Illuminate\Database\Eloquent\Model;

class UpdateSeoAction
{
    public function __construct(
        protected UpdateSeoTask $updateSeoTask,
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        $payload['url'] = rtrim($payload['url'], '/');

        return $this->updateSeoTask->run($payload, $id);
    }
}
