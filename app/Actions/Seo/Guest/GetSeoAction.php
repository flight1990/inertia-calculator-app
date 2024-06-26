<?php

namespace App\Actions\Seo\Guest;

use App\Tasks\Seo\Guest\FindSeoByUrlTask;
use Illuminate\Database\Eloquent\Model;

class GetSeoAction
{
    public function __construct(
        protected FindSeoByUrlTask $findSeoByUrlTask
    )
    {
    }

    public function run(string $url): Model|null
    {
        return $this->findSeoByUrlTask->run($url);
    }
}
