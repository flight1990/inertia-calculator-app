<?php

namespace App\Actions\Seo\Admin;

use App\Tasks\Seo\Admin\CreateSeoTask;
use Illuminate\Database\Eloquent\Model;

class CreateSeoAction
{
    public function __construct(
        protected CreateSeoTask $createSeoTask,
    )
    {
    }

    public function run(array $payload): Model
    {
        $payload['url'] = rtrim($payload['url'], '/');

        return $this->createSeoTask->run($payload);
    }
}
