<?php

namespace App\Tasks\Faq\Guest;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Collection;

class GetFaqsTask
{
    public function run(?array $params = []): Collection
    {
        return Faq::query()->get();
    }
}
